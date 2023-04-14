<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends My_Controller
{
     public function index()
     {
     }

     public function get_all()
     {
          $query = $this->prs->get_all();
          $output = "<option value=''>-- Pilih Perusahaan --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_perusahaan . "'>" . $list->nama_perusahaan . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "prs" => $output));
          } else {
               $output = "<option value=''>-- Perusahaan Tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "prs" => $output));
          }
     }
}
