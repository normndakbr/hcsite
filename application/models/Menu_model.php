<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu_model extends CI_Model
{

     var $table = 'vw_menu';
     var $column_order = array(null, 'kd_menu', 'menu', 'ket_menu', 'stat_menu', 'tgl_buat', null); //set column field database for datatable orderable
     var $column_search = array('kd_menu', 'menu', 'ket_menu', 'stat_menu', 'tgl_buat',); //set column field database for datatable searchable just firstname , lastname , address are searchable
     var $order = array('kd_menu' => 'desc'); // default order 

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
          $this->db->where('id_menu', $id);
          $query = $this->db->get();

          return $query->row();
     }

     public function count_all_menu()
     {
          return $this->db->count_all_results('vw_menu');
     }

     public function count_all_user()
     {
          return $this->db->count_all_results('vw_user');
     }

     public function input_menu($data)
     {
          $this->db->insert('tb_menu', $data);
          if ($this->db->affected_rows() > 0) {
               return true;
          } else {
               return false;
          }
     }

     public function cek_kode($id_perusahaan, $kd_menu)
     {
          $query = $this->db->get_where('tb_menu', ['kd_menu' => $kd_menu, 'id_perusahaan' => $id_perusahaan]);
          if (!empty($query->result())) {
               return true;
          } else {
               return false;
          }
     }

     public function cek_menu($id_perusahaan, $menu)
     {
          $query = $this->db->get_where('tb_menu', ['menu' => $menu, 'id_perusahaan' => $id_perusahaan]);
          if (!empty($query->result())) {
               return true;
          } else {
               return false;
          }
     }

     public function hapus_menu($auth_menu)
     {
          $cek_id = $this->db->get_where('vw_menu', ['auth_menu' => $auth_menu]);
          if (!empty($cek_id->result())) {
               foreach ($cek_id->result() as $list) {
                    $id_menu = $list->id_menu;
               }

               $this->db->delete('tb_menu', ['id_menu' => $id_menu]);
               if ($this->db->affected_rows() > 0) {
                    return 200;
               } else {
                    return 201;
               }
          } else {
               return 202;
          }
     }

     public function get_menu_id($auth_menu)
     {
          $query = $this->db->get_where('vw_menu', ['auth_menu' => $auth_menu]);
          return $query->result();
     }

     public function edit_menu($kd_menu, $menu, $ket_menu, $status)
     {
          $id_perusahaan = $this->session->userdata('id_perusahaan');
          $id_menu = $this->session->userdata('id_menu');

          $query = $this->db->query("SELECT * FROM tb_menu WHERE kd_menu='" . $kd_menu . "' AND id_perusahaan=" . $id_perusahaan . " AND id_menu <> " . $id_menu);
          if (!empty($query->result())) {
               return 203;
          }

          $query = $this->db->query("SELECT * FROM tb_menu WHERE menu='" . $menu . "' AND id_perusahaan=" . $id_perusahaan . " AND id_menu <> " . $id_menu);
          if (!empty($query->result())) {
               return 204;
          }

          $this->db->set('kd_menu', $kd_menu);
          $this->db->set('menu', $menu);
          $this->db->set('ket_menu', $ket_menu);
          $this->db->set('stat_menu', $status);
          $this->db->set('tgl_edit', date('Y-m-d H:i:s'));
          $this->db->where('id_menu', $id_menu);
          $this->db->update('tb_menu');
          if ($this->db->affected_rows() > 0) {
               return 200;
          } else {
               return 201;
          }
     }

     public function get_all()
     {
          return $this->db->get('vw_menu')->result();
     }

     public function get_by_auth_menu($auth_menu)
     {
          $query = $this->db->get_where('vw_menu', ['auth_menu' => $auth_menu]);
          return $query->result();
     }

     public function get_by_authper($auth_per)
     {
          $query = $this->db->get_where('vw_menu', ['auth_perusahaan' => $auth_per]);
          return $query->result();
     }
}
