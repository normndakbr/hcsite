<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends My_Controller
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
          $this->load->view('dashboard/karyawan/karyawan');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/karyawan');
     }

     public function new()
     {
          $data['nama'] = $this->session->userdata("nama");
          $data['email'] = $this->session->userdata("email");
          $data['menu'] = $this->session->userdata("id_menu");
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/karyawan/karyawan_add');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/karyawan');
     }

     public function ajax_list()
     {
          $list = $this->kry->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $kry) {
               $no++;
               $row = array();
               $row['no'] = $no;
               // $row['auth_karyawan'] = $kry->auth_karyawan;
               // $row['no_acr'] = $kry->no_acr;
               $row['nama_lengkap'] = $kry->nama_lengkap;
               // $row['depart'] = $kry->depart;
               // $row['section'] = $kry->section;
               // $row['posisi'] = $kry->posisi;
               // // $row['kode_perusahaan'] = $kry->kode_perusahaan;
               // $row['tgl_buat'] = date('d-M-Y', strtotime($kry->tgl_buat));
               // $row['tgl_edit'] = date('d-M-Y', strtotime($kry->tgl_edit));
               // $row['proses'] = '<button id="' . $kry->auth_karyawan . '" class="btn btn-primary btn-sm font-weight-bold dtldepart" title="Detail" value="' . $kry->nama_lengkap . '"> <i class="fas fa-asterisk"></i> </button> 
               //      <button id="' . $kry->auth_karyawan . '" class="btn btn-warning btn-sm font-weight-bold edttdepart" title="Edit" value="' . $kry->nama_lengkap . '"> <i class="fas fa-edit"></i> </button> 
               //      <button id="' . $kry->auth_karyawan . '" class="btn btn-danger btn-sm font-weight-bold hpsdepart" title="Hapus" value="' . $kry->nama_lengkap . '"> <i class="fas fa-trash-alt"></i> </button>';
               $data[] = $row;
          }

          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->kry->count_all(),
               "recordsFiltered" => $this->kry->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }

     // public function input_depart()
     // {

     //      $this->form_validation->set_rules("prs", "prs", "required|trim", [
     //           'required' => 'Perusahaan wajib dipilih'
     //      ]);
     //      $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
     //           'required' => 'Kode wajib diisi',
     //           'max_length' => 'Kode maksimal 8 karakter'
     //      ]);
     //      $this->form_validation->set_rules("depart", "depart", "required|trim|max_length[100]", [
     //           'required' => 'karyawan wajib diisi',
     //           'max_length' => 'karyawan maksimal 100 karakter'
     //      ]);
     //      $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
     //           'max_length' => 'Keterangan maksimal 1000 karakter'
     //      ]");

     //      if ($this->form_validation->run() == false) {
     //           $error = [
     //                'statusCode' => 202,
     //                'prs' => form_error("prs"),
     //                'kode' => form_error("kode"),
     //                'depart' => form_error("depart")
     //           ];

     //           echo json_encode($error);
     //           return;
     //      } else {
     //           $auth_perusahaan = htmlspecialchars($this->input->post("prs", true));
     //           $kd_depart = htmlspecialchars($this->input->post("kode", true));
     //           $depart = htmlspecialchars($this->input->post("depart", true));
     //           $ket_depart = htmlspecialchars($this->input->post("ket"));
     //           $id_perusahaan = $this->prs->get_by_auth($auth_perusahaan);

     //           if ($id_perusahaan == 0) {
     //                echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
     //                return;
     //           }

     //           $cekkode = $this->dprt->cek_kode($id_perusahaan, $kd_depart);
     //           if ($cekkode) {
     //                echo json_encode(array("statusCode" => 201, "pesan" => "Kode sudah digunakan"));
     //                return;
     //           }

     //           $cekdepart = $this->dprt->cek_depart($id_perusahaan, $depart);
     //           if ($cekdepart) {
     //                echo json_encode(array("statusCode" => 201, "pesan" => "karyawan sudah digunakan"));
     //                return;
     //           }

     //           $data = [
     //                'kd_depart' => $kd_depart,
     //                'depart' => $depart,
     //                'ket_depart' => $ket_depart,
     //                'stat_depart' => 'T',
     //                'tgl_buat' => date('Y-m-d H:i:s'),
     //                'tgl_edit' => date('Y-m-d H:i:s'),
     //                'id_user' => $this->session->userdata('id_user'),
     //                'id_perusahaan' => $id_perusahaan
     //           ];

     //           $depart = $this->dprt->input_depart($data);
     //           if ($depart) {
     //                echo json_encode(array("statusCode" => 200, "pesan" => "karyawan berhasil disimpan"));
     //           } else {
     //                echo json_encode(array("statusCode" => 201, "pesan" => "karyawan gagal disimpan"));
     //           }
     //      }
     // }

     // public function hapus_depart()
     // {
     //      $auth_depart = htmlspecialchars(trim($this->input->post('authdepart')));
     //      $query = $this->dprt->hapus_depart($auth_depart);
     //      if ($query == 200) {
     //           echo json_encode(array("statusCode" => 200, "pesan" => "karyawan berhasil dihapus"));
     //           return;
     //      } else if ($query == 201) {
     //           echo json_encode(array("statusCode" => 201, "pesan" => "karyawan gagal dihapus"));
     //           return;
     //      } else {
     //           echo json_encode(array("statusCode" => 202, "pesan" => "karyawan tidak ditemukan"));
     //           return;
     //      }
     // }

     public function detail_depart()
     {
          $auth_depart = htmlspecialchars(trim($this->input->post("authdepart")));
          $query = $this->dprt->get_depart_id($auth_depart);
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
               echo json_encode(array('statusCode' => 201, "pesan" => "karyawan tidak ditemukan"));
          }
     }

     // public function edit_depart()
     // {
     //      $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
     //           'required' => 'Kode wajib diisi',
     //           'max_length' => 'Kode maksimal 8 karakter'
     //      ]);
     //      $this->form_validation->set_rules("depart", "depart", "required|trim|max_length[100]", [
     //           'required' => 'karyawan wajib diisi',
     //           'max_length' => 'karyawan maksimal 100 karakter'
     //      ]);
     //      $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
     //           'max_length' => 'Keterangan maksimal 1000 karakter'
     //      ]");
     //      $this->form_validation->set_rules("status", "status", "required|trim", [
     //           'required' => 'Status wajib dipilih'
     //      ]);

     //      if ($this->form_validation->run() == false) {
     //           $error = [
     //                'statusCode' => 202,
     //                'kode' => form_error("kode"),
     //                'depart' => form_error("depart"),
     //                'status' => form_error("status")
     //           ];

     //           echo json_encode($error);
     //           die;
     //      } else {
     //           if ($this->session->userdata('id_perusahaan') == "") {
     //                echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
     //                return;
     //           }

     //           if ($this->session->userdata('id_depart') == "") {
     //                echo json_encode(array("statusCode" => 201, "pesan" => "karyawan tidak ditemukan"));
     //                return;
     //           }

     //           $kd_depart = htmlspecialchars($this->input->post("kode", true));
     //           $depart = htmlspecialchars($this->input->post("depart", true));
     //           $ket_depart = htmlspecialchars($this->input->post("ket", true));
     //           if (htmlspecialchars($this->input->post("status", true)) == "AKTIF") {
     //                $status = "T";
     //           } else {
     //                $status = "F";
     //           }

     //           $depart = $this->dprt->edit_depart($kd_depart, $depart, $ket_depart, $status);
     //           if ($depart == 200) {
     //                echo json_encode(array("statusCode" => 200, "pesan" => "karyawan berhasil diupdate"));
     //           } else if ($depart == 201) {
     //                echo json_encode(array("statusCode" => 201, "pesan" => "karyawan gagal diupdate"));
     //           } else if ($depart == 203) {
     //                echo json_encode(array("statusCode" => 203, "pesan" => "Kode sudah digunakan"));
     //           } else if ($depart == 204) {
     //                echo json_encode(array("statusCode" => 205, "pesan" => "karyawan sudah digunakan"));
     //           }
     //      }
     // }

     public function get_all()
     {
          $query = $this->dprt->get_all();
          $output = "<option value=''>-- Pilih karyawan --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_depart . "'>" . $list->depart . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "dprt" => $output));
          } else {
               $output = "<option value=''>-- karyawan Tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "dprt" => $output));
          }
     }

     // public function get_by_authper()
     // {
     //      $auth_per = $this->input->post('auth_per');

     //      $query = $this->dprt->get_by_authper($auth_per);
     //      $output = "<option value=''>-- Pilih karyawan --</option>";
     //      if (!empty($query)) {
     //           foreach ($query as $list) {
     //                $output = $output . "<option value='" . $list->auth_depart . "'>" . $list->depart . "</option>";
     //           }
     //           echo json_encode(array("statusCode" => 200, "dprt" => $output));
     //      } else {
     //           $output = "<option value=''>-- karyawan Tidak Ditemukan --</option>";
     //           echo json_encode(array("statusCode" => 201, "dprt" => $output));
     //      }
     // }
}
