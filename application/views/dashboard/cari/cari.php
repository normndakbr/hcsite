<div class="pcoded-main-container">
     <div class="pcoded-content">
          <div class="page-header">
               <div class="page-block">
                    <div class="row align-items-center">
                         <div class="col-md-12">
                              <div class="page-header-title">
                                   <h5 class="m-b-10">Pencarian Data</h5>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="col-xl-12 col-md-12">
                    <div class="card latest-update-card">
                         <div class="card-header">
                              <h5>Pencarian Data </h5>
                              <div class="card-header-right">
                                   <div class="btn-group card-option">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                             aria-haspopup="true" aria-expanded="false">
                                             <i class="feather icon-more-horizontal"></i>
                                        </button>
                                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                             <li class="dropdown-item full-card">
                                                  <a href="#!"><span><i class="feather icon-maximize"></i>
                                                            Perbesar</span><span style="display: none"><i
                                                                 class="feather icon-minimize"></i> Restore</span></a>
                                             </li>
                                             <li class="dropdown-item minimize-card">
                                                  <a href="#!"><span><i class="feather icon-minus"></i>
                                                            collapse</span><span style="display: none"><i
                                                                 class="feather icon-plus"></i> expand</span></a>
                                             </li>
                                             <li class="dropdown-item reload-card">
                                                  <a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="tab-content" id="v-pills-tabContent">
                                             <div class="tab-pane fade active show" id="v-pills-dtPersonal"
                                                  role="tabpanel" aria-labelledby="v-pills-dtPersonal-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                                            <div class="m-b-25">
                                                                 <img style="border: 10px solid #3c3c3c;"
                                                                      src="<?=isset($data_kary->url_foto) ? $data_kary->id_perusahaan == 1 ? base_url() . 'berkas/foto/1/' . $data_kary->url_foto : base_url() . 'berkas/karyawan/' . md5($data_kary->id_personal) . "/" . $data_kary->url_foto : base_url() . 'berkas/pasphoto/pasphoto.jpg';?>"
                                                                      width="200" height="200" class="img-radius"
                                                                      alt="User-Profile-Image">
                                                            </div>
                                                       </div>
                                                       <div
                                                            class="col-lg-7 col-md-7 col-sm-12 d-flex-row justify-content-center align-items-center">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                      <h6>No. KTP</h6>
                                                                      <input type="text" class="form-control"
                                                                           value="<?=isset($data_kary->no_ktp) ? $data_kary->no_ktp : '-'?>"
                                                                           style="background-color:transparent;margin-top:-10px;"
                                                                           disabled>
                                                                 </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                      <h6>Nama Lengkap</h6>
                                                                      <input type="text" class="form-control"
                                                                           value="<?=isset($data_kary->nama_lengkap) ? $data_kary->nama_lengkap : '-'?>"
                                                                           style="background-color:transparent;margin-top:-10px;"
                                                                           disabled>
                                                                 </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                      <h6>Tempat & Tanggal Lahir</h6>
                                                                      <input type="text" class="form-control"
                                                                           value="<?=(isset($data_kary->tmp_lahir) ? $data_kary->tmp_lahir : '-') . ", " . ($data_kary->tgl_lahir == "1970-01-01" ? '' : date('d-M-Y', strtotime($data_kary->tgl_lahir)))?>"
                                                                           style="background-color:transparent;margin-top:-10px;"
                                                                           disabled>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Alamat</h6>
                                                                 <textarea type="text" class="form-control"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled><?=$data_alamat?></textarea>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Agama</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->agama) ? $data_kary->agama : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Jenis Kelamin</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->jk) ? (($data_kary->jk == 'LK') ? "LAKI-LAKI" : "PEREMPUAN") : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Status Pernikahan</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->kode_stat_nikah) ? $data_kary->kode_stat_nikah : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Kewarganegaraan</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->warga_negara) ? $data_kary->warga_negara : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>No. KK</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->no_kk) ? $data_kary->no_kk : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>No. BPJS Tenaga Kerja</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->no_bpjstk) ? $data_kary->no_bpjstk : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>No. BPJS Kesehatan</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->no_bpjskes) ? $data_kary->no_bpjstk : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>No. NPWP</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->no_npwp) ? $data_kary->no_npwp : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="v-pills-dtKaryawan" role="tabpanel"
                                                  aria-labelledby="v-pills-dtKaryawan-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Nama Perusahaan</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->nama_perusahaan) ? $data_kary->nama_perusahaan : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>NIK</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->no_nik) ? $data_kary->no_nik : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Departemen</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->depart) ? $data_kary->depart : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Posisi</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->posisi) ? $data_kary->posisi : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Klasifikasi</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->klasifikasi) ? $data_kary->klasifikasi : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Tipe</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->tipe) ? $data_kary->tipe : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Level</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=(isset($data_kary->level) ? $data_kary->level : '-')?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Point of Hire</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->poh) ? $data_kary->poh : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Lokasi Penerimaan</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->lokterima) ? $data_kary->lokterima : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Lokasi Kerja</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->lokker) ? $data_kary->lokker : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Email Perusahaan</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->email_kantor) ? $data_kary->email_kantor : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Date of Hire</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=date('d-M-Y', strtotime($data_kary->doh))?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Tgl. Aktif</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=date('d-M-Y', strtotime($data_kary->tgl_aktif))?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Status Residence</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kary->stat_tinggal) ? ($data_kary->stat_tinggal == "R" ? "Residence" : "Non Residence") : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Status Karyawan</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=isset($data_kontrak->stat_perjanjian) ? $data_kontrak->stat_perjanjian : '-'?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>

                                                       <?php
