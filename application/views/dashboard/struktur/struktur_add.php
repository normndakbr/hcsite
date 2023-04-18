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
                                   <div class="alert alert-danger err_psn_level animate__animated animate__bounce d-none"></div>
                              </div>
                              <div class="row ">
                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="jenisPerusahaan">Jenis Perusahaan :</label><br>
                                        <select id='jenisPerusahaan' name='jenisPerusahaan' class="form-control form-control-user">
                                             <option value="">-- PILIH JENIS PERUSAHAAN --</option>
                                             <option value="1">OWNER</option>
                                             <option value="2">CONTRACTOR</option>
                                             <option value="3">SUBCONTRACTOR</option>
                                        </select>
                                        <small class="error1 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="perJenis">Perusahaan :</label><br>
                                        <select id='perJenis' name='perJenis' class="form-control form-control-user">
                                             <option value="">-- PERUSAHAAN TIDAK DITEMUKAN --</option>
                                        </select>
                                        <small class="error1 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <hr>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="cariMPerusahaan">Cari Perusahaan :</label>
                                        <input id='cariMPerusahaan' name='cariMPerusahaan' placeholder="Ketikkan Kode Perusahaan / Nama Perusahaan" type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                        <small class="error2 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="namaMperusahaan">Nama Perusahaan :</label>
                                        <input id='namaMperusahaan' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user bg-white" value="" readonly>
                                        <input type="hidden" id="jlasd1233">
                                        <small class="error3 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                        <a class="btn btn-primary w-100" data-toggle="collapse" href="#btniujb" role="button" aria-expanded="false" aria-controls="btniujb">
                                             Izin Usaha Jasa Penambangan (IUJB)
                                        </a>
                                        <div class="collapse" id="btniujb">
                                             <div class="card card-body mt-2">
                                                  <div class="row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                            <label for="noIUJB">No. IUJB :</label>
                                                            <input id='noIUJB' name='noIUJB' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error2 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="alamatMperusahaan">Tanggal Aktif :</label>
                                                            <input id='alamatMperusahaan' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error3 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="alamatMperusahaan">Tanggal Akhir :</label>
                                                            <input id='alamatMperusahaan' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error3 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                            <label for="ketIujb">Keterangan :</label>
                                                            <textarea id='ketIujb' name='ketIujb' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value=""></textarea>
                                                            <small class="error2 text-danger font-italic font-weight-bold"></small><br>
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
                                                       <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                            <label for="noSio">No. SIO :</label>
                                                            <input id='noSio' name='noSio' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error2 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="alamatMperusahaan">Tanggal Aktif :</label>
                                                            <input id='alamatMperusahaan' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error3 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="alamatMperusahaan">Tanggal Akhir :</label>
                                                            <input id='alamatMperusahaan' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error3 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                            <label for="ketSio">Keterangan :</label>
                                                            <textarea id='ketSio' name='ketSio' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value=""></textarea>
                                                            <small class="error2 text-danger font-italic font-weight-bold"></small><br>
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
                                                       <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                            <label for="noKontrak">No. Kontrak :</label>
                                                            <input id='noKontrak' name='noKontrak' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error2 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="alamatMperusahaan">Tanggal Aktif :</label>
                                                            <input id='alamatMperusahaan' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error3 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="alamatMperusahaan">Tanggal Akhir :</label>
                                                            <input id='alamatMperusahaan' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="">
                                                            <small class="error3 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                                            <label for="ketKontrak">Keterangan :</label>
                                                            <textarea id='ketKontrak' name='ketKontrak' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value=""></textarea>
                                                            <small class="error2 text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <hr class="mb-2">
                                        <button type="button" name="btnTambahLevel" id="btnTambahLevel" class="btn font-weight-bold btn-primary">Simpan</button>
                                        <button type="button" name="btnBatalLevel" id="btnBatalLevel" class="btn font-weight-bold btn-danger">Batal</button>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>