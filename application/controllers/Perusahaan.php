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
        // Header
        $this->load->view('components/header');

        // Sidebar
        $this->load->view('components/sidebar');

        // Navbar
        $dataNavbar['nama'] = $this->session->userdata("nama_main");
        $this->load->view('components/navbar', $dataNavbar);

        // Main
        $this->load->view('data_master/data_perusahaan/perusahaan/view');

        // Modal
        $this->load->view('components/modal/perusahaan');

        // JS
        $this->load->view('components/js');

        // Page JS
        $this->load->view('components/page_js/perusahaan/view');

        // Footer
        $this->load->view('components/footer');
    }

    public function new ()
    {
        $id_perusahaan = $this->session->userdata("id_perusahaan_hcdata");
        $data['nama_per'] = $this->prs->get_per_by_id($id_perusahaan);
        $this->session->unset_userdata('auth_per_sub');
        $data['nama'] = $this->session->userdata("nama_hcdata");
        $data['email'] = $this->session->userdata("email_hcdata");
        $data['menu'] = $this->session->userdata("id_menu_hcdata");
        $data['get_menu'] = $this->dsmod->get_menu();
        $this->load->view('dashboard/template/header', $data);
        $this->load->view('dashboard/perusahaan/perusahaan_add');
        $this->load->view('dashboard/template/footer', $data);
        $this->load->view('dashboard/code/perusahaan');
    }

    public function ajax_list()
    {
        $auth = htmlspecialchars($this->input->get("authtoken", true));
        $cekauth = $this->cek_auth($auth);

        if ($cekauth == 501) {
            echo json_encode(array('statusCode' => 201, "kode_pesan" => "Gagal", "pesan" => "Autentikasi tidak valid, refresh data", "tipe_pesan" => "error"));
        } else {

            $list = $this->prs->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $prs) {
                $no++;
                $row = array();
                $row['no'] = $no;
                $row['id_perusahaan'] = $prs->id_perusahaan;
                $row['auth_perusahaan'] = $prs->auth_perusahaan;
                $row['kode_perusahaan'] = $prs->kode_perusahaan;
                $row['nama_perusahaan'] = $prs->nama_perusahaan;
                if ($prs->alamat_perusahaan != "") {
                    $row['alamat_perusahaan'] = "<a href='#'>" . $prs->alamat_perusahaan . "</a>";
                } else {
                    $row['alamat_perusahaan'] = "";
                }
                $row['ket_perusahaan'] = $prs->ket_perusahaan;

                if ($prs->stat_perusahaan == "T") {
                    $row['stat_perusahaan'] = "<span class='btn btn-success btn-sm '> AKTIF </span>";
                } else {
                    $row['stat_perusahaan'] = "<div class='btn btn-danger btn-sm'> NONAKTIF </div>";
                }

                $row['tgl_buat'] = date('d-M-Y', strtotime($prs->tgl_buat));
                $row['tgl_edit'] = date('d-M-Y', strtotime($prs->tgl_edit));
                $row['proses'] = '<button id="' . $prs->auth_perusahaan . '" class="btn btn-primary btn-sm font-weight-bold dtlperusahaan" title="Detail" value="' . $prs->nama_perusahaan . '"> <i class="fas fa-asterisk"></i> </button>
                    <button id="' . $prs->auth_perusahaan . '" class="btn btn-warning btn-sm font-weight-bold edttperusahaan" title="Edit" value="' . $prs->nama_perusahaan . '"> <i class="fas fa-edit"></i> </button>
                    <button id="' . $prs->auth_perusahaan . '" class="btn btn-danger btn-sm font-weight-bold hpsperusahaan" title="Hapus" value="' . $prs->nama_perusahaan . '"> <i class="fas fa-trash-alt"></i> </button>';
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
    }

    public function input_perusahaan()
    {

        $auth = htmlspecialchars($this->input->post("token", true));
        $cekauth = $this->cek_auth($auth);

        if ($cekauth == 501) {
            echo json_encode(array('statusCode' => 201, "kode_pesan" => "Gagal", "pesan" => "Autentikasi tidak valid, refresh data", "tipe_pesan" => "error"));
        } else {
            $auth_valid = $this->session->csrf_token;
            $auth = htmlspecialchars($this->input->post("token", true));
            $email = $this->session->email_hcdata;
            if ($auth !== $auth_valid) {
                $data_err = [
                    'email_error' => $email,
                    'ip_error' => $_SERVER['REMOTE_ADDR'],
                    'ip_akses' => $_SERVER['REMOTE_ADDR'],
                    'msg_error' => 'Token tidak valid : ' . $auth . " - valid token : " . $auth_valid,
                    'tgl_buat' => date('Y-m-d H:i:s'),
                ];

                $err = $this->lgn->get_err_log($data_err);

                redirect(base_url('errauth'));
                die;
            }

            $this->form_validation->set_rules("kode", "kode", "required|trim|max_length[8]", [
                'required' => 'Kode wajib diisi',
                'max_length' => 'Kode maksimal 8 karakter',
            ]);
            $this->form_validation->set_rules("perusahaan", "perusahaan", "required|trim|max_length[100]", [
                'required' => 'Perusahaan wajib diisi',
                'max_length' => 'Perusahaan maksimal 100 karakter',
            ]);
            $this->form_validation->set_rules("alamat", "alamat", "required|trim|max_length[100]", [
                'required' => 'Alamat wajib diisi',
                'max_length' => 'Alamat maksimal 100 karakter',
            ]);
            $this->form_validation->set_rules("kodepos", "kodepos", "trim|max_length[6]", [
                'max_length' => 'Alamat maksimal 6 karakter',
            ]);
            $this->form_validation->set_rules("prov", "prov", "required|trim|max_length[3]", [
                'required' => 'Provinsi wajib dipilih',
                'max_length' => 'Provinsi maksimal 3 karakter',
            ]);
            $this->form_validation->set_rules("kab", "kab", "required|trim|max_length[7]", [
                'required' => 'Kabupaten wajib dipilih',
                'max_length' => 'Kabupaten maksimal 7 karakter',
            ]);
            $this->form_validation->set_rules("kec", "kec", "required|trim|max_length[8]", [
                'required' => 'Kecamatan wajib dipilih',
                'max_length' => 'Kecamatan maksimal 8 karakter',
            ]);
            $this->form_validation->set_rules("kel", "kel", "required|trim|max_length[10]", [
                'required' => 'Kelurahan wajib dipilih',
                'max_length' => 'Kelurahan maksimal 10 karakter',
            ]);
            $this->form_validation->set_rules("telp", "telp", "trim|max_length[15]", [
                'max_length' => 'No. Telp maksimal 15 karakter',
            ]);
            $this->form_validation->set_rules("email", "email", "trim|valid_email", [
                'valid_email' => 'Format email tidak sesuai',
            ]);
            $this->form_validation->set_rules("web", "web", "trim|max_length[100]", [
                'max_length' => 'Website maksimal 100 karakter',
            ]);
            $this->form_validation->set_rules("npwp", "npwp", "trim|max_length[25]", [
                'max_length' => 'No. NPWP maksimal 25 karakter',
            ]);
            $this->form_validation->set_rules("keg", "keg", "trim|max_length[1000]", [
                'max_length' => 'Kegiatan maksimal 1000 karakter',
            ]);
            $this->form_validation->set_rules("ket", "ket", "trim|max_length[1000],[
               'max_length' => 'Keterangan maksimal 1000 karakter'
          ]");
            if ($this->form_validation->run() == false) {
                $error = [
                    'statusCode' => 202,
                    'kode' => form_error("kode"),
                    'perusahaan' => form_error("perusahaan"),
                    'alamat' => form_error("alamat"),
                    'kodepos' => form_error("kodepos"),
                    'prov' => form_error("prov"),
                    'kab' => form_error("kab"),
                    'kec' => form_error("kec"),
                    'kel' => form_error("kel"),
                    'telp' => form_error("telp"),
                    'email' => form_error("email"),
                    'web' => form_error("web"),
                    'npwp' => form_error("npwp"),
                    'keg' => form_error("keg"),
                    'ket' => form_error("ket"),
                ];
                echo json_encode($error);
                return;
            } else {
                $kode_perusahaan = htmlspecialchars($this->input->post("kode", true));
                $nama_perusahaan = htmlspecialchars($this->input->post("perusahaan", true));
                $alamat = htmlspecialchars($this->input->post("alamat", true));
                $kodepos = htmlspecialchars($this->input->post("kodepos", true));
                $prov = htmlspecialchars($this->input->post("prov", true));
                $kab = htmlspecialchars($this->input->post("kab", true));
                $kec = htmlspecialchars($this->input->post("kec", true));
                $kel = htmlspecialchars($this->input->post("kel", true));
                $telp = htmlspecialchars($this->input->post("telp", true));
                $email = htmlspecialchars($this->input->post("email", true));
                $web = htmlspecialchars($this->input->post("web", true));
                $npwp = htmlspecialchars($this->input->post("npwp", true));
                $keg = htmlspecialchars($this->input->post("keg", true));
                $ket = htmlspecialchars($this->input->post("ket", true));

                $cekkode = $this->prs->cek_kode($kode_perusahaan);
                if ($cekkode == 201) {
                    echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "pesan" => "Kode sudah digunakan", "tipe_pesan" => "error"));
                    return;
                }

                $cekperusahaan = $this->prs->cek_perusahaan($nama_perusahaan);
                if ($cekperusahaan == 201) {
                    echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "pesan" => "Nama perusahaan sudah digunakan", "tipe_pesan" => "error"));
                    return;
                }

                $data = [
                    'id_parent' => 0,
                    'kode_perusahaan' => $kode_perusahaan,
                    'nama_perusahaan' => $nama_perusahaan,
                    'alamat_perusahaan' => $alamat,
                    'kel_perusahaan' => $kel,
                    'kec_perusahaan' => $kec,
                    'kab_perusahaan' => $kab,
                    'prov_perusahaan' => $prov,
                    'kodepos_perusahaan' => $kodepos,
                    'telp_perusahaan' => $telp,
                    'email_perusahaan' => $email,
                    'website_perusahaan' => $web,
                    'npwp_perusahaan' => $npwp,
                    'stat_perusahaan' => 'T',
                    'ket_perusahaan' => $ket,
                    'kegiatan' => $keg,
                    'url_rk3l' => '',
                    'tgl_buat' => date('Y-m-d H:i:s'),
                    'tgl_edit' => date('Y-m-d H:i:s'),
                    'id_user' => $this->session->userdata('id_user_hcdata'),
                ];

                $perusahaan = $this->prs->input_perusahaan($data);
                if ($perusahaan) {
                    echo json_encode(array("statusCode" => 200, "kode_pesan" => "Berhasil", "pesan" => "Perusahaan berhasil disimpan", "tipe_pesan" => "success"));
                } else {
                    echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "pesan" => "Perusahaan gagal disimpan", "tipe_pesan" => "error"));
                }
            }
        }
    }

    public function hapus_perusahaan()
    {

        $auth = htmlspecialchars($this->input->post("token", true));
        $cekauth = $this->cek_auth($auth);

        if ($cekauth == 501) {
            echo json_encode(array('statusCode' => 201, "kode_pesan" => "Gagal", "pesan" => "Autentikasi tidak valid, refresh data", "tipe_pesan" => "error"));
        } else {
            $auth_valid = $this->session->csrf_token;
            $auth = htmlspecialchars($this->input->post("token", true));
            $email = $this->session->email_hcdata;
            if ($auth !== $auth_valid) {
                $data_err = [
                    'email_error' => $email,
                    'ip_error' => $_SERVER['REMOTE_ADDR'],
                    'ip_akses' => $_SERVER['REMOTE_ADDR'],
                    'msg_error' => 'Token tidak valid : ' . $auth . " - valid token : " . $auth_valid,
                    'tgl_buat' => date('Y-m-d H:i:s'),
                ];

                $err = $this->lgn->get_err_log($data_err);

                redirect(base_url('errauth'));
                die;
            }

            $auth_perusahaan = htmlspecialchars(trim($this->input->post('auth_perusahaan', true)));

            $query = $this->prs->hapus_perusahaan($auth_perusahaan);
            if ($query == 200) {
                echo json_encode(array("statusCode" => 200, "kode_pesan" => "Berhasil", "pesan" => "Perusahaan berhasil dihapus", "tipe_pesan" => "success"));
                return;
            } else if ($query == 201) {
                echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "pesan" => "Perusahaan gagal dihapus", "tipe_pesan" => "error"));
                return;
            } else if ($query == 203) {
                echo json_encode(array("statusCode" => 203, "kode_pesan" => "Gagal", "pesan" => "Perusahaan tidak dapat dihapus, ada pada struktur perusahaan", "tipe_pesan" => "error"));
                return;
            } else {
                echo json_encode(array("statusCode" => 202, "kode_pesan" => "Gagal", "pesan" => "Perusahaan tidak ditemukan", "tipe_pesan" => "error"));
                return;
            }
        }
    }

    public function detail_perusahaan()
    {

        $auth = htmlspecialchars($this->input->post("token", true));
        $cekauth = $this->cek_auth($auth);

        if ($cekauth == 501) {
            echo json_encode(array('statusCode' => 201, "kode_pesan" => "Gagal", "pesan" => "Autentikasi tidak valid, refresh data", "tipe_pesan" => "error"));
        } else {
            $auth_valid = $this->session->csrf_token;
            $auth = htmlspecialchars($this->input->post("token", true));
            $email = $this->session->email_hcdata;
            if ($auth !== $auth_valid) {
                $data_err = [
                    'email_error' => $email,
                    'ip_error' => $_SERVER['REMOTE_ADDR'],
                    'ip_akses' => $_SERVER['REMOTE_ADDR'],
                    'msg_error' => 'Token tidak valid : ' . $auth . " - valid token : " . $auth_valid,
                    'tgl_buat' => date('Y-m-d H:i:s'),
                ];

                $err = $this->lgn->get_err_log($data_err);

                redirect(base_url('errauth'));
                die;
            }

            $auth_perusahaan = htmlspecialchars(trim($this->input->post("auth_perusahaan", true)));
            $query = $this->prs->get_perusahaan_id($auth_perusahaan);
            if (!empty($query)) {
                foreach ($query as $list) {
                    if ($list->stat_perusahaan == "T") {
                        $status = "AKTIF";
                    } else {
                        $status = "NONAKTIF";
                    }

                    $prov = $this->drh->get_prov_by_id($list->prov_perusahaan);
                    $kab = $this->drh->get_kab_by_id($list->kab_perusahaan);
                    $kec = $this->drh->get_kec_by_id($list->kec_perusahaan);
                    $kel = $this->drh->get_kel_by_id($list->kel_perusahaan);

                    if ($list->kodepos_perusahaan == 0) {
                        $kodepos = "";
                    } else {
                        $kodepos = " " . $list->kodepos_perusahaan;
                    }

                    $data = [
                        'statusCode' => 200,
                        'kode' => $list->kode_perusahaan,
                        'perusahaan' => $list->nama_perusahaan,
                        'alamat' => $list->alamat_perusahaan . ", KEL. " . $kel . ", KEC. " . $kec . ", " . $kab . ", " . $prov . $kodepos,
                        'telp' => $list->telp_perusahaan,
                        'email' => $list->email_perusahaan,
                        'web' => $list->website_perusahaan,
                        'npwp' => $list->npwp_perusahaan,
                        'keg' => $list->kegiatan,
                        'ket' => $list->ket_perusahaan,
                        'status' => $status,
                        'tgl_buat' => date('d-M-Y H:i:s', strtotime($list->tgl_buat)),
                        'tgl_edit' => date('d-M-Y H:i:s', strtotime($list->tgl_edit)),
                        'pembuat' => $list->nama_user,
                    ];

                    $this->session->set_userdata('id_perusahaan_prs_hcdata', $list->id_perusahaan);
                }
                echo json_encode($data);
            } else {
                echo json_encode(array('statusCode' => 201, "kode_pesan" => "Gagal", "pesan" => "Perusahaan tidak ditemukan", "tipe_pesan" => "error"));
            }
        }
    }

    public function edit_detail_perusahaan()
    {

        $auth = htmlspecialchars($this->input->post("token", true));
        $cekauth = $this->cek_auth($auth);

        if ($cekauth == 501) {
            echo json_encode(array('statusCode' => 201, "kode_pesan" => "Gagal", "pesan" => "Autentikasi tidak valid, refresh data", "tipe_pesan" => "error"));
        } else {
            $auth_valid = $this->session->csrf_token;
            $auth = htmlspecialchars($this->input->post("token", true));
            $email = $this->session->email_hcdata;
            if ($auth !== $auth_valid) {
                $data_err = [
                    'email_error' => $email,
                    'ip_error' => $_SERVER['REMOTE_ADDR'],
                    'ip_akses' => $_SERVER['REMOTE_ADDR'],
                    'msg_error' => 'Token tidak valid : ' . $auth . " - valid token : " . $auth_valid,
                    'tgl_buat' => date('Y-m-d H:i:s'),
                ];

                $err = $this->lgn->get_err_log($data_err);

                redirect(base_url('errauth'));
                die;
            }

            $auth_perusahaan = htmlspecialchars(trim($this->input->post("auth_perusahaan", true)));
            $query = $this->prs->get_perusahaan_id($auth_perusahaan);
            if (!empty($query)) {
                foreach ($query as $list) {
                    if ($list->stat_perusahaan == "T") {
                        $status = "AKTIF";
                    } else {
                        $status = "NONAKTIF";
                    }

                    if ($list->kodepos_perusahaan == 0) {
                        $kodepos = "";
                    } else {
                        $kodepos = $list->kodepos_perusahaan;
                    }

                    $data = [
                        'statusCode' => 200,
                        'judul' => "Edit Perusahaan | " . $list->nama_perusahaan,
                        'kode' => $list->kode_perusahaan,
                        'perusahaan' => $list->nama_perusahaan,
                        'alamat' => $list->alamat_perusahaan,
                        'kodepos' => $kodepos,
                        'kel' => $list->kel_perusahaan,
                        'kec' => $list->kec_perusahaan,
                        'kab' => $list->kab_perusahaan,
                        'prov' => $list->prov_perusahaan,
                        'telp' => $list->telp_perusahaan,
                        'email' => $list->email_perusahaan,
                        'web' => $list->website_perusahaan,
                        'npwp' => $list->npwp_perusahaan,
                        'keg' => $list->kegiatan,
                        'ket' => $list->ket_perusahaan,
                        'status' => $status,
                        'tgl_buat' => date('d-M-Y H:i:s', strtotime($list->tgl_buat)),
                        'tgl_edit' => date('d-M-Y H:i:s', strtotime($list->tgl_edit)),
                        'pembuat' => $list->nama_user,
                    ];
                    $this->session->set_userdata('id_perusahaan_prs_edit', $list->id_perusahaan);
                }
                echo json_encode($data);
            } else {
                echo json_encode(array('statusCode' => 201, "kode_pesan" => "Gagal", "pesan" => "Perusahaan tidak ditemukan", "tipe_pesan" => "error"));
            }
        }
    }

    public function edit_perusahaan()
    {

        $auth = htmlspecialchars($this->input->post("token", true));
        $cekauth = $this->cek_auth($auth);

        if ($cekauth == 501) {
            echo json_encode(array('statusCode' => 201, "kode_pesan" => "Gagal", "pesan" => "Autentikasi tidak valid, refresh data", "tipe_pesan" => "error"));
        } else {
            if ($this->session->userdata('id_perusahaan_prs_edit') == "") {
                echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "pesan" => "Perusahaan tidak ditemukan", "tipe_pesan" => "error"));
                return;
            }

            $id_perusahaan = $this->session->userdata('id_perusahaan_prs_edit');
            $kode_perusahaan = htmlspecialchars($this->input->post("kode", true));
            $nama_perusahaan = htmlspecialchars($this->input->post("perusahaan", true));
            $alamat = htmlspecialchars($this->input->post("alamat", true));
            $kodepos = htmlspecialchars($this->input->post("kodepos", true));
            $prov = htmlspecialchars($this->input->post("prov", true));
            $kab = htmlspecialchars($this->input->post("kab", true));
            $kec = htmlspecialchars($this->input->post("kec", true));
            $kel = htmlspecialchars($this->input->post("kel", true));
            $keg = htmlspecialchars($this->input->post("keg", true));
            $ket = htmlspecialchars($this->input->post("ket", true));

            if (htmlspecialchars($this->input->post("status", true)) == "AKTIF") {
                $status = "T";
            } else {
                $status = "F";
            }

            $data = array(
                'kode_perusahaan' => $kode_perusahaan,
                'nama_perusahaan' => $nama_perusahaan,
                'alamat_perusahaan' => $alamat,
                'kel_perusahaan' => $kel,
                'kec_perusahaan' => $kec,
                'kab_perusahaan' => $kab,
                'prov_perusahaan' => $prov,
                'kodepos_perusahaan' => $kodepos,
                'telp_perusahaan' => 0,
                'email_perusahaan' => 0,
                'website_perusahaan' => 0,
                'npwp_perusahaan' => 0,
                'stat_perusahaan' => $status,
                'ket_perusahaan' => $ket,
                'kegiatan' => $keg,
                'url_rk3l' => '',
                'tgl_edit' => date('Y-m-d H:i:s'),
            );

            $where = array(
                'id_perusahaan' => $id_perusahaan,
            );

            $perusahaan = $this->prs->edit_data_perusahaan($where, $data);

            if ($perusahaan == 200) {
                echo json_encode(array("statusCode" => 200, "kode_pesan" => "Berhasil", "pesan" => "Perusahaan berhasil diupdate", "tipe_pesan" => "success"));
            } else if ($perusahaan == 201) {
                echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "pesan" => "Perusahaan gagal diupdate", "tipe_pesan" => "error"));
            } else if ($perusahaan == 203) {
                echo json_encode(array("statusCode" => 203, "kode_pesan" => "Gagal", "pesan" => "Kode sudah digunakan", "tipe_pesan" => "error"));
            } else if ($perusahaan == 204) {
                echo json_encode(array("statusCode" => 205, "kode_pesan" => "Gagal", "pesan" => "Perusahaan sudah digunakan", "tipe_pesan" => "error"));
            }
        }
    }

    public function get_by_authper()
    {
        $auth_per = htmlspecialchars($this->input->post('auth_per', true));

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
        if ($this->session->userdata('id_perusahaan_prs_hcdata') != "") {
            $id_per = $this->session->userdata('id_perusahaan_prs_hcdata');
            $output = "<option value=''>-- Pilih perusahaan --</option>";
            $query = $this->prs->get_by_idper($id_per);
            foreach ($query as $list) {
                $output = $output . " <option value='" . $list->auth_perusahaan . "'>" . $list->perusahaan . "</option>";
            }

            echo json_encode(array("statusCode" => 200, "perusahaan" => $output, "kode_pesan" => "Berhasil", "pesan" => "Sukses", "tipe_pesan" => "success"));
        } else {
            $output = "<option value=''>-- Perusahaan tidak ditemukan --</option>";
            echo json_encode(array("statusCode" => 201, "perusahaan" => $output, "kode_pesan" => "Gagal", "pesan" => "perusahaan gagal ditampilkan", "tipe_pesan" => "error"));
        }
    }

    public function get_all()
    {
        $id_m_perusahaan = $this->session->userdata("id_m_perusahaan_hcdata");
        $query = $this->prs->get_all($id_m_perusahaan);
        $output = "<option value=''>-- WAJIB DIPILIH --</option>";
        if (!empty($query)) {
            foreach ($query as $list) {
                $output = $output . "<option value='" . $list->auth_perusahaan . "'>" . $list->nama_perusahaan . "</option>";
            }
            echo json_encode(array("statusCode" => 200, "kode_pesan" => "Berhasil", "prs" => $output, "tipe_pesan" => "success"));
        } else {
            $output = "<option value=''>-- Perusahaan Tidak Ditemukan --</option>";
            echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "prs" => $output, "tipe_pesan" => "error"));
        }
    }

    public function get_m_by_auth()
    {
        $auth = htmlspecialchars($this->input->post("token", true));
        $this->cek_auth($auth);

        $auth_m_per = htmlspecialchars($this->input->post("auth_m_per", true));
        $query = $this->prs->get_m_by_auth($auth_m_per);
        if (!empty($query)) {
            echo json_encode(array("statusCode" => 200, "kode_pesan" => "Berhasil", "pesan" => "Sukses", "tipe_pesan" => "success"));
        } else {
            echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "pesan" => "Gagal", "tipe_pesan" => "error"));
        }
    }

    public function get_all_prs()
    {
        $id_m_perusahaan = $this->session->userdata("id_m_perusahaan_hcdata");
        $query = $this->prs->get_all($id_m_perusahaan);
        $output = "<option value=''>-- PILIH PERUSAHAAN --</option>";
        if (!empty($query)) {
            foreach ($query as $list) {
                $output = $output . "<option value='" . $list->auth_perusahaan . "'>" . $list->nama_perusahaan . "</option>";
            }
            echo json_encode(array("statusCode" => 200, "kode_pesan" => "Berhasil", "prs" => $output, "tipe_pesan" => "success"));
        } else {
            $output = "<option value=''>-- Perusahaan Tidak Ditemukan --</option>";
            echo json_encode(array("statusCode" => 201, "kode_pesan" => "Gagal", "prs" => $output, "tipe_pesan" => "error"));
        }
    }

    public function get_m_all()
    {
        $output = "<option value=''>-- PILIH PERUSAHAAN --</option>";
        $query1 = $this->prs->get_con_per();
        if (!empty($query1)) {
            foreach ($query1 as $list) {
                $output = $output . "<option value='" . $list->auth_m_perusahaan . "'>" . $list->nama_perusahaan . "</option>";
            }
        } else {
            $output = "";
        }

        $query = $this->prs->get_m_all();

        if (!empty($query)) {
            foreach ($query as $list) {
                $output = $output . "<option value='" . $list->auth_m_perusahaan . "'> --> " . $list->nama_perusahaan . "</option>";
            }
            echo json_encode(array("statusCode" => 200, "prs" => $output));
        } else {
            $output = "<option value=''>-- Perusahaan Tidak Ditemukan --</option>";
            echo json_encode(array("statusCode" => 201, "prs" => $output));
        }
    }

    public function get_m_all_kary()
    {
        $output = "<option value=''>-- PILIH PERUSAHAAN --</option>";
        if ($this->session->has_userdata('id_m_perusahaan_hcdata')) {
            $idmper = $this->session->userdata('id_m_perusahaan_hcdata');
            if ($idmper != "") {
                $permst = $this->str->getMaster($idmper, "");
                $persub = $this->str->getMenu($idmper, "");
            } else {
                $permst = "";
                $persub = "";
            }
        } else {
            $idmper = "";
            $permst = "";
            $persub = "";
        }

        echo json_encode(array("utama" => $permst, "sub" => $persub));
    }

    public function getPerusahaan()
    {
        // POST data
        $data = $this->input->post();
        $list = $this->prs->getPerusahaan($data);

        echo json_encode($list);
    }

    public function getidper()
    {
        $auth_per = htmlspecialchars($this->input->post("auth_per", true));
        $newData = array(
            'auth_per_sub' => $auth_per,
        );

        $this->session->set_userdata($newData);
        echo json_encode(array("statusCode" => 200, "kode_pesan" => "Berhasil", "pesan" => "Auth perusahaan berhasil disimpan", "tipe_pesan" => "error"));
    }

    public function getidperusahaan()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan_hcdata');
        $dtper = $this->prs->get_by_idper($id_perusahaan);

        if (!empty($dtper)) {
            foreach ($dtper as $list) {
                $auth_perusahaan = $list->auth_perusahaan;
            }

            echo json_encode([
                "statusCode" => 200,
                "prs" => $auth_perusahaan,
            ]);
        } else {
            echo json_encode([
                "statusCode" => 201,
                "prs" => "",
            ]);
        }
    }
}
