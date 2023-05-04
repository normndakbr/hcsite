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

     public function input_dtPersonal()
     {
          $this->form_validation->set_rules("noKTP", "noKTP", "required|trim", [
               'required' => 'No KTP wajib diisi'
          ]);
          $this->form_validation->set_rules("namaLengkap", "namaLengkap", "required|trim", [
               'required' => 'Nama lengkap wajib diisi',
          ]);
          $this->form_validation->set_rules("alamatEmail", "alamatEmail", "required|trim", [
               'required' => 'Alamat email wajib diisi',
          ]);
          $this->form_validation->set_rules("noTelp", "noTelp", "required|trim", [
               'required' => 'No telp wajib diisi',
          ]);
          $this->form_validation->set_rules("tempatLahir", "tempatLahir", "required|trim", [
               'required' => 'Tempat lahir wajib diisi',
          ]);
          $this->form_validation->set_rules("tanggalLahir", "tanggalLahir", "required|trim", [
               'required' => 'Tanggal lahir wajib diisi',
          ]);
          $this->form_validation->set_rules("kewarganegaraan", "kewarganegaraan", "required|trim", [
               'required' => 'Pilih data kewarganegaraan',
          ]);
          $this->form_validation->set_rules("agama", "agama", "required|trim", [
               'required' => 'Pilih data agama',
          ]);

          if ($this->form_validation->run() == false) {
               $error = [
                    'statusCode' => 202,
                    'noKTP' => form_error("noKTP"),
                    'namaLengkap' => form_error("namaLengkap"),
                    'noTelp' => form_error("noTelp"),
                    'tempatLahir' => form_error("tempatLahir"),
                    'tanggalLahir' => form_error("tanggalLahir"),
                    'kewarganegaraan' => form_error("kewarganegaraan"),
                    'agama' => form_error("agama"),
               ];

               echo json_encode($error);
               return;
          } else {
               $noKTP = htmlspecialchars($this->input->post("noKTP", true));
               $namaLengkap = htmlspecialchars($this->input->post("namaLengkap", true));
               $noTelp = htmlspecialchars($this->input->post("noTelp", true));
               $tempatLahir = htmlspecialchars($this->input->post("tempatLahir"));
               $tanggalLahir = htmlspecialchars($this->input->post("tanggalLahir"));
               $kewarganegaraan = htmlspecialchars($this->input->post("kewarganegaraan"));
               $agama = htmlspecialchars($this->input->post("agama"));

               $cekNoKTP = $this->kry->cek_noKTP($noKTP);
               if ($cekNoKTP) {
                    echo json_encode(array("statusCode" => 201, "pesan" => "No KTP sudah digunakan"));
                    return;
               }

               $data = [
                    'no_ktp' => $noKTP,
                    'no_kk' => "-",
                    'nama_lengkap' => $namaLengkap,
                    'nama_alias' => $namaLengkap,
                    'jk' => "-",
                    'tmp_lahir' => $tempatLahir,
                    'tgl_lahir' => $tanggalLahir,
                    'stat_kawin' => "-",
                    'agama' => $agama,
                    'warga_negara' => $kewarganegaraan,
                    'email_pribadi' => "-",
                    'hp_1' => $noTelp,
                    'hp_2' => "-",
                    'nama_ibu' => "-",
                    'stat_ibu' => "-",
                    'nama_ayah' => "-",
                    'stat_ayah' => "-",
                    'no_bpjstk' => "-",
                    'no_bpjskes' => "-",
                    'no_bpjspensiun' => "-",
                    'no_equity' => "-",
                    'no_npwp' => "-",
                    'tgl_buat' => date('Y-m-d H:i:s'),
                    'tgl_edit' => date('Y-m-d H:i:s'),
                    'id_user' => $this->session->userdata('id_user'),
               ];

               $dtPersonal = $this->kry->input_dtPersonal($data);
               if ($dtPersonal) {
                    echo json_encode(array("statusCode" => 200, "pesan" => "Data Personal Karyawan berhasil disimpan"));
               } else {
                    echo json_encode(array("statusCode" => 201, "pesan" => "Data Personal Karyawan gagal disimpan"));
               }
          }
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
