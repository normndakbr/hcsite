<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gantisandi extends My_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->is_logout();
     }

     public function index()
     {
          $data['nama'] = $this->session->userdata("nama");
          $data['email'] = $this->session->userdata("email");
          $data['menu'] = $this->session->userdata("id_menu");
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/ganti_snd/ganti_sandi');
          $this->load->view('dashboard/modal/gantisandi');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/gantisandi');
          $this->session->set_flashdata('msg', '');
     }

     public function ganti()
     {
          $this->form_validation->set_rules("lamaSandi", "lamaSandi", "required|trim", [
               'required' => 'Sandi lama wajib diisi'
          ]);
          $this->form_validation->set_rules("baruSandi", "baruSandi", "required|trim|min_length[6]", [
               'required' => 'Sandi baru wajib diisi',
               'min_length' => 'Sandi baru minimal 6 karakter'
          ]);
          $this->form_validation->set_rules("ulangSandi", "ulangSandi", "required|trim|min_length[6]|matches[baruSandi]", [
               'required' => 'Konfirmasi ulang sandi baru wajib diisi',
               'matches' => 'Konfirmasi ulang sandi tidak sama'
          ]);

          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 204,
                    'lamaSandi' => form_error("lamaSandi"),
                    'baruSandi' => form_error("baruSandi"),
                    'ulangSandi' => form_error("ulangSandi")
               ];

               $data['nama'] = $this->session->userdata("nama");
               $data['email'] = $this->session->userdata("email");
               $data['menu'] = $this->session->userdata("id_menu");
               $this->load->view('dashboard/template/header', $data);
               $this->load->view('dashboard/ganti_snd/ganti_sandi');
               $this->load->view('dashboard/modal/gantisandi');
               $this->load->view('dashboard/template/footer', $data);
               $this->load->view('dashboard/code/gantisandi');
          } else {
               $sandi_lama = htmlspecialchars($this->input->post("lamaSandi", true));
               $sandi_baru = htmlspecialchars($this->input->post("baruSandi", true));

               $query = $this->lgn->ganti_sandi($sandi_lama, $sandi_baru);
               if ($query == 200) {
                    $this->session->set_flashdata('msg', '<div class="err_psn_sandi alert alert-info animate__animated animate__bounce"> Sandi berhasil diganti </div>');
               } else if ($query == 202) {
                    $this->session->set_flashdata('msg', '<div class="err_psn_sandi alert alert-danger animate__animated animate__bounce"> Sandi gagal diganti </div>');
               } else if ($query == 201) {
                    $this->session->set_flashdata('msg', '<div class="err_psn_sandi alert alert-danger animate__animated animate__bounce"> Sandi lama salah </div>');
               } else if ($query == 203) {
                    $this->session->set_flashdata('msg', '<div class="err_psn_sandi alert alert-danger animate__animated animate__bounce"> User tidak ditemukan </div>');
               }

               $data['nama'] = $this->session->userdata("nama");
               $data['email'] = $this->session->userdata("email");
               $data['menu'] = $this->session->userdata("id_menu");
               $this->load->view('dashboard/template/header', $data);
               $this->load->view('dashboard/ganti_snd/ganti_sandi');
               $this->load->view('dashboard/modal/gantisandi');
               $this->load->view('dashboard/template/footer', $data);
               $this->load->view('dashboard/code/gantisandi');
          }
     }

     public function get_all()
     {
          $query = $this->lvl->get_all();
          $output = "<option value=''>-- Pilih level --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_level . "'>" . $list->level . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "lvl" => $output));
          } else {
               $output = "<option value=''>-- level Tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "lvl" => $output));
          }
     }

     public function get_by_authper()
     {
          $auth_per = $this->input->post('auth_per');

          $query = $this->lvl->get_by_authper($auth_per);
          $output = "<option value=''>-- Pilih Level --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_level . "'>" . $list->level . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "lvl" => $output));
          } else {
               $output = "<option value=''>-- Level Tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "lvl" => $output));
          }
     }

     public function get_by_idper()
     {
          if ($this->session->userdata('id_perusahaan_level') != "") {
               $id_per = $this->session->userdata('id_perusahaan_level');
               $output = "<option value=''>-- Pilih Level --</option>";
               $query = $this->lvl->get_by_idper($id_per);
               foreach ($query as $list) {
                    $output = $output . " <option value='" . $list->auth_level . "'>" . $list->level . "</option>";
               }

               echo json_encode(array("statusCode" => 200, "level" => $output, "pesan" => "Sukses"));
          } else {
               $output = "<option value=''>-- levelemen tidak ditemukan --</option>";
               echo json_encode(array("statusCode" => 200, "level" => $output, "pesan", "Level gagal ditampilkan"));
          }
     }
}
