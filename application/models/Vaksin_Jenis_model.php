<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin_Jenis_Model extends CI_Model
{

     var $table = 'tb_vaksin_jenis';

     public function __construct()
     {
          parent::__construct();
          $this->load->database();
     }

     // private function _get_datatables_query()
     // {

     //      $this->db->from($this->table);

     //      $i = 0;

     //      foreach ($this->column_search as $item) // loop column 
     //      {
     //           if ($_POST['search']['value']) // if datatable send POST for search
     //           {

     //                if ($i === 0) // first loop
     //                {
     //                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
     //                     $this->db->like($item, $_POST['search']['value']);
     //                } else {
     //                     $this->db->or_like($item, $_POST['search']['value']);
     //                }

     //                if (count($this->column_search) - 1 == $i) //last loop
     //                     $this->db->group_end(); //close bracket
     //           }
     //           $i++;
     //      }

     //      if (isset($_POST['order'])) // here order processing
     //      {
     //           $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
     //      } else if (isset($this->order)) {
     //           $order = $this->order;
     //           $this->db->order_by(key($order), $order[key($order)]);
     //      }
     // }

     // function get_datatables()
     // {
     //      $this->_get_datatables_query();
     //      if ($_POST['length'] != -1)
     //           $this->db->limit($_POST['length'], $_POST['start']);
     //      $query = $this->db->get();
     //      return $query->result();
     // }

     // function count_filtered()
     // {
     //      $this->_get_datatables_query();
     //      $query = $this->db->get();
     //      return $query->num_rows();
     // }

     // public function count_all()
     // {
     //      $this->db->from($this->table);
     //      return $this->db->count_all_results();
     // }

     // public function get_by_id($id)
     // {
     //      $this->db->from($this->table);
     //      $this->db->where('id_tipe', $id);
     //      $query = $this->db->get();

     //      return $query->row();
     // }

     // public function input_tipe($data)
     // {
     //      $this->db->insert('tb_tipe', $data);
     //      if ($this->db->affected_rows() > 0) {
     //           return true;
     //      } else {
     //           return false;
     //      }
     // }

     // public function cek_kode($id_perusahaan, $kd_tipe)
     // {
     //      $query = $this->db->get_where('tb_tipe', ['kd_tipe' => $kd_tipe, 'id_perusahaan' => $id_perusahaan]);
     //      if (!empty($query->result())) {
     //           return true;
     //      } else {
     //           return false;
     //      }
     // }

     // public function cek_tipe($id_perusahaan, $tipe)
     // {
     //      $query = $this->db->get_where('tb_tipe', ['tipe' => $tipe, 'id_perusahaan' => $id_perusahaan]);
     //      if (!empty($query->result())) {
     //           return true;
     //      } else {
     //           return false;
     //      }
     // }

     // public function hapus_tipe($auth_tipe)
     // {
     //      $cek_id = $this->db->get_where('vw_tipe', ['auth_tipe' => $auth_tipe]);
     //      if (!empty($cek_id->result())) {
     //           foreach ($cek_id->result() as $list) {
     //                $id_tipe = $list->id_tipe;
     //           }

     //           $this->db->delete('tb_tipe', ['id_tipe' => $id_tipe]);
     //           if ($this->db->affected_rows() > 0) {
     //                return 200;
     //           } else {
     //                return 201;
     //           }
     //      } else {
     //           return 202;
     //      }
     // }

     // public function get_tipe_id($auth_tipe)
     // {
     //      $query = $this->db->get_where('vw_tipe', ['auth_tipe' => $auth_tipe]);
     //      return $query->result();
     // }

     // public function edit_tipe($kd_tipe, $tipe, $ket_tipe, $status)
     // {
     //      $id_perusahaan = $this->session->userdata('id_perusahaan');
     //      $id_tipe = $this->session->userdata('id_tipe');

     //      $query = $this->db->query("SELECT * FROM tb_tipe WHERE kd_tipe='" . $kd_tipe . "' AND id_perusahaan=" . $id_perusahaan . " AND id_tipe <> " . $id_tipe);
     //      if (!empty($query->result())) {
     //           return 203;
     //      }

     //      $query = $this->db->query("SELECT * FROM tb_tipe WHERE tipe='" . $tipe . "' AND id_perusahaan=" . $id_perusahaan . " AND id_tipe <> " . $id_tipe);
     //      if (!empty($query->result())) {
     //           return 204;
     //      }

     //      $this->db->set('kd_tipe', $kd_tipe);
     //      $this->db->set('tipe', $tipe);
     //      $this->db->set('ket_tipe', $ket_tipe);
     //      $this->db->set('stat_tipe', $status);
     //      $this->db->set('tgl_edit', date('Y-m-d H:i:s'));
     //      $this->db->where('id_tipe', $id_tipe);
     //      $this->db->update('tb_tipe');
     //      if ($this->db->affected_rows() > 0) {
     //           return 200;
     //      } else {
     //           return 201;
     //      }
     // }

     public function get_all()
     {
          return $this->db->get('tb_vaksin_jenis')->result();
     }

     // public function get_by_authper($auth_per)
     // {
     //      $query = $this->db->get_where('vw_tipe', ['auth_perusahaan' => $auth_per]);
     //      return $query->result();
     // }

     // public function get_by_idper($id_per)
     // {
     //      $query = $this->db->get_where('vw_tipe', ['id_perusahaan' => $id_per]);
     //      return $query->result();
     // }
}
