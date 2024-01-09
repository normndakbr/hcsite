<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    var $table = 'vw_karyawan';
    var $column_order = array(null, 'nama_lengkap', 'depart', 'section', 'posisi', 'tgl_buat', null); //set column field database for datatable orderable
    var $column_search = array('nama_lengkap', 'depart', 'section', 'posisi', 'tgl_buat',); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('nama_lengkap' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        if ($_POST['length'] != -1) {
            $this->_get_datatables_query();
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_alamat_by_id($id)
    {
        $this->db->from('vw_alamat_karyawan');
        $this->db->where('id_kary', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_kary', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function count_all_karyawan()
    {
        return $this->db->count_all_results('vw_karyawan');
    }

    public function count_all_user()
    {
        return $this->db->count_all_results('vw_user');
    }

    // input baru data personal karyawan
    public function input_dtPersonal($data)
    {
        $this->db->insert('tb_personal', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function input_dtKaryawan($data)
    {
        $this->db->insert('tb_karyawan', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_kode($id_perusahaan, $kd_depart)
    {
        $query = $this->db->get_where('tb_depart', ['kd_depart' => $kd_depart, 'id_perusahaan' => $id_perusahaan]);
        if (!empty($query->result())) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_noKTP($noKTP)
    {
        $query = $this->db->get_where('tb_personal', ['no_ktp' => $noKTP]);
        if (!empty($query->result())) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_depart($auth_depart)
    {
        $cek_id = $this->db->get_where('vw_depart', ['auth_depart' => $auth_depart]);
        if (!empty($cek_id->result())) {
            foreach ($cek_id->result() as $list) {
                $id_depart = $list->id_depart;
            }

            $this->db->delete('tb_depart', ['id_depart' => $id_depart]);
            if ($this->db->affected_rows() > 0) {
                return 200;
            } else {
                return 201;
            }
        } else {
            return 202;
        }
    }

    public function get_id_karyawan($auth_kary)
    {
        $query = $this->db->get_where('vw_karyawan', ['auth_karyawan' => $auth_kary])->result();

        if (!empty($query)) {
            foreach ($query as $list) {
                $id_karyawan = $list->id_kary;
            }

            return $id_karyawan;
        } else {
            return;
        }
    }

    public function get_id_personal_by_kary($auth_kary)
    {
        $query = $this->db->get_where('vw_kry', ['auth_karyawan' => $auth_kary])->result();

        if (!empty($query)) {
            foreach ($query as $list) {
                $id_personal = $list->id_personal;
            }

            return $id_personal;
        } else {
            return;
        }
    }

    function getKaryawan($postData)
    {
        $response = array();
        $auth_m_per = $postData['auth_m_per'];
        // $id_per = $this->prs->get_idp_by_auth($auth_m_per);
        if (isset($postData['search'])) {
            $records = $this->db->query("SELECT auth_karyawan, auth_m_perusahaan, no_ktp, no_nik, nama_lengkap, depart, posisi FROM vw_karyawan WHERE auth_m_perusahaan = '" . $auth_m_per .
                "' AND tgl_nonaktif is null AND (no_ktp LIKE '%" . $postData['search'] .
                "%' OR no_nik like '%" . $postData['search'] .
                "%' OR nama_lengkap like '%" . $postData['search'] . "%') ORDER BY nama_lengkap ASC")->result();
            foreach ($records as $row) {
                $response[] = array(
                    "value" => $row->auth_karyawan,
                    "ktp" => $row->no_ktp,
                    "nik" => $row->no_nik,
                    "nama" => $row->nama_lengkap,
                    "depart" => $row->depart,
                    "posisi" => $row->posisi,
                    "label" => $row->no_ktp . " | " . $row->no_nik . " | " . $row->nama_lengkap . " | " . $row->depart
                );
            }
        }
        return $response;
    }


    public function get_depart_id($auth_depart)
    {
        $query = $this->db->get_where('vw_depart', ['auth_depart' => $auth_depart]);
        return $query->result();
    }

    public function edit_depart($kd_depart, $depart, $ket_depart, $status)
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');
        $id_depart = $this->session->userdata('id_depart');

        $query = $this->db->query("SELECT * FROM tb_depart WHERE kd_depart='" . $kd_depart . "' AND id_perusahaan=" . $id_perusahaan . " AND id_depart <> " . $id_depart);
        if (!empty($query->result())) {
            return 203;
        }

        $query = $this->db->query("SELECT * FROM tb_depart WHERE depart='" . $depart . "' AND id_perusahaan=" . $id_perusahaan . " AND id_depart <> " . $id_depart);
        if (!empty($query->result())) {
            return 204;
        }

        $this->db->set('kd_depart', $kd_depart);
        $this->db->set('depart', $depart);
        $this->db->set('ket_depart', $ket_depart);
        $this->db->set('stat_depart', $status);
        $this->db->set('tgl_edit', date('Y-m-d H:i:s'));
        $this->db->where('id_depart', $id_depart);
        $this->db->update('tb_depart');
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 201;
        }
    }

    public function get_all()
    {
        return $this->db->get('vw_karyawan')->result();
    }

    public function get_by_idper($id_per)
    {
        $query = $this->db->get_where('vw_karyawan', ['id_perusahaan' => $id_per]);
        return $query->result();
    }

    public function get_by_authper($auth_per)
    {
        $query = $this->db->get_where('vw_karyawan', ['auth_perusahaan' => $auth_per]);
        return $query->result();
    }

    public function get_by_auth($auth_karyawan)
    {
        $this->db->from('vw_karyawan');
        $this->db->where('auth_karyawan', $auth_karyawan);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_auth_like($caridata)
    {

        $query = $this->db->query("SELECT * FROM vw_karyawan WHERE no_ktp like '%" . $caridata .
            "%' OR no_nik LIKE '%" . $caridata . "%' OR nama_lengkap like '%" . $caridata .
            "%' OR no_kk LIKE '%" . $caridata . "%'");

        return $query->result();
    }
}
