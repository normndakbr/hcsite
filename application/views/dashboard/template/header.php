<!DOCTYPE html>
<html lang="en">

<head>
     <title>eEmployee - Dashboard</title>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="description" content="" />
     <meta name="keywords" content="" />
     <meta name="author" content="Phoenixcoded" />
     <!-- Favicon icon -->

     <link rel="icon" href="<?= base_url(); ?>assets/assets/images/favicon.ico" type="image/x-icon" />
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
     <link rel="stylesheet" href="<?= base_url(); ?>assets/assets/css/select2.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
     <link rel='stylesheet' href='<?= base_url(); ?>assets/assets/css/sweetalert2.min.css'>
     <link rel="stylesheet" href="<?= base_url(); ?>assets/assets/css/style.css" />
     <style>
          .swal2-container {
               z-index: 20000 !important;
          }

          /* Chrome, Safari, Edge, Opera */
          input::-webkit-outer-spin-button,
          input::-webkit-inner-spin-button {
               -webkit-appearance: none;
               margin: 0;
          }

          /* Firefox */
          input[type=number] {
               -moz-appearance: textfield;
          }
     </style>
</head>

<body class=" bg-c-blue">
     <div class="loader-bg">
          <div class="loader-track">
               <div class="loader-fill"></div>
          </div>
     </div>
     <nav class="pcoded-navbar menu-light position-fixed">
          <div class="navbar-wrapper">
               <div class="navbar-content scroll-div">
                    <div class="">
                         <div class="main-menu-header">
                              <img class="img-radius" src="<?= base_url(); ?>assets/assets/images/user/avatar-2.jpg" alt="User-Profile-Image" />
                              <div class="user-details">
                                   <div id="more-details">
                                        Administrator <i class="fa fa-caret-down"></i>
                                   </div>
                              </div>
                         </div>
                         <div class="collapse" id="nav-user-link">
                              <ul class="list-unstyled">
                                   <li class="list-group-item">
                                        <a href="user-profile.html"><i class="feather icon-user m-r-5"></i>Profil</a>
                                   </li>
                                   <li class="list-group-item">
                                        <a href="<?= base_url('gantisandi'); ?>"><i class="feather icon-lock m-r-5"></i>Ganti Sandi</a>
                                   </li>
                                   <li class="list-group-item">
                                        <a href="#" id="logout"><i class="feather icon-log-out m-r-5"></i>Logout</a>
                                   </li>
                              </ul>
                         </div>
                    </div>

                    <ul class="nav pcoded-inner-navbar">
                         <li class="nav-item pcoded-menu-caption">
                              <label>Navigation</label>
                         </li>
                         <li class="nav-item">
                              <a href="<?= base_url('dash'); ?>" onclick="calldash()" class="nav-link"><span class="pcoded-micon"><i class="feather icon-globe"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                         </li>
                         <li class="nav-item pcoded-menu-caption">
                              <label>Data Master</label>`
                         </li>
                         <li class="nav-item pcoded-hasmenu">
                              <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Data Perusahaan</span></a>
                              <ul class="pcoded-submenu">
                                   <li><a href="<?= base_url('perusahaan'); ?>">Perusahaan</a></li>
                                   <li><a href="#">Struktur Perusahaan</a></li>
                              </ul>
                         </li>
                         <li class="nav-item pcoded-hasmenu">
                              <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-share-2"></i></span><span class="pcoded-mtext">Data Pekerjaan</span></a>
                              <ul class="pcoded-submenu">
                                   <li><a href="<?= base_url('departemen'); ?>">Departemen</a></li>
                                   <li><a href="<?= base_url('section'); ?>">Section</a></li>
                                   <li><a href="<?= base_url('posisi'); ?>">Posisi</a></li>
                                   <li><a href="<?= base_url('level'); ?>">Level</a></li>
                                   <li><a href="<?= base_url('grade'); ?>">Grade</a></li>
                                   <li><a href="<?= base_url('tipe'); ?>">Tipe</a></li>
                                   <li><a href="<?= base_url('perjanjian'); ?>">Status Perjanjian</a></li>
                                   <li><a href="<?= base_url('roster'); ?>">Roster</a></li>
                                   <li><a href="<?= base_url('bank'); ?>">Bank</a></li>
                                   <li><a href="<?= base_url('sanksi'); ?>">Sanksi</a></li>
                              </ul>
                         </li>
                         <li class="nav-item pcoded-hasmenu">
                              <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Data Daerah</span></a>
                              <ul class="pcoded-submenu">
                                   <li><a href="<?= base_url('lokasikerja'); ?>">Lokasi Kerja</a></li>
                                   <li><a href="<?= base_url('lokasipenerimaan'); ?>">Lokasi Penerimaan</a></li>
                                   <li><a href="<?= base_url('poh'); ?>">Point of Hire</a></li>
                              </ul>
                         </li>
                         <li class="nav-item pcoded-hasmenu">
                              <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Data Karyawan</span></a>
                              <ul class="pcoded-submenu">
                                   <li><a href="<?= base_url('karyawan'); ?>">Karyawan</a></li>
                                   <li><a href="#">Approval</a></li>
                              </ul>
                         </li>
                         <li class="nav-item pcoded-menu-caption">
                              <label>Data Utama</label>
                         </li>
                         <li class="nav-item pcoded-hasmenu">
                              <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Data</span></a>
                              <ul class="pcoded-submenu">
                                   <li><a href="#">Pelanggaran</a></li>
                              </ul>
                         </li>
                         <li class="nav-item pcoded-menu-caption">
                              <label>Laporan</label>
                         </li>
                         <li class="nav-item pcoded-hasmenu">
                              <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Data Karyawan</span></a>
                              <ul class="pcoded-submenu">
                                   <li><a href="#!" class="nav-link">Data Karyawan</a></li>
                              </ul>
                         </li>
                         <li class="nav-item pcoded-menu-caption">
                              <label>Sistem</label>
                         </li>
                         <li class="nav-item pcoded-hasmenu">
                              <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Sistem</span></a>
                              <ul class="pcoded-submenu">
                                   <li><a href="#">Audit</a></li>
                                   <li><a href="#">Akses Menu</a></li>
                                   <li><a href="#">User</a></li>
                              </ul>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
          <div class="m-header">
               <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
               <a href="#!" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
               </a>
          </div>
          <div class="collapse navbar-collapse">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                         <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                         <div class="search-bar">
                              <input type="text" class="form-control border-0 shadow-none" placeholder="Ketikkan No. KTP / NIK / Nama Karyawan " />
                              <button type="button" class="close" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                    </li>
               </ul>
          </div>
     </header>