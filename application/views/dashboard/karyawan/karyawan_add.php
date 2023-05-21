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
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
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
                                        <a id="addbtn" href="<?= base_url('karyawan/new'); ?>" class="btn btn-sm btn-warning font-weight-bold">Reset Data</a>
                                   </div>
                                   <div class="alert alert-danger err_psn_depart animate__animated animate__bounce d-none"></div>
                              </div>
                              <div class="accordion mt-3" id="accordionExample">
                                   <div id="divDataPersonal" class="card mb-0">
                                        <div class="card-header" id="headingOne">
                                             <h5 class="mb-0"><a href="#!" id="btnDataPersonal" data-toggle="collapse" data-target="#colDataPersonal" aria-expanded="true" aria-controls="colDataPersonal">Data Personal</a></h5>
                                        </div>
                                        <div id="colDataPersonal" class="collapse" aria-labelledby="headingOne">
                                             <div class="card-body mt-3">
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
                                                       <button type="button" id="btnSimpanDataPersonal" class="btn btn-primary">Lanjutkan</button>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div id="divDataKaryawan" class="card mb-0">
                                        <div class="card-header" id="headingTwo">
                                             <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#colDataKaryawan" aria-expanded="true" aria-controls="colDataKaryawan">Data Karyawan</a></h5>
                                        </div>
                                        <div id="colDataKaryawan" class="collapse" aria-labelledby="headingTwo">
                                             <div class="card-body mt-3">
                                                  <div class="card-body row">
                                                       <div class="col-lg-6 col-md-6 col-sm-12 pt-3">
                                                            <label for="addPerKary">Perusahaan :</label>
                                                            <select id='addPerKary' name='addPerKary' class="form-control form-control-user">
                                                                 <option value="">-- Pilih Perusahaan --</option>
                                                            </select>
                                                            <small class="errorAddPerKary text-danger font-italic font-weight-bold"></small>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12 pt-3">
                                                            <div class="form-group">
                                                                 <label for="addDepartKary">Departemen :</label>
                                                                 <select id='addDepartKary' name='addDepartKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih Departemen --</option>
                                                                 </select>
                                                                 <small class="errorAddDepartKary text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addSectionKary">Section :</label>
                                                                 <select id='addSectionKary' name='addSectionKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih Section --</option>
                                                                 </select>
                                                                 <small class="errorAddSectionKary text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addPosisiKary">Posisi :</label>
                                                                 <select id='addPosisiKary' name='addPosisiKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih Posisi --</option>
                                                                 </select>
                                                                 <small class="errorAddPosisiKary text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addEmailPerusahaan">Alamat Email Perusahaan</label>
                                                                 <input id='addEmailPerusahaan' name='addEmailPerusahaan' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddEmailPerusahaan text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addNIKKary">NIK Karyawan</label>
                                                                 <input id='addNIKKary' name='addNIKKary' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="erroraddNIKKary text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addJenisKary">Jenis Karyawan</label>
                                                                 <select id='addJenisKary' name='addJenisKary' class="form-control form-control-user">
                                                                      <option value="Staff">Staff</option>
                                                                      <option value="Non Staff">Non Staff</option>
                                                                 </select>
                                                                 <small class="erroraddJenisKary text-danger font-italic font-weight-bold"></small>
                                                            </div>
                                                       </div>
                                                       <!-- I've never been into the silent place before but my life now is totally in that place. -->
                                                       <!-- My brother passed away recently from suicide. It has been a really tough pill to swallow, we were very very close. It feels like he was a part of me that has now died. There was no note, or any explanation. He just wanted a way out and took it. When I first found this song I started bawling my eyes out, as it brought a lot of memories up. Rest in peace, William 2002-2021. Please, if you are having suicidal thoughts call someone, if you don't have anyone to talk to, call a hotline! Your life doesn't have to end now, even if things are really bad now doesn't mean it's going to be like this forever. -->
                                                       <!-- “Just because I’m breathing doesn’t mean I’m living ...” -->
                                                       <!-- I live a life of joy and happiness. Just in my imagination. -->
                                                       <!-- The saddest feeling is when u have a lot to talk about but you just can't. Only tears falling down and you cried so loud but no voice... -->
                                                       <!-- you still there ? -->
                                                       <!-- You are used to being sad so when you are felling happy you feel weird. -->
                                                       <!-- You cant feel anything  -->
                                                       <!-- You want to do something but you are stuck... -->
                                                       <!-- You dont socialize enough and when youre old people dont even notice you. and even if they do they think you want to be alone. -->
                                                       <!-- You want to be alone, you wanto feel sad, its like somethings pulling you down... An anchor.. -->
                                                       <!-- Well.. some people really have no one who will remember them even of they die. No one. -->
                                                       <!-- I totally understand.  Everything about me is unneeded - I love but no one wants it from me. Sad to know my death will be alone and even no one to even attend my funeral -->
                                                       <!-- People WILL miss and cry in your absence, thing is that they'll eventually start to smile again and brighter without you. It's how it's always been and will continue to be like this -->
                                                       <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addStatusKary">Status Karyawan</label>
                                                                 <select id='addStatusKary' name='addStatusKary' class="form-control form-control-user">
                                                                      <option value="Permanen" default>Permanen</option>
                                                                      <option value="Kontrak">Kontrak</option>
                                                                 </select>
                                                                 <small class="erroraddStatusKary text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addTipeRoster">Tipe Roster</label>
                                                                 <select id='addTipeRoster' name='addTipeRoster' class="form-control form-control-user">
                                                                      <option value="1" default>6 - 2 Week</option>
                                                                      <option value="2">10 - 2 Week</option>
                                                                 </select>
                                                                 <small class="erroraddTipeRoster text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <!-- Tips Produktif -->
                                                       <!-- 1. Gunakan to do list apa aja yang harus dikerjakan hari itu, coba pake google keep -->
                                                       <!-- 2. Lo kerjain yang kecil kecil aja dulu. Breakdown task lo jadi task yang kecil kecil -->
                                                       <!-- 3. Bikin banyak project secara bersamaan tapi kerjainnya sepenggal sepenggal. Biar gak bosen mungkin? -->
                                                       <!-- 4. Jangan lupa bersenang - senang. Kombinasikan main game dan kerja. -->
                                                       <!-- 5. Punya jam yang spesifik. Lu punya satu waktu dimana dipake buat bener bener kerja -->
                                                       <!-- 6. Kurangin meeting yang buat ga produktif, kurangin meeting, kerjain project aja -->
                                                       <!-- 7. Olahraga sambil melamun. Kadang kalo badan gerak sambil ngelamunin hal hal yang kita kerjain, banyak ide ide yang timbul ketika lagi olahraga -->
                                                       <!-- 8. Kurangin hal - hal yang ga penting. Gimana caranya di sekeliling itu ga usah banyak distraksi -->
                                                       <!-- 9. Biasakan mencatat apapun. Semua yang dipikirin di hari itu gua catet. Lagi ngelamun dan dapet ide dicatet, semua ide dicatet -->
                                                       <!-- 10. Delegasi, menyerahkan semua tugas ke orang lain. Biar lo bisa fokus ngerjain hal - hal lain yang lebih bisa lo kerjain (concern) -->
                                                       <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addStatusResidence">Status Residence</label>
                                                                 <select id='addStatusResidence' name='addStatusResidence' class="form-control form-control-user">
                                                                      <option value="R" default>Residence</option>
                                                                      <option value="NR">Non Residence</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div id="addFieldPermanen" class="col-lg-8 col-md-8 col-sm-12">
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
                                                                 <label for="tglKontrakAkhir">Tanggal Akhir</label>
                                                                 <input id="tglKontrakAkhir" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="tglDOH">Date of Hire</label>
                                                                 <input id="tglDOH" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                                                            <div class="form-group">
                                                                 <label for="tglAktif">Tanggal Aktif Bekerja</label>
                                                                 <input id="tglAktif" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pt-2">
                                                            <div class="form-group">
                                                                 <label for="addLevelKary">Level</label>
                                                                 <select id='addLevelKary' name='addLevelKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih level karyawan --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pt-2">
                                                            <div class="form-group">
                                                                 <label for="addGradeKary">Grade</label>
                                                                 <select id='addGradeKary' name='addGradeKary' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih grade karyawan --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                 <label for="addLokterima">Lokasi Penerimaan</label>
                                                                 <select id='addLokterima' name='addLokterima' class="form-control form-control-user" disabled>
                                                                      <option value="">-- Pilih lokasi penerimaan --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pt-2">
                                                            <div class="form-group">
                                                                 <label for="addPOHKary">Point of Hire</label>
                                                                 <select id='addPOHKary' name='addPOHKary' class="form-control form-control-user">
                                                                      <option value="">-- Pilih lokasi POH --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pt-2">
                                                            <div class="form-group">
                                                                 <label for="addLokasiKerja">Lokasi Kerja</label>
                                                                 <select id='addLokasiKerja' name='addLokasiKerja' class="form-control form-control-user">
                                                                      <option value="" default>CPP 33</option>
                                                                      <option value="">MSF CPP 33</option>
                                                                      <option value="">Head Office Sangkulirang Permai</option>
                                                                      <option value="">Office KM14</option>
                                                                      <option value="">MSF Port</option>
                                                                      <option value="">MCC Port</option>
                                                                      <option value="">Office Pengadan</option>
                                                                      <option value="">Office Blok Utara</option>
                                                                      <option value="">Office Blok 7</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pt-2">
                                                            <div class="form-group">
                                                                 <label for="addKlasifikasi">Klasifikasi</label>
                                                                 <select id='addKlasifikasi' name='addKlasifikasi' class="form-control form-control-user">
                                                                      <option value="">-- Pilih Klasifikasi --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pt-2">
                                                            <div class="form-group">
                                                                 <label for="addStatusPajak">Status Pajak</label>
                                                                 <select id='addStatusPajak' name='addStatusPajak' class="form-control form-control-user">
                                                                      <option value="">-- Pilih Status Pajak --</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-4 col-md-4 col-sm-12 pt-2">
                                                            <div class="form-group">
                                                                 <label for="tglNonAktif">Tanggal Nonaktif</label>
                                                                 <input id="tglNonAktif" type="date" class="form-control" value="" style="background-color:transparent;">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12 pt-2">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addAlasanNonAktif">Alasan Nonaktif</label>
                                                                 <input id="addAlasanNonAktif" type="text" class="form-control" value="" style="background-color:transparent;">
                                                                 <small class="errorAddAlasanNonAktif text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <button type="button" id="btnSimpanDataKaryawan" class="btn btn-primary">Simpan & Lanjutkan</button>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div id="divDataDomisili" class="card mb-0">
                                        <div class="card-header" id="headingThree">
                                             <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#colDataDomisili" aria-expanded="true" aria-controls="colDataDomisili">Data Domisili</a></h5>
                                        </div>
                                        <div id="colDataDomisili" class="collapse" aria-labelledby="headingThree">
                                             <div class="card-body mt-4">
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
                                        </div>
                                   </div>
                                   <div id="divDataSertifikasi" class="card mb-0">
                                        <div class="card-header" id="headingThree">
                                             <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#colDataSertifikasi" aria-expanded="true" aria-controls="colDataSertifikasi">Data Sertifikasi</a></h5>
                                        </div>
                                        <div id="colDataSertifikasi" class="collapse" aria-labelledby="headingThree">
                                             <div class="card-body mt-4">
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
                                        </div>
                                   </div>
                                   <div id="divDataMCU" class="card mb-0">
                                        <div class="card-header" id="headingThree">
                                             <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#colDataMCU" aria-expanded="true" aria-controls="colDataMCU">Data Medical Check Up</a></h5>
                                        </div>
                                        <div id="colDataMCU" class="collapse" aria-labelledby="headingThree">
                                             <div class="card-body mt-3">
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
                                                                 <label class="floating-label" for="addKetMCU">Keterangan :</label>
                                                                 <input id='addKetMCU' name='addKetMCU' type="text" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddKetMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div id="divDataVaksinasi" class="card mb-0">
                                        <div class="card-header" id="headingThree">
                                             <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#colDataVaksinasi" aria-expanded="true" aria-controls="colDataVaksinasi">Data Vaksinasi</a></h5>
                                        </div>
                                        <div id="colDataVaksinasi" class="collapse" aria-labelledby="headingThree">
                                             <div class="card-body mt-3">
                                                  <div class="card-body row">
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="addJenisVaksin">Jenis Vaksin : </label>
                                                            <select id='addJenisVaksin' name='addJenisVaksin' class="form-control form-control-user" required>
                                                                 <option value="">-- Pilih Jenis Vaksin --</option>
                                                            </select>
                                                            <small class="errorAddJenisVaksin text-danger font-italic font-weight-bold"></small>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label for="addNamaVaksin">Nama Vaksin : </label>
                                                            <select id='addNamaVaksin' name='addNamaVaksin' class="form-control form-control-user" required>
                                                                 <option value="">-- Pilih Nama Vaksin --</option>
                                                            </select>
                                                            <small class="errorAddNamaVaksin text-danger font-italic font-weight-bold"></small>
                                                       </div>
                                                       <div class="col-lg-6 col-md-6 col-sm-12 mt-4 pt-2">
                                                            <div class="form-group">
                                                                 <label for="tglMCU">Tanggal Medical Check Up :</label>
                                                                 <input id='addTglMCU' name='addTglMCU' type="date" autocomplete="off" spellcheck="false" class="form-control" value="" required>
                                                                 <small class="errorAddTglMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                 <label class="floating-label" for="addKetMCU">Keterangan :</label>
                                                                 <input id='addKetMCU' name='addKetMCU' type="text" autocomplete="off" spellcheck="false" class="form-control" value="">
                                                                 <small class="errorAddKetMCU text-danger font-italic font-weight-bold"></small><br>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div id="divDataBerkas" class="card mb-0">
                                        <div class="card-header" id="headingThree">
                                             <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#colDataBerkas" aria-expanded="true" aria-controls="colDataBerkas">Berkas Pendukung</a></h5>
                                        </div>
                                        <div id="colDataBerkas" class="collapse" aria-labelledby="headingThree">
                                             <div class="card-body mt-3">
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
                                        </div>
                                   </div>
                                   <div id="divDataKontakDarurat" class="card mb-0">
                                        <div class="card-header" id="headingThree">
                                             <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#colDataKontakDarurat" aria-expanded="true" aria-controls="colDataKontakDarurat">Kontak Darurat</a></h5>
                                        </div>
                                        <div id="colDataKontakDarurat" class="collapse" aria-labelledby="headingThree">
                                             <div class="card-body mt-3">
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