<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran_model extends CI_Model
{

     var $table = 'vw_langgar';
     var $column_order = array(null, 'no_nik', 'nama_lengkap', 'depart', 'langgar_jenis', 'tgl_akhir_langgar', 'stat_langgar', 'ket_langgar', 'kode_perusahaan', null); //set column field database for datatable orderable
     var $column_search = array('no_nik', 'nama_lengkap', 'depart', 'langgar_jenis', 'tgl_akhir_langgar', 'stat_langgar', 'ket_langgar', 'kode_perusahaan',); //set column field database for datatable searchable just firstname , lastname , address are searchable
     var $order = array('kode_perusahaan' => 'asc'); // default order 

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
          $this->db->where('id_langgar', $id);
          $query = $this->db->get();

          return $query->row();
     }

     public function input_langgar($data)
     {
          $this->db->insert('tb_langgar', $data);
          if ($this->db->affected_rows() > 0) {
               return true;
          } else {
               return false;
          }
     }

     public function cek_kode($id_perusahaan, $kd_langgar)
     {
          $query = $this->db->get_where('tb_langgar', ['kd_langgar' => $kd_langgar, 'id_perusahaan' => $id_perusahaan]);
          if (!empty($query->result())) {
               return true;
          } else {
               return false;
          }
     }

     public function cek_langgar($id_perusahaan, $langgar)
     {
          $query = $this->db->get_where('tb_langgar', ['langgar' => $langgar, 'id_perusahaan' => $id_perusahaan]);
          if (!empty($query->result())) {
               return true;
          } else {
               return false;
          }
     }

     public function hapus_langgar($auth_langgar)
     {
          $cek_id = $this->db->get_where('vw_langgar', ['auth_langgar' => $auth_langgar]);
          if (!empty($cek_id->result())) {
               foreach ($cek_id->result() as $list) {
                    $id_langgar = $list->id_langgar;
               }

               $this->db->delete('tb_langgar', ['id_langgar' => $id_langgar]);
               if ($this->db->affected_rows() > 0) {
                    return 200;
               } else {
                    return 201;
               }
          } else {
               return 202;
          }
     }

     public function get_langgar_id($auth_langgar)
     {
          $query = $this->db->get_where('vw_langgar', ['auth_langgar' => $auth_langgar]);
          return $query->result();
     }

     public function edit_langgar($authlgr, $namafile)
     {
          $id_langgar = $this->get_id_lgr_auth($authlgr);
          $this->db->set('url_langgar', $namafile);
          $this->db->set('tgl_edit', date('Y-m-d H:i:s'));
          $this->db->where('id_langgar', $id_langgar);
          $this->db->update('tb_langgar');
          if ($this->db->affected_rows() > 0) {
               return true;
          } else {
               return false;
          }
     }

     public function update_langgar($dt_lgr, $authlgr)
     {
          $id_langgar = $this->get_id_lgr_auth($authlgr);
          $this->db->update('tb_langgar', $dt_lgr, array('id_langgar' => $id_langgar));
          if ($this->db->affected_rows() > 0) {
               return true;
          } else {
               return false;
          }
     }

     public function get_all()
     {
          return $this->db->get('vw_langgar')->result();
     }

     public function get_by_idper($id_per)
     {
          $query = $this->db->get_where('vw_langgar', ['id_perusahaan' => $id_per]);
          return $query->result();
     }

     public function get_by_authper($auth_per)
     {
          $query = $this->db->get_where('vw_langgar', ['auth_perusahaan' => $auth_per]);
          return $query->result();
     }

     public function get_data_punish()
     {
          $this->db->select('kode_langgar_jenis');
          $this->db->select('langgar_jenis');
          $this->db->select('auth_langgar_jenis');
          $this->db->from('vw_langgar_jenis');
          $query = $this->db->get();
          return $query->result();
     }

     public function data_langgar($auth_langgar)
     {
          $query = $this->db->get_where('vw_langgar', ['auth_langgar' => $auth_langgar]);
          return $query->result();
     }

     public function data_punish($authlanggarjenis)
     {
          $query = $this->db->get_where('vw_langgar_jenis', ['auth_langgar_jenis' => $authlanggarjenis]);
          return $query->result();
     }

     public function get_id_by_auth($authlanggarjenis)
     {
          $query = $this->db->get_where('vw_langgar_jenis', ['auth_langgar_jenis' => $authlanggarjenis]);
          if (!empty($query->result())) {
               foreach ($query->result() as $list) {
                    $id_jenis_langgar = $list->id_langgar_jenis;
               }

               return $id_jenis_langgar;
          } else {
               return;
          }
     }

     public function get_id_lgr_auth($auth_langgar)
     {
          $query = $this->db->get_where('vw_langgar', ['auth_langgar' => $auth_langgar]);
          if (!empty($query->result())) {
               foreach ($query->result() as $list) {
                    $id_langgar = $list->id_langgar;
               }

               return $id_langgar;
          } else {
               return;
          }
     }
}
