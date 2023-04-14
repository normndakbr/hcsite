<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grade extends My_Controller
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
          $this->load->view('dashboard/grade/grade');
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
          $this->load->view('dashboard/grade/grade_add');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/all');
     }

     public function ajax_list()
     {
          $list = $this->grd->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $grd) {
               $no++;
               $row = array();
               $row['no'] = $no;
               $row['auth_grade'] = $grd->auth_grade;
               $row['kd_grade'] = $grd->kd_grade;
               $row['grade'] = $grd->grade;
               $row['level'] = $grd->level;
               $row['ket_grade'] = $grd->ket_grade;

               if ($grd->stat_grade == "T") {
                    $row['stat_grade'] = "<span class='btn btn-success btn-sm '> AKTIF </span>";
               } else {
                    $row['stat_grade'] = "<div class='btn btn-danger btn-sm'> NONAKTIF </div>";
               }

               $row['kode_perusahaan'] = $grd->kode_perusahaan;
               $row['tgl_buat'] = date('d-M-Y', strtotime($grd->tgl_buat));
               $row['tgl_edit'] = date('d-M-Y', strtotime($grd->tgl_edit));
               $row['proses'] = '<button id="' . $grd->auth_grade . '" class="btn btn-primary btn-sm font-weight-bold dtlgrade" title="Detail" value="' . $grd->grade . '"> <i class="fas fa-asterisk"></i> </button> 
                    <button id="' . $grd->auth_grade . '" class="btn btn-warning btn-sm font-weight-bold edttgrade" title="Edit" value="' . $grd->grade . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $grd->auth_grade . '" class="btn btn-danger btn-sm font-weight-bold hpsgrade" title="Hapus" value="' . $grd->grade . '"> <i class="fas fa-trash-alt"></i> </button>';
               $data[] = $row;
          }

          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->grd->count_all(),
               "recordsFiltered" => $this->grd->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }

     public function input_grade()
     {

          $this->form_validation->set_rules("prs", "prs", "required|trim", [
               'required' => 'Perusahaan wajib dipilih'
          ]);
          $this->form_validation->set_rules("level", "level", "required|trim", [
               'required' => 'Level wajib dipilih'
          ]);
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("grade", "grade", "required|trim|max_length[4]|integer", [
               'required' => 'Grade wajib diisi',
               'max_length' => 'Grade maksimal 100 karakter',
               'integer' => 'Grade harus disi dengan angka'
          ]);
          $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
               'max_length' => 'Keterangan maksimal 1000 karakter'
          ]");
          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 202,
                    'prs' => form_error("prs"),
                    'level' => form_error("level"),
                    'kode' => form_error("kode"),
                    'grade' => form_error("grade"),
                    'ket' => form_error("ket")
               ];

               echo json_encode($error);
               return;
          } else {
               $auth_perusahaan = htmlspecialchars($this->input->post("prs", true));
               $auth_level = htmlspecialchars($this->input->post("level", true));
               $kd_grade = htmlspecialchars($this->input->post("kode", true));
               $grade = htmlspecialchars($this->input->post("grade", true));
               $ket_grade = htmlspecialchars($this->input->post("ket"));
               $id_perusahaan = $this->prs->get_by_auth($auth_perusahaan);
               if ($id_perusahaan == 0) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               $query = $this->lvl->get_level_id($auth_level);
               if (!empty($query)) {
                    foreach ($query as $list) {
                         $id_level = $list->id_level;
                         if ($id_level == 0) {
                              echo json_encode(array("statusCode" => 201, "pesan" => "Level tidak ditemukan"));
                              return;
                         }
                    }
               }

               $data = [
                    'kd_grade' => $kd_grade,
                    'grade' => $grade,
                    'id_level' => $id_level,
                    'ket_grade' => $ket_grade,
                    'stat_grade' => 'T',
                    'tgl_buat' => date('Y-m-d H:i:s'),
                    'tgl_edit' => date('Y-m-d H:i:s'),
                    'id_user' => $this->session->userdata('id_user'),
                    'id_perusahaan' => $id_perusahaan
               ];

               $grade = $this->grd->input_grade($data);
               if ($grade) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Grade berhasil disimpan"));
               } else {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Grade gagal disimpan"));
               }
          }
     }

     public function hapus_grade()
     {
          $auth_grade = htmlspecialchars(trim($this->input->post('authgrade')));
          $query = $this->grd->hapus_grade($auth_grade);
          if ($query == 200) {
               echo json_encode(array("statusCode" => 200, "pesan" => "Grade berhasil dihapus"));
               return;
          } else if ($query == 201) {
               echo json_encode(array("statusCode" => 201, "pesan" => "Grade gagal dihapus"));
               return;
          } else {
               echo json_encode(array("statusCode" => 202, "pesan" => "Grade tidak ditemukan"));
               return;
          }
     }

     public function detail_grade()
     {
          $auth_grade = htmlspecialchars(trim($this->input->post("authgrade")));
          $query = $this->grd->get_grade_id($auth_grade);
          if (!empty($query)) {
               foreach ($query as $list) {
                    if ($list->stat_grade == "T") {
                         $status = "AKTIF";
                    } else {
                         $status = "NONAKTIF";
                    }

                    if ($list->level == null) {
                         $auth_level = '';
                    } else {
                         $auth_level = $list->auth_level;
                    }

                    $data = [
                         'statusCode' => 200,
                         'nama_perusahaan' => $list->nama_perusahaan,
                         'kode' => $list->kd_grade,
                         'grade' => $list->grade,
                         'level' =>  $list->level,
                         'auth_level' =>  $auth_level,
                         'ket' => $list->ket_grade,
                         'status' => $status,
                         'tgl_buat' => date('d-M-Y H:i:s', strtotime($list->tgl_buat)),
                         'pembuat' => $list->nama_user
                    ];

                    $this->session->set_userdata('id_grade', $list->id_grade);
                    $this->session->set_userdata('id_perusahaan_level', $list->id_perusahaan);
               }
               echo json_encode($data);
          } else {
               echo json_encode(array('statusCode' => 201, "pesan" => "Grade tidak ditemukan"));
          }
     }

     public function edit_grade()
     {
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("grade", "grade", "required|trim|max_length[10]|integer", [
               'required' => 'Grade wajib diisi',
               'max_length' => 'Grade maksimal 10 karakter',
               'integer' => 'Grade diisi angka'
          ]);
          $this->form_validation->set_rules("level", "level", "required|trim", [
               'required' => 'Level wajib dipilih'
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
                    'level' => form_error("level"),
                    'grade' => form_error("grade"),
                    'status' => form_error("status"),
                    'ket' => form_error("ket")
               ];

               echo json_encode($error);
               die;
          } else {
               if ($this->session->userdata('id_perusahaan_level') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               if ($this->session->userdata('id_grade') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Grade tidak ditemukan"));
                    return;
               }

               $kd_grade = htmlspecialchars($this->input->post("kode", true));
               $grade = htmlspecialchars($this->input->post("grade", true));
               $level = htmlspecialchars($this->input->post("level", true));
               $ket_grade = htmlspecialchars($this->input->post("ket", true));
               if (htmlspecialchars($this->input->post("status", true)) == "AKTIF") {
                    $status = "T";
               } else {
                    $status = "F";
               }

               if ($grade <= 0) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Grade tidak boleh 0 atau kurang dari 0"));
                    return;
               }

               $grad = $this->grd->edit_grade($kd_grade, $grade, $level, $ket_grade, $status);
               if ($grad == 200) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Grade berhasil diupdate"));
               } else if ($grad == 201) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Grade gagal diupdate"));
               } else if ($grad == 203) {
                    echo json_encode(array("statusCode" => 203, "pesan" => "Kode sudah digunakan"));
               } else if ($grad == 204) {
                    echo json_encode(array("statusCode" => 205, "pesan" => "Grade dengan level yang dipilih sudah digunakan"));
               }
          }
     }

     public function get_by_idper()
     {
          if ($this->session->userdata('id_perusahaan') != "") {
               $id_per = $this->session->userdata('id_perusahaan');
               $output = "<option value=''>-- Pilih Level --</option>";
               $query = $this->lvl->get_by_idper($id_per);
               foreach ($query as $list) {
                    $output = $output . " <option value='" . $list->auth_level . "'>" . $list->level . "</option>";
               }

               echo json_encode(array("statusCode" => 200, "level" => $output, "pesan" => "Sukses"));
          } else {
               $output = "<option value=''>-- Level tidak ditemukan --</option>";
               echo json_encode(array("statusCode" => 200, "level" => $output, "pesan", "Level gagal ditampilkan"));
          }
     }
}
