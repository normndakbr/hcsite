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
                                             Tambah Karyawan
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
                              <h5>Karyawan</h5>
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
                                        <a href="<?= base_url('karyawan/new'); ?>" class="btn btn-success font-weight-bold">Tambah Data</a>
                                   </div>
                                   <div class="alert alert-danger err_psn_depart animate__animated animate__bounce d-none"></div>
                              </div>
                              <div class="accordion" id="accordionExample">
                                   <div class="card mb-0">
                                        <div class="card-header" id="headingOne">
                                             <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Data Pribadi</a></h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                             <form class=" mx-3 my-5">
                                                  <div class="card-body row">
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <label for="noKTP">No. KTP :</label>
                                                            <input placeholder="" id='noKTP' name='noKTP' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                            <small class="errorNoKTP text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <label for="namaLengkap">Nama Lengkap :</label>
                                                            <input placeholder="" id='namaLengkap' name='namaLengkap' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                            <small class="errorNamaLengkap text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <label for="alamatEmail">Alamat Email :</label>
                                                            <input placeholder="" id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                            <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <label for="noTelp">No. Telp :</label>
                                                            <input placeholder="" id='noTelp' name='noTelp' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                            <small class="errorNoTelp text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                  </div>

                                                  <div class="card-body row">
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <label for="tempatLahir">Tempat & Tanggal Lahir :</label>
                                                            <div class="d-flex">
                                                                 <input id='tempatLahir' name='tempatLahir' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" placeholder="" required>

                                                                 <input id='tanggalLahir' name='tanggalLahir' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user ml-3" value="" placeholder="Tanggal lahir" required>
                                                            </div>
                                                            <small class="errorTanggalLahir text-danger font-italic font-weight-bold"></small>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <label for="alamatEmail">Usia :</label>
                                                            <input id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                            <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <label for="alamatEmail">Kewarganegaraan :</label>
                                                            <input id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                            <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                  </div>
                                                  <button type="submit" class="btn  btn-primary ml-3">Simpan Data Pribadi</button>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                              <div class="card mb-0">
                                   <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Kontak Darurat</a></h5>
                                   </div>
                                   <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <form class=" mx-3 my-5">
                                             <div class="card-body row">
                                                  <div class="col-lg-2 col-md-2 col-sm-12">
                                                       <label for="noKTP">No. KTP :</label>
                                                       <input placeholder="" id='noKTP' name='noKTP' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorNoKTP text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                                       <label for="namaLengkap">Nama Lengkap :</label>
                                                       <input placeholder="" id='namaLengkap' name='namaLengkap' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorNamaLengkap text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                                       <label for="alamatEmail">Alamat Email :</label>
                                                       <input placeholder="" id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                                       <label for="noTelp">No. Telp :</label>
                                                       <input placeholder="" id='noTelp' name='noTelp' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorNoTelp text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                             </div>

                                             <div class="card-body row">
                                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                                       <label for="tempatLahir">Tempat & Tanggal Lahir :</label>
                                                       <div class="d-flex">
                                                            <input id='tempatLahir' name='tempatLahir' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" placeholder="" required>

                                                            <input id='tanggalLahir' name='tanggalLahir' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user ml-3" value="" placeholder="Tanggal lahir" required>
                                                       </div>
                                                       <small class="errorTanggalLahir text-danger font-italic font-weight-bold"></small>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                                       <label for="alamatEmail">Usia :</label>
                                                       <input id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                                       <label for="alamatEmail">Kewarganegaraan :</label>
                                                       <input id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                             </div>
                                             <button type="submit" class="btn  btn-primary ml-3">Simpan Data Pribadi</button>
                                        </form>
                                   </div>
                              </div>
                              <div class="card">
                                   <div class="card-header" id="headingThree">
                                        <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Medical Check Up</a></h5>
                                   </div>
                                   <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <form class=" mx-3 my-5">
                                             <div class="card-body row">
                                                  <div class="col-lg-2 col-md-2 col-sm-12">
                                                       <label for="noKTP">No. KTP :</label>
                                                       <input placeholder="" id='noKTP' name='noKTP' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorNoKTP text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                                       <label for="namaLengkap">Nama Lengkap :</label>
                                                       <input placeholder="" id='namaLengkap' name='namaLengkap' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorNamaLengkap text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                                       <label for="alamatEmail">Alamat Email :</label>
                                                       <input placeholder="" id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                                       <label for="noTelp">No. Telp :</label>
                                                       <input placeholder="" id='noTelp' name='noTelp' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorNoTelp text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                             </div>

                                             <div class="card-body row">
                                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                                       <label for="tempatLahir">Tempat & Tanggal Lahir :</label>
                                                       <div class="d-flex">
                                                            <input id='tempatLahir' name='tempatLahir' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" placeholder="" required>

                                                            <input id='tanggalLahir' name='tanggalLahir' type="date" autocomplete="off" spellcheck="false" class="form-control form-control-user ml-3" value="" placeholder="Tanggal lahir" required>
                                                       </div>
                                                       <small class="errorTanggalLahir text-danger font-italic font-weight-bold"></small>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                                       <label for="alamatEmail">Usia :</label>
                                                       <input id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                                       <label for="alamatEmail">Kewarganegaraan :</label>
                                                       <input id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                                       <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                  </div>
                                             </div>
                                             <button type="submit" class="btn  btn-primary ml-3">Simpan Data Pribadi</button>
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