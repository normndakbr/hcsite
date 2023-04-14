<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{

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
