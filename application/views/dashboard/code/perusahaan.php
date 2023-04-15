<script>
     //========================================== Perusahaan ========================================================
     $(document).ready(function() {
          $("#logout").click(function() {
               $("#logoutmdl").modal("show");
          });

          $(function() {
               $("#provPerusahaan").select2({
                    theme: 'bootstrap4'
               });
               $("#kabPerusahaan").select2({
                    theme: 'bootstrap4'
               });
               $("#kecPerusahaan").select2({
                    theme: 'bootstrap4'
               });
               $("#kelPerusahaan").select2({
                    theme: 'bootstrap4'
               });

               $.ajax({
                    type: "post",
                    url: "<?= base_url('daerah/get_prov'); ?>",
                    success: function(data) {
                         var data = JSON.parse(data);
                         $("#provPerusahaan").html(data.prov);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_perusahaan").removeClass('d-none');
                         $(".err_psn_perusahaan").removeClass('alert-info');
                         $(".err_psn_perusahaan").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_perusahaan").html("Terjadi kesalahan saat load data provinsi, hubungi administrator");
                              $("#btnTambahPerusahaan").remove();
                         }
                    }
               });
          });
          $("#provPerusahaan").change(function() {
               let id_prov = $("#provPerusahaan").val();
               $.ajax({
                    type: "post",
                    url: "<?= base_url('daerah/get_kab'); ?>",
                    data: {
                         id_prov: id_prov
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $("#kabPerusahaan").html(data.kab);
                         } else {
                              $("#kabPerusahaan").html(data.kab);
                              $("#kecPerusahaan").html("<option value=''>-- KECAMATAN TIDAK DITEMUKAN --</option>");
                              $("#kelPerusahaan").html("<option value=''>-- KELURAHAN TIDAK DITEMUKAN --</option>");
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_perusahaan").removeClass('d-none');
                         $(".err_psn_perusahaan").removeClass('alert-info');
                         $(".err_psn_perusahaan").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_perusahaan").html("Terjadi kesalahan saat load data kabupaten, hubungi administrator");
                              $("#btnTambahPerusahaan").remove();
                         }
                    }
               });
          });
          $("#kabPerusahaan").change(function() {
               let id_kab = $("#kabPerusahaan").val();
               $.ajax({
                    type: "post",
                    url: "<?= base_url('daerah/get_kec'); ?>",
                    data: {
                         id_kab: id_kab
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $("#kecPerusahaan").html(data.kec);
                         } else {
                              $("#kecPerusahaan").html(data.kec);
                              $("#kelPerusahaan").html("<option value=''>-- KELURAHAN TIDAK DITEMUKAN --</option>");
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_perusahaan").removeClass('d-none');
                         $(".err_psn_perusahaan").removeClass('alert-info');
                         $(".err_psn_perusahaan").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_perusahaan").html("Terjadi kesalahan saat load data kecamatan, hubungi administrator");
                              $("#btnTambahPerusahaan").remove();
                         }
                    }
               });
          });
          $("#kecPerusahaan").change(function() {
               let id_kec = $("#kecPerusahaan").val();
               $.ajax({
                    type: "post",
                    url: "<?= base_url('daerah/get_kel'); ?>",
                    data: {
                         id_kec: id_kec
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $("#kelPerusahaan").html(data.kel);
                         } else {
                              $("#kelPerusahaan").html(data.kel);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_perusahaan").removeClass('d-none');
                         $(".err_psn_perusahaan").removeClass('alert-info');
                         $(".err_psn_perusahaan").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_perusahaan").html("Terjadi kesalahan saat load data kelurahan, hubungi administrator");
                              $("#btnTambahPerusahaan").remove();
                         }
                    }
               });
          });
          $('#btnupdatePerusahaan').click(function() {
               let kode = $('#editPerusahaanKode').val();
               let Perusahaan = $('#editPerusahaan').val();
               let status = $('#editPerusahaanStatus').val();
               let ket = $('#editPerusahaanKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('Perusahaan/edit_Perusahaan'); ?>",
                    data: {
                         kode: kode,
                         Perusahaan: Perusahaan,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmPerusahaan.draw();
                              $("#editPerusahaanmdl").modal("hide");
                              $(".err_psn_Perusahaan").removeClass('d-none');
                              $(".err_psn_Perusahaan").removeClass('alert-danger');
                              $(".err_psn_Perusahaan").addClass('alert-info');
                              $(".err_psn_Perusahaan").html(data.pesan);
                              $("#editPerusahaanKode").val('');
                              $("#editPerusahaan").val('');
                              $("#editPerusahaanKet").val('');
                              $("#editPerusahaanStatus").val('');
                              $("#error1el").html('');
                              $("#error2el").html('');
                              $("#error3el").html('');
                              $("#error4el").html('');
                              $(".err_psn_Perusahaan").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_Perusahaan").slideUp(500);
                                   $(".err_psn_perusahaan").addClass('d-none');
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_Perusahaan").removeClass('d-none');
                              $(".err_psn_edit_Perusahaan").removeClass('alert-info');
                              $(".err_psn_edit_Perusahaan").addClass('alert-danger');
                              $(".err_psn_edit_Perusahaan").html(data.pesan);
                              $(".err_psn_edit_Perusahaan").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_Perusahaan").slideUp(500);
                                   $(".err_psn_perusahaan").addClass('d-none');
                              });
                              $("#error1el").html('');
                              $("#error2el").html('');
                              $("#error3el").html('');
                              $("#error4el").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1el").html(data.kode);
                              $("#error2el").html(data.Perusahaan);
                              $("#error3el").html(data.status);
                              $("#error4el").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_Perusahaan").removeClass("alert-primary");
                         $(".err_psn_Perusahaan").addClass("alert-danger");
                         $(".err_psn_Perusahaan").css("display", "block");
                         if (xhr.status == 404) {
                              $(".err_psn_Perusahaan").html("Perusahaan gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_Perusahaan").html("Perusahaan gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_Perusahaan").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editPerusahaanmdl").modal("hide");
                         $(".err_psn_Perusahaan ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_Perusahaan ").slideUp(500);
                              $(".err_psn_perusahaan").addClass('d-none');
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          function resetaddperusahaan() {
               $("#kodePerusahaan").val('');
               $("#Perusahaan").val('');
               $("#alamatPerusahaan").val('');
               $("#kodeposPerusahaan").val('');
               $("#provPerusahaan").val('').trigger('change');
               $("#telpPerusahaan").val('');
               $("#emailPerusahaan").val('');
               $("#webPerusahaan").val('');
               $("#npwpPerusahaan").val('');
               $("#kegPerusahaan").val('');
               $("#ketPerusahaan").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
               $(".error6").html('');
               $(".error7").html('');
               $(".error8").html('');
               $(".error9").html('');
               $(".error10").html('');
               $(".error11").html('');
               $(".error12").html('');
               $(".error13").html('');
               $(".error14").html('');
          }
          $("#btnBatalPerusahaan").click(function() {
               resetaddperusahaan();
          });

          $("#btnTambahPerusahaan").click(function() {
               var kode = $("#kodePerusahaan").val();
               var perusahaan = $("#Perusahaan").val();
               var alamat = $("#alamatPerusahaan").val();
               var kodepos = $("#kodeposPerusahaan").val();
               var prov = $("#provPerusahaan").val();
               var kab = $("#kabPerusahaan").val();
               var kec = $("#kecPerusahaan").val();
               var kel = $("#kelPerusahaan").val();
               var telp = $("#telpPerusahaan").val();
               var email = $("#emailPerusahaan").val();
               var web = $("#webPerusahaan").val();
               var npwp = $("#npwpPerusahaan").val();
               var keg = $("#kegPerusahaan").val();
               var ket = $("#ketPerusahaan").val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("perusahaan/input_perusahaan") ?>",
                    data: {
                         kode: kode,
                         perusahaan: perusahaan,
                         alamat: alamat,
                         kodepos: kodepos,
                         prov: prov,
                         kab: kab,
                         kec: kec,
                         kel: kel,
                         telp: telp,
                         email: email,
                         npwp: npwp,
                         web: web,
                         keg: keg,
                         ket: ket
                    },
                    timeout: 20000,
                    success: function(data) {
                         alert(data);
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $(".err_psn_perusahaan").removeClass('d-none');
                              $(".err_psn_perusahaan").removeClass('alert-danger');
                              $(".err_psn_perusahaan").addClass('alert-info');
                              $(".err_psn_perusahaan").html(data.pesan);
                              resetaddperusahaan()
                         } else if (data.statusCode == 201) {
                              $(".err_psn_perusahaan").removeClass('d-none');
                              $(".err_psn_perusahaan").removeClass('alert-info');
                              $(".err_psn_perusahaan").addClass('alert-danger');
                              $(".err_psn_perusahaan").html(data.pesan);
                         } else if (data.statusCode == 202) {
                              $(".error1").html(data.kode);
                              $(".error2").html(data.perusahaan);
                              $(".error3").html(data.alamat);
                              $(".error4").html(data.kodepos);
                              $(".error5").html(data.prov);
                              $(".error6").html(data.kab);
                              $(".error7").html(data.kec);
                              $(".error8").html(data.kel);
                              $(".error9").html(data.telp);
                              $(".error10").html(data.email);
                              $(".error11").html(data.web);
                              $(".error12").html(data.npwp);
                              $(".error13").html(data.keg);
                              $(".error14").html(data.ket);
                         }

                         $(".err_psn_perusahaan").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_perusahaan").slideUp(500);
                              $(".err_psn_perusahaan").addClass('d-none');
                         });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_perusahaan").removeClass("alert-primary");
                         $(".err_psn_perusahaan").addClass("alert-danger");
                         $(".err_psn_perusahaan").addClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_perusahaan").html("Perusahaan gagal disimpan, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_perusahaan").html("Perusahaan gagal disimpan, Waktu koneksi habis");
                         } else {
                              $(".err_psn_perusahaan").html("Terjadi kesalahan saat menyimpan data, hubungi administrator");
                         }

                         $(".err_psn_perusahaan ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_perusahaan ").slideUp(500);
                              $(".err_psn_perusahaan").addClass('d-none');
                         });
                    }
               })
          });

          $(document).on('click', '.hpsperusahaan', function() {
               let authPerusahaan = $(this).attr('id');
               let namaPerusahaan = $(this).attr('value');

               if (authPerusahaan == "") {
                    swal("Error", "Perusahaan tidak ditemukan", "error");
               } else {
                    swal({
                         title: "Hapus",
                         text: "Yakin Perusahaan " + namaPerusahaan + " akan dihapus?",
                         type: 'question',
                         showCancelButton: true,
                         confirmButtonColor: '#36c6d3',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Ya, hapus',
                         cancelButtonText: 'Batalkan'
                    }).then(function(result) {
                         if (result.value) {
                              $.LoadingOverlay("show");
                              $.ajax({
                                   type: "POST",
                                   url: "<?= base_url('Perusahaan/hapus_Perusahaan'); ?>",
                                   data: {
                                        authPerusahaan: authPerusahaan
                                   },
                                   timeout: 20000,
                                   success: function(data, textStatus, xhr) {
                                        var data = JSON.parse(data);
                                        if (data.statusCode == 200) {
                                             tbmPerusahaan.draw();
                                             $(".err_psn_Perusahaan").removeClass("alert-danger");
                                             $(".err_psn_Perusahaan").addClass("alert-primary");
                                             $(".err_psn_Perusahaan").css("display", "block");
                                             $(".err_psn_Perusahaan").html(data.pesan);
                                        } else {
                                             $(".err_psn_Perusahaan").removeClass("alert-primary");
                                             $(".err_psn_Perusahaan").addClass("alert-danger");
                                             $(".err_psn_Perusahaan").css("display", "block");
                                             $(".err_psn_Perusahaan").html(data.pesan);
                                        }

                                        $.LoadingOverlay("hide");
                                   },
                                   error: function(xhr, ajaxOptions, thrownError) {
                                        $.LoadingOverlay("hide");
                                        $(".err_psn_Perusahaan").removeClass("alert-primary");
                                        $(".err_psn_Perusahaan").addClass("alert-danger");
                                        $(".err_psn_Perusahaan").css("display", "block");
                                        if (xhr.status == 404) {
                                             $(".err_psn_Perusahaan").html("Perusahaan gagal dihapus, , Link data tidak ditemukan");
                                        } else if (xhr.status == 0) {
                                             $(".err_psn_Perusahaan").html("Perusahaan gagal dihapus, Waktu koneksi habis");
                                        } else {
                                             $(".err_psn_Perusahaan").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                        }
                                   }
                              });

                              $(".err_psn_Perusahaan").fadeTo(4000, 500).slideUp(500, function() {
                                   $(".err_psn_Perusahaan").slideUp(500);
                              });
                         } else if (result.dismiss == 'cancel') {
                              swal('Batal', 'Perusahaan ' + namaPerusahaan + ' batal dihapus', 'error');
                              return false;
                         }
                    });
               }
          });

          $(document).on('click', '.dtlPerusahaan', function() {
               let authPerusahaan = $(this).attr('id');
               let namaPerusahaan = $(this).attr('value');

               if (authPerusahaan == "") {
                    swal("Error", "Perusahaan tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('Perusahaan/detail_Perusahaan'); ?>",
                         data: {
                              authPerusahaan: authPerusahaan
                         },
                         timeout: 15000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $("#detailPerusahaanPerusahaan").val(data.nama_perusahaan);
                                   $("#detailPerusahaanDepart").val(data.depart);
                                   $("#detailPerusahaanKode").val(data.kode);
                                   $("#detailPerusahaan").val(data.Perusahaan);
                                   $("#detailPerusahaanStatus").val(data.status);
                                   $("#detailPerusahaanKet").val(data.ket);
                                   $("#detailPerusahaanBuat").val(data.pembuat);
                                   $("#detailPerusahaanTglBuat").val(data.tgl_buat);
                                   $("#detailPerusahaanmdl").modal("show");
                              } else {
                                   $(".err_psn_Perusahaan").css("display", "block");
                                   $(".err_psn_Perusahaan").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_Perusahaan").removeClass("alert-primary");
                              $(".err_psn_Perusahaan").addClass("alert-danger");
                              $(".err_psn_Perusahaan").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_Perusahaan").html("Perusahaan gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_Perusahaan").html("Perusahaan gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_Perusahaan").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }
                              $(".err_psn_Perusahaan ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_Perusahaan ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $(document).on('click', '.edttPerusahaan', function() {
               let authPerusahaan = $(this).attr('id');
               let namaPerusahaan = $(this).attr('value');

               if (authPerusahaan == "") {
                    swal("Error", "Perusahaan tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('Perusahaan/detail_Perusahaan'); ?>",
                         data: {
                              authPerusahaan: authPerusahaan
                         },
                         timeout: 15000,
                         success: function(data) {
                              var dataPerusahaan = JSON.parse(data);
                              if (dataPerusahaan.statusCode == 200) {
                                   $("#editPerusahaanKode").val(dataPerusahaan.kode);
                                   $("#editPerusahaan").val(dataPerusahaan.Perusahaan);
                                   $("#editPerusahaanStatus").val(dataPerusahaan.status);
                                   $("#editPerusahaanKet").val(dataPerusahaan.ket);
                                   $("#editPerusahaanmdl").modal("show");
                                   $("#error1el").html('');
                                   $("#error2el").html('');
                                   $("#error3el").html('');
                                   $("#error4el").html('');
                              } else {
                                   $(".err_psn_Perusahaan").css("display", "block");
                                   $(".err_psn_Perusahaan").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_Perusahaan").removeClass("alert-primary");
                              $(".err_psn_Perusahaan").addClass("alert-danger");
                              $(".err_psn_Perusahaan").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_Perusahaan").html("Perusahaan gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_Perusahaan").html("Perusahaan gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_Perusahaan").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }

                              $(".err_psn_Perusahaan ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_Perusahaan ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $("#btnrefreshPerusahaan").click(function() {
               $('#tbmPerusahaan').LoadingOverlay("show");
               tbmPerusahaan.draw()
               $('#tbmPerusahaan').LoadingOverlay("hide");
          });

          tbmPerusahaan = $('#tbmPerusahaan').DataTable({
               "processing": true,
               "responsive": true,
               "serverSide": true,
               "ordering": true,
               "order": [
                    [1, 'asc'],
               ],
               "ajax": {
                    "url": "<?= base_url('perusahaan/ajax_list'); ?>",
                    "type": "POST",
                    "error": function(xhr, error, code) {
                         if (code != "") {
                              $(".err_psn_perusahaan").removeClass("d-none");
                              $(".err_psn_perusahaan").css("display", "block");
                              $(".err_psn_perusahaan").html("Terjadi kesalahan saat melakukan load data perusahaan, hubungi administrator");
                              $("#secadd").addClass("disabled");
                         }
                    }
               },
               "deferRender": true,
               "aLengthMenu": [
                    [10, 25, 50],
                    [10, 25, 50]
               ],
               "columns": [{
                         data: 'no',
                         name: 'id_perusahaan',
                         render: function(data, type, row, meta) {
                              return meta.row + meta.settings._iDisplayStart + 1;
                         },
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'kode_perusahaan',
                         "className": "text-nowrap  align-middle",
                         "width": "10%"
                    },
                    {
                         "data": 'nama_perusahaan',
                         "className": "text-nowrap  align-middle",
                         "width": "20%"
                    },
                    {
                         "data": 'alamat_perusahaan',
                         "className": "text-nowrap  align-middle",
                         "width": "35%"
                    },
                    {
                         "data": 'stat_perusahaan',
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'tgl_buat',
                         "className": "text-center text-nowrap  align-middle",
                         "width": "8%"
                    },
                    {
                         "data": 'proses',
                         "className": "text-center text-nowrap  align-middle",
                         "width": "1%"
                    }
               ]
          });
     });
</script>