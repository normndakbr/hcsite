<script>
    $(document).ready(function() {
        $.LoadingOverlaySetup({
            background: "rgba(255, 255, 255, 1)",
        });

        $("#logout").click(function() {
            $("#logoutmdl").modal("show");
        });

        $('#noKTPCek').inputmask("9999999999999999", {
            "placeholder": ""
        });
        $('#noKTP').inputmask("9999999999999999", {
            "placeholder": ""
        });
        $('#noKK').inputmask("9999999999999999", {
            "placeholder": ""
        });
        $('#noNPWP').inputmask("99.999.999.9-999.999");
        $('#addNoNPWP').inputmask("99.999.999.9-999.999");

        $('#addNoNPWP').keyup(function(e) {
            let nonpwp = $('#addNoNPWP').val().trim();

            if (nonpwp != "") {
                jmlnpwp = nonpwp.replace(/['.'|_|-]/g, '');
                jml = jmlnpwp.length;

                if (jml < 15) {
                    $('.errorAddNoNPWP').html('<p>No. NPWP minimal 15 karakter</p>');
                } else {
                    $('.errorAddNoNPWP').html('');
                }
            } else {
                $('.errorAddNoNPWP').html('');
            }
        });

        $("#addStatusKary").change(function() {
            let currentStatusKary = $("#addStatusKary").val();

            if (currentStatusKary == "Permanen") {
                $("#addFieldKontrakAwal").addClass('d-none');
                $("#addFieldKontrakAkhir").addClass('d-none');
                $("#addFieldPermanen").removeClass('d-none');
            } else {
                $("#addFieldKontrakAwal").removeClass('d-none');
                $("#addFieldKontrakAkhir").removeClass('d-none');
                $("#addFieldPermanen").addClass('d-none');
            }
        });

        $("#domStatusResidence").change(function() {
            let domStatusResidence = $("#domStatusResidence").val();

            if (domStatusResidence == "R") {
                $("#addFieldNonResidence").addClass('d-none');
                $("#addFieldResidence").removeClass('d-none');
            } else {
                $("#addFieldNonResidence").removeClass('d-none');
                $("#addFieldResidence").addClass('d-none');
            }
        });

        $("#clKaryawan-click").click(function() {
            if ($("#colKaryawan").hasClass("show")) {
                $("#colKaryawan").collapse("hide");
            } else {
                $("#colKaryawan").collapse("show");
            }
        });

        $("#clPersonal-click").click(function() {
            if ($("#colPersonal").hasClass("show")) {
                $("#colPersonal").collapse("hide");
            } else {
                $("#colPersonal").collapse("show");
            }
        });

        $("#clIzinTambang-click").click(function() {
            if ($("#colIzinTambang").hasClass("show")) {
                $("#colIzinTambang").collapse("hide");
            } else {
                $("#colIzinTambang").collapse("show");
            }
        });

        $("#clSertifikasi-click").click(function() {
            if ($("#colSertifikasi").hasClass("show")) {
                $("#colSertifikasi").collapse("hide");
            } else {
                $("#colSertifikasi").collapse("show");
            }
        });

        $("#clMCU-click").click(function() {
            if ($("#colMCU").hasClass("show")) {
                $("#colMCU").collapse("hide");
            } else {
                $("#colMCU").collapse("show");
            }
        });

        $("#clVaksin-click").click(function() {
            if ($("#colVaksin").hasClass("show")) {
                $("#colVaksin").collapse("hide");
            } else {
                $("#colVaksin").collapse("show");
            }
        });

        $("#clFilePendukung-click").click(function() {
            if ($("#colFilePendukung").hasClass("show")) {
                $("#colFilePendukung").collapse("hide");
            } else {
                $("#colFilePendukung").collapse("show");
            }
        });

        $('#perJenisData').select2({
            theme: 'bootstrap4'
        });
        $('#provData').select2({
            theme: 'bootstrap4'
        });
        $('#kotaData').select2({
            theme: 'bootstrap4'
        });
        $('#kecData').select2({
            theme: 'bootstrap4'
        });
        $('#kelData').select2({
            theme: 'bootstrap4'
        });
        $('#addPerKary').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#addkry')
        });
        $('#addDepartKary').select2({
            theme: 'bootstrap4'
        });
        $('#addPosisiKary').select2({
            theme: 'bootstrap4'
        });
        $('#addKlasifikasiKary').select2({
            theme: 'bootstrap4'
        });
        $("#addPOHKary").select2({
            theme: 'bootstrap4'
        });
        $("#addLokterimaKary").select2({
            theme: 'bootstrap4'
        });
        $("#addLokasiKerja").select2({
            theme: 'bootstrap4'
        });
        $('#addLevelKary').select2({
            theme: 'bootstrap4'
        });
        $('#addStatusResidence').select2({
            theme: 'bootstrap4'
        });
        $('#addTipeKaryawan').select2({
            theme: 'bootstrap4'
        });
        $('#statPernikahan').select2({
            theme: 'bootstrap4'
        });
        $('#addagama').select2({
            theme: 'bootstrap4'
        });
        $('#kewarganegaraan').select2({
            theme: 'bootstrap4'
        });
        $('#jenisKelamin').select2({
            theme: 'bootstrap4'
        });
        $('#addJenisSIM').select2({
            theme: 'bootstrap4'
        });
        $('#jenisUnitSimper').select2({
            dropdownParent: $('#mdlunitsimper'),
            theme: 'bootstrap4'
        });
        $('#tipeAksesUnit').select2({
            dropdownParent: $('#mdlunitsimper'),
            theme: 'bootstrap4'
        });
        $('#jenisSertifikasi').select2({
            theme: 'bootstrap4'
        });
        $('#pendidikanTerakhir').select2({
            theme: 'bootstrap4'
        });
        $('#jenisSertifikasiEdit').select2({
            theme: 'bootstrap4',
            dropdownParent: $('#mdleditsertifikat')
        });

        window.addEventListener('resize', function(event) {
            $('#addJenisSIM').select2({
                theme: 'bootstrap4'
            });
            $('#perJenisData').select2({
                theme: 'bootstrap4'
            });
            $('#provData').select2({
                theme: 'bootstrap4'
            });
            $('#kotaData').select2({
                theme: 'bootstrap4'
            });
            $('#kecData').select2({
                theme: 'bootstrap4'
            });
            $('#kelData').select2({
                theme: 'bootstrap4'
            });
            $('#addPerKary').select2({
                theme: 'bootstrap4',
                dropdownParent: $('#addkry')
            });
            $('#addDepartKary').select2({
                theme: 'bootstrap4'
            });
            $('#addPosisiKary').select2({
                theme: 'bootstrap4'
            });
            $('#addKlasifikasiKary').select2({
                theme: 'bootstrap4'
            });
            $("#addPOHKary").select2({
                theme: 'bootstrap4'
            });
            $("#addLokterimaKary").select2({
                theme: 'bootstrap4'
            });
            $("#addLokasiKerja").select2({
                theme: 'bootstrap4'
            });
            $('#addLevelKary').select2({
                theme: 'bootstrap4'
            });
            $('#addStatusResidence').select2({
                theme: 'bootstrap4'
            });
            $('#addJenisKaryawan').select2({
                theme: 'bootstrap4'
            });
            $('#statPernikahan').select2({
                theme: 'bootstrap4'
            });
            $('#addagama').select2({
                theme: 'bootstrap4'
            });
            $('#kewarganegaraan').select2({
                theme: 'bootstrap4'
            });
            $('#jenisKelamin').select2({
                theme: 'bootstrap4'
            });
            $('#jenisUnitSimper').select2({
                dropdownParent: $('#mdlunitsimper'),
                theme: 'bootstrap4'
            });
            $('#tipeAksesUnit').select2({
                dropdownParent: $('#mdlunitsimper'),
                theme: 'bootstrap4'
            });
            $('#jenisSertifikasi').select2({
                theme: 'bootstrap4'
            });
            $('#pendidikanTerakhir').select2({
                theme: 'bootstrap4'
            });
            $('#jenisSertifikasiEdit').select2({
                theme: 'bootstrap4',
                dropdownParent: $('#mdleditsertifikat')
            });

        }, true);

        $.ajax({
            type: "POST",
            url: "<?= base_url("daerah/get_prov") ?>",
            data: {},
            success: function(data) {
                var data = JSON.parse(data);
                $("#provAlmtKTP").html(data.prov);
                $('#provAlmtKTP').select2({
                    theme: 'bootstrap4'
                });
                $("#provAlmtDom").html(data.prov);
                $('#provAlmtDom').select2({
                    theme: 'bootstrap4'
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.LoadingOverlay("hide");
                if (thrownError != "") {
                    $(".errormsg").html("aa Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                    $("#btnTambahDepart").attr("disabled", true);
                }
            }
        });

        $("#provAlmtKTP").change(function() {
            let id_prov = $("#provAlmtKTP").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('daerah/get_kab') ?>",
                data: {
                    id_prov: id_prov
                },
                success: function(data) {
                    var data = JSON.parse(data);
                    $("#kabAlmtKTP").removeAttr('disabled');
                    $("#kabAlmtKTP").html(data.kab);
                    $('#kabAlmtKTP').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data kabupaten, hubungi administrator");
                        // $("#btnTambahDepart").attr("disabled", true);
                    }
                }
            });
        });

        $("#provAlmtDom").change(function() {
            let id_prov = $("#provAlmtDom").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('daerah/get_kab') ?>",
                data: {
                    id_prov: id_prov
                },
                success: function(data) {
                    var data = JSON.parse(data);
                    $("#kabAlmtDom").removeAttr('disabled');
                    $("#kabAlmtDom").html(data.kab);
                    $('#kabAlmtDom').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data kabupaten, hubungi administrator");
                        // $("#btnTambahDepart").attr("disabled", true);
                    }
                }
            });
        });

        $("#provAlmtDom").change(function() {
            let id_prov = $("#provAlmtDom").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('daerah/get_kab') ?>",
                data: {
                    id_prov: id_prov
                },
                success: function(data) {
                    var data = JSON.parse(data);
                    $("#kabAlmtDom").removeAttr('disabled');
                    $("#kabAlmtDom").html(data.kab);
                    $('#kabAlmtDom').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data kabupaten, hubungi administrator");
                        // $("#btnTambahDepart").attr("disabled", true);
                    }
                }
            });
        });

        $("#kabAlmtDom").change(function() {
            let id_kab = $("#kabAlmtDom").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('daerah/get_kec') ?>",
                data: {
                    id_kab: id_kab
                },
                success: function(data) {
                    var data = JSON.parse(data);
                    $("#kecAlmtDom").removeAttr('disabled');
                    $("#kecAlmtDom").html(data.kec);
                    $('#kecAlmtDom').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data kecamatan, hubungi administrator");
                        // $("#btnTambahDepart").attr("disabled", true);
                    }
                }
            });
        });

        $("#kabAlmtKTP").change(function() {
            let id_kab = $("#kabAlmtKTP").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('daerah/get_kec') ?>",
                data: {
                    id_kab: id_kab
                },
                success: function(data) {
                    var data = JSON.parse(data);
                    $("#kecAlmtKTP").removeAttr('disabled');
                    $("#kecAlmtKTP").html(data.kec);
                    $('#kecAlmtKTP').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data kecamatan, hubungi administrator");
                        // $("#btnTambahDepart").attr("disabled", true);
                    }
                }
            });
        });

        $('#namaLengkap').keyup(function(e) {
            let nama = $('#namaLengkap').val().trim();

            if (nama != "") {
                $('.errorNamaLengkap').html('');
            } else {
                $('.errorNamaLengkap').html('<p>Nama lengkap wajib diisi</p>');
            }
        });
        $('#tempatLahir').keyup(function(e) {
            let tmp_lahir = $('#tempatLahir').val().trim();

            if (tmp_lahir != "") {
                $('.errorTempatLahir').html('');
            } else {
                $('.errorTempatLahir').html('<p>Tempat lahir wajib diisi</p>');
            }
        });
        $('#tanggalLahir').keyup(function(e) {
            let tgl_lahir = $('#tanggalLahir').val().trim();

            if (tgl_lahir != "") {
                $('.errorTanggalLahir').html('');
            } else {
                $('.errorTanggalLahir').html('<p>Tanggal lahir wajib diisi</p>');
            }
        });
        $('#tanggalLahir').change(function() {
            let tgl_lahir = $('#tanggalLahir').val().trim();

            if (tgl_lahir != "") {
                $('.errorTanggalLahir').html('');
            } else {
                $('.errorTanggalLahir').html('<p>Tanggal lahir wajib diisi</p>');
            }
        });
        $('#addNIKKary').keyup(function(e) {
            let nikkary = $('#addNIKKary').val().trim();

            if (nikkary != "") {
                $('.erroraddNIKKary').html('');
            } else {
                $('.erroraddNIKKary').html('<p>NIK wajib diisi</p>');
            }
        });
        $('#noNPWP').keyup(function(e) {
            let nonpwp = $('#noNPWP').val().trim();

            if (nonpwp != "") {
                jmlnpwp = nonpwp.replace(/['.'|_|-]/g, '');
                jml = jmlnpwp.length;

                if (jml < 15) {
                    $('.errorNoNPWP').html('<p>No. NPWP minimal 15 karakter</p>');
                } else {
                    $('.errorNoNPWP').html('');
                }
            } else {
                $('.errorNoNPWP').html('');
            }
        });
        $('#noKTP').keyup(function(e) {
            let noktp = $('#noKTP').val().trim();

            if (noktp != "") {
                jmlktp = noktp.replace(/['.'|_|-]/g, '');
                jmlhrf = jmlktp.length;

                if (jmlhrf > 16) {
                    $('.errorNoKTP').html('<p>No. KTP maksimal 16 karakter</p>');
                } else if (jmlhrf < 16) {
                    $('.errorNoKTP').html('<p>No. KTP minimal 16 karakter</p>');
                } else {
                    $('.errorNoKTP').html('');
                }
            }
        });
        $('#noKTPCek').keyup(function(e) {
            let noKTPCek = $('#noKTPCek').val().trim();

            if (noKTPCek != "") {
                jmlktp = noKTPCek.replace(/['.'|_|-]/g, '');
                jmlhrf = jmlktp.length;

                if (jmlhrf > 16) {
                    $('.errornoKTPCek').html('<p>No. KTP maksimal 16 karakter</p>');
                    $('#btnverifikasiktp').attr('disabled', true);
                } else if (jmlhrf < 16) {
                    $('.errornoKTPCek').html('<p>No. KTP minimal 16 karakter</p>');
                    $('#btnverifikasiktp').attr('disabled', true);
                } else {
                    $('.errornoKTPCek').html('');
                    $('#btnverifikasiktp').removeAttr('disabled');
                }
            } else {
                $('.errornoKTPCek').html('<p>No. KTP tidak boleh kosong</p>');
                $('#btnverifikasiktp').attr('disabled', true);
            }
        });
        $('#noKK').keyup(function(e) {
            let noKK = $('#noKK').val().trim();

            if (noKK != "") {
                jmlkk = noKK.replace(/['.'|_|-]/g, '');
                jmlhrf = jmlkk.length;

                if (jmlhrf > 16) {
                    $('.errorNoKK').html('<p>No. KK maksimal 16 karakter</p>');
                } else if (jmlhrf < 16) {
                    $('.errorNoKK').html('<p>No. KK minimal 16 karakter</p>');
                } else {
                    $('.errorNoKK').html('');
                }
            }
        });
        $('#alamatKTP').keyup(function(e) {
            let alamat = $('#alamatKTP').val().trim();

            if (alamat != "") {
                $('.errorAlamatKTP').html('');
            } else {
                $('.errorAlamatKTP').html('<p>Alamat wajib diisi</p>');
            }
        });
        $('#noTelp').keyup(function(e) {
            let notelp = $('#noTelp').val().trim();

            if (notelp == "") {
                $('.errornoTelp').html('');
            }
        });
        $('#addEmailKantor').keyup(function(e) {
            let EmailKantor = $('#addEmailKantor').val().trim();

            if (EmailKantor == "") {
                $('.erroraddEmail').html('');
            } else {
                if (!validateEmail(EmailKantor)) {
                    $('.erroraddEmail').html('<p>Format email salah</p>');
                } else {
                    $('.erroraddEmail').html('');
                }
            }
        });

        $('#email').keyup(function(e) {
            let email = $('#email').val().trim();

            if (email == "") {
                $('.erroremail').html('');
            } else {
                if (!validateEmail(email)) {
                    $('.erroremail').html('<p>Format email salah</p>');
                } else {
                    $('.erroremail').html('');
                }
            }
        });

        function lanjutpersonal() {
            $(".btnlanjutpersonal").append('<a id="addSimpanPersonal" data-scroll href="#clKaryawan" class="btn btn-primary font-weight-bold ml-1">Lanjutkan</a>');
            $("#addSimpanPersonal").click(function() {
                let auth_per = $("#addPerKary").val();
                let noktp_old = $(".9d56835ae6e4d20993874daf592f6aca").text();
                let nokk_old = $(".9100fd1e98da52ac823c5fdc6d3e4ff1").text();
                let no_nik_old = $(".c1492f38214db699dfd3574b2644271d").text();
                let auth_person = $(".0c09efa8ccb5e0114e97df31736ce2e3").text();
                let auth_check = $(".h2344234jfsd").text();
                let noktp = $("#noKTP").val();
                let nama = $("#namaLengkap").val();
                let alamat = $("#alamatKTP").val();
                let rt = $("#rtKTP").val();
                let rw = $("#rwKTP").val();
                let id_prov = $("#provData").val();
                let id_kab = $("#kotaData").val();
                let id_kec = $("#kecData").val();
                let id_kel = $("#kelData").val();
                let tmp_lahir = $("#tempatLahir").val();
                let tgl_lahir = $("#tanggalLahir").val();
                let stat_nikah = $("#statPernikahan").val();
                let id_agama = $("#addagama").val();
                let warga = $("#kewarganegaraan").val();
                let jk = $("#jenisKelamin").val();
                let bpjs_tk = $("#noBPJSTK").val();
                let bpjs_kes = $("#noBPJSKES").val();
                let nokk = $("#noKK").val();
                let npwp = $('#noNPWP').val();
                let email = $('#email').val();
                let notelp = $('#noTelp').val();
                let pddakhir = $('#pendidikanTerakhir').val();
                let cek_log = md5(new Date().toLocaleString());

                $.ajax({
                    type: "POST",
                    url: site_url + "karyawan/addpersonal",
                    data: {
                        noktp_old: noktp_old,
                        nokk_old: nokk_old,
                        no_nik_old: no_nik_old,
                        noktp: noktp,
                        nama: nama,
                        alamat: alamat,
                        rt: rt,
                        rw: rw,
                        id_prov: id_prov,
                        id_kab: id_kab,
                        id_kec: id_kec,
                        id_kel: id_kel,
                        tmp_lahir: tmp_lahir,
                        tgl_lahir: tgl_lahir,
                        email: email,
                        notelp: notelp,
                        stat_nikah: stat_nikah,
                        id_agama: id_agama,
                        warga: warga,
                        jk: jk,
                        bpjs_tk: bpjs_tk,
                        bpjs_kes: bpjs_kes,
                        npwp: npwp,
                        nokk: nokk,
                        auth_per: auth_per,
                        auth_person: auth_person,
                        auth_check: auth_check,
                        pddakhir: pddakhir,
                        token: token,
                    },
                    success: function(data) {
                        var data = JSON.parse(data);
                        if (data.statusCode == 200) {
                            $('#colKaryawan').collapse("show");
                            $('#colPersonal').collapse("hide");
                            $('#imgPersonal').removeClass("d-none");
                            $('.noktpshow').val(noktp);
                            $('.namalengkapshow').val(nama);
                            $(".89kjm78ujki782m4x787909h3").text(cek_log);
                            aktifKaryawan();
                        } else if (data.statusCode == 201) {
                            swal("Error", data.pesan, "error");
                        } else {
                            $(".errorNoKTP").html(data.noktp);
                            $(".errorNamaLengkap").html(data.nama);
                            $(".errorAlamatKTP").html(data.alamat);
                            $(".errorRtKTP").html(data.rt);
                            $(".errorRwKTP").html(data.rw);
                            $(".errorProvData").html(data.id_prov);
                            $(".errorKotaData").html(data.id_kab);
                            $(".errorKecData").html(data.id_kec);
                            $(".errorKelData").html(data.id_kel);
                            $(".errorTempatLahir").html(data.tmp_lahir);
                            $(".errorTanggalLahir").html(data.tgl_lahir);
                            $(".errorStatPernikahan").html(data.stat_nikah);
                            $(".errorAddAgama").html(data.id_agama);
                            $(".erroremail").html(data.email);
                            $(".errornoTelp").html(data.notelp);
                            $(".errorKewarganegaraan").html(data.warga);
                            $(".errorJenisKelamin").html(data.jk);
                            $(".errorNoBPJSTK").html(data.bpjs_tk);
                            $(".errorNoBPJSKES").html(data.bpjs_kes);
                            $(".errorNoNPWP").html(data.npwp);
                            $(".errorNoKK").html(data.nokk);
                            $(".errorPendidikanAkhir").html(data.pddakhir);
                            swal("Error", data.pesan, "error");
                            window.scrollTo(0, 0);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $.LoadingOverlay("hide");
                        $(".errormsg").removeClass('d-none');
                        $(".errormsg").addClass('alert-danger');
                        if (thrownError != "") {
                            $(".errormsg").html("Terjadi kesalahan saat menyimpan data, hubungi administrator");
                        }
                    }
                });

                $(".errormsg").fadeTo(3000, 500).slideUp(500, function() {
                    $(".errormsg").slideUp(500);
                    $(".errormsg").addClass("d-none");
                });
            });
        }

        $("#noKTP").focusout(function() {
            let noktp = $("#noKTP").val();
            let validktp = $(".9d56835ae6e4d20993874daf592f6aca d-none").val();
            let errktp = $(".errorNoKTP").text();

            if (errktp != "") {
                swal('Error', errktp, 'error');
                return false;
            }

            if (validktp !== noktp) {
                $.LoadingOverlay("show");
                $.ajax({
                    type: "POST",
                    url: site_url + "karyawan/cek_ktp",
                    data: {
                        noktp: noktp,
                        token: token,
                    },
                    success: function(data) {
                        var data = JSON.parse(data);
                        if (data.statusCode == 200) {
                            $.LoadingOverlay("hide");
                            if ($("#addSimpanPersonal").length == 0) {
                                lanjutpersonal();
                            }
                        } else {
                            $.LoadingOverlay("hide");
                            swal(data.kode_pesan, data.pesan, data.tipe_pesan);
                            $(".errorNoKTP").text(data.pesan);
                            $("#addSimpanPersonal").remove();
                            $("#addSimpanPekerjaan").remove();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $.LoadingOverlay("hide");

                        if (thrownError != "") {
                            pesan = "Terjadi kesalahan saat load data personal, hubungi administrator";
                        } else {
                            pesan = ""
                        }

                        swal("Error", pesan, 'error');
                    }
                });
            }
        });

        function aktifPersonalNoKTP() {
            $("#namaLengkap").removeAttr('disabled');
            $("#alamatKTP").removeAttr('disabled');
            $("#rtKTP").removeAttr('disabled');
            $("#rwKTP").removeAttr('disabled');
            $("#provData").removeAttr('disabled');
            $("#kotaData").removeAttr('disabled');
            $("#kecData").removeAttr('disabled');
            $("#kelData").removeAttr('disabled');
            $("#tempatLahir").removeAttr('disabled');
            $("#tanggalLahir").removeAttr('disabled');
            $("#statPernikahan").removeAttr('disabled');
            $("#addagama").removeAttr('disabled');
            $("#kewarganegaraan").removeAttr('disabled');
            $("#jenisKelamin").removeAttr('disabled');
            $("#email").removeAttr('disabled');
            $("#noTelp").removeAttr('disabled');
            $("#noBPJSTK").removeAttr('disabled');
            $("#noBPJSKES").removeAttr('disabled');
            $("#noKK").removeAttr('disabled');
            $("#namaIbu").removeAttr('disabled');
            $('#noNPWP').removeAttr('disabled');
            $('#pendidikanTerakhir').removeAttr('disabled');
            $('#refreshProv').removeAttr('disabled');
            $('#refreshKota').removeAttr('disabled');
            $('#refreshKec').removeAttr('disabled');
            $('#refreshKel').removeAttr('disabled');
            $('#refreshStatNikah').removeAttr('disabled');
            $('#refreshDidik').removeAttr('disabled');
            $('#addSimpanPersonal').removeClass('disabled');
        }

        function aktifPersonal() {
            $("#noKTP").removeAttr('disabled');
            $("#namaLengkap").removeAttr('disabled');
            $("#alamatKTP").removeAttr('disabled');
            $("#rtKTP").removeAttr('disabled');
            $("#rwKTP").removeAttr('disabled');
            $("#provData").removeAttr('disabled');
            $("#kotaData").removeAttr('disabled');
            $("#kecData").removeAttr('disabled');
            $("#kelData").removeAttr('disabled');
            $("#tempatLahir").removeAttr('disabled');
            $("#tanggalLahir").removeAttr('disabled');
            $("#statPernikahan").removeAttr('disabled');
            $("#addagama").removeAttr('disabled');
            $("#kewarganegaraan").removeAttr('disabled');
            $("#jenisKelamin").removeAttr('disabled');
            $("#email").removeAttr('disabled');
            $("#noTelp").removeAttr('disabled');
            $("#noBPJSTK").removeAttr('disabled');
            $("#noBPJSKES").removeAttr('disabled');
            $("#noKK").removeAttr('disabled');
            $("#namaIbu").removeAttr('disabled');
            $('#noNPWP').removeAttr('disabled');
            $('#pendidikanTerakhir').removeAttr('disabled');
            $('#refreshProv').removeAttr('disabled');
            $('#refreshKota').removeAttr('disabled');
            $('#refreshKec').removeAttr('disabled');
            $('#refreshKel').removeAttr('disabled');
            $('#refreshStatNikah').removeAttr('disabled');
            $('#refreshDidik').removeAttr('disabled');
            $('#addSimpanPersonal').removeClass('disabled');
        }

        function nonAktifPersonal() {
            $("#noKTP").attr('disabled', true);
            $("#namaLengkap").attr('disabled', true);
            $("#alamatKTP").attr('disabled', true);
            $("#rtKTP").attr('disabled', true);
            $("#rwKTP").attr('disabled', true);
            $("#provData").attr('disabled', true);
            $("#kotaData").attr('disabled', true);
            $("#kecData").attr('disabled', true);
            $("#kelData").attr('disabled', true);
            $("#tempatLahir").attr('disabled', true);
            $("#tanggalLahir").attr('disabled', true);
            $("#statPernikahan").attr('disabled', true);
            $("#addagama").attr('disabled', true);
            $("#kewarganegaraan").attr('disabled', true);
            $("#jenisKelamin").attr('disabled', true);
            $("#email").attr('disabled', true);
            $("#noTelp").attr('disabled', true);
            $("#noBPJSTK").attr('disabled', true);
            $("#noBPJSKES").attr('disabled', true);
            $("#noKK").attr('disabled', true);
            $("#namaIbu").attr('disabled', true);
            $('#noNPWP').attr('disabled', true);
            $('#pendidikanTerakhir').attr('disabled', true);
            $('#refreshProv').attr('disabled', true);
            $('#refreshKota').attr('disabled', true);
            $('#refreshKec').attr('disabled', true);
            $('#refreshKel').attr('disabled', true);
            $('#refreshStatNikah').attr('disabled', true);
            $('#refreshDidik').attr('disabled', true);
            $('#addSimpanPersonal').addClass('disabled');
        }

        function aktifKaryawan() {
            $("#addPerKary").removeAttr('disabled');
            $("#addNIKKary").removeAttr('disabled');
            $("#addDepartKary").removeAttr('disabled');
            $("#addPosisiKary").removeAttr('disabled');
            $("#addDOH").removeAttr('disabled');
            $("#addTanggalAktif").removeAttr('disabled');
            $("#addLokasiKerja").removeAttr('disabled');
            $("#addLokterimaKary").removeAttr('disabled');
            $("#addPOHKary").removeAttr('disabled');
            $("#addKlasifikasiKary").removeAttr('disabled');
            $("#addJenisKaryawan").removeAttr('disabled');
            $("#addLevelKary").removeAttr('disabled');
            $("#addStatusResidence").removeAttr('disabled');
            $("#addStatusKaryawan").removeAttr('disabled');
            $("#addTipeKaryawan").removeAttr('disabled');
            $("#addEmailKantor").removeAttr('disabled');
            $("#addTanggalPermanen").removeAttr('disabled');
            $("#addTanggalKontrakAwal").removeAttr('disabled');
            $("#addTanggalKontrakAkhir").removeAttr('disabled');
            $("#refreshDepart").removeAttr('disabled');
            $("#refreshPosisi").removeAttr('disabled');
            $("#refreshKlasifikasi").removeAttr('disabled');
            $("#refreshTipe").removeAttr('disabled');
            $("#refreshLevel").removeAttr('disabled');
            $("#refreshPOH").removeAttr('disabled');
            $("#refreshLokterima").removeAttr('disabled');
            $("#refreshLokker").removeAttr('disabled');
            $("#refreshResidence").removeAttr('disabled');
            $("#refreshstatkaryawan").removeAttr('disabled');
            $("#infoKlasifikasi").removeAttr('disabled');
            $('#addKembaliPekerjaan').removeClass('disabled');
            $('#addSimpanPekerjaan').removeClass('disabled');
        }

        function nonAktifKaryawan() {
            $("#addPerKary").attr('disabled', true);
            $("#addNIKKary").attr('disabled', true);
            $("#addDepartKary").attr('disabled', true);
            $("#addPosisiKary").attr('disabled', true);
            $("#addDOH").attr('disabled', true);
            $("#addTanggalAktif").attr('disabled', true);
            $("#addLokasiKerja").attr('disabled', true);
            $("#addLokterimaKary").attr('disabled', true);
            $("#addPOHKary").attr('disabled', true);
            $("#addKlasifikasiKary").attr('disabled', true);
            $("#addJenisKaryawan").attr('disabled', true);
            $("#addLevelKary").attr('disabled', true);
            $("#addStatusResidence").attr('disabled', true);
            $("#addStatusKaryawan").attr('disabled', true);
            $("#addTipeKaryawan").attr('disabled', true);
            $("#addEmailKantor").attr('disabled', true);
            $("#addTanggalPermanen").attr('disabled', true);
            $("#addTanggalKontrakAwal").attr('disabled', true);
            $("#addTanggalKontrakAkhir").attr('disabled', true);
            $("#refreshDepart").attr('disabled', true);
            $("#refreshPosisi").attr('disabled', true);
            $("#refreshKlasifikasi").attr('disabled', true);
            $("#refreshTipe").attr('disabled', true);
            $("#refreshLevel").attr('disabled', true);
            $("#refreshPOH").attr('disabled', true);
            $("#refreshLokterima").attr('disabled', true);
            $("#refreshLokker").attr('disabled', true);
            $("#refreshResidence").attr('disabled', true);
            $("#refreshstatkaryawan").attr('disabled', true);
            $("#infoKlasifikasi").attr('disabled', true);
            $('#addKembaliPekerjaan').addClass('disabled');
            $('#addSimpanPekerjaan').addClass('disabled');
        }

        function aktifSIMPER() {
            $("#addJenisIzin").removeAttr('disabled');
            $("#addNoReg").removeAttr('disabled');
            $("#addTglExp").removeAttr('disabled');
            $("#addJenisSIM").removeAttr('disabled');
            $("#addTglExpSIM").removeAttr('disabled');
            $("#refreshJenisSIM").removeAttr('disabled');
            $("#addKembaliIzinUnit").removeClass('disabled');
            $("#addSimpanIzinUnit").removeClass('disabled');
            $("#filesimpolisi").removeClass('disabled');
        }

        function nonaktifSIMPER() {
            $("#addJenisIzin").atts('disabled', true);
            $("#addNoReg").atts('disabled', true);
            $("#addTglExp").atts('disabled', true);
            $("#addJenisSIM").atts('disabled', true);
            $("#addTglExpSIM").atts('disabled', true);
            $("#addKembaliIzinUnit").addClass('disabled');
            $("#addSimpanIzinUnit").addClass('disabled');
            $("#filesimpolisi").addClass('disabled');
        }

        function aktifSertifikat() {
            $("#jenisSertifikasi").removeAttr('disabled');
            $("#noSertifikat").removeAttr('disabled');
            $("#namaLembaga").removeAttr('disabled');
            $("#tanggalSertifikasi").removeAttr('disabled');
            $("#masaBerlakuSertifikat").removeAttr('disabled');
            $("#tanggalSertifikasiAkhir").removeAttr('disabled');
            $("#refreshJenisSertifikat").removeAttr('disabled');
            $("#fileSertifikasi").removeAttr('disabled');
            $("#addSimpanSertifikasi").removeClass('disabled');
            $("#addResetSertifikasi").removeClass('disabled');
            $("#addbtnkembaliSertifikat").removeClass('disabled');
            $("#addLanjutSertifikasi").removeClass('disabled');
        }

        function nonaktifSertifikat() {
            $("#jenisSertifikasi").attr('disabled', true);
            $("#noSertifikat").attr('disabled', true);
            $("#namaLembaga").attr('disabled', true);
            $("#tanggalSertifikasi").attr('disabled', true);
            $("#masaBerlakuSertifikat").attr('disabled', true);
            $("#tanggalSertifikasiAkhir").attr('disabled', true);
            $("#fileSertifikasi").attr('disabled', true);
            $("#addSimpanSertifikasi").addClass('disabled');
            $("#addResetSertifikasi").addClass('disabled');
            $("#addbtnkembaliSertifikat").addClass('disabled');
            $("#addLanjutSertifikasi").addClass('disabled');
        }

        function aktifMCU() {
            $("#tglMCU").removeAttr('disabled');
            $("#hasilMCU").removeAttr('disabled');
            $("#ketMCU").removeAttr('disabled');
            $("#refreshhasilMCU").removeAttr('disabled');
            $("#fileMCU").removeAttr('disabled');
            $("#addbtnkembaliMCU").removeClass('disabled');
            $("#addSimpanMCU").removeClass('disabled');
        }

        function nonaktifMCU() {
            $("#tglMCU").attr('disabled');
            $("#hasilMCU").attr('disabled');
            $("#ketMCU").attr('disabled');
            $("#fileMCU").attr('disabled');
            $("#addbtnkembaliMCU").addClass('disabled');
            $("#addSimpanMCU").addClass('disabled');
        }

        function aktifVaksin() {
            $("#jenisVaksin").removeAttr('disabled');
            $("#namaVaksin").removeAttr('disabled');
            $("#tanggalVaksin").removeAttr('disabled');
            $("#fileMCU").removeAttr('disabled');
            $("#refreshjenisVaksin").removeAttr('disabled');
            $("#refreshnamaVaksin").removeAttr('disabled');
            $("#addSimpanVaksin").removeClass('disabled');
            $("#addResetVaksin").removeClass('disabled');
            $("#addbtnkembalivaksin").removeClass('disabled');
            $("#addLanjutkanVaksin").removeClass('disabled');
        }

        function nonaktifVaksin() {
            $("#jenisVaksin").attr('disabled');
            $("#namaVaksin").attr('disabled');
            $("#tanggalVaksin").attr('disabled');
            $("#fileMCU").attr('disabled');
            $("#addSimpanVaksin").addClass('disabled');
            $("#addResetVaksin").addClass('disabled');
            $("#addbtnkembalivaksin").addClass('disabled');
            $("#addLanjutkanVaksin").addClass('disabled');
        }

        function aktifFilePendukung() {
            $("#filePendukung").removeAttr('disabled');
            $("#addbtnkembaliFile").removeClass('disabled');
            $("#addUploadFileSelesai").removeClass('disabled');
            $("#addUploadFilePendukung").removeClass('disabled');
        }

        function nonaktifFilePendukung() {
            $("#filePendukung").attr('disabled');
            $("#addbtnkembaliFile").addClass('disabled');
            $("#addUploadFileSelesai").addClass('disabled');
            $("#addUploadFilePendukung").addClass('disabled');
        }

        $("#perJenisData").change(function() {
            let prs = $("#perJenisData").val();
            let ckkary = $("#krycekNonaktif");

            $.LoadingOverlay("show");
            if (prs != "") {
                if (ckkary.is(':checked')) {
                    ckc = 1;
                } else {
                    ckc = 0;
                }

                tbKary(prs, ckc);
            } else {
                tbKary(prs);
            }

        });

        $("#addRefreshKary").click(function() {
            let ckkary = $("#krycekNonaktif");
            let prs = $("#perJenisData").val();

            if (prs != "") {
                $.LoadingOverlay("show");
                if (ckkary.is(':checked')) {
                    ckc = 1;
                } else {
                    ckc = 0;
                }

                tbKary(prs, ckc);
            } else {
                tbKary(prs);
            }
        });

        $("#krycekNonaktif").click(function() {
            let ckkary = $("#krycekNonaktif");
            let prs = $("#perJenisData").val();

            if (prs != "") {
                $.LoadingOverlay("show");
                if (ckkary.is(':checked')) {
                    ckc = 1;
                } else {
                    ckc = 0;
                }

                tbKary(prs, ckc);
            } else {
                tbKary(prs);
            }
        });

        $("#btnverifikasiktp").click(function() {
            ver_Data();
        });

        function ver_Data() {
            let noktp = $("#noKTPCek").val();
            let errnoktp = $(".errornoKTPCek").text();
            var token = $("#token").val();

            if (noktp != "") {
                if (errnoktp == "") {
                    swal({
                        title: "Verifikasi No. KTP",
                        text: "Yakin No. KTP : " + noktp + " sudah benar?",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#36c6d3',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, benar',
                        cancelButtonText: 'Batalkan'
                    }).then(function(result) {
                        if (result.value) {
                            // $.LoadingOverlay("show");
                            $.ajax({
                                type: "POST",
                                url: site_url + "karyawan/verifikasi_ktp",
                                data: {
                                    noktp: noktp,
                                    token: token,
                                },
                                success: function(data) {
                                    var data = JSON.parse(data);
                                    if (data.statusCode == 200) {
                                        $("#mdlbuatdatakary").modal("hide");
                                        $("#noKTP").val(noktp);
                                        $(".0c09efa8ccb5e0114e97df31736ce2e3").text(data.auth_personal);
                                        $('.150b3427b97bb43ac2fb3e5c687e384c').text(data.auth_alamat);
                                        $(".h2344234jfsd").text('');
                                        $("#noKTP").removeAttr('disabled');
                                        $("#colPersonal").collapse("show");

                                        $.ajax({
                                            type: "POST",
                                            url: site_url + "daerah/get_prov?authtoken=" + $("#token").val(),
                                            data: {},
                                            success: function(provdata) {
                                                var provdata = JSON.parse(provdata);
                                                $("#provData").html(provdata.prov);
                                            },
                                            error: function(xhr, ajaxOptions, thrownError) {
                                                $.LoadingOverlay("hide");
                                                $(".errormsg").removeClass('d-none');
                                                $(".errormsg").removeClass('alert-info');
                                                $(".errormsg").addClass('alert-danger');
                                                if (thrownError != "") {
                                                    $(".errormsg").html("Terjadi kesalahan saat load data provinsi, hubungi administrator");
                                                    $("#addSimpanPersonal").remove();
                                                }
                                            }
                                        });

                                        aktifPersonalNoKTP();
                                        daerah_ganti();
                                        lanjutpersonal();
                                        $.LoadingOverlay("hide");
                                        swal('Berhasil', data.pesan, 'success');
                                    } else if (data.statusCode == 201) {
                                        $("#pesanDet").text(data.pesan);
                                        $("#noKTPDet").text(data.no_ktp);
                                        $("#namaDet").text(data.nama_lengkap);

                                        if (data.tgl_nonaktif == '01-Jan-1970') {
                                            $(".tglnonaktif").addClass("d-none");
                                            $(".lamanonaktif").addClass("d-none");
                                            $(".pelanggaran").addClass("d-none");
                                        } else {
                                            $(".tglnonaktif").removeClass("d-none");
                                            $(".lamanonaktif").removeClass("d-none");
                                            $(".pelanggaran").removeClass("d-none");
                                            $("#tglNonAktifDet").text(data.tgl_nonaktif);
                                            $("#lamaNonAktifDet").text(data.lama_nonaktif);
                                        }

                                        $("#PerusahaanDet").text(data.perusahaan);

                                        if (data.status == "AKTIF") {
                                            $("#StatusDet").removeClass("text-danger");
                                            $("#StatusDet").addClass("text-success");
                                        } else {
                                            $("#StatusDet").removeClass("text-success");
                                            $("#StatusDet").addClass("text-danger");
                                        }

                                        $("#StatusDet").text(data.status);
                                        $.LoadingOverlay("hide");
                                        $("#mdldetkary").modal('show');
                                        // swal('Error', data.pesan, 'error');
                                    } else {
                                        swal('Berhasil', data.pesan, 'success');
                                        $.ajax({
                                            type: "POST",
                                            url: site_url + "daerah/get_prov?authtoken=" + $("#token").val(),
                                            async: false,
                                            data: {},
                                            success: function(provdata) {
                                                var provdata = JSON.parse(provdata);
                                                $("#provData").html(provdata.prov);
                                                $("#provData").val(data.prov).trigger("change");
                                            },
                                            error: function(xhr, ajaxOptions, thrownError) {
                                                $.LoadingOverlay("hide");
                                                $(".errormsg").removeClass('d-none');
                                                $(".errormsg").removeClass('alert-info');
                                                $(".errormsg").addClass('alert-danger');
                                                if (thrownError != "") {
                                                    $(".errormsg").html("Terjadi kesalahan saat load data provinsi, hubungi administrator");
                                                    $("#addSimpanPersonal").remove();
                                                }
                                            }
                                        });

                                        $.ajax({
                                            type: "POST",
                                            url: site_url + "daerah/get_kab?authtoken=" + $("#token").val(),
                                            async: false,
                                            data: {
                                                id_prov: data.prov
                                            },
                                            success: function(kabdata) {
                                                var kabdata = JSON.parse(kabdata);
                                                $("#kotaData").html(kabdata.kab);
                                                $("#kotaData").val(data.kab).trigger("change");
                                            },
                                            error: function(xhr, ajaxOptions, thrownError) {
                                                $.LoadingOverlay("hide");
                                                $(".errormsg").removeClass('d-none');
                                                $(".errormsg").removeClass('alert-info');
                                                $(".errormsg").addClass('alert-danger');
                                                if (thrownError != "") {
                                                    $(".errormsg").html("Terjadi kesalahan saat load data kabupaten, hubungi administrator");
                                                    $("#addSimpanPersonal").remove();
                                                }
                                            }
                                        });

                                        $.ajax({
                                            type: "POST",
                                            url: site_url + "daerah/get_kec?authtoken=" + $("#token").val(),
                                            async: false,
                                            data: {
                                                id_kab: data.kab
                                            },
                                            success: function(kecdata) {
                                                var kecdata = JSON.parse(kecdata);
                                                $("#kecData").html(kecdata.kec);
                                                $("#kecData").val(data.kec).trigger("change");
                                            },
                                            error: function(xhr, ajaxOptions, thrownError) {
                                                $.LoadingOverlay("hide");
                                                $(".errormsg").removeClass('d-none');
                                                $(".errormsg").removeClass('alert-info');
                                                $(".errormsg").addClass('alert-danger');
                                                if (thrownError != "") {
                                                    $(".errormsg").html("Terjadi kesalahan saat load data kecamatan, hubungi administrator");
                                                    $("#addSimpanPersonal").remove();
                                                }
                                            }
                                        });

                                        $.ajax({
                                            type: "POST",
                                            url: site_url + "daerah/get_kel?authtoken=" + $("#token").val(),
                                            async: false,
                                            data: {
                                                id_kec: data.kec
                                            },
                                            success: function(keldata) {
                                                var keldata = JSON.parse(keldata);
                                                $("#kelData").html(keldata.kel);
                                                $("#kelData").val(data.kel).trigger("change");
                                            },
                                            error: function(xhr, ajaxOptions, thrownError) {
                                                $.LoadingOverlay("hide");
                                                $(".errormsg").removeClass('d-none');
                                                $(".errormsg").removeClass('alert-info');
                                                $(".errormsg").addClass('alert-danger');
                                                if (thrownError != "") {
                                                    $(".errormsg").html("Terjadi kesalahan saat load data kelurahan, hubungi administrator");
                                                    $("#addSimpanPersonal").remove();
                                                }
                                            }
                                        });

                                        $(".0c09efa8ccb5e0114e97df31736ce2e3").text(data.auth_personal);
                                        $('.150b3427b97bb43ac2fb3e5c687e384c').text(data.auth_alamat);
                                        $(".h2344234jfsd").text(data.auth_personal);
                                        $("#noKTP").val(data.no_ktp);
                                        $("#namaLengkap").val(data.nama);
                                        $("#alamatKTP").val(data.alamat);
                                        $("#rtKTP").val(data.rt);
                                        $("#rwKTP").val(data.rw);
                                        $("#kewarganegaraan").val(data.warga_negara).trigger('change');
                                        $("#addagama").val(data.agama).trigger('change');
                                        $("#jenisKelamin").val(data.jk).trigger('change');
                                        $("#statPernikahan").val(data.stat_nikah).trigger('change');
                                        $("#tempatLahir").val(data.tmp_lahir);
                                        $("#tanggalLahir").val(data.tgl_lahir);
                                        $("#noBPJSTK").val(data.no_bpjstk);
                                        $("#noBPJSKES").val(data.no_bpjsks);
                                        $("#noNPWP").val(data.no_npwp);
                                        $("#noKK").val(data.no_kk);
                                        $("#email").val(data.email_pribadi);
                                        $("#noTelp").val(data.hp_1);
                                        $("#pendidikanTerakhir").val(data.didik_terakhir).trigger('change');
                                        $("#mdlbuatdatakary").modal("hide");
                                        $("#colPersonal").collapse('show');
                                        aktifPersonalNoKTP();
                                        lanjutpersonal();
                                        daerah_ganti();
                                        $.LoadingOverlay("hide");
                                    }
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    $.LoadingOverlay("hide");
                                    swal('Error', 'Error saat verifikasi data', 'error');
                                }
                            });
                        }
                    });
                } else {
                    swal('Error', errnoktp, 'error');
                }
            } else {
                swal('Error', 'No. KTP tidak boleh kosong', 'error');
            }
        }

        $("#addBuatData").click(function() {
            if ($("#addSimpanPersonal").length > 0) {
                swal('Error', 'Verifikasi tidak dapat dilakukan, selesaikan isi data karyawan', 'error');
            } else {
                $("#mdlbuatdatakary").modal("show");
                $("#noKTPCek").val('');
            }
        });

        $.ajax({
            type: "POST",
            url: "<?= base_url("lokasikerja/get_all") ?>",
            data: {},
            success: function(data) {
                var data = JSON.parse(data);
                $("#addLokasiKerja").html(data.lkr);
                $('#addLokasiKerja').select2({
                    theme: 'bootstrap4'
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.LoadingOverlay("hide");
                $(".errormsg").removeClass('d-none');
                $(".errormsg").removeClass('alert-info');
                $(".errormsg").addClass('alert-danger');
                if (thrownError != "") {
                    $(".errormsg").html("cc Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                    $("#btnTambahDepart").attr("disabled", true);
                }
            }
        });

        $("#addPerKary").change(function() {
            let auth_per = $("#addPerKary").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('departemen/get_by_authper') ?>",
                data: {
                    auth_per: auth_per
                },
                success: function(data) {
                    $("#addDepartKary").removeAttr('disabled');
                    var data = JSON.parse(data);
                    $("#addDepartKary").html(data.dprt);
                    $('#addDepartKary').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".errormsg").removeClass('d-none');
                    $(".errormsg").removeClass('alert-info');
                    $(".errormsg").addClass('alert-danger');
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data departemen, hubungi administrator");
                        // $("#btnTambahDepart").attr("disabled", true);
                    }
                }
            });

            $.ajax({
                type: "POST",
                url: "<?= base_url('level/get_by_authper') ?>",
                data: {
                    auth_per: auth_per
                },
                success: function(data) {
                    $("#addLevelKary").removeAttr('disabled');
                    var data = JSON.parse(data);
                    $("#addLevelKary").html(data.lvl);
                    $("#addLevelKary").select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".errormsg").removeClass('d-none');
                    $(".errormsg").removeClass('alert-info');
                    $(".errormsg").addClass('alert-danger');
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data level, hubungi administrator");
                        // $("#btnTambahPosisi").attr("disabled", true);
                    }
                }
            });

            $.ajax({
                type: "POST",
                url: "<?= base_url('lokasipenerimaan/get_by_authper') ?>",
                data: {
                    auth_per: auth_per
                },
                success: function(data) {
                    $("#addLokterimaKary").removeAttr('disabled');
                    var data = JSON.parse(data);
                    $("#addLokterimaKary").html(data.lkt);
                    $("#addLokterimaKary").select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function() {
                    $.LoadingOverlay("hide");
                    $(".errormsg").removeClass('d-none');
                    $(".errormsg").removeClass('alert-info');
                    $(".errormsg").removeClass('alert-danger');
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data lokasi penerimaan, hubungi administrator");
                    }
                }
            });
        });

        $("#addDepartKary").change(function() {
            let auth_depart = $("#addDepartKary").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('section/get_by_authdepart') ?>",
                data: {
                    auth_depart: auth_depart
                },
                success: function(data) {
                    $("#addSectionKary").removeAttr('disabled');
                    var data = JSON.parse(data);
                    $("#addSectionKary").html(data.section);
                    $('#addSectionKary').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".errormsg").removeClass('d-none');
                    $(".errormsg").removeClass('alert-info');
                    $(".errormsg").addClass('alert-danger');
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data section, hubungi administrator");
                        // $("#btnTambahSection").attr("disabled", true);
                    }
                }
            });

            $.ajax({
                type: "POST",
                url: "<?= base_url('posisi/get_by_authdepart') ?>",
                data: {
                    auth_depart: auth_depart
                },
                success: function(data) {
                    $("#addPosisiKary").removeAttr('disabled');
                    var data = JSON.parse(data);
                    $("#addPosisiKary").html(data.posisi);
                    $("#addPosisiKary").select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".errormsg").removeClass('d-none');
                    $(".errormsg").removeClass('alert-info');
                    $(".errormsg").addClass('alert-danger');
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data posisi, hubungi administrator");
                        // $("#btnTambahPosisi").attr("disabled", true);
                    }
                }
            });
        });

        $("#addLevelKary").change(function() {
            let auth_level = $("#addLevelKary").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('grade/get_by_authlevel') ?>",
                data: {
                    auth_level: auth_level
                },
                success: function(data) {
                    $("#addGradeKary").removeAttr('disabled');
                    var data = JSON.parse(data);
                    $("#addGradeKary").html(data.grd);
                    $('#addGradeKary').select2({
                        theme: 'bootstrap4'
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".errormsg").removeClass('d-none');
                    $(".errormsg").removeClass('alert-info');
                    $(".errormsg").addClass('alert-danger');
                    if (thrownError != "") {
                        $(".errormsg").html("Terjadi kesalahan saat load data grade, hubungi administrator");
                        // $("#btnTambahSection").attr("disabled", true);
                    }
                }
            });
        });

        $.ajax({
            type: "POST",
            url: "<?= base_url('poh/get_all') ?>",
            data: {},
            success: function(data) {
                var data = JSON.parse(data);
                $("#addPOHKary").html(data.pho);
                $("#addPOHKary").select2({
                    theme: 'bootstrap4'
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.LoadingOverlay("hide");
                $(".errormsg").removeClass('d-none');
                $(".errormsg").removeClass('alert-info');
                $(".errormsg").addClass('alert-danger');
                if (thrownError != "") {
                    $(".errormsg").html("Terjadi kesalahan saat load data POH, hubungi administrator");
                    // $("#btnTambahPosisi").attr("disabled", true);
                }
            }
        });

        $("#btnSimpanDataPersonal").click(() => {
            let addNoKTP = $("#addNoKTP").val();
            let addNamaLengkap = $("#addNamaLengkap").val();
            let addAlamatEmail = $("#addAlamatEmail").val();
            let addNoTelp = $("#addNoTelp").val();
            let addTempatLahir = $("#addTempatLahir").val();
            let addTanggalLahir = $("#addTanggalLahir").val();
            let addStatPernikahan = $("#addStatPernikahan").val();
            let addNoKK = $("#addNoKK").val();
            let addNamaIbu = $("#addNamaIbu").val();
            let addKewarganegaraan = $("#addKewarganegaraan").val();
            let addAgama = $("#addAgama").val();
            let addJenisKelamin = $("#addJenisKelamin").val();
            let addKodeBank = $("#addKodeBank").val();
            let addNoRek = $("#addNoRek").val();
            let addNoNPWP = $("#addNoNPWP").val();
            let addNoBPJSTK = $("#addNoBPJSTK").val();
            let addNoBPJSKES = $("#addNoBPJSKES").val();
            let addNoBPJSPensiun = $("#addNoBPJSPensiun").val();
            let addNoEquity = $("#addNoEquity").val();
            let addPendidikanTerakhir = $("#addPendidikanTerakhir").val();
            let addInstansiPendidikan = $("#addInstansiPendidikan").val();
            let addFakultas = $("#addFakultas").val();
            let addJurusan = $("#addJurusan").val();

            $.ajax({
                type: "POST",
                url: "<?= base_url("karyawan/input_dtPersonal") ?>",
                data: {
                    addNoKTP: addNoKTP,
                    addNamaLengkap: addNamaLengkap,
                    addAlamatEmail: addAlamatEmail,
                    addNoTelp: addNoTelp,
                    addTempatLahir: addTempatLahir,
                    addTanggalLahir: addTanggalLahir,
                    addStatPernikahan: addStatPernikahan,
                    addNoKK: addNoKK,
                    addNamaIbu: addNamaIbu,
                    addKewarganegaraan: addKewarganegaraan,
                    addAgama: addAgama,
                    addJenisKelamin: addJenisKelamin,
                    addKodeBank: addKodeBank,
                    addNoRek: addNoRek,
                    addNoNPWP: addNoNPWP,
                    addNoBPJSTK: addNoBPJSTK,
                    addNoBPJSKES: addNoBPJSKES,
                    addNoBPJSPensiun: addNoBPJSPensiun,
                    addNoEquity: addNoEquity,
                    addPendidikanTerakhir: addPendidikanTerakhir,
                    addInstansiPendidikan: addInstansiPendidikan,
                    addFakultas: addFakultas,
                    addJurusan: addJurusan,
                },
                timeout: 2000,
                success: (response) => {
                    var data = JSON.parse(response);
                    if (data.statusCode == 201) {
                        swal('Berhasil', data.pesan, 'success');
                        $(".err_psn_dtPersonal").removeClass('d-none');
                        $(".err_psn_dtPersonal").removeClass('alert-danger');
                        $(".err_psn_dtPersonal").addClass('alert-info');
                        $(".err_psn_dtPersonal").html(data.pesan);
                        $(".errorAddNoKTP").html('');
                        $(".errorAddNamaLengkap").html('');
                        $(".errorAddAlamatEmail").html('');
                        $(".errorAddNoTelp").html('');
                        $(".errorAddTempatLahir").html('');
                        $(".errorAddTanggalLahir").html('');
                        $(".errorAddStatPernikahan").html('');
                        $(".errorAddNoKK").html('');
                        $(".errorAddNamaIbu").html('');
                        $(".errorAddKewarganegaraan").html('');
                        $(".errorAddAgama").html('');
                        $(".errorAddJenisKelamin").html('');
                        $(".errorAddKodeBank").html('');
                        $(".errorAddNoRek").html('');
                        $(".errorAddNoNPWP").html('');
                        $(".errorAddNoBPJSTK").html('');
                        $(".errorAddNoBPJSKES").html('');
                        $(".errorAddNoBPJSPensiun").html('');
                        $(".errorAddNoEquity").html('');
                        $(".errorAddPendidikanTerakhir").html('');
                        $(".errorAddInstansiPendidikan").html('');
                        $(".errorAddFakultas").html('');
                        $(".errorAddJurusan").html('');
                        $("#addNoKTP").val('');
                        $("#addNamaLengkap").val('');
                        $("#addAlamatEmail").val('');
                        $("#addNoTelp").val('');
                        $("#addTempatLahir").val('');
                        $("#addTanggalLahir").val('');
                        $("#addStatPernikahan").val('');
                        $("#addNoKK").val('');
                        $("#addNamaIbu").val('');
                        $("#addKewarganegaraan").val('');
                        $("#addAgama").val('');
                        $("#addJenisKelamin").val('');
                        $("#addKodeBank").val('');
                        $("#addNoRek").val('');
                        $("#addNoNPWP").val('');
                        $("#addNoBPJSTK").val('');
                        $("#addNoBPJSKES").val('');
                        $("#addNoBPJSPensiun").val('');
                        $("#addNoEquity").val('');
                        $("#addPendidikanTerakhir").val('');
                        $("#addInstansiPendidikan").val('');
                        $("#addFakultas").val('');
                        $("#addJurusan").val('');
                    } else if (data.statusCode == 406) {
                        $(".err_psn_dtPersonal").removeClass('d-none');
                        $(".err_psn_dtPersonal").removeClass('alert-danger');
                        $(".err_psn_dtPersonal").addClass('alert-info');
                        $(".err_psn_dtPersonal").html(data.pesan);
                    } else if (data.statusCode == 400) {
                        swal('Perhatian', data.pesan, 'warning');
                        $(".errorAddNoKTP").html(data.addNoKTP);
                        $(".errorAddNamaLengkap").html(data.addNamaLengkap);
                        $(".errorAddAlamatEmail").html(data.addAlamatEmail);
                        $(".errorAddNoTelp").html(data.addNoTelp);
                        $(".errorAddTempatLahir").html(data.addTempatLahir);
                        $(".errorAddTanggalLahir").html(data.addTanggalLahir);
                        $(".errorAddStatPernikahan").html(data.addStatPernikahan);
                        $(".errorAddNoKK").html(data.addNoKK);
                        $(".errorAddNamaIbu").html(data.addNamaIbu);
                        $(".errorAddKewarganegaraan").html(data.addKewarganegaraan);
                        $(".errorAddAgama").html(data.addAgama);
                        $(".errorAddJenisKelamin").html(data.addJenisKelamin);
                        $(".errorAddKodeBank").html(data.addKodeBank);
                        $(".errorAddNoRek").html(data.addNoRek);
                        $(".errorAddNoNPWP").html(data.addNoNPWP);
                        $(".errorAddNoBPJSTK").html(data.addNoBPJSTK);
                        $(".errorAddNoBPJSKES").html(data.addNoBPJSKES);
                        $(".errorAddNoBPJSPensiun").html(data.addNoBPJSPensiun);
                        $(".errorAddNoEquity").html(data.addNoEquity);
                        $(".errorAddPendidikanTerakhir").html(data.addPendidikanTerakhir);
                        $(".errorAddInstansiPendidikan").html(data.addInstansiPendidikan);
                        $(".errorAddFakultas").html(data.addFakultas);
                        $(".errorAddJurusan").html(data.addJurusan);
                    }
                    $(".err_psn_dtPersonal").fadeTo(3000, 500).slideUp(500, function() {
                        $(".err_psn_dtPersonal").slideUp(500);
                    });
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    $.LoadingOverlay("hide");
                    $(".err_psn_depart").removeClass("alert-primary");
                    $(".err_psn_depart").addClass("alert-danger");
                    $(".err_psn_depart").css("display", "block");
                    if (xhr.status == 404) {
                        $(".err_psn_depart").html("Data personal karyawan gagal disimpan.");
                    } else if (xhr.status == 0) {
                        $(".err_psn_depart").html("Data personal karyawan gagal disimpan, Waktu koneksi habis");
                    } else {
                        $(".err_psn_depart").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                    }
                    $(".err_psn_depart ").fadeTo(3000, 500).slideUp(500, function() {
                        $(".err_psn_depart ").slideUp(500);
                    });
                },
            })
        });

        tbKary();

        function tbKary(prs, ckc = 0) {
            $('#tbmKaryawan').DataTable().destroy();

            tbmKaryawan = $('#tbmKaryawan').DataTable({
                "processing": true,
                "responsive": true,
                "serverSide": true,
                "ordering": true,
                "order": [
                    [1, 'asc']
                ],
                "ajax": {
                    "url": site_url + "karyawan/ajax_list?auth_m_per=" + prs + "&authtoken=" + $("#token").val() + "&ck=" + ckc,
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
                        "data": "nama_lengkap",
                        "className": "align-middle align-middle",
                    },
                    {
                        "data": "depart",
                        "className": "text-wrap align-middle",
                    },
                    {
                        "data": "posisi",
                        "className": "text-wrap align-middle",
                    },
                    {
                        "data": "kode_perusahaan",
                        "className": "text-wrap align-middle text-center",
                        "width": "1%"
                    },
                    {
                        "data": "proses",
                        "className": "text-center text-nowrap align-middle",
                        "width": "1%"
                    }
                ]
            });

            $.LoadingOverlay("hide");
        }
    });
</script>