if (isset($data_kontrak->stat_waktu)) {
    if ($data_kontrak->stat_waktu == "T") {
        echo '<div class="col-lg-3 col-md-3 col-sm-12">';
        echo '<div class="form-group">';
        echo '<h6>Tgl. Awal ' . $data_kontrak->stat_perjanjian . '</h6>';
        echo '<input type="text" class="form-control" value="' . date('d-M-Y', strtotime($data_kontrak->tgl_mulai)) . '" style="background-color:transparent;margin-top:-10px;" disabled>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-3 col-md-3 col-sm-12 ">';
        echo '<div class="form-group">';
        echo '<h6>Tgl. Akhir ' . $data_kontrak->stat_perjanjian . '</h6>';
        echo '<input type="text" class="form-control" value="' . date('d-M-Y', strtotime($data_kontrak->tgl_akhir)) . '" style="background-color:transparent;margin-top:-10px;" disabled>';
        echo '</div>';
        echo '</div>';
    } else if ($data_kontrak->stat_waktu == "F") {
        echo '<div class="col-lg-3 col-md-3 col-sm-12">';
        echo '<div class="form-group">';
        echo '<h6>Tgl. Permanen</h6>';
        echo '<input type="text" class="form-control"value="' . date('d-M-Y', strtotime($data_kontrak->tgl_mulai)) . '" style="background-color:transparent;margin-top:-10px;" disabled>';
        echo '</div>';
        echo '</div>';
    }
}

?>

                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="v-pills-dtSIMPER" role="tabpanel"
                                                  aria-labelledby="v-pills-dtSIMPER-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <table id="tbmSertifikasiDetail"
                                                                      class="table table-striped table-bordered table-hover text-black text-nowrap"
                                                                      style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                                                      <thead>
                                                                           <tr>
                                                                                <th
                                                                                     style="text-align:center;width: 1%;">
                                                                                     NO.</th>
                                                                                <th style="width: 55%;">JENIS IZIN</th>
                                                                                <th style="width: 19%;">NO. REGISTRASI
                                                                                </th>
                                                                                <th style="width: 10%;">TGL. EXPIRED
                                                                                </th>
                                                                                <th style="width: 5%;">PROSES</th>
                                                                           </tr>
                                                                      </thead>sss
                                                                      <tbody>
                                                                           <?php
