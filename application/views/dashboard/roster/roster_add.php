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
                                        <a href="<?= base_url('Roster'); ?>">
                                             Roster
                                        </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                        <a id="bc2">
                                             Tambah Roster
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
                              <h5>Roster</h5>
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
                                        <a href="<?= base_url('roster'); ?>" class="btn btn-primary font-weight-bold">Refresh / Data</a>
                                        <a href="<?= base_url('roster/new'); ?>" class="btn btn-success font-weight-bold">Tambah Data</a>
                                   </div>
                                   <div class="alert alert-danger err_psn_roster animate__animated animate__bounce d-none"></div>
                              </div>
                              <div class="row ">
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="perRoster">Perusahaan :</label><br>
                                        <select id='perRoster' name='perRoster' class="form-control form-control-user">
                                             <option value="">-- Pilih Perusahaan --</option>
                                        </select>
                                        <small class="error1 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <hr>
                                   </div>
                                   <div class="col-lg-2 col-md-3 col-sm-12">
                                        <label for="kodeRoster">Kode :</label>
                                        <input id='kodeRoster' name='kodeRoster' type="text" title="Wajib diisi" autocomplete="off" spellcheck="false" class="form-control form-control-user" value="" required>
                                        <small class="error2 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-6 col-md-9 col-sm-12">
                                        <label for="Roster">Roster :</label>
                                        <input id='Roster' type="text" autocomplete="off" title="Wajib diisi" spellcheck="false" class="form-control form-control-user" value="" required>
                                        <small class="error3 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-2 col-md-6 col-sm-12">
                                        <label for="masaOnsiteRoster">Masa Onsite <strong>(Hari)</strong> :</label>
                                        <input id='masaOnsiteRoster' type="number" autocomplete="off" title="Wajib diisi" placeholder="Isi dengan angka" spellcheck="false" class="form-control form-control-user" value="" required>
                                        <small class="error4 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-2 col-md-6 col-sm-12">
                                        <label for="masaOffsiteRoster">Masa Offsite <strong>(Hari)</strong> :</label>
                                        <input id='masaOffsiteRoster' type="number" autocomplete="off" title="Wajib diisi" placeholder="Isi dengan angka" spellcheck="false" class="form-control form-control-user" value="" required>
                                        <small class="error5 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="ketRoster">Keterangan :</label><br>
                                        <textarea id='ketRoster' type="text" autocomplete="off" spellcheck="false" class="form-control form-control-user"></textarea>
                                        <small class="error6 text-danger font-italic font-weight-bold"></small><br>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12">
                                        <hr class="mb-2">
                                        <button type="button" name="btnTambahRoster" id="btnTambahRoster" class="btn font-weight-bold btn-primary">Simpan</button>
                                        <button type="button" name="btnBatalRoster" id="btnBatalRoster" class="btn font-weight-bold btn-danger">Batal</button>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>