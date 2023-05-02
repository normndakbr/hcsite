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
                                   <div class="alert alert-danger err_psn_dtPersonal animate__animated animate__bounce d-none"></div>
                              </div>
                              <div class="accordion" id="accordionExample">
                                   <div class="card mb-0">
                                        <div class="card-header" id="headingOne">
                                             <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Data Pribadi</a></h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                             <form class=" mx-3 py-4">
                                                  <div class="card-body row">
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noKTP">No. KTP</label>
                                                                 <input id='noKTP' name='noKTP' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoKTP text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="namaLengkap">Nama Lengkap</label>
                                                                 <input id='namaLengkap' name='namaLengkap' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNamaLengkap text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="alamatEmail">Alamat Email</label>
                                                                 <input id='alamatEmail' name='alamatEmail' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAlamatEmail text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="noTelp">No. Telp</label>
                                                                 <input id='noTelp' name='noTelp' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorNoTelp text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="tempatLahir">Tempat & Tanggal Lahir</label>
                                                                 <input id='tempatLahir' name='tempatLahir' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorTempatLahir text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <!-- <label class="floating-label" for="tanggalLahir">Tanggal Lahir :</label> -->
                                                                 <input id='tanggalLahir' name='tanggalLahir' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorTanggalLahir text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="usia">Usia</label>
                                                                 <input id='usia' name='usia' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" readonly>
                                                                 <small class="errorUsia text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div> -->
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="kewarganegaraan">Kewarganegaraan</label>
                                                                 <!-- <input id='kewarganegaraan' name='kewarganegaraan' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required> -->
                                                                 <select id="kewarganegaraan" class="mb-3 form-control">
                                                                      <option value="WNI" default>WNI</option>
                                                                      <option value="WNA">WNA</option>
                                                                 </select>
                                                                 <small class="errorKewarganegaraan text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-2 col-md-2 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="agama">Agama</label>
                                                                 <!-- <input id='kewarganegaraan' name='kewarganegaraan' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required> -->
                                                                 <select id="agama" class="mb-3 form-control">
                                                                      <option value="islam" default>Islam</option>
                                                                      <option value="kristen">Kristen</option>
                                                                      <option value="katolik">Katolik</option>
                                                                      <option value="hindu">Hindu</option>
                                                                      <option value="budha">Budha</option>
                                                                      <option value="konghucu">Konghucu</option>
                                                                 </select>
                                                                 <small class="errorKewarganegaraan text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <button type="button" name="btnTambahDtPersonal" id="btnTambahDtPersonal" class="btn font-weight-bold btn-primary ml-3">Simpan & Lanjutkan</button>
                                                       <!-- <button type="submit" class="btn btn-primary ml-3">Simpan & Lanjutkan</button> -->
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                                   <div class="card mb-0">
                                        <div class="card-header" id="headingFour">
                                             <h5 class="mb-0"><a href="#!" id="collapseDataDomisili" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Data Domisili</a></h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                             <form class=" mx-3 py-4">
                                                  <div class="card-body row">
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="alamatLengkap">Alamat Lengkap</label>
                                                                 <input id='alamatLengkap' name='alamatLengkap' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                            </div>
                                                            <small class="erroralamatLengkap text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="kecamatan">Kecamatan</label>
                                                                 <select id="addKecamatan" class="mb-0 form-control" required>
                                                                      <option value="">Data Tidak Ditemukan</option>
                                                                      <!-- <option value="wni" default>Warga Negara Indonesia (WNI)</option>
                                                                      <option value="wna">Warga Negara Asing (WNA)</option> -->
                                                                 </select>
                                                            </div>
                                                            <small class="errorKecamatan text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="kelurahan">Kelurahan</label>
                                                                 <select id="addKelurahan" class="mb-0 form-control" required>
                                                                      <option value="">Data Tidak Ditemukan</option>
                                                                 </select>
                                                            </div>
                                                            <small class="errorKelurahan text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="kabupaten">Kabupaten</label>
                                                                 <select id="addKabupaten" class="mb-0 form-control" required>
                                                                      <option value="">Data Tidak Ditemukan</option>
                                                                 </select>
                                                            </div>
                                                            <small class="errorKabupaten text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="provinsi">Provinsi</label>
                                                                 <select id="addProvinsi" class="mb-0 form-control" required>
                                                                      <option value="">Data Tidak Ditemukan</option>
                                                                 </select>
                                                            </div>
                                                            <small class="errorProvinsi text-danger font-italic font-weight-bold"></small><br>
                                                       </div>
                                                       <button type="submit" class="btn  btn-primary ml-3">Simpan Data Domisili</button>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
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
                                                            <button type="submit" class="btn btn-primary ml-3">Tambah Data Kontak Darurat</button>
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
                                                  <button type="submit" class="btn  btn-primary ml-3">Simpan Data Medical Check Up</button>
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