$(document).ready(function () {
  // Token Auth
  let token = $("#token").val();

  // Inputmask
  $("#noKTPCek").inputmask("9999999999999999", { placeholder: "" });
  $("#addNoKTP").inputmask("9999999999999999", { placeholder: "" });
  $("#noKK").inputmask("9999999999999999", { placeholder: "" });

  // Function
  function aktifPersonalNoKTP() {
    // Form Data Personal
    $("#addNamaLengkap").removeAttr("disabled");
    $("#addAlamatKTP").removeAttr("disabled");
    $("#addRtKTP").removeAttr("disabled");
    $("#addRwKTP").removeAttr("disabled");
    $("#addKodePosKTP").removeAttr("disabled");
    $("#provAlmtKTP").removeAttr("disabled");
    $("#kabAlmtKTP").removeAttr("disabled");
    $("#kecAlmtKTP").removeAttr("disabled");
    $("#kelAlmtKTP").removeAttr("disabled");
    $("#addAlamatEmail").removeAttr("disabled");
    $("#addNoTelp").removeAttr("disabled");
    $("#addTempatLahir").removeAttr("disabled");
    $("#addTanggalLahir").removeAttr("disabled");
    $("#addStatPernikahan").removeAttr("disabled");
    $("#addNoKK").removeAttr("disabled");
    $("#addNamaIbu").removeAttr("disabled");
    $("#addKewarganegaraan").removeAttr("disabled");
    $("#addAgama").removeAttr("disabled");
    $("#addJenisKelamin").removeAttr("disabled");
    $("#addKodeBank").removeAttr("disabled");
    $("#addNoRek").removeAttr("disabled");
    $("#addNoNPWP").removeAttr("disabled");
    $("#addNoBPJSTK").removeAttr("disabled");
    $("#addNoBPJSKES").removeAttr("disabled");
    $("#addNoBPJSPensiun").removeAttr("disabled");
    $("#addNoEquity").removeAttr("disabled");
    $("#addPendidikanTerakhir").removeAttr("disabled");
    $("#addInstansiPendidikan").removeAttr("disabled");
    $("#addFakultas").removeAttr("disabled");
    $("#addJurusan").removeAttr("disabled");
    $("#btnSimpanDataPersonal").removeClass("disabled");
  }

  // Click/Change
  $("#provAlmtKTP").change(function () {
    let id_prov = $("#provAlmtKTP").val();

    $("#kabAlmtKTP").LoadingOverlay("show");
    $.ajax({
      type: "POST",
      url: site_url + "daerah/get_kab?authtoken=" + $("#token").val(),
      data: {
        id_prov: id_prov,
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.statusCode == 200) {
          $("#kabAlmtKTP").html(data.kab);
          $("#kabAlmtKTP").LoadingOverlay("hide");
        } else {
          $("#kabAlmtKTP").html(
            "<option value=''>-- KOTA/KABUPATEN TIDAK DITEMUKAN --</option>"
          );
          $("#kabAlmtKTP").LoadingOverlay("hide");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        $.LoadingOverlay("hide");
        $(".errormsg").removeClass("d-none");
        $("#kabAlmtKTP").LoadingOverlay("hide");
        if (thrownError != "") {
          $(".errormsg").html(
            "Terjadi kesalahan saat load data kabupaten/kota, hubungi administrator"
          );
        }
      },
    });
  });

  $("#kabAlmtKTP").change(function () {
    let id_kab = $("#kabAlmtKTP").val();

    $("#kecAlmtKTP").LoadingOverlay("show");
    $.ajax({
      type: "POST",
      url: site_url + "daerah/get_kec?authtoken=" + $("#token").val(),
      data: {
        id_kab: id_kab,
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.statusCode == 200) {
          $("#kecAlmtKTP").html(data.kec);
          $("#kecAlmtKTP").LoadingOverlay("hide");
        } else {
          $("#kecAlmtKTP").html(
            "<option value=''>-- KECAMATAN TIDAK DITEMUKAN --</option>"
          );
          $("#kecAlmtKTP").LoadingOverlay("hide");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        $.LoadingOverlay("hide");
        $(".errormsg").removeClass("d-none");
        $("#kecAlmtKTP").LoadingOverlay("hide");
        if (thrownError != "") {
          $(".errormsg").html(
            "Terjadi kesalahan saat load data kecamatan, hubungi administrator"
          );
        }
      },
    });
  });

  $("#kecAlmtKTP").change(function () {
    let id_kec = $("#kecAlmtKTP").val();

    $("#kelAlmtKTP").LoadingOverlay("show");
    $.ajax({
      type: "POST",
      url: site_url + "daerah/get_kel?authtoken=" + $("#token").val(),
      data: {
        id_kec: id_kec,
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.statusCode == 200) {
          $("#kelAlmtKTP").html(data.kel);
          $("#kelAlmtKTP").LoadingOverlay("hide");
        } else {
          $("#kelAlmtKTP").html(
            "<option value=''>-- KELURAHAN TIDAK DITEMUKAN --</option>"
          );
          $("#kelAlmtKTP").LoadingOverlay("hide");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        $.LoadingOverlay("hide");
        $(".errormsg").removeClass("d-none");
        $("#kelAlmtKTP").LoadingOverlay("hide");
        if (thrownError != "") {
          $(".errormsg").html(
            "Terjadi kesalahan saat load data kecamatan, hubungi administrator"
          );
        }
      },
    });
  });

  // Event
  $("#formCheckKTP").on("submit", function () {
    // Variable
    let ktpValue = $("#noKTPCek").val();

    swal({
      title: "Verifikasi No. KTP",
      text: "Yakin No. KTP : " + ktpValue + " sudah benar?",
      type: "question",
      showCancelButton: true,
      confirmButtonColor: "#36c6d3",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, benar",
      cancelButtonText: "Batalkan!",
    }).then(function (result) {
      if (result.value) {
        $.LoadingOverlay("show");
        $.ajax({
          type: "POST",
          url: site_url + "karyawan/verifikasi_ktp",
          data: {
            ktpValue: ktpValue,
            token: token,
          },
          success: function (data) {
            var data = JSON.parse(data);
            if (data.statusCode == 200) {
              $("#tambahKaryawan").modal("hide");
              $("#addNoKTP").val(ktpValue);
              $(".0c09efa8ccb5e0114e97df31736ce2e3").text(data.auth_personal);
              $(".150b3427b97bb43ac2fb3e5c687e384c").text(data.auth_alamat);
              $(".983y315783rh27g23164g214228745y1").text("");
              $("#colPersonal").collapse("show");
              $.ajax({
                type: "POST",
                url:
                  site_url + "daerah/get_prov?authtoken=" + $("#token").val(),
                data: {},
                success: function (provAlmtKTP) {
                  var provAlmtKTP = JSON.parse(provAlmtKTP);
                  $("#provAlmtKTP").html(provAlmtKTP.prov);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                  $.LoadingOverlay("hide");
                  $(".errormsg").removeClass("d-none");
                  $(".errormsg").removeClass("alert-info");
                  $(".errormsg").addClass("alert-danger");
                  if (thrownError != "") {
                    $(".errormsg").html(
                      "Terjadi kesalahan saat load data provinsi, hubungi administrator"
                    );
                  }
                },
              });
              aktifPersonalNoKTP();
              $.LoadingOverlay("hide");
              swal("Berhasil", data.pesan, "success");
            } else if (data.statusCode == 201) {
              $("#pesanDet").text(data.pesan);
              $("#noKTPDet").text(data.no_ktp);
              $("#namaDet").text(data.nama_lengkap);

              if (data.tgl_nonaktif == "01-Jan-1970") {
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
              $("#mdldetkary").modal("show");
            }
            // else {
            //   swal("Berhasil", data.pesan, "success");
            //   $.ajax({
            //     type: "POST",
            //     url:
            //       site_url + "daerah/get_prov?authtoken=" + $("#token").val(),
            //     async: false,
            //     data: {},
            //     success: function (provAlmtKTP) {
            //       var provAlmtKTP = JSON.parse(provAlmtKTP);
            //       $("#provAlmtKTP").html(provAlmtKTP.prov);
            //       $("#provAlmtKTP").val(data.prov).trigger("change");
            //     },
            //     error: function (xhr, ajaxOptions, thrownError) {
            //       $.LoadingOverlay("hide");
            //       $(".errormsg").removeClass("d-none");
            //       $(".errormsg").removeClass("alert-info");
            //       $(".errormsg").addClass("alert-danger");
            //       if (thrownError != "") {
            //         $(".errormsg").html(
            //           "Terjadi kesalahan saat load data provinsi, hubungi administrator"
            //         );
            //       }
            //     },
            //   });

            //   $.ajax({
            //     type: "POST",
            //     url: site_url + "daerah/get_kab?authtoken=" + $("#token").val(),
            //     async: false,
            //     data: {
            //       id_prov: data.prov,
            //     },
            //     success: function (kabdata) {
            //       var kabdata = JSON.parse(kabdata);
            //       $("#kabAlmtKTP").html(kabdata.kab);
            //       $("#kabAlmtKTP").val(data.kab).trigger("change");
            //     },
            //     error: function (xhr, ajaxOptions, thrownError) {
            //       $.LoadingOverlay("hide");
            //       $(".errormsg").removeClass("d-none");
            //       $(".errormsg").removeClass("alert-info");
            //       $(".errormsg").addClass("alert-danger");
            //       if (thrownError != "") {
            //         $(".errormsg").html(
            //           "Terjadi kesalahan saat load data kabupaten, hubungi administrator"
            //         );
            //       }
            //     },
            //   });

            //   $.ajax({
            //     type: "POST",
            //     url: site_url + "daerah/get_kec?authtoken=" + $("#token").val(),
            //     async: false,
            //     data: {
            //       id_kab: data.kab,
            //     },
            //     success: function (kecAlmtKTP) {
            //       var kecAlmtKTP = JSON.parse(kecAlmtKTP);
            //       $("#kecAlmtKTP").html(kecAlmtKTP.kec);
            //       $("#kecAlmtKTP").val(data.kec).trigger("change");
            //     },
            //     error: function (xhr, ajaxOptions, thrownError) {
            //       $.LoadingOverlay("hide");
            //       $(".errormsg").removeClass("d-none");
            //       $(".errormsg").removeClass("alert-info");
            //       $(".errormsg").addClass("alert-danger");
            //       if (thrownError != "") {
            //         $(".errormsg").html(
            //           "Terjadi kesalahan saat load data kecamatan, hubungi administrator"
            //         );
            //       }
            //     },
            //   });

            //   $.ajax({
            //     type: "POST",
            //     url: site_url + "daerah/get_kel?authtoken=" + $("#token").val(),
            //     async: false,
            //     data: {
            //       id_kec: data.kec,
            //     },
            //     success: function (kelAlmtKTP) {
            //       var kelAlmtKTP = JSON.parse(kelAlmtKTP);
            //       $("#kelAlmtKTP").html(kelAlmtKTP.kel);
            //       $("#kelAlmtKTP").val(data.kel).trigger("change");
            //     },
            //     error: function (xhr, ajaxOptions, thrownError) {
            //       $.LoadingOverlay("hide");
            //       $(".errormsg").removeClass("d-none");
            //       $(".errormsg").removeClass("alert-info");
            //       $(".errormsg").addClass("alert-danger");
            //       if (thrownError != "") {
            //         $(".errormsg").html(
            //           "Terjadi kesalahan saat load data kelurahan, hubungi administrator"
            //         );
            //       }
            //     },
            //   });

            //   $(".0c09efa8ccb5e0114e97df31736ce2e3").text(data.auth_personal);
            //   $(".150b3427b97bb43ac2fb3e5c687e384c").text(data.auth_alamat);
            //   $(".983y315783rh27g23164g214228745y1").text(data.auth_personal);
            //   $("#addNoKTP").val(data.no_ktp);
            //   $("#namaLengkap").val(data.nama);
            //   $("#alamatKTP").val(data.alamat);
            //   $("#rtKTP").val(data.rt);
            //   $("#rwKTP").val(data.rw);
            //   $("#kewarganegaraan").val(data.warga_negara).trigger("change");
            //   $("#addagama").val(data.agama).trigger("change");
            //   $("#jenisKelamin").val(data.jk).trigger("change");
            //   $("#statPernikahan").val(data.stat_nikah).trigger("change");
            //   $("#tempatLahir").val(data.tmp_lahir);
            //   $("#tanggalLahir").val(data.tgl_lahir);
            //   $("#noBPJSTK").val(data.no_bpjstk);
            //   $("#noBPJSKES").val(data.no_bpjsks);
            //   $("#noNPWP").val(data.no_npwp);
            //   $("#noKK").val(data.no_kk);
            //   $("#email").val(data.email_pribadi);
            //   $("#noTelp").val(data.hp_1);
            //   $("#pendidikanTerakhir")
            //     .val(data.didik_terakhir)
            //     .trigger("change");
            //   $("#mdlbuatdatakary").modal("hide");
            //   $("#colPersonal").collapse("show");
            //   aktifPersonalNoKTP();
            //   lanjutpersonal();
            //   daerah_ganti();
            //   $.LoadingOverlay("hide");
            // }
          },
          error: function (xhr, ajaxOptions, thrownError) {
            $.LoadingOverlay("hide");
            $(".errormsg").removeClass("d-none");
            if (thrownError != "") {
              $(".errormsg").html(
                "Terjadi kesalahan saat load data personal, hubungi administrator"
              );
            }
          },
        });
      } else {
        swal.close();
      }
    });
  });
});
