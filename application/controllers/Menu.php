<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends My_Controller
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
          $this->load->view('dashboard/menu/menu');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/menu');
     }

     public function new()
     {
          $data['nama'] = $this->session->userdata("nama");
          $data['email'] = $this->session->userdata("email");
          $data['menu'] = $this->session->userdata("id_menu");
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/menuemen/menu_add');
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/menuemen');
     }

     public function ajax_list()
     {
          $list = $this->mnu->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $mnu) {
               $no++;
               $row = array();
               $row['no'] = $no;
               $row['auth_menu'] = $mnu->auth_menu;
               $row['kd_menu'] = $mnu->kd_menu;
               $row['menu'] = $mnu->menu;
               $row['ket_menu'] = $mnu->ket_menu;

               if ($mnu->stat_menu == "T") {
                    $row['stat_menu'] = "<span class='btn btn-success btn-sm '> AKTIF </span>";
               } else {
                    $row['stat_menu'] = "<div class='btn btn-danger btn-sm'> NONAKTIF </div>";
               }

               $row['kode_perusahaan'] = $mnu->kode_perusahaan;
               $row['tgl_buat'] = date('d-M-Y', strtotime($mnu->tgl_buat));
               $row['tgl_edit'] = date('d-M-Y', strtotime($mnu->tgl_edit));
               $row['proses'] = '<button id="' . $mnu->auth_menu . '" class="btn btn-primary btn-sm font-weight-bold dtlmenu" title="Detail" value="' . $mnu->menu . '"> <i class="fas fa-asterisk"></i> </button> 
                    <button id="' . $mnu->auth_menu . '" class="btn btn-warning btn-sm font-weight-bold edttmenu" title="Edit" value="' . $mnu->menu . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $mnu->auth_menu . '" class="btn btn-danger btn-sm font-weight-bold hpsmenu" title="Hapus" value="' . $mnu->menu . '"> <i class="fas fa-trash-alt"></i> </button>';
               $data[] = $row;
          }

          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->mnu->count_all(),
               "recordsFiltered" => $this->mnu->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }

     public function input_menu()
     {

          $this->form_validation->set_rules("prs", "prs", "required|trim", [
               'required' => 'Perusahaan wajib dipilih'
          ]);
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("menu", "menu", "required|trim|max_length[100]", [
               'required' => 'menuemen wajib diisi',
               'max_length' => 'menuemen maksimal 100 karakter'
          ]);
          $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
               'max_length' => 'Keterangan maksimal 1000 karakter'
          ]");

          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 202,
                    'prs' => form_error("prs"),
                    'kode' => form_error("kode"),
                    'menu' => form_error("menu")
               ];

               echo json_encode($error);
               return;
          } else {
               $auth_perusahaan = htmlspecialchars($this->input->post("prs", true));
               $kd_menu = htmlspecialchars($this->input->post("kode", true));
               $menu = htmlspecialchars($this->input->post("menu", true));
               $ket_menu = htmlspecialchars($this->input->post("ket"));
               $id_perusahaan = $this->prs->get_by_auth($auth_perusahaan);

               if ($id_perusahaan == 0) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               $cekkode = $this->mnu->cek_kode($id_perusahaan, $kd_menu);
               if ($cekkode) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Kode sudah digunakan"));
                    return;
               }

               $cekmenu = $this->mnu->cek_menu($id_perusahaan, $menu);
               if ($cekmenu) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "menuemen sudah digunakan"));
                    return;
               }

               $data = [
                    'kd_menu' => $kd_menu,
                    'menu' => $menu,
                    'ket_menu' => $ket_menu,
                    'stat_menu' => 'T',
                    'tgl_buat' => date('Y-m-d H:i:s'),
                    'tgl_edit' => date('Y-m-d H:i:s'),
                    'id_user' => $this->session->userdata('id_user'),
                    'id_perusahaan' => $id_perusahaan
               ];

               $menu = $this->mnu->input_menu($data);
               if ($menu) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "menuemen berhasil disimpan"));
               } else {
                    echo json_encode(array("statusCode" => 201, "pesan" => "menuemen gagal disimpan"));
               }
          }
     }

     public function hapus_menu()
     {
          $auth_menu = htmlspecialchars(trim($this->input->post('authmenu')));
          $query = $this->mnu->hapus_menu($auth_menu);
          if ($query == 200) {
               echo json_encode(array("statusCode" => 200, "pesan" => "menuemen berhasil dihapus"));
               return;
          } else if ($query == 201) {
               echo json_encode(array("statusCode" => 201, "pesan" => "menuemen gagal dihapus"));
               return;
          } else {
               echo json_encode(array("statusCode" => 202, "pesan" => "menuemen tidak ditemukan"));
               return;
          }
     }

     public function detail_menu()
     {
          $auth_menu = htmlspecialchars(trim($this->input->post("authmenu")));
          $query = $this->mnu->get_menu_id($auth_menu);
          if (!empty($query)) {
               foreach ($query as $list) {
                    if ($list->stat_menu == "T") {
                         $status = "AKTIF";
                    } else {
                         $status = "NONAKTIF";
                    }

                    $data = [
                         'statusCode' => 200,
                         'nama_perusahaan' => $list->nama_perusahaan,
                         'kode' => $list->kd_menu,
                         'menu' => $list->menu,
                         'ket' => $list->ket_menu,
                         'status' => $status,
                         'tgl_buat' => date('d-M-Y H:i:s', strtotime($list->tgl_buat)),
                         'pembuat' => $list->nama_user
                    ];

                    $this->session->set_userdata('id_menu', $list->id_menu);
                    $this->session->set_userdata('id_perusahaan', $list->id_perusahaan);
               }
               echo json_encode($data);
          } else {
               echo json_encode(array('statusCode' => 201, "pesan" => "menuemen tidak ditemukan"));
          }
     }

     public function edit_menu()
     {
          $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
               'required' => 'Kode wajib diisi',
               'max_length' => 'Kode maksimal 8 karakter'
          ]);
          $this->form_validation->set_rules("menu", "menu", "required|trim|max_length[100]", [
               'required' => 'menuemen wajib diisi',
               'max_length' => 'menuemen maksimal 100 karakter'
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
                    'menu' => form_error("menu"),
                    'status' => form_error("status")
               ];

               echo json_encode($error);
               die;
          } else {
               if ($this->session->userdata('id_perusahaan') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Perusahaan tidak terdaftar"));
                    return;
               }

               if ($this->session->userdata('id_menu') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "menuemen tidak ditemukan"));
                    return;
               }

               $kd_menu = htmlspecialchars($this->input->post("kode", true));
               $menu = htmlspecialchars($this->input->post("menu", true));
               $ket_menu = htmlspecialchars($this->input->post("ket", true));
               if (htmlspecialchars($this->input->post("status", true)) == "AKTIF") {
                    $status = "T";
               } else {
                    $status = "F";
               }

               $menu = $this->mnu->edit_menu($kd_menu, $menu, $ket_menu, $status);
               if ($menu == 200) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "menuemen berhasil diupdate"));
               } else if ($menu == 201) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "menuemen gagal diupdate"));
               } else if ($menu == 203) {
                    echo json_encode(array("statusCode" => 203, "pesan" => "Kode sudah digunakan"));
               } else if ($menu == 204) {
                    echo json_encode(array("statusCode" => 205, "pesan" => "menuemen sudah digunakan"));
               }
          }
     }

     public function get_all()
     {
          $query = $this->mnu->get_all();
          $output = "<option value=''>-- Pilih Menu --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_menu . "'>" . $list->NamaMenu . "</option>";
               }
               echo json_encode(array("mnu" => $output));
          } else {
               $output = "<option value=''>-- Menu Tidak Ditemukan --</option>";
               echo json_encode(array("mnu" => $output));
          }
     }

     public function get_by_authper()
     {
          $auth_per = $this->input->post('auth_per');

          $query = $this->mnu->get_by_authper($auth_per);
          $output = "<option value=''>-- Pilih menuemen --</option>";
          if (!empty($query)) {
               foreach ($query as $list) {
                    $output = $output . "<option value='" . $list->auth_menu . "'>" . $list->menu . "</option>";
               }
               echo json_encode(array("statusCode" => 200, "mnu" => $output));
          } else {
               $output = "<option value=''>-- menuemen Tidak Ditemukan --</option>";
               echo json_encode(array("statusCode" => 201, "mnu" => $output));
          }
     }
}
