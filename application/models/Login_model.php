<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

     public function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->library('form_validation');
     }

     public function get_login($email, $sandi)
     {
          $this->db->select("*");
          $this->db->from("vw_user");
          $this->db->where("email_user", $email);
          $query = $this->db->get();
          $user = $query->row();

          if (isset($user)) {
               if ($user->stat_user == "N") {
                    return json_encode(array("statusCode" => 201, "pesan" => "Email tidak aktif"));
               } else {
                    $tglnow = date("Y-m-d");
                    if ($tglnow > $user->tgl_exp) {
                         return json_encode(array("statusCode" => 201, "pesan" => "Email telah expired"));
                    } else {
                         if ($sandi == $user->sesi) {
                              return json_encode(array(
                                   "statusCode" => 200,
                                   "id_user" => $user->id_user,
                                   "email_user" => $user->email_user,
                                   "nama_user" => $user->nama_user,
                                   "auth_user" => md5($user->id_user . date('Y-m-d')),
                                   "id_menu" => $user->id_menu
                              ));
                         } else {
                              return json_encode(array("statusCode" => 201, "pesan" => "Sandi anda salah"));
                         }
                    }
               }
          } else {
               return json_encode(array("statusCode" => 201, "pesan" => "Email tidak terdaftar"));
          }
     }
}
