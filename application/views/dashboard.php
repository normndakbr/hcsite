<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('components/header');?>

<body class=" bg-c-blue">
     <div class="loader-bg">
          <div class="loader-track">
               <div class="loader-fill"></div>
          </div>
     </div>

     <?php $this->load->view('components/sidebar');?>

     <?php $this->load->view('components/navbar')?>

     <div class="pcoded-main-container">
          <div class="pcoded-content">
               <div class="page-header">
                    <div class="page-block">
                         <div class="row align-items-center">
                              <div class="col-md-12">
                                   <div class="page-header-title">
                                        <h5 class="font-italic font-weight-bold text-white">Selamat Datang,</h5>
                                        <h2 class="font-weight-bold text-white" style="margin-top:-10px;"><?=$nama;?>
                                        </h2>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-lg-12 col-md-12" style="margin-top:-20px;">
                         <div class="row">
                              <div class="col-sm-3">
                                   <div class="card">
                                        <div class="card-body">
                                             <div class="row align-items-center">
                                                  <div class="col-8">
                                                       <h4 class="text-c-yellow jmlusr"><?=$jml_karyawan?></h4>
                                                       <h6 class="text-muted m-b-0">Karyawan</h6>
                                                  </div>
                                                  <div class="col-4 text-right">
                                                       <i class="feather icon-user f-28"></i>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="card-footer bg-c-yellow">
                                             <div class="row align-items-center">
                                                  <div class="col-9">
                                                       <a href="#!" onclick="tabelUser()"
                                                            class="text-white m-b-0">Detail</a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-sm-3">
                                   <div class="card">
                                        <div class="card-body">
                                             <div class="row align-items-center">
                                                  <div class="col-8">
                                                       <h4 class="text-c-green jmlmap"><?=$jml_user?></h4>
                                                       <h6 class="text-muted m-b-0">Perusahaan</h6>
                                                  </div>
                                                  <div class="col-4 text-right">
                                                       <i class="feather icon-home f-28"></i>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="card-footer bg-c-green">
                                             <div class="row align-items-center">
                                                  <div class="col-9">
                                                       <a href="#" onclick="" class="text-white m-b-0">Detail</a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-sm-3">
                                   <div class="card">
                                        <div class="card-body">
                                             <div class="row align-items-center">
                                                  <div class="col-8">
                                                       <h4 class="text-c-red"><?=$jml_lgr_aktif?></h4>
                                                       <h6 class="text-muted m-b-0">Pelanggaran</h6>
                                                  </div>
                                                  <div class="col-4 text-right">
                                                       <i class="feather icon-upload-cloud f-28"></i>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="card-footer bg-c-red">
                                             <div class="row align-items-center">
                                                  <div class="col-9">
                                                       <a href='#!' id='detLanggar' name='detLanggar'
                                                            class="text-white m-b-0">Detail</a>
                                                  </div>

                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-sm-3">
                                   <div class="card">
                                        <div class="card-body">
                                             <div class="row align-items-center">
                                                  <div class="col-8">
                                                       <h4 class="text-c-blue">0</h4>
                                                       <h6 class="text-muted m-b-0">Pengajuan SIMPER/MP</h6>
                                                  </div>
                                                  <div class="col-4 text-right">
                                                       <i class="feather icon-file-plus f-28"></i>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="card-footer bg-c-blue">
                                             <div class="row align-items-center">
                                                  <div class="col-9">
                                                       <a href="#" class="text-white m-b-0">Detail</a>
                                                  </div>

                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12">
                         <div class="card latest-update-card">
                              <div class="card-header">
                                   <h5>Jumlah Karyawan Tanggal (Contractor + Sub Contractor): <?=date("d-M-Y");?></h5>
                                   <div class="card-header-right">
                                        <div class="btn-group card-option">
                                             <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false">
                                                  <i class="feather icon-more-horizontal"></i>
                                             </button>
                                             <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                  <li class="dropdown-item full-card">
                                                       <a href="#!"><span><i class="feather icon-maximize"></i>
                                                                 Perbesar</span><span style="display: none"><i
                                                                      class="feather icon-minimize"></i>
                                                                 Restore</span></a>
                                                  </li>
                                                  <li class="dropdown-item minimize-card">
                                                       <a href="#!"><span><i class="feather icon-minus"></i>
                                                                 collapse</span><span style="display: none"><i
                                                                      class="feather icon-plus"></i>
                                                                 expand</span></a>
                                                  </li>
                                                  <li class="dropdown-item reload-card">
                                                       <a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div id="bar-chart-1" class="mt-2"></div>
                              </div>
                         </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                         <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                   <div class="card">
                                        <div class="card-body">
                                             <div class="row align-items-center">
                                                  <div class="col-8">
                                                       <h4 class="text-c-blue"><?=$new_kry?></h4>
                                                       <h6 class="text-muted m-b-0">Data Terbaru</h6>
                                                  </div>
                                                  <div class="col-4 text-right">
                                                       <i class="feather icon-file-plus f-28"></i>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="card-footer bg-c-blue">
                                             <div class="row align-items-center">
                                                  <div class="col-9">
                                                       <a href="<?=base_url('dataterbaru');?>" target="_blank"
                                                            class="text-white m-b-0">Detail</a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12">
                                   <div class="card latest-update-card">
                                        <div class="card-header">
                                             <h5>Jenis Kelamin : <?=date("d-M-Y");?></h5>
                                             <div class="card-header-right">
                                                  <div class="btn-group card-option">
                                                       <button type="button" class="btn dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="feather icon-more-horizontal"></i>
                                                       </button>
                                                       <ul
                                                            class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                            <li class="dropdown-item full-card">
                                                                 <a href="#!"><span><i
                                                                                class="feather icon-maximize"></i>
                                                                           Perbesar</span><span style="display: none"><i
                                                                                class="feather icon-minimize"></i>
                                                                           Restore</span></a>
                                                            </li>
                                                            <li class="dropdown-item minimize-card">
                                                                 <a href="#!"><span><i class="feather icon-minus"></i>
                                                                           collapse</span><span style="display: none"><i
                                                                                class="feather icon-plus"></i>
                                                                           expand</span></a>
                                                            </li>
                                                            <li class="dropdown-item reload-card">
                                                                 <a href="#!"><i class="feather icon-refresh-cw"></i>
                                                                      reload</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="card-body">
                                             <div id="bar-chart-2" class="mt-2"></div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12">
                                   <div class="card latest-update-card">
                                        <div class="card-header">
                                             <h5>Lokasi Terima : <?=date("d-M-Y");?></h5>
                                             <div class="card-header-right">
                                                  <div class="btn-group card-option">
                                                       <button type="button" class="btn dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="feather icon-more-horizontal"></i>
                                                       </button>
                                                       <ul
                                                            class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                            <li class="dropdown-item full-card">
                                                                 <a href="#!"><span><i
                                                                                class="feather icon-maximize"></i>
                                                                           Perbesar</span><span style="display: none"><i
                                                                                class="feather icon-minimize"></i>
                                                                           Restore</span></a>
                                                            </li>
                                                            <li class="dropdown-item minimize-card">
                                                                 <a href="#!"><span><i class="feather icon-minus"></i>
                                                                           collapse</span><span style="display: none"><i
                                                                                class="feather icon-plus"></i>
                                                                           expand</span></a>
                                                            </li>
                                                            <li class="dropdown-item reload-card">
                                                                 <a href="#!"><i class="feather icon-refresh-cw"></i>
                                                                      reload</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="card-body">
                                             <div id="bar-chart-3" class="mt-2"></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                         <div class="card latest-update-card">
                              <div class="card-header">
                                   <h5>Residence : <?=date("d-M-Y");?></h5>
                                   <div class="card-header-right">
                                        <div class="btn-group card-option">
                                             <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false">
                                                  <i class="feather icon-more-horizontal"></i>
                                             </button>
                                             <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                  <li class="dropdown-item full-card">
                                                       <a href="#!"><span><i class="feather icon-maximize"></i>
                                                                 Perbesar</span><span style="display: none"><i
                                                                      class="feather icon-minimize"></i>
                                                                 Restore</span></a>
                                                  </li>
                                                  <li class="dropdown-item minimize-card">
                                                       <a href="#!"><span><i class="feather icon-minus"></i>
                                                                 collapse</span><span style="display: none"><i
                                                                      class="feather icon-plus"></i>
                                                                 expand</span></a>
                                                  </li>
                                                  <li class="dropdown-item reload-card">
                                                       <a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div id="bar-chart-6" class="mt-2"></div>
                              </div>
                         </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12">
                         <div class="card latest-update-card">
                              <div class="card-header">
                                   <h5>Klasifikasi : <?=date("d-M-Y");?></h5>
                                   <div class="card-header-right">
                                        <div class="btn-group card-option">
                                             <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false">
                                                  <i class="feather icon-more-horizontal"></i>
                                             </button>
                                             <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                  <li class="dropdown-item full-card">
                                                       <a href="#!"><span><i class="feather icon-maximize"></i>
                                                                 Perbesar</span><span style="display: none"><i
                                                                      class="feather icon-minimize"></i>
                                                                 Restore</span></a>
                                                  </li>
                                                  <li class="dropdown-item minimize-card">
                                                       <a href="#!"><span><i class="feather icon-minus"></i>
                                                                 collapse</span><span style="display: none"><i
                                                                      class="feather icon-plus"></i>
                                                                 expand</span></a>
                                                  </li>
                                                  <li class="dropdown-item reload-card">
                                                       <a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div id="bar-chart-4" class="mt-2"></div>
                              </div>
                         </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                         <div class="card latest-update-card">
                              <div class="card-header">
                                   <h5>Pendidikan : <?=date("d-M-Y");?></h5>
                                   <div class="card-header-right">
                                        <div class="btn-group card-option">
                                             <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false">
                                                  <i class="feather icon-more-horizontal"></i>
                                             </button>
                                             <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                  <li class="dropdown-item full-card">
                                                       <a href="#!"><span><i class="feather icon-maximize"></i>
                                                                 Perbesar</span><span style="display: none"><i
                                                                      class="feather icon-minimize"></i>
                                                                 Restore</span></a>
                                                  </li>
                                                  <li class="dropdown-item minimize-card">
                                                       <a href="#!"><span><i class="feather icon-minus"></i>
                                                                 collapse</span><span style="display: none"><i
                                                                      class="feather icon-plus"></i>
                                                                 expand</span></a>
                                                  </li>
                                                  <li class="dropdown-item reload-card">
                                                       <a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div id="bar-chart-5" class="mt-2"></div>
                              </div>
                         </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                         <div class="card latest-update-card">
                              <div class="card-header">
                                   <h5>Sertifikasi : <?=date("d-M-Y");?></h5>
                                   <div class="card-header-right">
                                        <div class="btn-group card-option">
                                             <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                                  aria-haspopup="true" aria-expanded="false">
                                                  <i class="feather icon-more-horizontal"></i>
                                             </button>
                                             <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                  <li class="dropdown-item full-card">
                                                       <a href="#!"><span><i class="feather icon-maximize"></i>
                                                                 Perbesar</span><span style="display: none"><i
                                                                      class="feather icon-minimize"></i>
                                                                 Restore</span></a>
                                                  </li>
                                                  <li class="dropdown-item minimize-card">
                                                       <a href="#!"><span><i class="feather icon-minus"></i>
                                                                 collapse</span><span style="display: none"><i
                                                                      class="feather icon-plus"></i>
                                                                 expand</span></a>
                                                  </li>
                                                  <li class="dropdown-item reload-card">
                                                       <a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <div id="bar-chart-7" class="mt-2"></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="modal fade" id="mdlDetLanggarAktif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-dialog-centered" role="document"
               style="margin-left: auto; margin-right: auto;max-width:90%;">
               <div class="modal-content">
                    <div class="modal-header bg-primary">
                         <h5 class="modal-title text-white" id="exampleModalLabel"><i
                                   class="fas fa-exclamation-triangle"></i> Data Pelanggaran Aktif</h5>
                    </div>
                    <div style="background-color:rgba(240,240,240,1);" class="modal-body">
                         <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                   <label for="">Perusahaan :</label><br>
                                   <select id="perDetLgrAktif" name="perDetLgrAktif" class="form-control">
                                        <option value="0">-- SEMUA PERUSAHAAN --</option>
                                        <?=$permst . $perstr;?>
                                   </select><br>
                              </div>

                              <div class="col-lg-12">
                                   <div id="tbLanggarAktif" class="data"></div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end p-2" style="margin-top:10px;">
                         <button type="button" id="btnSelesaiDetLanggar" id="btnSelesaiDetLanggar" data-dismiss="modal"
                              class="btn font-weight-bold btn-primary">Selesai</button>
                    </div>
               </div>
          </div>
     </div>

     <?php $this->load->view('components/footer_js')?>
     <script>
     $("#detLanggar").click(function() {
          let prs = $('#perDetLgrAktif').val();

          $.LoadingOverlay('show');
          $('#mdlDetLanggarAktif').modal('show');
          $('#tbLanggarAktif').load(site_url + "dash/data_langgar_aktif/" + prs);
     });

     $('#perDetLgrAktif').select2({
          theme: 'bootstrap4',
          width: '100%',
          dropdownParent: $('#mdlDetLanggarAktif')
     });

     $('#perDetLgrAktif').change(function() {
          let prs = $('#perDetLgrAktif').val();

          $.LoadingOverlay('show');
          $('#tbLanggarAktif').empty();
          $('#tbLanggarAktif').load(site_url + "dash/data_langgar_aktif/" + prs);
     });
     </script>
     <script src="<?=base_url()?>assets/js/dashboard.js"></script>
     <script>
     let site_url = "http://localhost:8080/hcsite/";
     </script>
     <script>
     $("#txtcarikary").on('keypress', function(e) {
          if (e.which == 13) {
               let txt = $("#txtcarikary").val().replace(/' '/g, "_");
               window.open(site_url + "cari?fdt=" + txt, '_blank');
          }
     });
     </script>
</body>

</html>