<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends My_Controller
{
     public function index()
     {
          $data['nama'] = $this->session->userdata("nama_main");
          $data['email'] = $this->session->userdata("email_main");
          $data['menu'] = $this->session->userdata("id_menu_main");
          $data['data_menu'] = $this->mnu->get_all();
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/user/user');
          $this->load->view('dashboard/modal/user');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/user');
     }

     public function new()
     {
          if ($this->session->has_userdata('id_m_perusahaan_main')) {
               $idmper = $this->session->userdata('id_m_perusahaan_main');
               if ($idmper != "") {
                    $data['permst'] = $this->str->getMaster($idmper, "");
                    $data['perstr'] = $this->str->getMenu($idmper, "");
               } else {
                    $data['permst'] = "";
                    $data['perstr'] = "";
               }
          } else {
               $idmper = "";
               $data['permst'] = "";
               $data['perstr'] = "";
          }
          $data['nama'] = $this->session->userdata("nama_main");
          $data['email'] = $this->session->userdata("email_main");
          $data['menu'] = $this->session->userdata("id_menu_main");
          $data['data_menu'] = $this->mnu->get_all();
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/user/user_add');
          $this->load->view('dashboard/modal/user');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/user');
     }

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
               $row['nama_user'] = $usr->nama_user;
               $row['email_user'] = $usr->email_user;
               $row['NamaMenu'] = $usr->NamaMenu;
               if ($usr->stat_user == "T") {
                    $row['stat_user'] = '<span class="btn btn-success btn-sm" style="cursor:text;">AKTIF</span>';
               } else {
                    $row['stat_user'] = '<span class="btn btn-danger btn-sm" style="cursor:text;">NONAKTIF</span>';
               }
               $row['kode_perusahaan'] = $usr->kode_perusahaan;
               $row['tgl_aktif'] = date('d-M-Y', strtotime($usr->tgl_aktif));
               $row['tgl_exp'] = date('d-M-Y', strtotime($usr->tgl_exp));
               $row['tgl_buat'] = date('d-M-Y', strtotime($usr->tgl_buat));
               $row['proses'] = '<button id="' . $usr->auth_user . '" class="btn btn-primary btn-sm font-weight-bold dtlUser" title="Detail" value="' . $usr->email_user . '"> <i class="fas fa-asterisk"></i> </button>  
                <button id="' . $usr->auth_user . '" class="btn btn-warning btn-sm font-weight-bold edtUser" title="Edit" value="' . $usr->email_user . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $usr->auth_user . '" class="btn btn-danger btn-sm font-weight-bold hapusUser" title="Hapus" value="' . $usr->email_user . '"> <i class="fas fa-trash-alt"></i> </button>';
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

     public function buatuser()
     {

          $this->form_validation->set_rules(
               'namaUser',
               'namaUser',
               'required|trim|max_length[100]',
               [
                    'required' => 'Nama user wajib diisi',
                    'max_length' => 'Nama user maksimal 100 karakter'
               ]
          );
          $this->form_validation->set_rules(
               'emailUser',
               'emailUser',
               'required|trim|max_length[100]|valid_email',
               [
                    'required' => 'Email user wajib diisi',
                    'max_length' => 'Email user maksimal 100 karakter',
                    'valid_email' => 'Format email salah'
               ]
          );
          $this->form_validation->set_rules(
               'sandiUser',
               'sandiUser',
               'required|trim|min_length[6]',
               [
                    'required' => 'Sandi wajib diisi',
                    'min_length' => 'Sandi minimal 6 karakter'
               ]
          );
          $this->form_validation->set_rules(
               'ulangSandi',
               'ulangSandi',
               'required|trim|min_length[6]',
               [
                    'required' => 'Konfirmasi ulang sandi wajib diisi',
                    'min_length' => 'Konfirmasi ulang sandi minimal 6 karakter'
               ]
          );
          $this->form_validation->set_rules(
               'tglAktif',
               'tglAktif',
               'required|trim',
               [
                    'required' => 'Tanggal aktif wajib diisi'
               ]
          );
          $this->form_validation->set_rules(
               'tglExpired',
               'tglExpired',
               'required|trim',
               [
                    'required' => 'Tanggal expired wajib diisi'
               ]
          );
          $this->form_validation->set_rules(
               'aksesUser',
               'aksesUser',
               'required|trim',
               [
                    'required' => 'Akses user wajib dipilih'
               ]
          );
          $this->form_validation->set_rules(
               'perusahaanUser',
               'perusahaanUser',
               'required|trim',
               [
                    'required' => 'Perusahaan user wajib dipilih'
               ]
          );

          if ($this->form_validation->run() == false) {
               if ($this->session->has_userdata('id_m_perusahaan_main')) {
                    $idmper = $this->session->userdata('id_m_perusahaan_main');
                    if ($idmper != "") {
                         $data['permst'] = $this->str->getMaster($idmper, "");
                         $data['perstr'] = $this->str->getMenu($idmper, "");
                    } else {
                         $data['permst'] = "";
                         $data['perstr'] = "";
                    }
               } else {
                    $idmper = "";
                    $data['permst'] = "";
                    $data['perstr'] = "";
               }
               $data['nama'] = $this->session->userdata("nama_main");
               $data['email'] = $this->session->userdata("email_main");
               $data['menu'] = $this->session->userdata("id_menu_main");
               $data['data_menu'] = $this->mnu->get_all();
               $this->load->view('dashboard/template/header', $data);
               $this->load->view('dashboard/user/user_add');
               $this->load->view('dashboard/modal/user');
               $this->load->view('dashboard/template/footer', $data);
               $this->load->view('dashboard/code/user');
          } else {
               $namaUser = htmlentities(trim($this->input->post('namaUser', true)));
               $emailUser = htmlentities(trim($this->input->post('emailUser', true)));
               $sandiUser = htmlentities(trim($this->input->post('sandiUser', true)));
               $ulangSandi = htmlentities(trim($this->input->post('ulangSandi', true)));
               $tglAktif = htmlentities(trim($this->input->post('tglAktif', true)));
               $tglExpired = htmlentities(trim($this->input->post('tglExpired', true)));
               $aksesUser = htmlentities(trim($this->input->post('aksesUser', true)));
               $perusahaanUser = htmlentities(trim($this->input->post('perusahaanUser', true)));

               $query = $this->usr->cek_email($emailUser);
               if ($query == 201) {
                    $this->session->set_flashdata('msg', '<div class="err_psn_sandi alert alert-danger animate__animated animate__bounce"> Email sudah digunakan </div>');
                    if ($this->session->has_userdata('id_m_perusahaan_main')) {
                         $idmper = $this->session->userdata('id_m_perusahaan_main');
                         if ($idmper != "") {
                              $data['permst'] = $this->str->getMaster($idmper, "");
                              $data['perstr'] = $this->str->getMenu($idmper, "");
                         } else {
                              $data['permst'] = "";
                              $data['perstr'] = "";
                         }
                    } else {
                         $idmper = "";
                         $data['permst'] = "";
                         $data['perstr'] = "";
                    }
                    $data['nama'] = $this->session->userdata("nama_main");
                    $data['email'] = $this->session->userdata("email_main");
                    $data['menu'] = $this->session->userdata("id_menu_main");
                    $data['data_menu'] = $this->mnu->get_all();
                    $this->load->view('dashboard/template/header', $data);
                    $this->load->view('dashboard/user/user_add');
                    $this->load->view('dashboard/modal/user');
                    $this->load->view('dashboard/template/footer', $data);
                    $this->load->view('dashboard/code/user');
               } else {
                    $datamenu = $this->mnu->get_by_auth_menu($aksesUser);
                    if (!empty($datamenu)) {
                         foreach ($datamenu as $mnl) {
                              $id_akses_menu = $mnl->IdMenu;
                         }
                    } else {
                         $id_akses_menu = 0;
                    }

                    $dtper = $this->str->get_detail_m_per($perusahaanUser);
                    if (!empty($dtper)) {
                         foreach ($dtper as $mnl) {
                              $id_m_per = $mnl->id_m_perusahaan;
                         }
                    } else {
                         $id_m_per = 0;
                    }

                    $sesi = md5($sandiUser);

                    $data = [
                         'nama_user' => $namaUser,
                         'email_user' => $emailUser,
                         'tgl_aktif' => $tglAktif . ' 00:00:00',
                         'tgl_exp' => $tglExpired . ' 23:59:59',
                         'sesi' => $sesi,
                         'token' => '',
                         'id_menu' => $id_akses_menu,
                         'stat_user' => 'T',
                         'akses_apps' => 'TEMP',
                         'pic_user' => '',
                         'tgl_buat' => date('Y-m-d H:i:s'),
                         'tgl_edit' => date('Y-m-d H:i:s'),
                         'id_buat' => $this->session->userdata('id_user_main'),
                         'id_m_perusahaan' => $id_m_per,
                    ];

                    $query = $this->usr->buat_user($data);
                    if ($query) {
                         $this->session->set_flashdata('msg', '<div class="err_psn_user alert alert-info animate__animated animate__bounce"> User berhasil dibuat </div>');
                         if ($this->session->has_userdata('id_m_perusahaan_main')) {
                              $idmper = $this->session->userdata('id_m_perusahaan_main');
                              if ($idmper != "") {
                                   $data['permst'] = $this->str->getMaster($idmper, "");
                                   $data['perstr'] = $this->str->getMenu($idmper, "");
                              } else {
                                   $data['permst'] = "";
                                   $data['perstr'] = "";
                              }
                         } else {
                              $idmper = "";
                              $data['permst'] = "";
                              $data['perstr'] = "";
                         }
                         $data['nama'] = $this->session->userdata("nama_main");
                         $data['email'] = $this->session->userdata("email_main");
                         $data['menu'] = $this->session->userdata("id_menu_main");
                         $data['data_menu'] = $this->mnu->get_all();
                         $this->load->view('dashboard/template/header', $data);
                         $this->load->view('dashboard/user/user_add');
                         $this->load->view('dashboard/modal/user');
                         $this->load->view('dashboard/template/footer', $data);
                         $this->load->view('dashboard/code/user');
                    } else {
                         $this->session->set_flashdata('msg', '<div class="err_psn_user alert alert-danger animate__animated animate__bounce"> User gagal dibuat </div>');
                         if ($this->session->has_userdata('id_m_perusahaan_main')) {
                              $idmper = $this->session->userdata('id_m_perusahaan_main');
                              if ($idmper != "") {
                                   $data['permst'] = $this->str->getMaster($idmper, "");
                                   $data['perstr'] = $this->str->getMenu($idmper, "");
                              } else {
                                   $data['permst'] = "";
                                   $data['perstr'] = "";
                              }
                         } else {
                              $idmper = "";
                              $data['permst'] = "";
                              $data['perstr'] = "";
                         }
                         $data['nama'] = $this->session->userdata("nama_main");
                         $data['email'] = $this->session->userdata("email_main");
                         $data['menu'] = $this->session->userdata("id_menu_main");
                         $data['data_menu'] = $this->mnu->get_all();
                         $this->load->view('dashboard/template/header', $data);
                         $this->load->view('dashboard/user/user_add');
                         $this->load->view('dashboard/modal/user');
                         $this->load->view('dashboard/template/footer', $data);
                         $this->load->view('dashboard/code/user');
                    }
               }

               // if ($sandiUser !== $ulangSandi) {
               //      $this->session->set_flashdata('msg', '<div class="err_psn_user alert alert-danger animate__animated animate__bounce"> Sandi tidak sama dengan ulang sandi </div>');
               //      if ($this->session->has_userdata('id_m_perusahaan_main')) {
               //           $idmper = $this->session->userdata('id_m_perusahaan_main');
               //           if ($idmper != "") {
               //                $data['permst'] = $this->str->getMaster($idmper, "");
               //                $data['perstr'] = $this->str->getMenu($idmper, "");
               //           } else {
               //                $data['permst'] = "";
               //                $data['perstr'] = "";
               //           }
               //      } else {
               //           $idmper = "";
               //           $data['permst'] = "";
               //           $data['perstr'] = "";
               //      }
               //      $data['nama'] = $this->session->userdata("nama_main");
               //      $data['email'] = $this->session->userdata("email_main");
               //      $data['menu'] = $this->session->userdata("id_menu_main");
               //      $data['data_menu'] = $this->mnu->get_all();
               //      $this->load->view('dashboard/template/header', $data);
               //      $this->load->view('dashboard/user/user_add');
               //      $this->load->view('dashboard/modal/user');
               //      $this->load->view('dashboard/template/footer', $data);
               //      $this->load->view('dashboard/code/user');
               // } else {

               // }
          }
     }

     public function tgl_expired()
     {
          $tglAktif = '2023-04-17';
          $tglAktif = date('Y-m-d', strtotime($tglAktif));
          $tglExpired = new DateTime($tglAktif);
          $tglexp = $tglExpired->modify('1 year');
          $tgl = json_encode($tglexp);
          $tg = json_decode($tgl);
          $tglExpired = date('Y-m-d', strtotime($tg->{'date'}));
          echo json_encode(array("tglExpired" => $tglExpired));
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
          $auth_user = $this->session->userdata('auth_user_main');
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
          $auth_user = $this->session->userdata('auth_user_main');
          $sesi = md5($this->input->post('sesi'));
          $query = $this->usr->cek_sandi($auth_user, $sesi);

          if ($query) {
               echo json_encode(array("statusCode" => 200, "pesan" => "Sandi ditemukan"));
          } else {
               echo json_encode(array("statusCode" => 201, "pesan" => "Sandi lama anda salah"));
          }
     }

     public function detail_user($auth_user)
     {
          $query = $this->usr->get_user_id($auth_user);
          if (!empty($query)) {
               foreach ($query as $list) {
                    if ($list->stat_user == "T") {
                         $status = "AKTIF";
                    } else {
                         $status = "NONAKTIF";
                    }

                    $data = [
                         'statusCode' => 200,
                         'nama' => $list->nama_user,
                         'email' => $list->email_user,
                         'tgl_aktif' => date('Y-m-d', strtotime($list->tgl_aktif)),
                         'tgl_exp' => date('Y-m-d', strtotime($list->tgl_exp)),
                         'akses_menu' => $list->id_menu,
                         'status' => $status,
                         'tgl_buat' => date('d-M-Y H:i:s', strtotime($list->tgl_buat)),
                         'tgl_edit' => date('d-M-Y H:i:s', strtotime($list->tgl_edit)),
                         'pembuat' => $list->nama_user
                    ];
               }
               $this->session->set_userdata('id_user_usr', $list->id_user);
               echo json_encode($data);
          } else {
               echo json_encode(array('statusCode' => 201, "pesan" => "User tidak ditemukan"));
          }
     }

     public function hapus_user($auth_user)
     {
          $query = $this->usr->hapus_user($auth_user);
          if ($query == 200) {
               $pesan = 'User berhasil dihapus';
          } else if ($query == 201) {
               $pesan = 'User gagal dihapus';
          } else {
               $pesan = 'User tidak ditemukan';
          }

          echo json_encode(['statusCode' => $query, 'pesan' => $pesan]);
     }

     public function edit_user()
     {
          $this->form_validation->set_rules("nama", "nama", "required|trim|max_length[100]", [
               'required' => 'Nama wajib diisi',
               'max_length' => 'Nama maksimal 100 karakter'
          ]);
          $this->form_validation->set_rules("email", "email", "required|trim|max_length[100]|valid_email", [
               'required' => 'Email wajib diisi',
               'max_length' => 'Email maksimal 100 karakter',
               'valid_email' => 'Format email salah'
          ]);
          $this->form_validation->set_rules("tgl_aktif", "tgl_aktif", "required|trim", [
               'required' => 'Tanggal aktif wajib diisi'
          ]);
          $this->form_validation->set_rules("tgl_exp", "tgl_exp", "required|trim", [
               'required' => 'Tanggal expired wajib diisi'
          ]);
          $this->form_validation->set_rules("akses_menu", "akses_menu", "required|trim", [
               'required' => 'Akses menu wajib dipilih'
          ]);
          $this->form_validation->set_rules("status", "status", "required|trim", [
               'required' => 'Status wajib dipilih'
          ]);

          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 202,
                    'nama' => form_error("nama"),
                    'email' => form_error("email"),
                    'tgl_aktif' => form_error("tgl_aktif"),
                    'tgl_exp' => form_error("tgl_exp"),
                    'akses_menu' => form_error("akses_menu"),
                    'status' => form_error("status"),
               ];

               echo json_encode($error);
               die;
          } else {
               if ($this->session->userdata('id_user_main') == "") {
                    echo json_encode(array("statusCode" => 201, "pesan" => "User tidak ditemukan"));
                    return;
               }

               $nama = htmlspecialchars($this->input->post("nama", true));
               $email = htmlspecialchars($this->input->post("email", true));
               $tgl_aktif = htmlspecialchars($this->input->post("tgl_aktif", true));
               $tgl_exp = htmlspecialchars($this->input->post("tgl_exp", true));
               $akses_menu = htmlspecialchars($this->input->post("akses_menu", true));
               if (htmlspecialchars($this->input->post("status", true)) == "AKTIF") {
                    $status = "T";
               } else {
                    $status = "F";
               }
               $user = $this->usr->edit_user($nama, $email, $tgl_aktif, $tgl_exp, $akses_menu, $status);
               if ($user == 200) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "User berhasil diupdate"));
               } else if ($user == 201) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "User gagal diupdate"));
               } else if ($user == 203) {
                    echo json_encode(array("statusCode" => 203, "pesan" => "Email sudah digunakan"));
               } else if ($user == 204) {
                    echo json_encode(array("statusCode" => 205, "pesan" => "User sudah digunakan"));
               }
          }
     }
}
