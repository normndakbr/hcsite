<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktur_model extends CI_Model
{

     var $table = 'vw_m_perusahaan';
     var $column_order = array(null, 'kode_perusahaan', 'nama_perusahaan', 'jenis_perusahaan', 'stat_perusahaan', null); //set column field database for datatable orderable
     var $column_search = array('kode_perusahaan', 'nama_perusahaan', 'jenis_perusahaan', 'stat_perusahaan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
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
          $this->db->where('id_m_perusahaan', $id);
          $query = $this->db->get();

          return $query->row();
     }

     public function count_all_m_perusahaan()
     {
          return $this->db->count_all_results('vw_m_perusahaan');
     }

     public function count_all_user()
     {
          return $this->db->count_all_results('vw_user');
     }

     public function get_all()
     {
          return $this->db->get('vw_m_perusahaan')->result();
     }

     public function get_by_authper($auth_per)
     {
          $query = $this->db->get_where('vw_m_perusahaan', ['auth_perusahaan' => $auth_per]);
          return $query->result();
     }

     public function get_by_idjenis($idjenis)
     {
          $query = $this->db->query("SELECT DISTINCT id_perusahaan, nama_perusahaan, auth_m_perusahaan " .
               " FROM vw_m_perusahaan WHERE id_jenis_perusahaan=" . $idjenis);
          return $query->result();
     }

     function getMaster($parent, $hasil)
     {

          if ($parent !== 0) {
               $n = $this->db->query("SELECT * from vw_m_prs where id_m_perusahaan=" . $parent);
               foreach ($n->result() as $h) {
                    if ($h->id_parent == 0) {
                         $nm_per = "";
                    } else {
                         $nm_per = " | " . $h->kode_perusahaan;
                    }
               }
          } else {
               $nm_per = "";
          }

          $w = $this->db->query("SELECT * from vw_m_prs where id_m_perusahaan=" . $parent);

          foreach ($w->result() as $h) {
               $hasil .= "<option value='" . $h->auth_m_perusahaan . "'>" . $h->nama_m_perusahaan . $nm_per . "</option>";
          }

          return $hasil;
     }

     function getMenu($parent, $hasil)
     {

          static $space;

          $w = $this->db->query("SELECT * from vw_m_prs where id_parent='" . $parent . "'");
          if (($w->num_rows()) > 0) {
               $space .= "&roarr;";
          }

          foreach ($w->result() as $h) {

               if ($h->id_parent == 0) {
                    $hasil .= "<option value='" . $h->auth_m_perusahaan . "'>" . $h->nama_m_perusahaan . "</option>";
               } else {
                    $n = $this->db->query("SELECT * from vw_m_prs where id_m_perusahaan=" . $h->id_parent);
                    if (!empty($n->result())) {
                         foreach ($n->result() as $n) {
                              $nm_per = " | " . $n->kode_perusahaan;
                         }
                    } else {
                         $nm_per = "";
                    }

                    $hasil .= "<option value='" . $h->auth_m_perusahaan . "'>" . $space . " " . $h->nama_m_perusahaan .  $nm_per . "</option>";
               }

               $hasil = $this->getMenu($h->id_m_perusahaan, $hasil);
          }
          if (($w->num_rows()) > 0) {
               $space = substr($space, 0, strlen($space) - 7);
          }

          return $hasil;
     }

     function getMasterPrs($parent, $hasil)
     {

          if ($parent !== 0) {
               $n = $this->db->query("SELECT * from vw_m_prs where id_m_perusahaan=" . $parent);
               foreach ($n->result() as $h) {
                    if ($h->id_parent == 0) {
                         $nm_per = "";
                    } else {
                         $nm_per = " | " . $h->kode_perusahaan;
                    }
               }
          } else {
               $nm_per = "";
          }

          $w = $this->db->query("SELECT * from vw_m_prs where id_m_perusahaan=" . $parent);

          foreach ($w->result() as $h) {
               $hasil .= "<option value='" . $h->auth_perusahaan . "'>" . $h->nama_m_perusahaan . $nm_per . "</option>";
          }

          return $hasil;
     }

     function getMenuPrs($parent, $hasil)
     {

          static $space;

          $w = $this->db->query("SELECT * from vw_m_prs where id_parent='" . $parent . "'");
          if (($w->num_rows()) > 0) {
               $space .= "&roarr;";
          }

          foreach ($w->result() as $h) {

               if ($h->id_parent == 0) {
                    $hasil .= "<option value='" . $h->auth_perusahaan . "'>" . $h->nama_m_perusahaan . "</option>";
               } else {
                    $n = $this->db->query("SELECT * from vw_m_prs where id_m_perusahaan=" . $h->id_parent);
                    if (!empty($n->result())) {
                         foreach ($n->result() as $n) {
                              $nm_per = " | " . $n->kode_perusahaan;
                         }
                    } else {
                         $nm_per = "";
                    }

                    $hasil .= "<option value='" . $h->auth_perusahaan . "'>" . $space . " " . $h->nama_m_perusahaan .  $nm_per . "</option>";
               }

               $hasil = $this->getMenuPrs($h->id_m_perusahaan, $hasil);
          }
          if (($w->num_rows()) > 0) {
               $space = substr($space, 0, strlen($space) - 7);
          }

          return $hasil;
     }

     public function cek_str_per($id_parent, $id_per)
     {
          $query = $this->db->query("SELECT * FROM vw_m_perusahaan WHERE id_parent = " . $id_parent .
               " AND id_perusahaan = " . $id_per);
          return $query->result();
     }

     public function input_struktur($data)
     {
          $this->db->insert('tb_m_perusahaan', $data);
          if ($this->db->affected_rows() > 0) {
               return true;
          } else {
               return false;
          }
     }
}
