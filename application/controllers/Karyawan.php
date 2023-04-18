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

          // echo json_encode($data["data_kary"]);
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/karyawan/karyawan_detail', $data);
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/karyawan');
     }

     public function test_get_by_id($id_kary)
     {
          $data["data_kary"] = $this->kry->get_by_id($id_kary);
          echo json_encode($data["data_kary"]);
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

     public function data_detail_karyawan()
     {
          // $data = $this->uri->segment(1);
          $list = $this->kry->get_by_id($id_kary);
          echo json_encode($list);
          // $data = array();
          // $no = 0;
          // foreach ($list as $kry) {
          //      $no++;
          //      $row = array();
          //      $row['no'] = $no;
          //      $row['id_kary'] = $kry->id_kary;
          //      $row['no_acr'] = $kry->no_acr;
          //      $row['nama_lengkap'] = $kry->nama_lengkap;
          //      $row['depart'] = $kry->depart;
          //      $row['section'] = $kry->section;
          //      $row['posisi'] = $kry->posisi;

          //      $row['tgl_buat'] = date('d-M-Y', strtotime($kry->tgl_buat));
          //      $row['proses'] = '
          //           <a href="' . base_url('karyawan/detail_karyawan') . '" id="' . $kry->auth_karyawan . '" class="btn btn-primary btn-sm font-weight-bold dtlKaryawan" title="Detail" value="' . $kry->nama_lengkap . '"> <i class="fas fa-asterisk"></i> </a> 
          //           <button id="' . $kry->auth_karyawan . '" class="btn btn-warning btn-sm font-weight-bold edttKaryawan" title="Edit" value="' . $kry->nama_lengkap . '"> <i class="fas fa-edit"></i> </button> 
          //           <button id="' . $kry->auth_karyawan . '" class="btn btn-danger btn-sm font-weight-bold hpsKaryawan" title="Hapus" value="' . $kry->nama_lengkap . '"> <i class="fas fa-trash-alt"></i> </button>';
          //      $data[] = $row;
          // }

          // $output = array(
          //      "draw" => $_POST['draw'],
          //      "recordsTotal" => $this->kry->count_all(),
          //      "recordsFiltered" => $this->kry->count_filtered(),
          //      "data" => $data,
          // );
          //output to json format
          // echo json_encode($output);
     }
}
