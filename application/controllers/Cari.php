<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_logout();
    }

    public function index()
    {
        $caridata = htmlspecialchars(trim($this->input->get('fdt', true)));

        $data['nama'] = $this->session->userdata("nama_main");
        $data['email'] = $this->session->userdata("email_main");
        $data['menu'] = $this->session->userdata("id_menu_main");
        $data["data_kry"] = $this->kry->get_by_auth_like($caridata);
        $data["textcari"] = $caridata;
        $this->load->view('dashboard/template/header', $data);
        $this->load->view('dashboard/cari/cari_tbl');
        $this->load->view('dashboard/template/footer', $data);
        $this->load->view('dashboard/code/cari');
    }

}