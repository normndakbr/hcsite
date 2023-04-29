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
                                        <a href="<?= base_url('karyawan'); ?>">
                                             Karyawan
                                        </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                        <a id="bc2">
                                             Detail Data Karyawan
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
                              <h5>Detail Data Karyawan - <?= $data_kary->nama_lengkap ?></h5>
                              <div class="card-header-right">
                                   <div class="btn-group card-option">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="feather icon-more-horizontal"></i>
                                        </button>
                                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                             <li class="dropdown-item full-card">
                                                  <a href="#!"><span><i class="feather icon-maximize"></i>
                                                            FullScreen</span><span style="display: none"><i class="feather icon-minimize"></i> Restore</span></a>
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
                                        <a href="<?= base_url('karyawan'); ?>" class="btn btn-primary font-weight-bold">Refresh / Data</a>
                                        <!-- <a href="<?= base_url('karyawan/new'); ?>" class="btn btn-success font-weight-bold">Tambah Data</a> -->
                                   </div>
                                   <div class="alert alert-danger err_psn_depart animate__animated animate__bounce d-none"></div>
                              </div>
                              <div class="accordion" id="accordionExample">
                                   <!-- Data Personal -->
                                   <div class="card mb-0">
                                        <div class="card-header" id="headingOne">
                                             <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Data Pribadi</a></h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                             <form class=" mx-3 py-4">
                                                  <div class="card-body row">
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pb-3">
                                                            <div class="form-group">
                                                                 <h6>No. KTP</h6>
                                                                 <h5><?= $data_kary->no_ktp ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Nama Lengkap</h6>
                                                                 <h5><?= $data_kary->nama_lengkap ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Alamat Email</h6>
                                                                 <h5><?= $data_kary->email_pribadi ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>No. Telp</h6>
                                                                 <h5><?= $data_kary->hp_1 ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Tempat & Tanggal Lahir</h6>
                                                                 <h5><?= $data_kary->tmp_lahir . ", " . $data_kary->tgl_lahir ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Kewarganegaraan</h6>
                                                                 <h5><?= $data_kary->warga_negara ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Agama</h6>
                                                                 <h5><?= $data_kary->agama ?></h5>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                                   <!-- Data Karyawan -->
                                   <div class="card mb-0">
                                        <div class="card-header" id="headingFive">
                                             <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">Data Karyawan</a></h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                             <form class=" mx-3 py-4">
                                                  <div class="card-body row">
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pb-3">
                                                            <div class="form-group">
                                                                 <h6>Nama Perusahaan</h6>
                                                                 <h5><?= $data_kary->nama_perusahaan ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12 pb-3">
                                                            <div class="form-group">
                                                                 <h6>NIK</h6>
                                                                 <h5><?= $data_kary->no_nik ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pb-3">
                                                            <div class="form-group">
                                                                 <h6>Departemen</h6>
                                                                 <h5><?= $data_kary->depart ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pb-3">
                                                            <div class="form-group">
                                                                 <h6>Section</h6>
                                                                 <h5><?= $data_kary->section ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Posisi</h6>
                                                                 <h5><?= $data_kary->posisi ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Tipe </h6>
                                                                 <h5><?= $data_kary->tipe ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Roster</h6>
                                                                 <h5><?= $data_kary->roster ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Point Of Hire </h6>
                                                                 <h5><?= $data_kary->poh ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Status Karyawan</h6>
                                                                 <h5><?= $data_kary->stat_kerja ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-1 col-md-1 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Grade</h6>
                                                                 <h5><?= $data_kary->grade ?></h5>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Level</h6>
                                                                 <h5><?= $data_kary->level ?></h5>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                                   <!-- Data Domisili -->
                                   <div class="card mb-0">
                                        <div class="card-header" id="headingFour">
                                             <h5 class="mb-0"><a href="#!" id="collapseDataDomisili" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Data Domisili</a></h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                             <form class=" mx-3 py-4">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <h6>Alamat Lengkap </h6>
                                                                 <h5><?= $alamat_kary->alamat_ktp ?></h5>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                                   <!-- Kontak Darurat -->
                                   <div class="card mb-0">
                                        <div class="card-header" id="headingTwo">
                                             <h5 class="mb-0"><a href="#!" id="collapseKontakDarurat" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Kontak Darurat</a></h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse px-3 py-4" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                             <form>
                                                  <div class="card-body row">
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="nmKontakDarurat">Nama</label>
                                                                 <input id='nmKontakDarurat' name='nmKontakDarurat' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                            </div>
                                                            <small class="errorNmKontakDarurat text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="telpKontakDarurat">Nomor Telp</label>
                                                                 <input id='telpKontakDarurat' name='telpKontakDarurat' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorTelpKontakDarurat text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="hubKontakDarurat">Hubungan</label>
                                                                 <input id='hubKontakDarurat' name='hubKontakDarurat' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorHubKontakDarurat text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="d-flex justify-content-center">
                                                       </div>
                                                  </div>
                                             </form>
                                             <div class="col-lg-12 mt-3 ml-1">
                                                  <div class="table-responsive">
                                                       <table id="tbmKontakDarurat" class="table table-striped table-bordered table-hover text-black" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                                            <thead>
                                                                 <tr class="font-weight-boldtext-white">
                                                                      <th style="text-align:center;width:1%;">No.</th>
                                                                      <th>Nama</th>
                                                                      <th>No. Telp</th>
                                                                      <!-- <th>Telp</th> -->
                                                                      <th style="text-align:center;">Hubungan</th>
                                                                      <th style="text-align:center;">Proses</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                       </table>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <!-- Medical Checkup -->
                                   <div class="card">
                                        <div class="card-header" id="headingThree">
                                             <h5 class="mb-0"><a href="#!" id="collapseMCU" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Medical Check Up</a></h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                             <form class=" mx-3 my-5">
                                                  <div class="card-body row">
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <label class="floating-label" for="noKTP">Tanggal Medical Check Up :</label>
                                                            <input id='noKTP' name='noKTP' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                            <small class="errorNoKTP text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <label class="floating-label" for="namaLengkap">Tanggal Follow Up :</label>
                                                            <input id='namaLengkap' name='namaLengkap' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                            <small class="errorNamaLengkap text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <label class="floating-label" for="alamatEmail">Scan Berkas Medical Checkup (.pdf) :</label>
                                                            <input id='alamatEmail' name='alamatEmail' type="file" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                            <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                                       <div class="form-group">
                                                            <label class="floating-label" for="ketMCU">Keterangan</label>
                                                            <input id='ketMCU' type="text" autocomplete="off" spellcheck="false" class="form-control">
                                                            <small id="error4" class="text-danger font-italic font-weight-bold"></small>
                                                       </div>
                                                  </div>
                                             </form>
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