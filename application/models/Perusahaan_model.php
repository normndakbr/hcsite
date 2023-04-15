<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{

     var $table = 'vw_perusahaan';
     var $column_order = array(null, 'kode_perusahaan', 'nama_perusahaan', 'alamat_perusahaan', 'ket_perusahaan', 'stat_perusahaan', 'tgl_buat', null); //set column field database for datatable orderable
     var $column_search = array('kode_perusahaan', 'nama_perusahaan', 'alamat_perusahaan', 'ket_perusahaan', 'stat_perusahaan', 'tgl_buat',); //set column field database for datatable searchable just firstname , lastname , address are searchable
     var $order = array('kode_perusahaan' => 'desc'); // default order 

     public function __construct()
     {
          parent::__construct();
          $this->load->database();
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
          $this->db->where('id_perusahaan', $id);
          $query = $this->db->get();

          return $query->row();
     }

     public function count_all_perusahaan()
     {
          return $this->db->count_all_results('vw_perusahaan');
     }

     public function count_all_user()
     {
          return $this->db->count_all_results('vw_user');
     }

     public function input_perusahaan($data)
     {
          $this->db->insert('tb_perusahaan', $data);
          if ($this->db->affected_rows() > 0) {
               return true;
          } else {
               return false;
          }
     }

     public function cek_kode($kode_perusahaan)
     {
          $query = $this->db->get_where('tb_perusahaan', ['kode_perusahaan' => $kode_perusahaan]);
          if (empty($query->result())) {
               return 200;
          } else {
               return 201;
          }
     }

     public function cek_perusahaan($nama_perusahaan)
     {
          $query = $this->db->get_where('tb_perusahaan', ['nama_perusahaan' => $nama_perusahaan]);
          if (empty($query->result())) {
               return 200;
          } else {
               return 201;
          }
     }

     public function hapus_perusahaan($auth_perusahaan)
     {
          $cek_id = $this->db->get_where('vw_perusahaan', ['auth_perusahaan' => $auth_perusahaan]);
          if (!empty($cek_id->result())) {
               foreach ($cek_id->result() as $list) {
                    $id_perusahaan = $list->id_perusahaan;
               }

               $this->db->delete('tb_perusahaan', ['id_perusahaan' => $id_perusahaan]);
               if ($this->db->affected_rows() > 0) {
                    return 200;
               } else {
                    return 201;
               }
          } else {
               return 202;
          }
     }

     public function get_perusahaan_id($auth_perusahaan)
     {
          $query = $this->db->get_where('vw_perusahaan', ['auth_perusahaan' => $auth_perusahaan]);
          return $query->result();
     }

     public function edit_perusahaan($kd_perusahaan, $perusahaan, $ket_perusahaan, $status)
     {
          $id_perusahaan = $this->session->userdata('id_perusahaan');

          $query = $this->db->query("SELECT * FROM tb_perusahaan WHERE kd_perusahaan='" . $kd_perusahaan . "' AND id_perusahaan=" . $id_perusahaan . " AND id_perusahaan <> " . $id_perusahaan);
          if (!empty($query->result())) {
               return 203;
          }

          $query = $this->db->query("SELECT * FROM tb_perusahaan WHERE perusahaan='" . $perusahaan . "' AND id_perusahaan=" . $id_perusahaan . " AND id_perusahaan <> " . $id_perusahaan);
          if (!empty($query->result())) {
               return 204;
          }

          $this->db->set('kd_perusahaan', $kd_perusahaan);
          $this->db->set('perusahaan', $perusahaan);
          $this->db->set('ket_perusahaan', $ket_perusahaan);
          $this->db->set('stat_perusahaan', $status);
          $this->db->set('tgl_edit', date('Y-m-d H:i:s'));
          $this->db->where('id_perusahaan', $id_perusahaan);
          $this->db->update('tb_perusahaan');
          if ($this->db->affected_rows() > 0) {
               return 200;
          } else {
               return 201;
          }
     }

     public function get_by_authper($auth_per)
     {
          $query = $this->db->get_where('vw_perusahaan', ['auth_perusahaan' => $auth_per]);
          return $query->result();
     }

     public function get_by_idper($id_per)
     {
          $query = $this->db->get_where('vw_perusahaan', ['id_perusahaan' => $id_per]);
          return $query->result();
     }

     public function get_all()
     {
          return $this->db->get('vw_perusahaan')->result();
     }

     public function get_by_auth($auth_perusahaan)
     {
          $query = $this->db->get_where('vw_perusahaan', ['auth_perusahaan' => $auth_perusahaan]);
          if (!empty($query->result())) {
               foreach ($query->result() as $list) {
                    return $list->id_perusahaan;
               }
          } else {
               return 0;
          }
     }
}
