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
        $id_perusahaan = $this->session->userdata("id_perusahaan_main");
        $data['nama_per'] = $this->prs->get_per_by_id($id_perusahaan);
        $data['nama'] = $this->session->userdata("nama_main");
        $data['email'] = $this->session->userdata("email_main");
        $data['menu'] = $this->session->userdata("id_menu_main");
        $data['get_menu'] = $this->dsmod->get_menu();
        $this->load->view('karyawan/view', $data);
    }

    public function tambah_karyawan()
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
        $id_perusahaan = $this->session->userdata("id_perusahaan_main");
        $data['nama_per'] = $this->prs->get_per_by_id($id_perusahaan);
        $data['nama'] = $this->session->userdata("nama_main");
        $data['email'] = $this->session->userdata("email_main");
        $data['menu'] = $this->session->userdata("id_menu_main");
        $data['get_menu'] = $this->dsmod->get_menu();
        $this->load->view('karyawan/create', $data);
    }

    public function ajax_list()
    {
        $auth = htmlspecialchars($this->input->get("authtoken", true));
        $cekauth = $this->cek_auth($auth);

        if ($cekauth == 501) {
            $output = array(
                "draw" => '',
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => '',
                "pesan" => "Autentikasi tidak valid, refresh data",

            );

            echo json_encode($output);
        } else {
            $ck = $this->input->get("ck");
            $auth_m_per = $this->input->get("auth_m_per");
            $list = $this->kry->get_datatables($auth_m_per, $ck);
            $data = array();
            $no = 0;
            foreach ($list as $kry) {
                $no++;
                $row = array();
                $row['no'] = $no;
                $row['id_kary'] = $kry->id_kary;
                $row['no_ktp'] = $kry->no_ktp;
                $row['no_acr'] = $kry->no_acr;
                $row['no_nik'] = $kry->no_nik;
                $row['nama_lengkap'] = $kry->nama_lengkap;
                $row['depart'] = $kry->depart;
                $row['kode_perusahaan'] = $kry->kode_perusahaan;

                $kd_per = $this->prs->get_kode_per_by_parent($kry->id_m_perusahaan);
                if (!empty($kd_per)) {
                    $row['kode_m_perusahaan'] = $kry->kode_perusahaan . " | " . $kd_per;
                } else {
                    $row['kode_m_perusahaan'] = $kry->kode_perusahaan . " | - ";
                }

                $row['posisi'] = $kry->posisi;
                if ($kry->tgl_nonaktif == null) {
                    $row['stat_aktif'] = '<span class="btn btn-success btn-sm" style="cursor:text;">AKTIF</span>';
                } else {
                    $row['stat_aktif'] = '<span class="btn btn-danger btn-sm" style="cursor:text;">NONAKTIF</span>';
                }

                $row['tgl_buat'] = date('d-M-Y', strtotime($kry->tgl_buat));
                $row['proses'] = '<a href="' . base_url('detail_karyawan/') . $kry->auth_karyawan . '" class="btn btn-sm btn-info tooltips" id="' . $kry->auth_karyawan . '" title="Detail Data" target="_blank"><i class="feather icon-info"></i></a>
                    <a href="' . base_url('view_update_karyawan/') . $kry->auth_karyawan . '" class="btn btn-sm btn-success tooltips" id="' . $kry->auth_karyawan . '" title="Edit Data" target="_blank"><i class="feather icon-edit"></i></a>
                    <button class="btn btn-sm btn-danger btnHapusKary tooltips" id="' . $kry->auth_karyawan . '" title="Hapus Data" value="' . $kry->nama_lengkap . '"><i class="feather icon-trash-2"></i></button>
                    <button class="btn btn-sm btn-primary tooltips" title="Opsi Lainnya" data-toggle="modal" data-target="#opsi' . $kry->auth_karyawan . '"><i class="feather icon-more-horizontal"></i></button>
                    <div class="modal fade" id="opsi' . $kry->auth_karyawan . '" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title">Opsi Lainnya</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                   </div>
                                   <div class="modal-body">
                                   <button class="btn btn-sm btn-success btnSIMPER" id="' . $kry->auth_karyawan . '">SIMPER/Mine Permit</button>&nbsp;
                                   <button class="btn btn-sm btn-success btnSertifikasi" id="' . $kry->auth_karyawan . '">Sertifikasi</button>&nbsp;
                                   <button class="btn btn-sm btn-success btnMCU" id="' . $kry->auth_karyawan . '">MCU</button>&nbsp;
                                   <button class="btn btn-sm btn-success btnFilePendukung" id="' . $kry->auth_karyawan . '">File Pendukung</button>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                                   </div>
                              </div>
                         </div>
                    </div>';

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->kry->count_all(),
                "recordsFiltered" => $this->kry->count_filtered($auth_m_per, $ck),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }

    public function verifikasi_ktp()
    {
        $noktp = htmlspecialchars($this->input->post("ktpValue", true));
        $dtperson = $this->kry->verifikasi_ktp($noktp);

        if (empty($dtperson)) {
            echo json_encode(array(
                "statusCode" => 200,
                "pesan" => "Data personal dengan No. KTP : " . $noktp . ", belum ada, silahkan lengkapi data selanjutnya",
                "auth_personal" => "",
            ));
            return;
        } else {
            if ($dtperson->tgl_nonaktif == null) {
                $dtkary = $this->kry->get_karyawan_by_ktp($noktp);
                if (!empty($dtkary)) {
                    $data = [
                        "statusCode" => 201,
                        "pesan" => 'Proses tidak dapat dilanjutkan, Data karyawan :',
                        "no_ktp" => $dtkary->no_ktp,
                        "nama_lengkap" => $dtkary->nama_lengkap,
                        "tgl_nonaktif" => date('d-M-Y', strtotime($dtkary->tgl_nonaktif)),
                        "lama_nonaktif" => "0 Hari",
                        "perusahaan" => $dtkary->nama_perusahaan,
                        "status" => 'AKTIF',
                    ];
                } else {
                    $data = [
                        "statusCode" => 200,
                        "pesan" => "Data Karyawan dengan No. KTP : " . $noktp . ", belum ada, silahkan lengkapi data selanjutnya",
                        "auth_personal" => "",
                    ];
                }

                echo json_encode($data);
                return;
            } else {
                $tgl_nonaktif = strtotime(date('Y-m-d', strtotime($dtperson->tgl_nonaktif)));
                $tgl_Sekarang = strtotime(date('Y-m-d'));
                $jarak = $tgl_Sekarang - $tgl_nonaktif;
                $hari = $jarak / 60 / 60 / 24;

                if ($hari > 90) {
                    $dtpersonal = $this->kry->get_personal_by_ktp($noktp);
                    if (!empty($dtpersonal)) {
                        $dtalamat = $this->kry->get_alamat_by_id_person($dtpersonal->id_personal);
                        if (!empty($dtalamat)) {
                            foreach ($dtalamat as $ls) {
                                $alamat = $ls->alamat_ktp;
                                $prov = $ls->prov_ktp;
                                $kab = $ls->kab_ktp;
                                $kec = $ls->kec_ktp;
                                $kel = $ls->kel_ktp;
                                $rt = $ls->rt_ktp;
                                $rw = $ls->rw_ktp;
                                $auth_alamat = $ls->auth_alamat;
                            }
                        } else {
                            $alamat = '';
                            $prov = '';
                            $kab = '';
                            $kec = '';
                            $kel = '';
                            $rt = '';
                            $rw = '';
                            $auth_alamat = '';
                        }

                        $data = [
                            "statusCode" => 202,
                            "pesan" => 'Data berhasil ditemukan',
                            "auth_personal" => $dtpersonal->auth_personal,
                            "auth_alamat" => $auth_alamat,
                            "no_ktp" => $dtpersonal->no_ktp,
                            "nama" => $dtpersonal->nama_lengkap,
                            "alamat" => $alamat,
                            "rt" => $rt,
                            "rw" => $rw,
                            "kel" => $kel,
                            "kec" => $kec,
                            "kab" => $kab,
                            "prov" => $prov,
                            "warga_negara" => $dtpersonal->warga_negara,
                            "agama" => $dtpersonal->id_agama,
                            "jk" => $dtpersonal->jk,
                            "stat_nikah" => $dtpersonal->id_stat_nikah,
                            "tmp_lahir" => $dtpersonal->tmp_lahir,
                            "tgl_lahir" => $dtpersonal->tgl_lahir,
                            "bpjs_tk" => $dtpersonal->no_bpjstk,
                            "bpjs_ks" => $dtpersonal->no_bpjstk,
                            "npwp" => $dtpersonal->no_npwp,
                            "no_kk" => $dtpersonal->no_kk,
                            "email_pribadi" => $dtpersonal->email_pribadi,
                            "no_telp" => $dtpersonal->hp_1,
                            "didik_terakhir" => $dtpersonal->id_pendidikan,
                        ];
                    } else {
                        $data = [
                            "statusCode" => 201,
                            "auth_personal" => 'Data personal tidak ditemukan',
                        ];
                    }

                    echo json_encode($data);
                    return;
                } else {
                    $dtkary = $this->kry->get_karyawan_by_ktp($noktp);
                    if (!empty($dtkary)) {
                        $data = [
                            "statusCode" => 201,
                            "pesan" => 'Proses tidak dapat dilanjutkan, Data karyawan :',
                            "no_ktp" => $dtkary->no_ktp,
                            "nama_lengkap" => $dtkary->nama_lengkap,
                            "tgl_nonaktif" => date('d-M-Y', strtotime($dtkary->tgl_nonaktif)),
                            "lama_nonaktif" => $hari . " Hari",
                            "perusahaan" => $dtkary->nama_perusahaan,
                            "status" => 'NONAKTIF',
                        ];
                    }

                    echo json_encode($data);
                    return;
                }
            }
        }
    }
}
