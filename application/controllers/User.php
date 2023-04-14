<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends My_Controller
{
     public function ajax_list()
     {
          $list = $this->usr->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $usr) {
               $no++;
               $row = array();
               $row['no'] = $no;
               $row['auth_user'] = $usr->auth_user;
               $row['Nama'] = $usr->Nama;
               $row['Email'] = $usr->Email;
               $row['menu'] = $usr->menu;
               if ($usr->stat_aktif == "Y") {
                    $row['stat_aktif'] = '<span class="btn btn-success btn-sm" style="cursor:text;">AKTIF</span>';
               } else {
                    $row['stat_aktif'] = '<span class="btn btn-danger btn-sm" style="cursor:text;">NONAKTIF</span>';
               }

               $row['tgl_aktif'] = date('d-M-Y', strtotime($usr->tgl_aktif));
               $row['tgl_exp'] = date('d-M-Y', strtotime($usr->tgl_exp));
               $row['tgl_buat'] = date('d-M-Y', strtotime($usr->tgl_buat));
               $row['proses'] = '<button id="' . $usr->auth_user . '" class="btn btn-warning btn-sm font-weight-bold" title="Edit" value="' . $usr->Email . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $usr->auth_user . '" class="btn btn-danger btn-sm font-weight-bold hapusUser" title="Hapus" value="' . $usr->Email . '"> <i class="fas fa-trash-alt"></i> </button>';
               $data[] = $row;
          }

          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->usr->count_all(),
               "recordsFiltered" => $this->usr->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }

     public function buat_user()
     {
          $namauser = htmlentities(trim($this->input->post('namauser')));
          $email = trim($this->input->post('email'));
          $menuakses = trim($this->input->post('menuakses'));
          $tglaktif = trim($this->input->post('tglaktif'));
          $tglexp = trim($this->input->post('tglexp'));
          $sandi = md5(trim($this->input->post('sandi')));

          $data = [
               'Nama' => $namauser,
               'Email' => $email,
               'Sesi' => $sandi,
               'stat_aktif' => 'Y',
               'id_menu' => $menuakses,
               'tgl_aktif' => $tglaktif,
               'tgl_exp' => $tglexp,
               'tgl_buat' => date('Y-m-d H:i:s'),
               'tgl_edited' => date('Y-m-d H:i:s')
          ];

          $query = $this->usr->buat_user($data);
          if ($query) {
               echo json_encode(array("statusCode" => 200, "pesan" => "User berhasil dibuat", "jml_user" => $this->jml_user()));
          } else {
               echo json_encode(array("statusCode" => 201, "pesan" => "User gagal dibuat", "jml_user" => 0));
          }
     }

     function jml_user()
     {
          $query = $this->usr->jml_user();
          return $query;
     }

     public function fetch_user()
     {
          $this->load->view("dashboard/tableUser");
     }

     public function ganti_sandi()
     {
          $auth_user = $this->session->userdata('auth_user');
          $sesi = md5($this->input->post('sesi'));
          $query = $this->usr->ganti_sandi($auth_user, $sesi);

          if ($query) {
               echo json_encode(array("statusCode" => 200, "pesan" => "Sandi berhasil diganti, ingat baik-baik sandi baru anda"));
          } else {
               echo json_encode(array("statusCode" => 201, "pesan" => "Sandi gagal diganti"));
          }
     }

     public function cek_sandi()
     {
          $auth_user = $this->session->userdata('auth_user');
          $sesi = md5($this->input->post('sesi'));
          $query = $this->usr->cek_sandi($auth_user, $sesi);

          if ($query) {
               echo json_encode(array("statusCode" => 200, "pesan" => "Sandi ditemukan"));
          } else {
               echo json_encode(array("statusCode" => 201, "pesan" => "Sandi lama anda salah"));
          }
     }

     public function hapus_user()
     {
          $authuser = $this->input->post("authuser");
          $query = $this->usr->hapus_user($authuser);

          if ($query == 200) {
               echo json_encode(array("statusCode" => 200, "pesan" => "User berhasil dihapus"));
          } else if ($query == 201) {
               echo json_encode(array("statusCode" => 201, "pesan" => "User gagal dihapus"));
          } else {
               echo json_encode(array("statusCode" => 202, "pesan" => "User tidak ditemukan"));
          }
     }
}
