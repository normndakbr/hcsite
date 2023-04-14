<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_model extends CI_Model
{

     public function count_all_user()
     {
          return $this->db->count_all_results('vw_user');
     }
}
