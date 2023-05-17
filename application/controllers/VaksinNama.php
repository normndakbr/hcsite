<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VaksinNama extends My_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->is_logout();
     }

     public function index()
     {
     }

     public function get_all()
     {
          $query = $this->vnma->get_all();
          $output = "<option value=''>-- PILIH NAMA VAKSIN --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->id_vaksin_nama . "'>" . $list->nama_vaksin . "</option>";
               }

               $data = [
                    "statusCode" => 200,
                    "data" => $output
               ];

               echo json_encode($data);
          } else {
               $output = "<option value=''>-- DATA VAKSIN TIDAK DITEMUKAN --</option>";
               $data = [
                    "statusCode" => 201,
                    "data" => $output
               ];

               echo json_encode($data);
          }
     }
}
