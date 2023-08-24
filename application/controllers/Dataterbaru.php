<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataterbaru extends My_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->is_logout();
     }

     public function index()
     {
          $data['nama'] = $this->session->userdata("nama_main");
          $data['email'] = $this->session->userdata("email_main");
          $data['menu'] = $this->session->userdata("id_menu_main");
          $data['user_baru'] = $this->dtbaru->get_user_terbaru();
          $data['prs_baru'] = $this->dtbaru->get_prs_terbaru();
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/data_terbaru', $data);
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/databaru');
     }

     public function ajax_list()
     {
          $list = $this->dtbaru->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $dtbaru) {
               $no++;
               $row = array();
               $row['no'] = $no;
               $row['no_ktp'] = $dtbaru->no_ktp;
               $row['no_nik'] = $dtbaru->no_nik;
               $row['nama_lengkap'] = $dtbaru->nama_lengkap;
               $row['depart'] = $dtbaru->depart;
               $row['nama_user'] = $dtbaru->nama_user;
               $kode_prs = $this->prs->get_kode_per_by_parent($dtbaru->id_parent);

               if (!empty($kode_prs)) {
                    $row['kode_perusahaan'] = $dtbaru->kode_perusahaan . " | " . $kode_prs;
               } else {
                    $row['kode_perusahaan'] = $dtbaru->kode_perusahaan . " | - ";
               }

               $row['tgl_buat'] = date('d-M-Y H:i:s', strtotime($dtbaru->tgl_buat));
               $data[] = $row;
          }

          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->dtbaru->count_all(),
               "recordsFiltered" => $this->dtbaru->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }

     public function input_depart()
     {

          $this->form_validation->set_rules("prs", "prs", "required|trim", [
               'required' => 'Perusahaan wajib dipilih'
          ]);
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("depart", "depart", "required|trim|max_length[100]", [
               'required' => 'Departemen wajib diisi',
               'max_length' => 'Departemen maksimal 100 karakter'
          ]);
          $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
               'max_length' => 'Keterangan maksimal 1000 karakter'
          ]");

          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 202,
                    'prs' => form_error("prs"),
                    'kode' => form_error("kode"),
                    'depart' => form_error("depart")
               ];

               echo json_encode($error);
               return;
          } else {
               $auth_perusahaan = htmlspecialchars($this->input->post("prs", true));
               $kd_depart = htmlspecialchars($this->input->post("kode", true));
               $depart = htmlspecialchars($this->input->post("depart", true));
               $ket_depart = htmlspecialchars($this->input->post("ket"));
               $id_perusahaan = $this->prs->get_by_auth($auth_perusahaan);

               if ($id_perusahaan == 0) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               $cekkode = $this->dtbaru->cek_kode($id_perusahaan, $kd_depart);
               if ($cekkode) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Kode sudah digunakan"));
                    return;
               }

               $cekdepart = $this->dtbaru->cek_depart($id_perusahaan, $depart);
               if ($cekdepart) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Departemen sudah digunakan"));
                    return;
               }

               $data = [
                    'kd_depart' => $kd_depart,
                    'depart' => $depart,
                    'ket_depart' => $ket_depart,
                    'stat_depart' => 'T',
                    'tgl_buat' => date('Y-m-d H:i:s'),
                    'tgl_edit' => date('Y-m-d H:i:s'),
                    'id_user' => $this->session->userdata('id_user'),
                    'id_perusahaan' => $id_perusahaan
               ];

               $depart = $this->dtbaru->input_depart($data);
               if ($depart) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Departemen berhasil disimpan"));
               } else {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Departemen gagal disimpan"));
               }
          }
     }

     public function hapus_depart()
     {
          $auth_depart = htmlspecialchars(trim($this->input->post('authdepart')));
          $query = $this->dtbaru->hapus_depart($auth_depart);
          if ($query == 200) {
               echo json_encode(array("statusCode" => 200, "pesan" => "Departemen berhasil dihapus"));
               return;
          } else if ($query == 201) {
               echo json_encode(array("statusCode" => 201, "pesan" => "Departemen gagal dihapus"));
               return;
          } else {
               echo json_encode(array("statusCode" => 202, "pesan" => "Departemen tidak ditemukan"));
               return;
          }
     }

     public function detail_depart()
     {
          $auth_depart = htmlspecialchars(trim($this->input->post("authdepart")));
          $query = $this->dtbaru->get_depart_id($auth_depart);
          if (!empty($query)) {
               foreach ($query as $list) {
                    if ($list->stat_depart == "T") {
                         $status = "AKTIF";
                    } else {
                         $status = "NONAKTIF";
                    }

                    $data = [
                         'statusCode' => 200,
                         'nama_perusahaan' => $list->nama_perusahaan,
                         'kode' => $list->kd_depart,
                         'depart' => $list->depart,
                         'ket' => $list->ket_depart,
                         'status' => $status,
                         'tgl_buat' => date('d-M-Y H:i:s', strtotime($list->tgl_buat)),
                         'pembuat' => $list->nama_user
                    ];

                    $this->session->set_userdata('id_depart', $list->id_depart);
                    $this->session->set_userdata('id_perusahaan', $list->id_perusahaan);
               }
               echo json_encode($data);
          } else {
               echo json_encode(array('statusCode' => 201, "pesan" => "Departemen tidak ditemukan"));
          }
     }

     public function edit_depart()
     {
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("depart", "depart", "required|trim|max_length[100]", [
               'required' => 'Departemen wajib diisi',
               'max_length' => 'Departemen maksimal 100 karakter'
          ]);
          $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
               'max_length' => 'Keterangan maksimal 1000 karakter'
          ]");
          $this->form_validation->set_rules("status", "status", "required|trim", [
               'required' => 'Status wajib dipilih'
          ]);

          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 202,
                    'kode' => form_error("kode"),
                    'depart' => form_error("depart"),
                    'status' => form_error("status")
               ];

               echo json_encode($error);
               die;
          } else {
               if ($this->session->userdata('id_perusahaan') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               if ($this->session->userdata('id_depart') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Departemen tidak ditemukan"));
                    return;
               }

               $kd_depart = htmlspecialchars($this->input->post("kode", true));
               $depart = htmlspecialchars($this->input->post("depart", true));
               $ket_depart = htmlspecialchars($this->input->post("ket", true));
               if (htmlspecialchars($this->input->post("status", true)) == "AKTIF") {
                    $status = "T";
               } else {
                    $status = "F";
               }

               $depart = $this->dtbaru->edit_depart($kd_depart, $depart, $ket_depart, $status);
               if ($depart == 200) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Departemen berhasil diupdate"));
               } else if ($depart == 201) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Departemen gagal diupdate"));
               } else if ($depart == 203) {
                    echo json_encode(array("statusCode" => 203, "pesan" => "Kode sudah digunakan"));
               } else if ($depart == 204) {
                    echo json_encode(array("statusCode" => 205, "pesan" => "Departemen sudah digunakan"));
               }
          }
     }

     public function get_all()
     {
          $query = $this->dtbaru->get_all();
          $output = "<option value=''>-- Pilih Departemen --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_depart . "'>" . $list->depart . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "dtbaru" => $output));
          } else {
               $output = "<option value=''>-- Departemen Tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "dtbaru" => $output));
          }
     }

     public function get_by_authper()
     {
          $auth_per = $this->input->post('auth_per');

          $query = $this->dtbaru->get_by_authper($auth_per);
          $output = "<option value=''>-- Pilih Departemen --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_depart . "'>" . $list->depart . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "dtbaru" => $output));
          } else {
               $output = "<option value=''>-- Departemen Tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "dtbaru" => $output));
          }
     }
}
