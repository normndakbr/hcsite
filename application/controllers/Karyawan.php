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
          $no = 0;
          foreach ($list as $kry) {
               $no++;
               $row = array();
               $row['no'] = $no;
               $row['no_acr'] = $kry->no_acr;
               $row['nama_lengkap'] = $kry->nama_lengkap;
               $row['depart'] = $kry->depart;
               $row['section'] = $kry->section;
               $row['posisi'] = $kry->posisi;

               $row['tgl_buat'] = date('d-M-Y', strtotime($kry->tgl_buat));
               $row['proses'] = '<button id="' . $kry->auth_karyawan . '" class="btn btn-primary btn-sm font-weight-bold dtldepart" title="Detail" value="' . $kry->nama_lengkap . '"> <i class="fas fa-asterisk"></i> </button> 
                    <button id="' . $kry->auth_karyawan . '" class="btn btn-warning btn-sm font-weight-bold edttdepart" title="Edit" value="' . $kry->nama_lengkap . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $kry->auth_karyawan . '" class="btn btn-danger btn-sm font-weight-bold hpsdepart" title="Hapus" value="' . $kry->nama_lengkap . '"> <i class="fas fa-trash-alt"></i> </button>';
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
