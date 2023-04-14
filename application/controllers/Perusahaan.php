<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends My_Controller
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
          $this->load->view('dashboard/perusahaan/perusahaan');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/perusahaan');
     }

     public function new()
     {
          $data['nama'] = $this->session->userdata("nama");
          $data['email'] = $this->session->userdata("email");
          $data['menu'] = $this->session->userdata("id_menu");
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/perusahaan/perusahaan_add');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/all');
     }

     public function ajax_list()
     {
          $list = $this->prs->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $prs) {
               $no++;
               $row = array();
               $row['no'] = $no;
               $row['auth_perusahaan'] = $prs->auth_perusahaan;
               $row['kd_perusahaan'] = $prs->kd_perusahaan;
               $row['perusahaan'] = $prs->perusahaan;
               $row['alamat_perusahaan'] = $prs->alamat_perusahaan;
               $row['ket_perusahaan'] = $prs->ket_perusahaan;

               if ($prs->stat_perusahaan == "T") {
                    $row['stat_perusahaan'] = "<span class='btn btn-success btn-sm '> AKTIF </span>";
               } else {
                    $row['stat_perusahaan'] = "<div class='btn btn-danger btn-sm'> NONAKTIF </div>";
               }

               $row['kode_perusahaan'] = $prs->kode_perusahaan;
               $row['tgl_buat'] = date('d-M-Y', strtotime($prs->tgl_buat));
               $row['tgl_edit'] = date('d-M-Y', strtotime($prs->tgl_edit));
               $row['proses'] = '<button id="' . $prs->auth_perusahaan . '" class="btn btn-primary btn-sm font-weight-bold dtlperusahaan" title="Detail" value="' . $prs->perusahaan . '"> <i class="fas fa-asterisk"></i> </button> 
                    <button id="' . $prs->auth_perusahaan . '" class="btn btn-warning btn-sm font-weight-bold edttperusahaan" title="Edit" value="' . $prs->perusahaan . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $prs->auth_perusahaan . '" class="btn btn-danger btn-sm font-weight-bold hpsperusahaan" title="Hapus" value="' . $prs->perusahaan . '"> <i class="fas fa-trash-alt"></i> </button>';
               $data[] = $row;
          }

          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->prs->count_all(),
               "recordsFiltered" => $this->prs->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }

     public function input_perusahaan()
     {

          $this->form_validation->set_rules("prs", "prs", "required|trim", [
               'required' => 'Perusahaan wajib dipilih'
          ]);
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("perusahaan", "perusahaan", "required|trim|max_length[100]", [
               'required' => 'Perusahaan wajib diisi',
               'max_length' => 'Perusahaan maksimal 100 karakter'
          ]);
          $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
               'max_length' => 'Keterangan maksimal 1000 karakter'
          ]");

          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 202,
                    'prs' => form_error("prs"),
                    'kode' => form_error("kode"),
                    'perusahaan' => form_error("perusahaan")
               ];

               echo json_encode($error);
               return;
          } else {
               $auth_perusahaan = htmlspecialchars($this->input->post("prs", true));
               $kd_perusahaan = htmlspecialchars($this->input->post("kode", true));
               $perusahaan = htmlspecialchars($this->input->post("perusahaan", true));
               $ket_perusahaan = htmlspecialchars($this->input->post("ket"));
               $id_perusahaan = $this->prs->get_by_auth($auth_perusahaan);

               if ($id_perusahaan == 0) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               $cekkode = $this->prs->cek_kode($id_perusahaan, $kd_perusahaan);
               if ($cekkode) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Kode sudah digunakan"));
                    return;
               }

               $cekperusahaan = $this->prs->cek_perusahaan($id_perusahaan, $perusahaan);
               if ($cekperusahaan) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan sudah digunakan"));
                    return;
               }

               $data = [
                    'kd_perusahaan' => $kd_perusahaan,
                    'perusahaan' => $perusahaan,
                    'ket_perusahaan' => $ket_perusahaan,
                    'stat_perusahaan' => 'T',
                    'tgl_buat' => date('Y-m-d H:i:s'),
                    'tgl_edit' => date('Y-m-d H:i:s'),
                    'id_user' => $this->session->userdata('id_user'),
                    'id_perusahaan' => $id_perusahaan
               ];

               $perusahaan = $this->prs->input_perusahaan($data);
               if ($perusahaan) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Perusahaan berhasil disimpan"));
               } else {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan gagal disimpan"));
               }
          }
     }

     public function hapus_perusahaan()
     {
          $auth_perusahaan = htmlspecialchars(trim($this->input->post('auth_perusahaan')));
          $query = $this->prs->hapus_perusahaan($auth_perusahaan);
          if ($query == 200) {
               echo json_encode(array("statusCode" => 200, "pesan" => "Perusahaan berhasil dihapus"));
               return;
          } else if ($query == 201) {
               echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan gagal dihapus"));
               return;
          } else {
               echo json_encode(array("statusCode" => 202, "pesan" => "P{erusahaan tidak ditemukan"));
               return;
          }
     }

     public function detail_perusahaan()
     {
          $auth_perusahaan = htmlspecialchars(trim($this->input->post("auth_perusahaan")));
          $query = $this->prs->get_perusahaan_id($auth_perusahaan);
          if (!empty($query)) {
               foreach ($query as $list) {
                    if ($list->stat_perusahaan == "T") {
                         $status = "AKTIF";
                    } else {
                         $status = "NONAKTIF";
                    }

                    $data = [
                         'statusCode' => 200,
                         'nama_perusahaan' => $list->nama_perusahaan,
                         'kode' => $list->kd_perusahaan,
                         'perusahaan' => $list->perusahaan,
                         'alamat_perusahaan' => $list->alamat_perusahaan,
                         'ket' => $list->ket_perusahaan,
                         'status' => $status,
                         'tgl_buat' => date('d-M-Y H:i:s', strtotime($list->tgl_buat)),
                         'pembuat' => $list->nama_user
                    ];

                    $this->session->set_userdata('id_parent_prs', $list->id_parent);
                    $this->session->set_userdata('id_perusahaan_prs', $list->id_perusahaan);
               }
               echo json_encode($data);
          } else {
               echo json_encode(array('statusCode' => 201, "pesan" => "Perusahaan tidak ditemukan"));
          }
     }

     public function edit_perusahaan()
     {
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("perusahaan", "perusahaan", "required|trim|max_length[100]", [
               'required' => 'Perusahaan wajib diisi',
               'max_length' => 'Perusahaan maksimal 100 karakter'
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
                    'perusahaan' => form_error("perusahaan"),
                    'status' => form_error("status")
               ];

               echo json_encode($error);
               die;
          } else {
               if ($this->session->userdata('id_perusahaan') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               if ($this->session->userdata('id_perusahaan') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak ditemukan"));
                    return;
               }

               $kd_perusahaan = htmlspecialchars($this->input->post("kode", true));
               $perusahaan = htmlspecialchars($this->input->post("perusahaan", true));
               $ket_perusahaan = htmlspecialchars($this->input->post("ket", true));
               if (htmlspecialchars($this->input->post("status", true)) == "AKTIF") {
                    $status = "T";
               } else {
                    $status = "F";
               }

               $perusahaan = $this->prs->edit_perusahaan($kd_perusahaan, $perusahaan, $ket_perusahaan, $status);
               if ($perusahaan == 200) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Perusahaan berhasil diupdate"));
               } else if ($perusahaan == 201) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan gagal diupdate"));
               } else if ($perusahaan == 203) {
                    echo json_encode(array("statusCode" => 203, "pesan" => "Kode sudah digunakan"));
               } else if ($perusahaan == 204) {
                    echo json_encode(array("statusCode" => 205, "pesan" => "Perusahaan sudah digunakan"));
               }
          }
     }

     public function get_by_authper()
     {
          $auth_per = $this->input->post('auth_per');

          $query = $this->prs->get_by_authper($auth_per);
          $output = "<option value=''>-- Pilih perusahaan --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_perusahaan . "'>" . $list->perusahaan . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "prs" => $output));
          } else {
               $output = "<option value=''>-- Perusahaan Tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "prs" => $output));
          }
     }

     public function get_by_idper()
     {
          if ($this->session->userdata('id_perusahaan_prs') != "") {
               $id_per = $this->session->userdata('id_perusahaan_prs');
               $output = "<option value=''>-- Pilih perusahaan --</option>";
               $query = $this->prs->get_by_idper($id_per);
               foreach ($query as $list) {
                    $output = $output . " <option value='" . $list->auth_perusahaan . "'>" . $list->perusahaan . "</option>";
               }

               echo json_encode(array("statusCode" => 200, "perusahaan" => $output, "pesan" => "Sukses"));
          } else {
               $output = "<option value=''>-- Perusahaan tidak ditemukan --</option>";
               echo json_encode(array("statusCode" => 200, "perusahaan" => $output, "pesan", "perusahaan gagal ditampilkan"));
          }
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
