<?php

class My_Controller extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model("login_model", "lgn");
          $this->load->model('depart_model', 'dprt');
          $this->load->model('section_model', 'sctn');
          $this->load->model('posisi_model', 'pss');
          $this->load->model('level_model', 'lvl');
          $this->load->model('grade_model', 'grd');
          $this->load->model('tipe_model', 'tpe');
          $this->load->model('perjanjian_model', 'janji');
          $this->load->model('bank_model', 'bnk');
          $this->load->model('sanksi_model', 'snk');
          $this->load->model('roster_model', 'rst');
          $this->load->model('lokker_model', 'lkr');
          $this->load->model('lokterima_model', 'lkt');
          $this->load->model('poh_model', 'pho');
          $this->load->model('dash_model', 'dsmod');
          $this->load->model('User_model', 'usr');
          $this->load->model('perusahaan_model', 'prs');
          $this->load->helper('url', 'form');
          $this->load->library("form_validation");
          $this->load->library('session');
     }

     public function is_logout()
     {
          if ($this->session->userdata("email") == "") {
               header("location: http://localhost:8080/hcsite");
          }
     }

     public function is_login()
     {
          if ($this->session->userdata("email") != "") {
               header("location: http://localhost:8080/hcsite/dash");
          }
     }
}
