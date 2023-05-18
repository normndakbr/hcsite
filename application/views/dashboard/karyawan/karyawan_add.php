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
                         <div class="card-header align-items-center">
                              <h5>Tambah Data Karyawan</h5>
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
                                   <div class="mb-2">
                                        <a href="<?= base_url('karyawan'); ?>" class="btn btn-sm btn-danger font-weight-bold">Batal</a>
                                        <a id="addbtn" href="<?= base_url('karyawan/new'); ?>" class="btn btn-sm btn-warning font-weight-bold">Reset</a>
                                   </div>
                                   <div class="alert alert-danger err_psn_depart animate__animated animate__bounce d-none"></div>
                              </div>
                              <div class="row pt-2">
                                   <div class="col-md-2 col-sm-12">
                                        <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                             <li><a class="nav-link text-left has-ripple active" id="v-pills-dtPersonal-tab" data-toggle="pill" href="#v-pills-dtPersonal" role="tab" aria-controls="v-pills-dtPersonal" aria-selected="true">Data Personal<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -152.188px; left: -96.625px;"></span></a></li>
                                             <li><a class="nav-link text-left has-ripple" id="v-pills-dtKaryawan-tab" data-toggle="pill" href="#v-pills-dtKaryawan" role="tab" aria-controls="v-pills-dtKaryawan" aria-selected="false">Data Karyawan<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -162.188px; left: -102.625px;"></span></a></li>
                                             <li><a class="nav-link text-left has-ripple" id="v-pills-dtDomisili-tab" data-toggle="pill" href="#v-pills-dtDomisili" role="tab" aria-controls="v-pills-dtDomisili" aria-selected="false">Domisili<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -174.188px; left: -108.625px;"></span></a></li>
                                             <li><a class="nav-link text-left has-ripple" id="v-pills-dtSertifikasi-tab" data-toggle="pill" href="#v-pills-dtSertifikasi" role="tab" aria-controls="v-pills-dtSertifikasi" aria-selected="false">Sertifikasi<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -174.188px; left: -108.625px;"></span></a></li>
                                             <li><a class="nav-link text-left has-ripple" id="v-pills-dtMCU-tab" data-toggle="pill" href="#v-pills-dtMCU" role="tab" aria-controls="v-pills-dtMCU" aria-selected="false">Medical Check Up<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -174.188px; left: -108.625px;"></span></a></li>
                                             <li><a class="nav-link text-left has-ripple" id="v-pills-dtVaksin-tab" data-toggle="pill" href="#v-pills-dtVaksin" role="tab" aria-controls="v-pills-dtVaksin" aria-selected="false">Vaksinasi<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -174.188px; left: -108.625px;"></span></a></li>
                                             <li><a class="nav-link text-left has-ripple" id="v-pills-dtBerkas-tab" data-toggle="pill" href="#v-pills-dtBerkas" role="tab" aria-controls="v-pills-dtBerkas" aria-selected="false">Berkas Pendukung<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -174.188px; left: -108.625px;"></span></a></li>
                                             <li><a class="nav-link text-left has-ripple" id="v-pills-dtKontakDarurat-tab" data-toggle="pill" href="#v-pills-dtKontakDarurat" role="tab" aria-controls="v-pills-dtKontakDarurat" aria-selected="false">Kontak Darurat<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -168.188px; left: -119.625px;"></span></a></li>
                                        </ul>
                                   </div>
                                   <div class="col-md-10 col-sm-12">
                                        <div class="tab-content" id="v-pills-tabContent">
                                             <!-- Tab data personal -->
                                             <div class="tab-pane fade active show" id="v-pills-dtPersonal" role="tabpanel" aria-labelledby="v-pills-dtPersonal-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noKTP">No. KTP</label>
                                                                 <input id='noKTP' name='noKTP' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoKTP text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="namaLengkap">Nama Lengkap</label>
                                                                 <input id='namaLengkap' name='namaLengkap' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNamaLengkap text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="alamatEmail">Alamat Email Pribadi</label>
                                                                 <input id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noTelp">No. Telp</label>
                                                                 <input id='noTelp' name='noTelp' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoTelp text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="tempatLahir">Tempat & Tanggal Lahir</label>
                                                                 <input id='tempatLahir' name='tempatLahir' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorTempatLahir text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <input id='tanggalLahir' name='tanggalLahir' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorTanggalLahir text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="statPernikahan">Status Pernikahan</label>
                                                                 <select id="statPernikahan" class="mb-3 form-control">
                                                                      <option value="TK" selected>TK</option>
                                                                      <option value="K0">K0</option>
                                                                      <option value="K1">K1</option>
                                                                      <option value="K2">K2</option>
                                                                      <option value="K3">K3</option>
                                                                      <option value="K4">K4</option>
                                                                 </select>
                                                                 <small class="errorStatPernikahan text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noKK">No. Kartu Keluarga</label>
                                                                 <input id='noKK' name='noKK' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoKK text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addNamaIbu">Nama Gadis Ibu Kandung</label>
                                                                 <input id='addNamaIbu' name='addNamaIbu' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddNamaIbu text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="kewarganegaraan">Kewarganegaraan</label>
                                                                 <select id="kewarganegaraan" class="mb-3 form-control">
                                                                      <option value="WNI" selected>WNI</option>
                                                                      <option value="WNA">WNA</option>
                                                                 </select>
                                                                 <small class="errorKewarganegaraan text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="agama">Agama</label>
                                                                 <select id="agama" class="mb-3 form-control">
                                                                      <option value="islam" selected>Islam</option>
                                                                      <option value="kristen">Kristen</option>
                                                                      <option value="katolik">Katolik</option>
                                                                      <option value="hindu">Hindu</option>
                                                                      <option value="budha">Budha</option>
                                                                      <option value="konghucu">Konghucu</option>
                                                                 </select>
                                                                 <small class="errorAgama text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="jenisKelamin">Jenis Kelamin</label>
                                                                 <select id="jenisKelamin" class="mb-3 form-control">
                                                                      <option value="LK" selected>Laki - Laki</option>
                                                                      <option value="P">Perempuan</option>
                                                                 </select>
                                                                 <small class="errorJenisKelamin text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="kodeBank">Kode Bank</label>
                                                                 <select id="kodeBank" class="mb-3 form-control">
                                                                      <option value="BRI" selected>BRI</option>
                                                                      <option value="BNI">BNI</option>
                                                                      <option value="BCA">BCA</option>
                                                                      <option value="Mandiri">Mandiri</option>
                                                                 </select>
                                                                 <small class="errorKodeBank text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noRek">No. Rekening</label>
                                                                 <input id='noRek' name='noRek' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoRek text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noNPWP">No. NPWP</label>
                                                                 <input id='noNPWP' name='noNPWP' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoNPWP text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noBPJSTK">No. BPJS Tenaga Kerja</label>
                                                                 <input id='noBPJSTK' name='noBPJSTK' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoBPJSTK text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noBPJSKES">No. BPJS Kesehatan</label>
                                                                 <input id='noBPJSKES' name='noBPJSKES' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoBPJSKES text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noBPJSPensiun">No. BPJS Pensiun</label>
                                                                 <input id='noBPJSPensiun' name='noBPJSPensiun' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoBPJSPensiun text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noEquity">No. Equity</label>
                                                                 <input id='noEquity' name='noEquity' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoEquity text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addPendidikanTerakhir">Pendidikan Terakhir</label>
                                                                 <select id="addPendidikanTerakhir" class="mb-3 form-control">
                                                                      <option value="SD" selected>SD</option>
                                                                      <option value="SMP">SMP</option>
                                                                      <option value="SMA">SMA</option>
                                                                      <option value="SMK">SMK</option>
                                                                      <option value="D3">D3</option>
                                                                      <option value="D4">D4</option>
                                                                      <option value="S1">S1</option>
                                                                      <option value="S1">S1</option>
                                                                      <option value="S2">S2</option>
                                                                      <option value="S3">S3</option>
                                                                 </select>
                                                                 <small class="errorAddPendidikanTerakhir text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-9 col-md-9 col-sm-12 mb-2">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addInstansiPendidikan">Instansi Pendidikan</label>
                                                                 <input id='addInstansiPendidikan' name='addInstansiPendidikan' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddInstansiPendidikan text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addFakultas">Fakultas</label>
                                                                 <input id='addFakultas' name='addFakultas' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddFakultas text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addJurusan">Jurusan</label>
                                                                 <input id='addJurusan' name='addJurusan' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddJurusan text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- Tab data karyawan -->
                                             <div class="tab-pane fade" id="v-pills-dtKaryawan" role="tabpanel" aria-labelledby="v-pills-dtKaryawan-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="addPerKary">Perusahaan :</label><br>
                                                            <select id='addPerKary' name='addPerKary' class="form-control form-control-user">
                                                                 <option value="">-- Pilih Perusahaan --</option>
                                                            </select>
                                                            <small class="errorAddPerKary text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addDepartKary">Departemen :</label><br>
                                                                 <select id='addDepartKary' name='addDepartKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih Departemen --</option>
                                                                 </select>
                                                                 <small class="errorAddDepartKary text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addSectionKary">Section :</label><br>
                                                                 <select id='addSectionKary' name='addSectionKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih Section --</option>
                                                                 </select>
                                                                 <small class="errorAddSectionKary text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addPosisiKary">Posisi :</label><br>
                                                                 <select id='addPosisiKary' name='addPosisiKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih Posisi --</option>
                                                                 </select>
                                                                 <small class="errorAddPosisiKary text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addEmailPerusahaan">Alamat Email Perusahaan</label>
                                                                 <input id='addEmailPerusahaan' name='addEmailPerusahaan' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddEmailPerusahaan text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addNIKKary">NIK Karyawan</label>
                                                                 <input id='addNIKKary' name='addNIKKary' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="erroraddNIKKary text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addJenisKary">Jenis Karyawan</label>
                                                                 <select id='addJenisKary' name='addJenisKary' class="form-control form-control-user">
                                                                      <option value="Staff">Staff</option>
                                                                      <option value="Non Staff">Non Staff</option>
                                                                 </select>
                                                                 <small class="erroraddJenisKary text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addStatusKary">Status Karyawan</label>
                                                                 <select id='addStatusKary' name='addStatusKary' class="form-control form-control-user">
                                                                      <option value="Permanen" default>Permanen</option>
                                                                      <option value="Kontrak">Kontrak</option>
                                                                 </select>
                                                                 <small class="erroraddStatusKary text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div id="addFieldPermanen" class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="tglPermanen">Tanggal Permanen</label>
                                                                 <input id="tglPermanen" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div id="addFieldKontrakAwal" class="col-lg-4 col-md-4 col-sm-12 d-none">
                                                            <div class="form-group">
                                                                 <label for="tglKontrakAwal">Tanggal Awal</label>
                                                                 <input id="tglKontrakAwal" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div id="addFieldKontrakAkhir" class="col-lg-4 col-md-4 col-sm-12 d-none">
                                                            <div class="form-group">
                                                                 <label for="tglKontrakAkhir">Tanggal Berakhir</label>
                                                                 <input id="tglKontrakAkhir" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addTipeRoster">Tipe Roster</label>
                                                                 <select id='addTipeRoster' name='addTipeRoster' class="form-control form-control-user">
                                                                      <option value="1" default>6 - 2 Week</option>
                                                                      <option value="2">10 - 2 Week</option>
                                                                 </select>
                                                                 <small class="erroraddTipeRoster text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addStatusResidence">Status Residence</label>
                                                                 <select id='addStatusResidence' name='addStatusResidence' class="form-control form-control-user">
                                                                      <option value="R" default>Residence</option>
                                                                      <option value="NR">Non Residence</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addPOHKary">Point of Hire</label>
                                                                 <select id='addPOHKary' name='addPOHKary' class="form-control form-control-user">
                                                                      <option value="">-- Pilih lokasi POH --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addLevelKary">Level</label>
                                                                 <select id='addLevelKary' name='addLevelKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih level karyawan --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addGradeKary">Grade</label>
                                                                 <select id='addGradeKary' name='addGradeKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih grade karyawan --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addLokasiKerja">Lokasi Kerja</label>
                                                                 <select id='addLokasiKerja' name='addLokasiKerja' class="form-control form-control-user">
                                                                      <option value="" default>CPP 33</option>
                                                                      <option value="" default>MSF CPP 33</option>
                                                                      <option value="" default>Head Office Sangkulirang Permai</option>
                                                                      <option value="" default>Office KM14</option>
                                                                      <option value="" default>MSF Port</option>
                                                                      <option value="" default>MCC Port</option>
                                                                      <option value="" default>Office Pengadan</option>
                                                                      <option value="" default>Office Blok Utara</option>
                                                                      <option value="" default>Office Blok 7</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addLokterima">Lokasi Penerimaan</label>
                                                                 <select id='addLokterima' name='addLokterima' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih lokasi penerimaan --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="tglDOH">Date of Hire</label>
                                                                 <input id="tglDOH" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="tglAktif">Tanggal Aktif Bekerja</label>
                                                                 <input id="tglAktif" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addKlasifikasi">Klasifikasi</label>
                                                                 <select id='addKlasifikasi' name='addKlasifikasi' class="form-control form-control-user">
                                                                      <option value="">-- Pilih Klasifikasi --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addStatusPajak">Status Pajak</label>
                                                                 <select id='addStatusPajak' name='addStatusPajak' class="form-control form-control-user">
                                                                      <option value="">-- Pilih Status Pajak --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-5 col-md-5 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="tglNonAktif">Tanggal Nonaktif</label>
                                                                 <input id="tglNonAktif" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-7 col-md-7 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addAlasanNonAktif">Alasan Nonaktif</label>
                                                                 <input id="addAlasanNonAktif" type="text" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- Tab data domisili -->
                                             <div class="tab-pane fade" id="v-pills-dtDomisili" role="tabpanel" aria-labelledby="v-pills-dtDomisili-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addAlamatKTP">Alamat KTP</label>
                                                                 <input id='addAlamatKTP' name='addAlamatKTP' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddAlamatKTP text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="provAlmtKTP">Provinsi :</label><br>
                                                            <select id='provAlmtKTP' name='provAlmtKTP' class="form-control form-control-user">
                                                                 <option value="">-- Pilih Provinsi --</option>
                                                            </select>
                                                            <small class="errorProvAlmtKTP text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="kabAlmtKTP">Kabupaten :</label><br>
                                                            <select id='kabAlmtKTP' name='kabAlmtKTP' class="form-control form-control-user" disabled>
                                                                 <option value="">-- Pilih Kabupaten --</option>
                                                            </select>
                                                            <small class="errorKabAlmtKTP text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="kecAlmtKTP">Kecamatan :</label><br>
                                                            <select id='kecAlmtKTP' name='kecAlmtKTP' class="form-control form-control-user" disabled>
                                                                 <option value="">-- Pilih Kecamatan --</option>
                                                            </select>
                                                            <small class="errorKecAlmtKTP text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                                            <label for="domStatusResidence">Status Residence :</label><br>
                                                            <select id='domStatusResidence' name='domStatusResidence' class="form-control form-control-user">
                                                                 <option value="R">Residence</option>
                                                                 <option value="NR">Non Residence</option>
                                                            </select>
                                                            <small class="errorDomStatusResidence text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div id="addFieldResidence" class="card-body row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label class="floating-label" for="addAlamatTinggal">Lokasi Mess</label>
                                                                      <input id='addAlamatTinggal' name='addAlamatTinggal' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                      <small class="errorAddAlamatTinggal text-danger font-italic font-weight-bold"></small><br>
                                                                 </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label class="floating-label" for="addAlamatTinggal">Blok</label>
                                                                      <input id='addAlamatTinggal' name='addAlamatTinggal' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                      <small class="errorAddAlamatTinggal text-danger font-italic font-weight-bold"></small><br>
                                                                 </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label class="floating-label" for="addAlamatTinggal">Kamar</label>
                                                                      <input id='addAlamatTinggal' name='addAlamatTinggal' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                      <small class="errorAddAlamatTinggal text-danger font-italic font-weight-bold"></small><br>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div id="addFieldNonResidence" class="card-body row d-none">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label class="floating-label" for="addAlamatTinggal">Alamat Tinggal</label>
                                                                      <input id='addAlamatTinggal' name='addAlamatTinggal' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                      <small class="errorAddAlamatTinggal text-danger font-italic font-weight-bold"></small><br>
                                                                 </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                 <label for="provAlmtDom">Provinsi Tinggal : </label><br>
                                                                 <select id='provAlmtDom' name='provAlmtDom' class="form-control form-control-user">
                                                                      <option value="">-- Pilih Provinsi --</option>
                                                                 </select>
                                                                 <small class="errorProvAlmtDom text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                 <label for="kabAlmtDom">Kabupaten Tinggal : </label><br>
                                                                 <select id='kabAlmtDom' name='kabAlmtDom' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih Kabupaten --</option>
                                                                 </select>
                                                                 <small class="errorKabAlmtDom text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                 <label for="kecAlmtDom">Kecamatan Tinggal : </label><br>
                                                                 <select id='kecAlmtDom' name='kecAlmtDom' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih Kecamatan --</option>
                                                                 </select>
                                                                 <small class="errorKecAlmtDom text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- Tab sertifikasi -->
                                             <div class="tab-pane fade" id="v-pills-dtSertifikasi" role="tabpanel" aria-labelledby="v-pills-dtSertifikasi-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-9 col-md-9 col-sm-12 mb-2">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addJnsSertf">Jenis Sertifikasi</label>
                                                                 <select id="addJnsSertf" class="mb-3 form-control">
                                                                      <option value="0" selected>-- Pilih Jenis Sertifikasi --</option>
                                                                 </select>
                                                                 <small class="errorAddJnsSertf text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noSertf">No. Sertifikat</label>
                                                                 <input id='noSertf' name='noSertf' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoSertf text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addTglSertf">Tanggal Sertifikasi</label>
                                                                 <input id='addTglSertf' name='addTglSertf' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddTglSertf text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addTglAkhirSertf">Tanggal Berakhir Sertifikasi</label>
                                                                 <input id='addTglAkhirSertf' name='addTglAkhirSertf' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddTglAkhirSertf text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addKetSertf">Keterangan :</label>
                                                                 <input id='addKetSertf' name='addKetSertf' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddKetSertf text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- Tab medical check up -->
                                             <div class="tab-pane fade" id="v-pills-dtMCU" role="tabpanel" aria-labelledby="v-pills-MCU-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addHasilMCU">Hasil Medical Check Up :</label><br>
                                                                 <input id='addHasilMCU' name='addHasilMCU' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddGasilMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addTglMCU">Tanggal Medical Check Up :</label><br>
                                                                 <input id='addTglMCU' name='addTglMCU' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddTglMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addHasilFMCU">Hasil Follow Up :</label><br>
                                                                 <input id='addHasilFMCU' name='addHasilFMCU' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddHasilFMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addTglFMCU">Tanggal Follow Up :</label><br>
                                                                 <input id='addTglFMCU' name='addTglFMCU' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddTglFMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addKetMCU">Keterangan :</label><br>
                                                                 <input id='addKetMCU' name='addKetMCU' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddKetMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- Tab vaksinasi -->
                                             <div class="tab-pane fade" id="v-pills-dtVaksin" role="tabpanel" aria-labelledby="v-pills-dtVaksin-tab">
                                                  <div class="card-body row">
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="addJenisVaksin">Jenis Vaksin : </label><br>
                                                            <select id='addJenisVaksin' name='addJenisVaksin' class="form-control form-control-user" disabled>
                                                                 <option value="">-- Pilih Jenis Vaksin --</option>
                                                            </select>
                                                            <small class="errorAddJenisVaksin text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="addNamaVaksin">Nama Vaksin : </label><br>
                                                            <select id='addNamaVaksin' name='addNamaVaksin' class="form-control form-control-user" disabled>
                                                                 <option value="">-- Pilih Nama Vaksin --</option>
                                                            </select>
                                                            <small class="errorAddNamaVaksin text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="tglMCU">Tanggal Medical Check Up :</label><br>
                                                                 <input id='addTglMCU' name='addTglMCU' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddTglMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addKetMCU">Keterangan :</label><br>
                                                                 <input id='addKetMCU' name='addKetMCU' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddKetMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- Tab berkas -->
                                             <div class="tab-pane fade" id="v-pills-dtBerkas" role="tabpanel" aria-labelledby="v-pills-dtBerkas-tab">
                                                  <div class="form-group">
                                                       <h5>Unggah Berkas Pendukung</h5>
                                                       <ul>
                                                            <li>Berkas pendukung terdiri dari scan <b>CV, KTP, KK dan Ijazah</b> dari pendidikan terakhir</li>
                                                            <li>File - file berkas pendukung digabung menjadi 1 file dalam bentuk .pdf</li>
                                                            <li>Ukuran maksimal dari file .pdf yang diperbolehkan adalah sebesar 100kb</li>
                                                       </ul>
                                                       <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required="">
                                                            <label class="custom-file-label" for="validatedCustomFile">Pilih berkas...</label>
                                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- Tab kontak darurat -->
                                             <div class="tab-pane fade" id="v-pills-dtKontakDarurat" role="tabpanel" aria-labelledby="v-pills-dtKontakDarurat-tab">
                                                  <p class="mb-0">Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum
                                                       duis
                                                       aliqua do.
                                                       Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo
                                                       eiusmod.
                                                  </p>
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