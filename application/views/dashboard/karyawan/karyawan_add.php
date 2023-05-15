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
                                             <li><a class="nav-link text-left has-ripple" id="v-pills-dtKontakDarurat-tab" data-toggle="pill" href="#v-pills-dtKontakDarurat" role="tab" aria-controls="v-pills-dtKontakDarurat" aria-selected="false">Kontak Darurat<span class="ripple ripple-animate" style="height: 373.25px; width: 373.25px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -168.188px; left: -119.625px;"></span></a></li>
                                        </ul>
                                   </div>
                                   <div class="col-md-10 col-sm-12">
                                        <div class="tab-content" id="v-pills-tabContent">
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
                                                                 <label class="floating-label" for="alamatEmail">Alamat Email</label>
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
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
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
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="kewarganegaraan">Kewarganegaraan</label>
                                                                 <select id="kewarganegaraan" class="mb-3 form-control">
                                                                      <option value="WNI" selected>WNI</option>
                                                                      <option value="WNA">WNA</option>
                                                                 </select>
                                                                 <small class="errorKewarganegaraan text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
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
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
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
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noBPJSTK">No. BPJS Tenaga Kerja</label>
                                                                 <input id='noBPJSTK' name='noBPJSTK' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoBPJSTK text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noBPJSKES">No. BPJS Kesehatan</label>
                                                                 <input id='noBPJSKES' name='noBPJSKES' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoBPJSKES text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noEquity">No. Equity</label>
                                                                 <input id='noEquity' name='noEquity' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoEquity text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
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
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addNIKKary">NIK</label>
                                                                 <input id='addNIKKary' name='addNIKKary' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="erroraddNIKKary text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
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
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addPOHKary">Point of Hire</label>
                                                                 <select id='addPOHKary' name='addPOHKary' class="form-control form-control-user">
                                                                      <option value="">-- Pilih lokasi POH --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addLevelKary">Level</label>
                                                                 <select id='addLevelKary' name='addLevelKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih level karyawan --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
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
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="v-pills-dtDomisili" role="tabpanel" aria-labelledby="v-pills-dtDomisili-tab">
                                                  <p class="mb-0">Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit
                                                       nostrud magna
                                                       nulla. Velit et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.</p>
                                             </div>
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