<div class="pcoded-main-container">
     <div class="pcoded-content">
          <div class="page-header">
               <div class="page-block">
                    <div class="row align-items-center">
                         <div class="col-md-12">
                              <div class="page-header-title">
                                   <h5 class="m-b-10">Data Master</h5>
                              </div>
                              <ul class="breadcrumb">
                                   <li class="breadcrumb-item">
                                        <a href="<?= base_url('dash'); ?>">
                                             <i class="feather icon-home"></i>
                                        </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                        <a href="<?= base_url('pelanggaran'); ?>">
                                             Pelanggaran
                                        </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                        <a id="bc2">
                                             Edit Pelanggaran
                                        </a>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="col-xl-12 col-md-12">
                    <div class="card latest-update-card">
                         <div class="card-header">
                              <h5>Edit Pelanggaran</h5>
                              <div class="card-header-right">
                                   <div class="btn-group card-option">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="feather icon-more-horizontal"></i>
                                        </button>
                                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                             <li class="dropdown-item full-card">
                                                  <a href="#!"><span><i class="feather icon-maximize"></i>
                                                            Perbesar</span><span style="display: none"><i class="feather icon-minimize"></i> Restore</span></a>
                                             </li>
                                             <li class="dropdown-item minimize-card">
                                                  <a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display: none"><i class="feather icon-plus"></i> expand</span></a>
                                             </li>
                                             <li class="dropdown-item reload-card">
                                                  <a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <form action="<?= base_url('pelanggaran/update') ?>">
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-lg-12">
                                             <div class="row">
                                                  <?php

                                                  if (!$this->session->csrf_token) {
                                                       $this->session->csrf_token = hash("sha1", time());
                                                  }

                                                  ?>

                                                  <input type="hidden" id="token" name="token" value="<?= $this->session->csrf_token ?>">

                                                  <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                                       <label for="">Perusahaan :</label><br>
                                                       <input type="text" autocomplete="off" spellcheck="false" class="form-control bg-white" value="<?= $langgar['kode_perusahaan'] . " | " . $langgar['nama_perusahaan']; ?>" readonly></small><br>
                                                  </div>
                                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                                       <hr>
                                                  </div>
                                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                                       <label for="txtCariKaryLgrEdit"><span class="text-danger font-weight-bold font-italic">* </span> Cari Karyawan (Ketikkan No. KTP/ NIK / Nama Karyawan) :</label>
                                                       <input id='txtCariKaryLgrEdit' name='txtCariKaryLgrEdit' type="text" autocomplete="off" spellcheck="false" class="form-control" placeholder="Ketikkan No. KTP/ NIK / Nama Karyawan" value="">
                                                       <input type="hidden" id="authLgrEdit" name="authLgrEdit" value="<?= $langgar['auth_langgar']; ?>" readonly></small>
                                                       <input type="hidden" id="authkary" name="authkary" value="<?= $langgar['auth_kary']; ?>" readonly></small>
                                                       <small class="error2 text-danger font-italic font-weight-bold"></small>
                                                       <?= form_error('authKTPKaryLanggar', '<small class="text-danger font-italic font-weight-bold">', '</small>'); ?><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                                       <label for="">No. KTP :</label><br>
                                                       <input type="text" autocomplete="off" spellcheck="false" class="form-control" value="<?= $langgar['no_nik']; ?>" readonly></small><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                                       <label for="">NIK :</label><br>
                                                       <input type="text" autocomplete="off" spellcheck="false" class="form-control" value="<?= $langgar['no_nik']; ?>" readonly></small><br>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                                       <label for="">Nama Karyawan :</label><br>
                                                       <input type="text" autocomplete="off" spellcheck="false" class="form-control" value="<?= $langgar['nama_lengkap']; ?>" readonly></small><br>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                                       <label for="">Departemen :</label><br>
                                                       <input type="text" autocomplete="off" spellcheck="false" class="form-control" value="<?= $langgar['depart']; ?>" readonly></small><br>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                                       <label for="">Posisi :</label><br>
                                                       <input type="text" autocomplete="off" spellcheck="false" class="form-control" value="<?= $langgar['posisi']; ?>" readonly></small><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-6 col-sm-12">
                                                       <label for="tglLgrEdit">Tgl Pelanggaran :</label><br>
                                                       <input type="date" id="tglLgrEdit" name="tglLgrEdit" autocomplete="off" spellcheck="false" class="form-control" value="<?= $langgar['tgl_langgar']; ?>"><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-6 col-sm-12">
                                                       <label for="tglPunishLgrEdit">Tgl. Punishment :</label><br>
                                                       <input type="date" id="tglPunishLgrEdit" name="tglPunishLgrEdit" autocomplete="off" spellcheck="false" class="form-control" value="<?= $langgar['tgl_punishment']; ?>"><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-6 col-sm-12">
                                                       <label for="jenisLgrEdit" style="margin-bottom:15px;">Punishment :</label><br>
                                                       <select type="text" id="jenisLgrEdit" name="jenisLgrEdit" autocomplete="off" spellcheck="false" class="form-control" value="">
                                                            <?php
                                                            echo "<option value=''>-- PILIH PUNISHMENT --</option>";

                                                            if (!empty($langgar_jenis)) {
                                                                 foreach ($langgar_jenis as $list) {
                                                                      echo "<option value='" . $list->auth_langgar_jenis . "' " . set_select('jenisLgrEdit', $langgar['auth_langgar_jenis'], False) . ">" . $list->langgar_jenis . "</option>";
                                                                 }
                                                            } else {
                                                                 echo "<option value=''>-- PUNISHMENT TIDAK ADA --</option>";
                                                            }

                                                            ?>
                                                       </select><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-6 col-sm-12">
                                                       <label for="tglAkhirPunishLgrEdit">Tgl. Akhir Punishment :</label><br>
                                                       <input type="date" id="tglAkhirPunishLgrEdit" name="tglAkhirPunishLgrEdit" autocomplete="off" spellcheck="false" class="form-control bg-white" value="<?= $langgar['tgl_akhir_langgar']; ?>"><br>
                                                  </div>
                                                  <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                                       <label for="ketLgrEdit">Keterangan :</label><br>
                                                       <textarea id="ketLgrEdit" name="ketLgrEdit" autocomplete="off" spellcheck="false" class="form-control bg-white"><?= $langgar['ket_langgar']; ?></textarea>
                                                  </div>
                                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                                       <label for=""><span class="text-danger font-weight-bold font-italic">* </span>Berkas Punishment <span class="text-danger font-weight-bold font-italic">(Berkas dengan format pdf, ukuran maksimal 100 kb)</span> :</label>
                                                       <input id='berkasPunishEdit' name='berkasPunishEdit' type="file" class="form-control-file">
                                                       <small id="error8" class="text-danger font-italic font-weight-bold"></small>
                                                       <?= form_error('berkasPunishEdit', '<small class="text-danger font-italic font-weight-bold">', '</small>'); ?>
                                                       <?php
                                                       if (!empty($err_upl)) {
                                                            echo "<small class='text-danger font-italic font-weight-bold'>" . $err_upl . "</small>";
                                                       }
                                                       ?><br>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="modal-footer d-flex justify-align-content-end p-2" style="margin-top:5px;">
                                   <button type="submit" id="btnUpdate" type="button" class="btn font-weight-bold btn-success">Update</button>
                                   <button id="btnSelesai" type="button" class="btn font-weight-bold btn-danger">Selesai</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>