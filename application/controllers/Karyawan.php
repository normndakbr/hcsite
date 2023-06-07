<?php
defined('BASEPATH') or exit('No direct script access allowed');
/** @var \App\Models\karyawan $user **/

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
          $this->load->view('dashboard/code/karyawan_add');
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

     public function detail_karyawan($id_kary)
     {
          $data['nama'] = $this->session->userdata("nama");
          $data['email'] = $this->session->userdata("email");
          $data['menu'] = $this->session->userdata("id_menu");

          $data["data_kary"] = $this->kry->get_by_id($id_kary);
          // $data["alamat_kary"] = $this->kry->get_alamat_by_id($id_kary);

          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/karyawan/karyawan_detail', $data);
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/karyawan');
     }

     public function data_detail_karyawan($id_kary)
     {
          $list = $this->kry->get_by_id($id_kary);
          echo json_encode($list);
     }

     public function get_all_kab()
     {
          $list = $this->drh->get_all_kab();
          echo json_encode($list);
     }

     public function input_dtPersonal()
     {
          $this->form_validation->set_rules("addNoKTP", "addNoKTP", "required|trim|min_length[16]|max_length[16]", [
               'required' => 'Nomor KTP wajib diisi',
               'min_length' => 'Digit minimal nomor KTP adalah 16 digit',
               'max_length' => 'Digit maksimal nomor KTP adalah 16 digit',
          ]);
          $this->form_validation->set_rules("addNamaLengkap", "addNamaLengkap", "required|trim", [
               'required' => 'Nama lengkap wajib diisi',
          ]);
          $this->form_validation->set_rules("addAlamatEmail", "addAlamatEmail", "required|trim", [
               'required' => 'Alamat email wajib diisi',
          ]);
          $this->form_validation->set_rules("addNoTelp", "addNoTelp", "required|trim|min_length[11]|max_length[12]", [
               'required' => 'Nomor telepon wajib diisi',
               'min_length' => 'Digit minimal no. telp adalah 12 digit',
               'max_length' => 'Digit maksumal no. telp adalah 11 digit',
          ]);
          $this->form_validation->set_rules("addTempatLahir", "addTempatLahir", "required|trim", [
               'required' => 'Tempat lahir wajib dipilih',
          ]);
          $this->form_validation->set_rules("addTanggalLahir", "addTanggalLahir", "required|trim", [
               'required' => 'Tanggal lahir wajib diisi',
          ]);
          $this->form_validation->set_rules("addStatPernikahan", "addStatPernikahan", "required|trim", [
               'required' => 'Status pernikahan wajib dipilih',
          ]);
          $this->form_validation->set_rules("addNoKK", "addNoKK", "required|trim|min_length[16]|max_length[16]", [
               'required' => 'Nomor Kartu Keluarga wajib diisi',
               'min_length' => 'Digit minimal nomor KK adalah 16 digit',
               'max_length' => 'Digit maksimal nomor KK adalah 16 digit',
          ]);
          $this->form_validation->set_rules("addNamaIbu", "addNamaIbu", "required|trim", [
               'required' => 'Nama Ibu wajib diisi',
          ]);
          $this->form_validation->set_rules("addKewarganegaraan", "addKewarganegaraan", "required|trim", [
               'required' => 'Status kewarganegaraan wajib dipilih',
          ]);
          $this->form_validation->set_rules("addAgama", "addAgama", "required|trim", [
               'required' => 'Agama wajib dipilih',
          ]);
          $this->form_validation->set_rules("addJenisKelamin", "addJenisKelamin", "required|trim", [
               'required' => 'Jenis kelamin wajib dipilih',
          ]);
          $this->form_validation->set_rules("addKodeBank", "addKodeBank", "required|trim", [
               'required' => 'Kode bank wajib dipilih',
          ]);
          $this->form_validation->set_rules("addNoRek", "addNoRek", "required|trim", [
               'required' => 'Nomor rekening wajib diisi',
          ]);
          $this->form_validation->set_rules("addNoNPWP", "addNoNPWP", "required|trim", [
               'required' => 'Nomor NPWP wajib diisi',
          ]);
          $this->form_validation->set_rules("addNoBPJSTK", "addNoBPJSTK", "required|trim", [
               'required' => 'Nomor BPJS Tenaga Kerja wajib diisi',
          ]);
          $this->form_validation->set_rules("addNoBPJSKES", "addNoBPJSKES", "required|trim", [
               'required' => 'Nomor BPJS Kesehatan wajib diisi',
          ]);
          $this->form_validation->set_rules("addNoBPJSPensiun", "addNoBPJSPensiun", "required|trim", [
               'required' => 'Nomor BPJS Pensiun wajib diisi',
          ]);
          $this->form_validation->set_rules("addNoEquity", "addNoEquity", "required|trim", [
               'required' => 'Nomor Equity wajib diisi',
          ]);
          $this->form_validation->set_rules("addPendidikanTerakhir", "addPendidikanTerakhir", "required|trim", [
               'required' => 'Data pendidikan terakhir wajib diisi',
          ]);
          $this->form_validation->set_rules("addInstansiPendidikan", "addInstansiPendidikan", "required|trim", [
               'required' => 'Data instansi pendidikan terakhir wajib diisi',
          ]);
          $this->form_validation->set_rules("addFakultas", "addFakultas", "required|trim", [
               'required' => 'Data Fakultas wajib diisi',
          ]);
          $this->form_validation->set_rules("addJurusan", "addJurusan", "required|trim", [
               'required' => 'Jurusan wajib diisi',
          ]);


          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 400,
                    'pesan' => 'Terjadi kesalahan saat input data personal, periksa kembali data input.',
                    'addNoKTP' => form_error("addNoKTP"),
                    'addNamaLengkap' => form_error("addNamaLengkap"),
                    'addAlamatEmail' => form_error("addAlamatEmail"),
                    'addNoTelp' => form_error("addNoTelp"),
                    'addTempatLahir' => form_error("addTempatLahir"),
                    'addTanggalLahir' => form_error("addTanggalLahir"),
                    'addStatPernikahan' => form_error("addStatPernikahan"),
                    'addNoKK' => form_error("addNoKK"),
                    'addNamaIbu' => form_error("addNamaIbu"),
                    'addKewarganegaraan' => form_error("addKewarganegaraan"),
                    'addAgama' => form_error("addAgama"),
                    'addJenisKelamin' => form_error("addJenisKelamin"),
                    'addKodeBank' => form_error("addKodeBank"),
                    'addNoRek' => form_error("addNoRek"),
                    'addNoNPWP' => form_error("addNoNPWP"),
                    'addNoBPJSTK' => form_error("addNoBPJSTK"),
                    'addNoBPJSKES' => form_error("addNoBPJSKES"),
                    'addNoBPJSPensiun' => form_error("addNoBPJSPensiun"),
                    'addNoEquity' => form_error("addNoEquity"),
                    'addPendidikanTerakhir' => form_error("addPendidikanTerakhir"),
                    'addInstansiPendidikan' => form_error("addInstansiPendidikan"),
                    'addFakultas' => form_error("addFakultas"),
                    'addJurusan' => form_error("addJurusan"),
               ];

               echo json_encode($error);
               return;
          } else {
               $addNoKTP = htmlspecialchars($this->input->post("addNoKTP"));
               $addNoKK = htmlspecialchars($this->input->post("addNoKK"));
               $addNamaLengkap = htmlspecialchars($this->input->post("addNamaLengkap"));
               // nama_alias
               $addJenisKelamin = htmlspecialchars($this->input->post("addJenisKelamin"));
               $addTempatLahir = htmlspecialchars($this->input->post("addTempatLahir"));
               $addTanggalLahir = htmlspecialchars($this->input->post("addTanggalLahir"));
               $addStatPernikahan = htmlspecialchars($this->input->post("addStatPernikahan"));
               $addAgama = htmlspecialchars($this->input->post("addAgama"));
               $addKewarganegaraan = htmlspecialchars($this->input->post("addKewarganegaraan"));
               $addAlamatEmail = htmlspecialchars($this->input->post("addAlamatEmail"));
               $addNoTelp = htmlspecialchars($this->input->post("addNoTelp"));
               // hp_2
               $addNamaIbu = htmlspecialchars($this->input->post("addNamaIbu"));
               // stat_ibu
               // nama_ayah
               // stat_ayah
               $addNoBPJSTK = htmlspecialchars($this->input->post("addNoBPJSTK"));
               $addNoBPJSKES = htmlspecialchars($this->input->post("addNoBPJSKES"));
               $addNoBPJSPensiun = htmlspecialchars($this->input->post("addNoBPJSPensiun"));
               $addNoEquity = htmlspecialchars($this->input->post("addNoEquity"));
               $addNoNPWP = htmlspecialchars($this->input->post("addNoNPWP"));
               $addKodeBank = htmlspecialchars($this->input->post("addKodeBank"));
               $addNoRek = htmlspecialchars($this->input->post("addNoRek"));
               $addPendidikanTerakhir = htmlspecialchars($this->input->post("addPendidikanTerakhir"));
               $addInstansiPendidikan = htmlspecialchars($this->input->post("addInstansiPendidikan"));
               $addFakultas = htmlspecialchars($this->input->post("addFakultas"));
               $addJurusan = htmlspecialchars($this->input->post("addJurusan"));

               // $cekNoKTP = $this->kry->cek_noKTP($noKTP);
               // if ($cekNoKTP) {
               //      echo json_encode(array("statusCode" => 201, "pesan" => "No KTP sudah digunakan"));
               //      return;
               // }

               $data = [
                    'no_ktp' => $addNoKTP,
                    'no_kk' => "$addNoKK",
                    'nama_lengkap' => $addNamaLengkap,
                    'nama_alias' => $addNamaLengkap,
                    'jk' => $addJenisKelamin,
                    'tmp_lahir' => $addTempatLahir,
                    'tgl_lahir' => $addTanggalLahir,
                    'stat_kawin' => $addStatPernikahan,
                    'agama' => $addAgama,
                    'warga_negara' => $addKewarganegaraan,
                    'email_pribadi' => $addAlamatEmail,
                    'hp_1' => $addNoTelp,
                    'hp_2' => "-",
                    'nama_ibu' => $addNamaIbu,
                    'stat_ibu' => "-",
                    'nama_ayah' => "-",
                    'stat_ayah' => "-",
                    'no_bpjstk' => $addNoBPJSTK,
                    'no_bpjskes' => $addNoBPJSKES,
                    'no_bpjspensiun' => $addNoBPJSPensiun,
                    'no_equity' => $addNoEquity,
                    'no_npwp' => $addNoNPWP,
                    'tgl_buat' => date('Y-m-d H:i:s'),
                    'tgl_edit' => date('Y-m-d H:i:s'),
                    'id_user' => $this->session->userdata('id_user'),
               ];

               $dtPersonal = $this->kry->input_dtPersonal($data);
               if ($dtPersonal) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Data personal berhasil disimpan"));
               } else {
                    echo json_encode(array("statusCode" => 406, "pesan" => "Terjadi kesalahan, data personal gagal disimpan"));
               }
          }
     }

     public function get_id_perusahaan($auth_perusahaan)
     {
          $id_perusahaan = $this->prs->get_by_auth($auth_perusahaan);
          $_SESSION["addPerKary"] = $id_perusahaan;
          echo json_encode($id_perusahaan);
     }

     // fetch data karyawan
     public function ajax_list()
     {
          $list = $this->kry->get_datatables();
          $data = array();
          $no = 0;
          foreach ($list as $kry) {
               $no++;
               $row = array();
               $row['no'] = $no;
               $row['id_kary'] = $kry->id_kary;
               $row['no_acr'] = $kry->no_acr;
               $row['nama_lengkap'] = $kry->nama_lengkap;
               $row['depart'] = $kry->depart;
               $row['section'] = $kry->section;
               $row['kode_perusahaan'] = $kry->kode_perusahaan;
               $row['posisi'] = $kry->posisi;

               $row['tgl_buat'] = date('d-M-Y', strtotime($kry->tgl_buat));
               $row['proses'] = '
                    <a href="' . base_url('karyawan/detail_karyawan/' . $kry->id_kary) . '" id="detailKaryawan" class="btn btn-primary btn-sm font-weight-bold detailKaryawan" title="Detail" value="' . $kry->nama_lengkap . '"> <i class="fas fa-asterisk"></i> </a> 
                    <button id="' . $kry->auth_karyawan . '" class="btn btn-warning btn-sm font-weight-bold edttKaryawan" title="Edit" value="' . $kry->nama_lengkap . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $kry->auth_karyawan . '" class="btn btn-danger btn-sm font-weight-bold hpsKaryawan" title="Hapus" value="' . $kry->nama_lengkap . '"> <i class="fas fa-trash-alt"></i> </button>';
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
}
