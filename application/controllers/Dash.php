<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash extends My_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->is_logout();
     }

     public function index()
     {

          $jml_user = $this->dsmod->count_all_user();
          $data['nama'] = $this->session->userdata("nama");
          $data['email'] = $this->session->userdata("email");
          $data['menu'] = $this->session->userdata("id_menu");
          $data['jml_link'] = $jml_user;
          $data['jml_user'] = $jml_user;
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/beranda', $data);
          $this->load->view('dashboard/modal/mdlform');
          $this->load->view('dashboard/template/footer', $data);
          $this->load->view('dashboard/code/all');
     }

     public function form_modal()
     {
          $this->load->view("dashboard/mdlform");
     }

     public function logout()
     {
          $this->session->unset_userdata('id_user');
          $this->session->unset_userdata('nama');
          $this->session->unset_userdata('email');
          $this->session->unset_userdata('auth_user');
          $this->session->unset_userdata('id_menu');
          redirect("login");
     }
}
