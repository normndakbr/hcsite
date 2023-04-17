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
               $row['auth_depart'] = $kry->auth_depart;
               $row['kd_depart'] = $kry->kd_depart;
               $row['depart'] = $kry->depart;
               $row['ket_depart'] = $kry->ket_depart;

               if ($kry->stat_depart == "T") {
                    $row['stat_depart'] = "<span class='btn btn-success btn-sm '> AKTIF </span>";
               } else {
                    $row['stat_depart'] = "<div class='btn btn-danger btn-sm'> NONAKTIF </div>";
               }

               $row['kode_perusahaan'] = $kry->kode_perusahaan;
               $row['tgl_buat'] = date('d-M-Y', strtotime($kry->tgl_buat));
               $row['tgl_edit'] = date('d-M-Y', strtotime($kry->tgl_edit));
               $row['proses'] = '<button id="' . $kry->auth_depart . '" class="btn btn-primary btn-sm font-weight-bold dtldepart" title="Detail" value="' . $kry->depart . '"> <i class="fas fa-asterisk"></i> </button> 
                    <button id="' . $kry->auth_depart . '" class="btn btn-warning btn-sm font-weight-bold edttdepart" title="Edit" value="' . $kry->depart . '"> <i class="fas fa-edit"></i> </button> 
                    <button id="' . $kry->auth_depart . '" class="btn btn-danger btn-sm font-weight-bold hpsdepart" title="Hapus" value="' . $kry->depart . '"> <i class="fas fa-trash-alt"></i> </button>';
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
