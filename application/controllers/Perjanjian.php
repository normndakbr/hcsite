<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perjanjian extends My_Controller
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
          $this->load->view('dashboard/stat_perjanjian/stat_perjanjian');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/all');
     }

     public function new()
     {
          $data['nama'] = $this->session->userdata("nama");
          $data['email'] = $this->session->userdata("email");
          $data['menu'] = $this->session->userdata("id_menu");
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/stat_perjanjian/stat_perjanjian_add');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/all');
     }

     public function ajax_list()
     {
          $list = $this->janji->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $janji) {
               $no++;
               $row = array();
               $row['no'] = $no;
               $row['auth_stat_perjanjian'] = $janji->auth_stat_perjanjian;
               $row['kd_stat_perjanjian'] = $janji->kd_stat_perjanjian;
               $row['stat_perjanjian'] = $janji->stat_perjanjian;
               $row['ket_stat_perjanjian'] = $janji->ket_stat_perjanjian;

               if ($janji->stat_stat_perjanjian == "T") {
                    $row['stat_stat_perjanjian'] = "<span class='btn btn-success btn-sm '> AKTIF </span>";
               } else {
                    $row['stat_stat_perjanjian'] = "<div class='btn btn-danger btn-sm'> NONAKTIF </div>";
               }

               $row['kode_perusahaan'] = $janji->kode_perusahaan;
               $row['tgl_buat'] = date('d-M-Y', strtotime($janji->tgl_buat));
               $row['tgl_edit'] = date('d-M-Y', strtotime($janji->tgl_edit));
               $row['proses'] = '<button id="' . $janji->auth_stat_perjanjian . '" class="btn btn-primary btn-sm font-weight-bold dtlstat_perjanjian" title="Detail" value="' . $janji->stat_perjanjian . '"> <i class="fas fa-asterisk"></i> </button> 
                    <button id="' . $janji->auth_stat_perjanjian . '" class="btn btn-warning btn-sm font-weight-bold edttstat_perjanjian" title="Edit" value="' . $janji->stat_perjanjian . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $janji->auth_stat_perjanjian . '" class="btn btn-danger btn-sm font-weight-bold hpsstat_perjanjian" title="Hapus" value="' . $janji->stat_perjanjian . '"> <i class="fas fa-trash-alt"></i> </button>';
               $data[] = $row;
          }

          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->janji->count_all(),
               "recordsFiltered" => $this->janji->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }

     public function input_stat_perjanjian()
     {

          $this->form_validation->set_rules("prs", "prs", "required|trim", [
               'required' => 'Perusahaan wajib dipilih'
          ]);
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("stat_perjanjian", "stat_perjanjian", "required|trim|max_length[100]", [
               'required' => 'stat_perjanjian wajib diisi',
               'max_length' => 'stat_perjanjian maksimal 100 karakter'
          ]);
          $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
               'max_length' => 'Keterangan maksimal 1000 karakter'
          ]");

          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 202,
                    'prs' => form_error("prs"),
                    'kode' => form_error("kode"),
                    'stat_perjanjian' => form_error("stat_perjanjian"),
                    'ket' => form_error("ket")
               ];

               echo json_encode($error);
               return;
          } else {
               $auth_perusahaan = htmlspecialchars($this->input->post("prs", true));
               $kd_stat_perjanjian = htmlspecialchars($this->input->post("kode", true));
               $stat_perjanjian = htmlspecialchars($this->input->post("stat_perjanjian", true));
               $ket_stat_perjanjian = htmlspecialchars($this->input->post("ket", true));
               $id_perusahaan = $this->prs->get_by_auth($auth_perusahaan);

               if ($id_perusahaan == 0) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               $cekkode = $this->janji->cek_kode($id_perusahaan, $kd_stat_perjanjian);
               if ($cekkode) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Kode sudah digunakan"));
                    return;
               }

               $cekstat_perjanjian = $this->janji->cek_stat_perjanjian($id_perusahaan, $stat_perjanjian);
               if ($cekstat_perjanjian) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Status perjanjian sudah digunakan"));
                    return;
               }

               $data = [
                    'kd_stat_perjanjian' => $kd_stat_perjanjian,
                    'stat_perjanjian' => $stat_perjanjian,
                    'ket_stat_perjanjian' => $ket_stat_perjanjian,
                    'stat_stat_perjanjian' => 'T',
                    'tgl_buat' => date('Y-m-d H:i:s'),
                    'tgl_edit' => date('Y-m-d H:i:s'),
                    'id_user' => $this->session->userdata('id_user'),
                    'id_perusahaan' => $id_perusahaan
               ];

               $stat_perjanjian = $this->janji->input_stat_perjanjian($data);
               if ($stat_perjanjian) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Status perjanjian berhasil disimpan"));
               } else {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Status perjanjian gagal disimpan"));
               }
          }
     }

     public function hapus_stat_perjanjian()
     {
          $auth_stat_perjanjian = htmlspecialchars(trim($this->input->post('auth_stat_perjanjian')));
          $query = $this->janji->hapus_stat_perjanjian($auth_stat_perjanjian);
          if ($query == 200) {
               echo json_encode(array("statusCode" => 200, "pesan" => "Status perjanjian berhasil dihapus"));
               return;
          } else if ($query == 201) {
               echo json_encode(array("statusCode" => 201, "pesan" => "Status perjanjian gagal dihapus"));
               return;
          } else {
               echo json_encode(array("statusCode" => 202, "pesan" => "Status perjanjian tidak ditemukan"));
               return;
          }
     }

     public function detail_stat_perjanjian()
     {
          $auth_stat_perjanjian = htmlspecialchars(trim($this->input->post("auth_stat_perjanjian")));
          $query = $this->janji->get_stat_perjanjian_id($auth_stat_perjanjian);
          if (!empty($query)) {
               foreach ($query as $list) {
                    if ($list->stat_stat_perjanjian == "T") {
                         $status = "AKTIF";
                    } else {
                         $status = "NONAKTIF";
                    }

                    $data = [
                         'statusCode' => 200,
                         'nama_perusahaan' => $list->nama_perusahaan,
                         'kode' => $list->kd_stat_perjanjian,
                         'stat_perjanjian' => $list->stat_perjanjian,
                         'ket' => $list->ket_stat_perjanjian,
                         'status' => $status,
                         'tgl_buat' => date('d-M-Y H:i:s', strtotime($list->tgl_buat)),
                         'pembuat' => $list->nama_user
                    ];

                    $this->session->set_userdata('id_stat_perjanjian', $list->id_stat_perjanjian);
                    $this->session->set_userdata('id_perusahaan', $list->id_perusahaan);
               }
               echo json_encode($data);
          } else {
               echo json_encode(array('statusCode' => 201, "pesan" => "Status perjanjian tidak ditemukan"));
          }
     }

     public function edit_stat_perjanjian()
     {
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("stat_perjanjian", "stat_perjanjian", "required|trim|max_length[100]", [
               'required' => 'stat_perjanjian wajib diisi',
               'max_length' => 'stat_perjanjian maksimal 100 karakter'
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
                    'stat_perjanjian' => form_error("stat_perjanjian"),
                    'status' => form_error("status")
               ];

               echo json_encode($error);
               die;
          } else {
               if ($this->session->userdata('id_perusahaan') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               if ($this->session->userdata('id_stat_perjanjian') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Status perjanjian tidak ditemukan"));
                    return;
               }

               $kd_stat_perjanjian = htmlspecialchars($this->input->post("kode", true));
               $stat_perjanjian = htmlspecialchars($this->input->post("stat_perjanjian", true));
               $ket_stat_perjanjian = htmlspecialchars($this->input->post("ket", true));
               if (htmlspecialchars($this->input->post("status", true)) == "AKTIF") {
                    $status = "T";
               } else {
                    $status = "F";
               }

               $stat_perjanjian = $this->janji->edit_stat_perjanjian($kd_stat_perjanjian, $stat_perjanjian, $ket_stat_perjanjian, $status);
               if ($stat_perjanjian == 200) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Status perjanjian berhasil diupdate"));
               } else if ($stat_perjanjian == 201) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Status perjanjian gagal diupdate"));
               } else if ($stat_perjanjian == 203) {
                    echo json_encode(array("statusCode" => 203, "pesan" => "Kode sudah digunakan"));
               } else if ($stat_perjanjian == 204) {
                    echo json_encode(array("statusCode" => 205, "pesan" => "Status perjanjian sudah digunakan"));
               }
          }
     }

     public function get_all()
     {
          $query = $this->janji->get_all();
          $output = "<option value=''>-- Pilih stat_perjanjian --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_stat_perjanjian . "'>" . $list->stat_perjanjian . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "janji" => $output));
          } else {
               $output = "<option value=''>-- Status perjanjian tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "janji" => $output));
          }
     }

     public function get_by_authper()
     {
          $auth_per = $this->input->post('auth_per');

          $query = $this->janji->get_by_authper($auth_per);
          $output = "<option value=''>-- Pilih stat_perjanjian --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_stat_perjanjian . "'>" . $list->stat_perjanjian . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "janji" => $output));
          } else {
               $output = "<option value=''>-- Status perjanjian tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "janji" => $output));
          }
     }

     public function get_by_idper()
     {
          if ($this->session->userdata('id_perusahaan_stat_perjanjian') != "") {
               $id_per = $this->session->userdata('id_perusahaan_stat_perjanjian');
               $output = "<option value=''>-- Pilih stat_perjanjian --</option>";
               $query = $this->janji->get_by_idper($id_per);
               foreach ($query as $list) {
                    $output = $output . " <option value='" . $list->auth_stat_perjanjian . "'>" . $list->stat_perjanjian . "</option>";
               }

               echo json_encode(array("statusCode" => 200, "stat_perjanjian" => $output, "pesan" => "Sukses"));
          } else {
               $output = "<option value=''>-- stat_perjanjianemen tidak ditemukan --</option>";
               echo json_encode(array("statusCode" => 200, "stat_perjanjian" => $output, "pesan", "Status perjanjian gagal ditampilkan"));
          }
     }
}
