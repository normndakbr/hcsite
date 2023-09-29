<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('components/header'); ?>

<body class=" bg-c-blue">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <?php $this->load->view('components/sidebar'); ?>

    <?php $this->load->view('components/navbar') ?>

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
                                    <a id="bc1" href="#">
                                        Karyawan
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a id="bc2">
                                        Tabel Karyawan
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
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card">
                                            <a href="#!"><span><i class="feather icon-maximize"></i>
                                                    Fullscreen</span><span style="display: none"><i
                                                        class="feather icon-minimize"></i> Restore</span></a>
                                        </li>
                                        <li class="dropdown-item minimize-card">
                                            <a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span
                                                    style="display: none"><i class="feather icon-plus"></i>
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
                            <div class="mt-3">
                                <div class="mb-2">
                                    <a href="<?= base_url('karyawan'); ?>"
                                        class="btn btn-primary font-weight-bold">Refresh / Data</a>
                                    <a id="addbtn" href="<?= base_url('create_karyawan'); ?>"
                                        class="btn btn-success font-weight-bold">Tambah Data</a>
                                </div>
                                <div class="alert alert-danger err_psn_depart animate__animated animate__bounce d-none">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div
                                        class="alert alert-danger errormsgper animate__animated animate__bounce d-none mb-3">
                                    </div>
                                    <h6 class="mt-3">Pilih Perusahaan Utama<span class="text-danger">*</span></h6>
                                    <select id='perJenisData' name='perJenisData'
                                        class="form-control form-control-user">
                                        <option value="">-- PILIH PERUSAHAAN --</option>
                                        <?= $permst . $perstr; ?>
                                    </select>
                                    <small class="error1str text-danger font-italic font-weight-bold"></small><br>
                                </div>
                                <div class="col-lg-6 col-md-8 col-sm-12 ml-4 mb-3">
                                    <input type="checkbox" class="form-check-input" id="check_karyawan">
                                    <label for="check_karyawan" class="form-check-label">Tampilkan karyawan
                                        nonaktif</label><br>
                                </div>
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="tbmKaryawan"
                                            class="table table-striped table-bordered table-hover text-black"
                                            style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                            <thead>
                                                <tr class="font-weight-boldtext-white">
                                                    <th class="text-center align-middle">Aksi</th>
                                                    <th class="text-center align-middle">No.</th>
                                                    <th class="text-center align-middle">NIK</th>
                                                    <th class="text-center align-middle">Nama</th>
                                                    <th class="text-center align-middle">Departemen</th>
                                                    <th class="text-center align-middle">Posisi</th>
                                                    <th class="text-center align-middle">Perusahaan</th>
                                                    <th class="text-center align-middle">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($karyawan as $data) {
                                                    $auth_karyawan = $data['auth_karyawan'];
                                                    $id_kary = $data['id_kary'];
                                                    $no_nik = $data['no_nik'];
                                                    $nama_lengkap = $data['nama_lengkap'];
                                                    $depart = $data['depart'];
                                                    $posisi = $data['posisi'];
                                                    $kode_perusahaan = $data['kode_perusahaan'];
                                                    $tgl_nonaktif = $data['tgl_nonaktif'];
                                                    $no++;
                                                ?>
                                                <tr
                                                    <?= $tgl_nonaktif == null || $tgl_nonaktif == '' ? 'class="karyawanAktif"' : 'class="karyawanNonaktif" style="display:none;"' ?>>
                                                    <td class="text-center align-middle">
                                                        <a href="" class="btn btn-sm btn-info" data-toggle="tooltip"
                                                            title="Detail Data" target="_blank"><i
                                                                class="feather icon-info"></i></a>
                                                        <a href="" class="btn btn-sm btn-success" data-toggle="tooltip"
                                                            title="Edit Data" target="_blank"><i
                                                                class="feather icon-edit"></i></a>
                                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                            title="Hapus Data"><i
                                                                class="feather icon-trash-2"></i></button>
                                                        <button class="btn btn-sm btn-primary" data-toggle="tooltip"
                                                            title="Opsi Lainnya"><i
                                                                class="feather icon-more-horizontal"></i></button>
                                                    </td>
                                                    <td class="text-center align-middle"><?= $no ?>.</td>
                                                    <td class="text-center align-middle"><?= $no_nik ?></td>
                                                    <td class="text-center align-middle"><?= $nama_lengkap ?></td>
                                                    <td class="text-truncate text-center align-middle"
                                                        style="max-width: 100px;" data-toggle="tooltip"
                                                        title="<?= $depart ?>"><?= $depart ?></td>
                                                    <td class="text-truncate text-center align-middle"
                                                        style="max-width: 100px;" data-toggle="tooltip"
                                                        title="<?= $posisi ?>"><?= $posisi ?></td>
                                                    <td class="text-center align-middle"><?= $kode_perusahaan ?></td>
                                                    <td class="text-center align-middle">
                                                        <?= $tgl_nonaktif == null || $tgl_nonaktif == '' ? '<span class="btn btn-sm btn-success">AKTIF</span>' : '<span class="btn btn-sm btn-danger">NONAKTIF</span>' ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('components/footer_js') ?>
</body>

</html>