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
                                        <a href="<?= base_url('dashboard'); ?>">
                                             <i class="feather icon-home"></i>
                                        </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                        <a href="<?= base_url('struktur'); ?>">
                                             Struktur Perusahaan
                                        </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                        <a id="bc2">
                                             Tambah Struktur Perusahaan
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
                              <h5>Struktur Perusahaan</h5>
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
                         <div class="card-body">
                              <div class="mt-3">
                                   <div class="mb-4">
                                        <a href="<?= base_url('struktur'); ?>" class="btn btn-primary font-weight-bold">Refresh / Data</a>
                                        <a href="<?= base_url('struktur/new'); ?>" class="btn btn-success font-weight-bold">Tambah Data</a>
                                   </div>
                                   <?= $this->session->flashdata('msg'); ?>
                              </div>
                              <form action="<?= base_url('struktur/input_struktur'); ?>" method="post">
                                   <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                             <label for="jenisPerusahaan">Jenis Perusahaan :</label><br>
                                             <select id='jenisPerusahaan' name='jenisPerusahaan' class="form-control form-control-user">
                                                  <option value="">-- PILIH JENIS PERUSAHAAN --</option>
                                                  <option value="1">OWNER</option>
                                                  <option value="2">CONTRACTOR</option>
                                                  <option value="3">SUBCONTRACTOR</option>
                                             </select>
                                             <small class="error1str text-danger font-italic font-weight-bold"></small><br>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                             <label for="perJenis">Perusahaan :</label><br>
                                             <select id='perJenis' name='perJenis' class="form-control form-control-user">
                                                  <option value="">-- PERUSAHAAN TIDAK DITEMUKAN --</option>
                                             </select>
                                             <input type="hidden" id="jkau092321" name="jkau092321">
                                             <small class="error2str text-danger font-italic font-weight-bold"></small><br>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                             <hr>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                             <label for="cariMPerusahaan">Cari Perusahaan :</label>
                                             <input id='cariMPerusahaan' name='cariMPerusahaan' placeholder="Ketikkan Kode Perusahaan / Nama Perusahaan" type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                             <small class="error3str text-danger font-italic font-weight-bold"></small><br>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                             <label for="kodeMperusahaan">Kode Perusahaan :</label>
                                             <input id='kodeMperusahaan' name='kodeMperusahaan' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user bg-white" value="" readonly>
                                             <input type="hidden" id="jlasd1233" name="jlasd1233">
                                             <small class="error4str text-danger font-italic font-weight-bold"></small><br>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12">
                                             <label for="namaMperusahaan">Nama Perusahaan :</label>
                                             <input id='namaMperusahaan' name='namaMperusahaan' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user bg-white" value="" readonly>
                                             <small class="error5str text-danger font-italic font-weight-bold"></small><br>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                             <a class="btn btn-primary w-100" data-toggle="collapse" href="#btniujb" role="button" aria-expanded="false" aria-controls="btniujb">
                                                  Izin Usaha Jasa Penambangan (IUJP)
                                             </a>
                                             <div class="collapse" id="btniujb">
                                                  <div class="card card-body mt-2">
                                                       <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                                                 <label for="noiujp">No. IUJP :</label>
                                                                 <input id='noiujp' name='noiujp' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error2iujp text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                                                                 <label for="tglAktifiujp">Tanggal Aktif :</label>
                                                                 <input id='tglAktifiujp' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error3iujp text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                                                                 <label for="tglakhiriujp">Tanggal Akhir :</label>
                                                                 <input id='tglakhiriujp' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error4iujp text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                                 <label for="ketiujp">Keterangan :</label>
                                                                 <textarea id='ketiujp' name='ketiujp' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value=""></textarea>
                                                                 <small class="error5iujp text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                             <a class="btn btn-primary w-100" data-toggle="collapse" href="#btnsio" role="button" aria-expanded="false" aria-controls="btnsio">
                                                  Surat Izin Operasi (SIO)
                                             </a>
                                             <div class="collapse" id="btnsio">
                                                  <div class="card card-body mt-2">
                                                       <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                                                 <label for="nosio">No. SIO :</label>
                                                                 <input id='nosio' name='nosio' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error2sio text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                                                                 <label for="tglaktifsio">Tanggal Aktif :</label>
                                                                 <input id='tglaktifsio' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error3sio text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                                                                 <label for="tglakhirsio">Tanggal Akhir :</label>
                                                                 <input id='tglakhirsio' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error4sio text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                                 <label for="ketsio">Keterangan :</label>
                                                                 <textarea id='ketsio' name='ketsio' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value=""></textarea>
                                                                 <small class="error5sio text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                             <a class="btn btn-primary w-100" data-toggle="collapse" href="#btnkontrak" role="button" aria-expanded="false" aria-controls="btnkontrak">
                                                  Kontrak
                                             </a>
                                             <div class="collapse" id="btnkontrak">
                                                  <div class="card card-body mt-2">
                                                       <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                                                 <label for="nokontrak">No. Kontrak :</label>
                                                                 <input id='nokontrak' name='nokontrak' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error2kontrak text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                                                                 <label for="tglaktifkontrak">Tanggal Aktif :</label>
                                                                 <input id='tglaktifkontrak' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error3kontrak text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                                                                 <label for="tglakhirkontrak">Tanggal Akhir :</label>
                                                                 <input id='tglakhirkontrak' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error4kontrak text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                                 <label for="ketkontrak">Keterangan :</label>
                                                                 <textarea id='ketkontrak' name='ketkontrak' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value=""></textarea>
                                                                 <small class="error5kontrak text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                             <a class="btn btn-primary w-100" data-toggle="collapse" href="#btnpjo" role="button" aria-expanded="false" aria-controls="btnpjo">
                                                  Penanggung Jawab Operasional (PJO)
                                             </a>
                                             <div class="collapse" id="btnpjo">
                                                  <div class="card card-body mt-2">
                                                       <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                                                 <label for="namapjo">Nama PJO :</label>
                                                                 <input id='namapjo' name='namapjo' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error2pjo text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                                                                 <label for="tglaktifpjo">Tanggal Aktif :</label>
                                                                 <input id='tglaktifpjo' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error3pjo text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                                                                 <label for="tglakhirpjo">Tanggal Akhir :</label>
                                                                 <input id='tglakhirpjo' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                                 <small class="error4pjo text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                                 <label for="ketpjo">Keterangan :</label>
                                                                 <textarea id='ketpjo' name='ketIujb' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value=""></textarea>
                                                                 <small class="error5pjo text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                 <table class="table table-striped table-bordered table-hover text-black" style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                                                      <thead>
                                                                           <tr>
                                                                                <td>No.</td>
                                                                                <td>Nama PJO</td>
                                                                                <td>Tgl. Aktif</td>
                                                                                <td>Tgl. Akhir</td>
                                                                                <td>Proses</td>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                      </tbody>
                                                                 </table>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                             <hr class="mb-2">
                                             <input type="submit" name="btnSimpanStruk" id="btnSimpanStruk" class="btn font-weight-bold btn-primary" value="Buat Struktur Perusahaan">
                                             <a type="button" href="<?= base_url('struktur/new'); ?>" class="btn font-weight-bold btn-danger">Batal</a>
                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>