$no = 1;
if (!empty($data_izin)) {
    foreach ($data_izin as $list) {
        echo '<tr>';
        echo '<td class="align-middle" style="text-align:center;width: 1%;">' . $no++ . '</td>';
        echo '<td class="align-middle" style="width: 60%;">' . $list->jenis_izin_tambang . '</td>';
        echo '<td class="align-middle" style="width: 19%;">' . $list->no_reg . '</td>';
        echo '<td class="align-middle" style="width: 10%;">' . date('d-M-Y', strtotime($list->tgl_expired)) . '</td>';
        echo '<td style="text-align:center;">';
        echo '<button id="' . $list->auth_izin_tambang . '" class="btn btn-primary btn-sm text-white" title="Detail"><i class="fas fa-asterisk"></i></button> ';
        if ($list->url_izin_tambang != "") {
            if ($list->id_jenis_izin_tambang == 2) {
                echo '<a href ="' . base_url('karyawan/berkassim/') . $list->auth_izin_tambang . '" target="_blank" class="btn btn-success btn-sm text-white" title="Tampilkan SIM"><i class="fas fa-id-badge"></i></a> ';
            }
            echo '<a href ="' . base_url('karyawan/berkasizin/') . $list->auth_izin_tambang . '" target="_blank" class="btn btn-primary btn-sm text-white" title="Tampilkan Sertifikasi"><i class="far fa-file-pdf"></i></a>';
        } else {
            echo '<a class="btn btn-danger btn-sm text-white" title="File tidak ada"><i class="fas fa-ban"></i></a>';
        }
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr>';
    echo '<td colspan=6 class=" align-middle text-center">Data tidak ada</td>';
    echo '</tr>';
}
?>
                                                                      </tbody>
                                                                 </table>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="v-pills-dtSertifikasi" role="tabpanel"
                                                  aria-labelledby="v-pills-dtSertifikasi-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <table id="tbmSertifikasiDetail"
                                                                      class="table table-striped table-bordered table-hover text-black text-nowrap"
                                                                      style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                                                      <thead>
                                                                           <tr>
                                                                                <th
                                                                                     style="text-align:center;width: 1%;">
                                                                                     NO.</th>
                                                                                <th style="width: 55%;">JENIS
                                                                                     SERTIFIKASI</th>
                                                                                <th style="width: 19%;">NO. SERTIFIKASI
                                                                                </th>
                                                                                <th style="width: 10%;">TGL. SERTIFIKASI
                                                                                </th>
                                                                                <th style="width: 10%;">TGL. EXPIRED
                                                                                </th>
                                                                                <th style="width: 5%;">PROSES</th>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                           <?php
$no = 1;
if (!empty($data_sertifikasi)) {
    foreach ($data_sertifikasi as $list) {
        echo '<tr>';
        echo '<td class="align-middle" style="text-align:center;width: 1%;">' . $no++ . '</td>';
        echo '<td class="align-middle" style="width: 60%;">' . $list->jenis_sertifikasi . '</td>';
        echo '<td class="align-middle" style="width: 19%;">' . $list->no_sertifikasi . '</td>';
        echo '<td class="align-middle" style="width: 10%;">' . date('d-M-Y', strtotime($list->tgl_sertifikasi)) . '</td>';
        echo '<td class="align-middle" style="width: 10%;">' . date('d-M-Y', strtotime($list->tgl_berakhir_sertifikasi)) . '</td>';
        echo '<td style="text-align:center;">';
        if ($list->file_sertifikasi != "") {
            echo '<a href ="' . base_url('karyawan/sertifikat/') . $list->auth_sertifikat . '" target="_blank" class="btn btn-primary btn-sm" title="Tampilkan Sertifikasi"><i class="far fa-file-pdf"></i></a>';
        } else {
            echo '<a class="btn btn-danger btn-sm" title="File sertifikasi tidak ada"><i class="fas fa-ban"></i></a>';
        }
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr>';
    echo '<td colspan=6 class=" align-middle text-center">Data tidak ada</td>';
    echo '</tr>';
}
?>
                                                                      </tbody>
                                                                 </table>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="v-pills-dtMCU" role="tabpanel"
                                                  aria-labelledby="v-pills-dtMCU-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <table id="tbmSertifikasiDetail"
                                                                 class="table table-striped table-bordered table-hover text-black text-nowrap"
                                                                 style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                                                 <thead>
                                                                      <tr>
                                                                           <th style="text-align:center;width: 1%;">NO.
                                                                           </th>
                                                                           <th style="width: 15%;">TGL. MCU</th>
                                                                           <th style="width: 25%;">HASIL MCU</th>
                                                                           <th style="width: 59%;">KETERANGAN</th>
                                                                           <th style="width: 59%;">PROSES</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>

                                                                      <?php
$no = 1;
if (!empty($data_mcu)) {
    foreach ($data_mcu as $list) {
        echo '<tr>';
        echo '<td class="align-middle" style="text-align:center;width: 1%;">' . $no++ . '</td>';
        echo '<td class="align-middle" style="width: 15%;">' . date('d-M-Y', strtotime($list->tgl_mcu)) . '</td>';
        echo '<td class="align-middle" style="width: 25%;">' . $list->mcu_jenis . '</td>';
        echo '<td class="align-middle" style="width: 54%;">' . $list->ket_mcu . '</td>';
        echo '<td style="text-align:center;">';

        if ($list->url_file != "") {
            echo '<a href ="' . base_url('karyawan/mcu/') . $list->auth_mcu . '" target="_blank" class="btn btn-primary btn-sm" title="Tampilkan Hasil MCU"><i class="far fa-file-pdf"></i></a>';
        } else {
            echo '<a class="btn btn-danger btn-sm" title="File MCU tidak ada"><i class="fas fa-ban"></i></a>';
        }
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr>';
    echo '<td colspan=4 class=" align-middle text-center">Data tidak ada</td>';
    echo '</tr>';
}
?>
                                                                 </tbody>
                                                            </table>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="v-pills-dtVaksin" role="tabpanel"
                                                  aria-labelledby="v-pills-dtVaksin-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <table id="tbmSertifikasiDetail"
                                                                 class="table table-striped table-bordered table-hover text-black text-nowrap"
                                                                 style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                                                 <thead>
                                                                      <tr>
                                                                           <th style="text-align:center;width: 1%;">NO.
                                                                           </th>
                                                                           <th style="width: 30%;">VAKSIN</th>
                                                                           <th style="width: 39%;">NAMA VAKSIN</th>
                                                                           <th style="width: 30%;">TGL. VAKSIN</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>

                                                                      <?php
$no = 1;
if (!empty($data_vaksin)) {
    foreach ($data_vaksin as $list) {
        echo '<tr>';
        echo '<td class="align-middle" style="text-align:center;width: 1%;">' . $no++ . '</td>';
        echo '<td class="align-middle" style="width: 30%;">' . $list->vaksin_jenis . '</td>';
        echo '<td class="align-middle" style="width: 39%;">' . $list->vaksin_nama . '</td>';
        echo '<td class="align-middle" style="width: 30%;">' . date('d-M-Y', strtotime($list->tgl_vaksin)) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr>';
    echo '<td colspan=4 class=" align-middle text-center">Data tidak ada</td>';
    echo '</tr>';
}
?>
                                                                 </tbody>
                                                            </table>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="v-pills-dtFilePendukung" role="tabpanel"
                                                  aria-labelledby="v-pills-dtFilePendukung-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>No. KTP</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=$data_kary->no_ktp?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Nama Lengkap</h6>
                                                                 <input type="text" class="form-control"
                                                                      value="<?=$data_kary->nama_lengkap?>"
                                                                      style="background-color:transparent;margin-top:-10px;"
                                                                      disabled>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>File Pendukung</h6>
                                                                 <?php

if ($data_kary->url_pendukung != "") {
    echo '<a href ="' . base_url('karyawan/support/') . $data_kary->auth_personal . '" target="_blank" class="btn btn-primary">Tampilkan File Pendukung</a>';
} else {
    echo '<a target="_blank" class="btn btn-danger">File Tidak Ada</a>';
}

?>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="v-pills-dtPelanggaran" role="tabpanel"
                                                  aria-labelledby="v-pills-dtPelanggaran-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <table id="tbmPelanggaranDetail"
                                                                      class="table table-striped table-bordered table-hover text-black text-nowrap"
                                                                      style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                                                      <thead>
                                                                           <tr>
                                                                                <th
                                                                                     style="text-align:center;width: 1%;">
                                                                                     NO.</th>
                                                                                <th style="width: 10%;">Tgl. Pelanggaran
                                                                                </th>
                                                                                <th style="width: 55%;">Punistment</th>
                                                                                <th style="width: 19%;">Tgl. Punishment
                                                                                </th>
                                                                                <th style="width: 10%;">Tgl. Akhir
                                                                                     Punishment</th>
                                                                                <th style="width: 5%;">PROSES</th>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                           <?php
$no = 1;
if (!empty($data_langgar)) {
    foreach ($data_langgar as $list) {
        echo '<tr>';
        echo '<td class="align-middle" style="text-align:center;width: 1%;">' . $no++ . '</td>';
        echo '<td class="align-middle" style="width: 60%;">' . date('d-M-Y', strtotime($list->tgl_langgar)) . '</td>';
        echo '<td class="align-middle" style="width: 19%;">' . $list->langgar_jenis . '</td>';
        echo '<td class="align-middle" style="width: 10%;">' . date('d-M-Y', strtotime($list->tgl_punishment)) . '</td>';
        echo '<td class="align-middle" style="width: 10%;">' . date('d-M-Y', strtotime($list->tgl_akhir_langgar)) . '</td>';
        echo '<td style="text-align:center;">';
        echo '<button class="btn btn-info btn-sm text-white" title="Detail"><i class="fas fa-asterisk"></i></button> ';
        if ($list->url_langgar != "") {
            echo '<a href ="' . base_url('pelanggaran/berkas/') . $list->auth_langgar . '" target="_blank" class="btn btn-primary btn-sm text-white" title="Tampilkan Sertifikasi"><i class="far fa-file-pdf"></i></a>';
        } else {
            echo '<a class="btn btn-danger btn-sm text-white" title="File pelanggaran tidak ada"><i class="fas fa-ban "></i></a>';
        }
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr>';
    echo '<td colspan=6 class=" align-middle text-center">Data tidak ada</td>';
    echo '</tr>';
}
?>
                                                                      </tbody>
                                                                 </table>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>