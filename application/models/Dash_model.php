<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dash_model extends CI_Model
{

     public function count_all_user()
     {
          return $this->db->count_all_results('vw_user');
     }

     public function count_all_karyawan()
     {
          return $this->db->get_where('vw_karyawan', ['tgl_nonaktif' => '1970-01-01'])->num_rows();
     }

     public function data_grafik_1()
     {
          return $this->db->get('vw_grafik1_1')->result();
     }

     public function data_grafik_2()
     {
          return $this->db->get('vw_grafik1_2')->result();
     }

     public function data_grafik_3()
     {
          return $this->db->get('vw_grafik1_3')->result();
     }

     public function get_data_grafik()
     {

          $sql = "SELECT DISTINCT kode_perusahaan FROM vw_m_perusahaan WHERE stat_m_perusahaan = 'T' ORDER BY id_perusahaan ASC";
          $query = $this->db->query($sql)->result();

          if (!empty($query)) {
               foreach ($query as $prs) {
                    $kode_perusahaan = $prs->kode_perusahaan;
                    $sql = "SELECT COUNT(tahun_doh) as bulan_now, id_perusahaan FROM vw_jml_karyawan WHERE kode_perusahaan = '" . $kode_perusahaan . "' AND tgl_nonaktif='1970-01-01'";
                    $query1 = $this->db->query($sql)->result();
                    foreach ($query1 as $list) {
                         $jml = $list->bulan_now;
                         $data[] = array("x" => $kode_perusahaan, "y" => $jml);
                    }
               }

               return json_encode($data);
          }
     }

     public function get_gender_grafik()
     {
          $sql = "SELECT DISTINCT jk FROM tb_personal";
          $query = $this->db->query($sql)->result();

          if (!empty($query)) {
               foreach ($query as $prs) {
                    $jk = $prs->jk;
                    if ($jk == "LK") {
                         $jkk = "LAKI-LAKI";
                    } else {
                         $jkk = "PEREMPUAN";
                    }
                    $sql = "SELECT COUNT(jk) as jenis_kelamin FROM vw_karyawan WHERE jk='" . $jk .
                         "' AND tgl_nonaktif='1970-01-01'";
                    $query1 = $this->db->query($sql)->result();
                    foreach ($query1 as $list) {
                         $jml = $list->jenis_kelamin;
                         $data[] = array("x" => $jkk, "y" => $jml);
                    }
               }

               return json_encode($data);
          }
     }

     public function get_lokasi_grafik()
     {
          $sql = "SELECT DISTINCT jenis_lokasi FROM tb_lokterima";
          $query = $this->db->query($sql)->result();

          if (!empty($query)) {
               foreach ($query as $prs) {
                    $jlok = $prs->jenis_lokasi;
                    $sql = "SELECT COUNT(jenis_lokasi) as jml_jlok FROM vw_karyawan WHERE jenis_lokasi='" . $jlok .
                         "' AND tgl_nonaktif='1970-01-01'";
                    $query1 = $this->db->query($sql)->result();
                    foreach ($query1 as $list) {
                         $jml = $list->jml_jlok;
                         $data[] = array("x" => $jlok, "y" => $jml);
                    }
               }

               return json_encode($data);
          }
     }

     public function get_klasifikasi_grafik()
     {
          $sql = "SELECT DISTINCT klasifikasi FROM tb_klasifikasi";
          $query = $this->db->query($sql)->result();

          if (!empty($query)) {
               foreach ($query as $prs) {
                    $kls = $prs->klasifikasi;
                    $sql = "SELECT COUNT(klasifikasi) as jml_kls FROM vw_karyawan WHERE klasifikasi='" . $kls .
                         "' AND tgl_nonaktif='1970-01-01'";
                    $query1 = $this->db->query($sql)->result();
                    foreach ($query1 as $list) {
                         $jml = $list->jml_kls;
                         $data[] = array("x" => $kls, "y" => $jml);
                    }
               }

               return json_encode($data);
          }
     }

     public function get_pendidikan_grafik()
     {
          $sql = "SELECT DISTINCT pendidikan FROM tb_pendidikan";
          $query = $this->db->query($sql)->result();

          if (!empty($query)) {
               foreach ($query as $prs) {
                    $didik = $prs->pendidikan;
                    $sql = "SELECT COUNT(pendidikan) as jml_didik FROM vw_karyawan WHERE pendidikan='" . $didik .
                         "' AND tgl_nonaktif='1970-01-01'";
                    $query1 = $this->db->query($sql)->result();
                    foreach ($query1 as $list) {
                         $jml = $list->jml_didik;
                         $data[] = array("x" => $didik, "y" => $jml);
                    }
               }

               return json_encode($data);
          }
     }

     public function get_residence_grafik()
     {
          $sql = "SELECT DISTINCT stat_tinggal FROM tb_stat_tinggal";
          $query = $this->db->query($sql)->result();

          if (!empty($query)) {
               foreach ($query as $prs) {
                    $sttgl = $prs->stat_tinggal;
                    $sql = "SELECT COUNT(stt_tinggal) as jml_sttinggal FROM vw_karyawan WHERE stt_tinggal='" . $sttgl .
                         "' AND tgl_nonaktif='1970-01-01'";
                    $query1 = $this->db->query($sql)->result();
                    foreach ($query1 as $list) {
                         $jml = $list->jml_sttinggal;
                         $data[] = array("x" => $sttgl, "y" => $jml);
                    }
               }

               return json_encode($data);
          }
     }

     public function get_sertifikasi_grafik()
     {
          $sql = "SELECT DISTINCT kode_jenis_sertifikasi FROM tb_jenis_sertifikasi";
          $query = $this->db->query($sql)->result();

          if (!empty($query)) {
               foreach ($query as $prs) {
                    $jsrt = $prs->kode_jenis_sertifikasi;
                    $sql = "SELECT COUNT(kode_jenis_sertifikasi) as jmlsrt FROM vw_sertifikasi WHERE kode_jenis_sertifikasi='" . $jsrt .
                         "' AND tgl_nonaktif='1970-01-01'";
                    $query1 = $this->db->query($sql)->result();
                    foreach ($query1 as $list) {
                         $jml = $list->jmlsrt;
                         $data[] = array("x" => $jsrt, "y" => $jml);
                    }
               }

               return json_encode($data);
          }
     }
}
