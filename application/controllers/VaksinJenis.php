<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VaksinJenis extends My_Controller
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
          $query = $this->drh->get_all();
          $output = "<option value=''>-- PILIH JENIS VAKSIN --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->id . "'>" . $list->name . "</option>";
               }

               $data = [
                    "statusCode" => 200,
                    "prov" => $output
               ];

               echo json_encode($data);
          } else {
               $output = "<option value=''>-- JENIS VAKSIN TIDAK DITEMUKAN --</option>";
               $data = [
                    "statusCode" => 201,
                    "prov" => $output
               ];

               echo json_encode($data);
          }
     }
}
