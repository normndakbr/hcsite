<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekursif_Menu extends My_Controller
{

     function __construct()
     {
          parent::__construct();
          $this->load->database();
     }

     function index()
     {
          echo $this->menu(0, $h = "");
     }

     private function menu($parent = 0, $hasil)
     {
          static $space;
          $w = $this->db->query("SELECT * from vw_m_perusahaan where id_parent='" . $parent . "'");
          if (($w->num_rows()) > 0) {
               $space .= "&roarr;";
               $hasil .= "<br>";
          }
          foreach ($w->result() as $h) {
               if ($h->id_parent == 0) {
                    $hasil .= $h->nama_perusahaan;
                    $hasil = $this->menu($h->id_m_perusahaan, $hasil);
               } else {
                    $hasil .= $space . $h->nama_perusahaan;
                    $hasil = $this->menu($h->id_m_perusahaan, $hasil);
               }

               $space = substr($space, 0, strlen($space) - 2);
          }
          if (($w->num_rows) == 0) {
               $hasil .= "<br>";
          }
          return $hasil;
     }
}
