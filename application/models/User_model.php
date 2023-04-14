<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

     var $table = 'vw_user';
     var $column_order = array(null, 'Nama', 'Email', 'stat_aktif', 'tgl_aktif', 'tgl_exp', 'tgl_buat', null); //set column field database for datatable orderable
     var $column_search = array('Nama', 'Email', 'stat_aktif', 'tgl_aktif', 'tgl_exp', 'tgl_buat'); //set column field database for datatable searchable just firstname , lastname , address are searchable
     var $order = array('Nama' => 'asc'); // default order 

     public function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->library('form_validation');
     }

     private function _get_datatables_query()
     {

          $this->db->from($this->table);

          $i = 0;

          foreach ($this->column_search as $item) // loop column 
          {
               if ($_POST['search']['value']) // if datatable send POST for search
               {

                    if ($i === 0) // first loop
                    {
                         $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                         $this->db->like($item, $_POST['search']['value']);
                    } else {
                         $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if (count($this->column_search) - 1 == $i) //last loop
                         $this->db->group_end(); //close bracket
               }
               $i++;
          }

          if (isset($_POST['order'])) // here order processing
          {
               $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } else if (isset($this->order)) {
               $order = $this->order;
               $this->db->order_by(key($order), $order[key($order)]);
          }
     }


     function get_datatables()
     {
          $this->_get_datatables_query();
          if ($_POST['length'] != -1)
               $this->db->limit($_POST['length'], $_POST['start']);
          $query = $this->db->get();
          return $query->result();
     }

     function count_filtered()
     {
          $this->_get_datatables_query();
          $query = $this->db->get();
          return $query->num_rows();
     }

     public function count_all()
     {
          $this->db->from($this->table);
          return $this->db->count_all_results();
     }

     public function get_by_id($id)
     {
          $this->db->from($this->table);
          $this->db->where('id_user', $id);
          $query = $this->db->get();

          return $query->row();
     }

     public function buat_user($data)
     {
          $this->db->insert('tb_user', $data);
          if ($this->db->affected_rows() > 0) {
               return true;
          } else {
               return false;
          }
     }

     public function get_user($email, $sandi)
     {
          $this->db->select("*");
          $this->db->from("vw_user");
          $this->db->where("Email", $email);
          $query = $this->db->get();
          $user = $query->row();

          if (isset($user)) {
               if ($user->stat_aktif == "N") {
                    return json_encode(array("statusCode" => 201, "pesan" => "Email tidak aktif"));
               } else {
                    $tglnow = date("Y-m-d");
                    if ($tglnow > $user->tgl_exp) {
                         return json_encode(array("statusCode" => 201, "pesan" => "Email expired"));
                    } else {
                         if ($sandi == $user->Sesi) {
                              return json_encode(array(
                                   "statusCode" => 200,
                                   "id_user" => $user->id_user,
                                   "email" => $user->Email,
                                   "nama" => $user->Nama
                              ));
                         } else {
                              return json_encode(array("statusCode" => 201, "pesan" => "Sandi anda salah"));
                         }
                    }
               }
          } else {
               return json_encode(array("statusCode" => 201, "pesan" => "Email tidak terdaftar"));
          }
     }

     public function jml_user()
     {
          $query = $this->db->get('vw_user')->num_rows();
          return $query;
     }

     public function ganti_sandi($auth_user, $sesi)
     {
          $query = $this->db->get_where('vw_user', ['auth_user' => $auth_user])->row();
          if (!empty($query)) {
               $id_user = $query->id_user;

               $this->db->set('Sesi', $sesi);
               $this->db->where('id_user', $id_user);
               $this->db->update('tb_user');
               if ($this->db->affected_rows() > 0) {
                    return true;
               } else {
                    return false;
               }
          } else {
               return false;
          }
     }

     public function cek_sandi($auth_user, $sesi)
     {
          $query = $this->db->get_where('vw_user', ['auth_user' => $auth_user])->row();
          if (!empty($query)) {
               if ($query->Sesi == $sesi) {
                    return true;
               } else {
                    return false;
               }
          } else {
               return false;
          }
     }

     public function hapus_user($authuser)
     {
          $this->db->select("*");
          $this->db->from("vw_user");
          $this->db->where("auth_user", $authuser);
          $query = $this->db->get();
          $user = $query->row();

          if (isset($user)) {
               $this->db->where('id_user', $user->id_user);
               $this->db->delete('tb_user');

               if ($this->db->affected_rows() > 0) {
                    return "200";
               } else {
                    return "201";
               }
          } else {
               return "202";
          }
     }
}
