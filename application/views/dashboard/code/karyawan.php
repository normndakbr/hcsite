<script>
    //========================================== depart ========================================================
    $(document).ready(function() {

        $("#logout").click(function() {
            $("#logoutmdl").modal("show");
        });

        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url("perusahaan/get_all") ?>",
                data: {},
                success: function(data) {
                    var data = JSON.parse(data);
                    $("#perDepart").html(data.prs);
                    $('#perDepart').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".errormsg").removeClass('d-none');
                    $(".errormsg").removeClass('alert-info');
                    $(".errormsg").addClass('alert-danger');
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                        $("#btnTambahDepart").attr("disabled", true);
                    }
                }
            });

            $("#btnrefreshdepart").click(function() {
                $('#tbmKaryawan').LoadingOverlay("show");
                tbmKaryawan.draw()
                $('#tbmKaryawan').LoadingOverlay("hide");
            });

            tbmKaryawan = $('#tbmKaryawan').DataTable({
                "processing": true,
                "responsive": true,
                "serverSide": true,
                "ordering": true,
                "order": [
                    [1, 'asc']
                ],
                "ajax": {
                    "url": "<?= base_url('karyawan/ajax_list'); ?>",
                    "type": "POST",
                    "error": function(xhr, error, code) {
                        if (code != "") {
                            $(".err_psn_depart").removeClass("d-none");
                            $(".err_psn_depart").css("display", "block");
                            $(".err_psn_depart").html("terjadi kesalahan saat melakukan load data karyawan, hubungi administrator");
                            $("#addbtn").addClass("disabled");
                            $(".err_psn_depart ").fadeTo(3000, 500).slideUp(500, function() {
                                $(".err_psn_depart ").slideUp(500);
                            });
                        }
                    }
                },
                "deferRender": true,
                "aLengthMenu": [
                    [10, 25, 50],
                    [10, 25, 50]
                ],
                "columns": [{
                        "data": 'no',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        "className": "text-center align-middle",
                        "width": "1%"
                    },
                    {
                        "data": 'nama_lengkap',
                        "className": "align-middle align-middle",
                    },
                    {
                        "data": 'depart',
                        "className": "text-wrap align-middle",
                    },
                    // {
                    //     "data": 'section',
                    //     "className": "text-nowrap align-middle",
                    // },
                    {
                        "data": 'posisi',
                        "className": "text-wrap align-middle",
                    },
                    {
                        "data": 'kode_perusahaan',
                        "className": "text-wrap align-middle text-center",
                        "width": "1%"
                    },
                    {
                        "data": 'tgl_buat',
                        "className": "text-wrap align-middle text-center",
                        "width": "1%"
                    },
                    {
                        "data": 'proses',
                        "className": "text-center text-nowrap align-middle",
                        "width": "1%"
                    }
                ]
            });
        });

        $("#btnTambahDtPersonal").click(function() {
            var noKTP = $("#noKTP").val();
            var namaLengkap = $("#namaLengkap").val();
            var alamatEmail = $("#alamatEmail").val();
            var noTelp = $("#noTelp").val();
            var tempatLahir = $("#tempatLahir").val();
            var tanggalLahir = $("#tanggalLahir").val();
            var kewarganegaraan = $("#kewarganegaraan").val();
            var agama = $("#agama").val();

            console.log(noKTP);
            console.log(namaLengkap);
            console.log(alamatEmail);
            console.log(noTelp);
            console.log(tempatLahir);
            console.log(tanggalLahir);
            console.log(kewarganegaraan);
            console.log(agama);

            $.ajax({
                type: "POST",
                url: "<?= base_url("karyawan/input_dtPersonal") ?>",
                data: {
                    noKTP: noKTP,
                    namaLengkap: namaLengkap,
                    alamatEmail: alamatEmail,
                    noTelp: noTelp,
                    tempatLahir: tempatLahir,
                    tanggalLahir: tanggalLahir,
                    kewarganegaraan: kewarganegaraan,
                    agama: agama,
                },
                timeout: 20000,
                success: function(data) {
                    console.log(data);
                    var data = JSON.parse(data);
                    console.log(data);
                    if (data.statusCode == 200) {
                        $(".err_psn_dtPersonal").removeClass('d-none');
                        $(".err_psn_dtPersonal").removeClass('alert-danger');
                        $(".err_psn_dtPersonal").addClass('alert-info');
                        $(".err_psn_dtPersonal").html(data.pesan);
                        $("#noTelp").val('');
                        $("#namaLengkap").val('');
                        $("#alamatEmail").val('');
                        $("#noKTP").val('');
                        $(".error1").html('');
                        $(".error2").html('');
                        $(".error3").html('');
                    } else if (data.statusCode == 201) {
                        $(".err_psn_dtPersonal").removeClass('d-none');
                        $(".err_psn_dtPersonal").removeClass('alert-info');
                        $(".err_psn_dtPersonal").addClass('alert-danger');
                        $(".err_psn_dtPersonal").html(data.pesan);
                    } else if (data.statusCode == 202) {
                        $(".error1").html(data.prs);
                        $(".error2").html(data.kode);
                        $(".error3").html(data.depart);
                    }

                    $(".err_psn_dtPersonal").fadeTo(3000, 500).slideUp(500, function() {
                        $(".err_psn_dtPersonal").slideUp(500);
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".err_psn_dtPersonal").removeClass("alert-primary");
                    $(".err_psn_dtPersonal").addClass("alert-danger");
                    $(".err_psn_dtPersonal").css("display", "block");
                    if (xhr.status == 404) {
                        $(".err_psn_dtPersonal").html("Departemen gagal disimpan, Link data tidak ditemukan");
                    } else if (xhr.status == 0) {
                        $(".err_psn_dtPersonal").html("Departemen gagal disimpan, Waktu koneksi habis");
                    } else {
                        $(".err_psn_dtPersonal").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                    }

                    $(".err_psn_dtPersonal ").fadeTo(3000, 500).slideUp(500, function() {
                        $(".err_psn_dtPersonal ").slideUp(500);
                    });
                }
            })
        });

    });
</script>