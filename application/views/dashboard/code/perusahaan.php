<script>
     //========================================== Perusahaan ========================================================
     $(document).ready(function() {
          $("#logout").click(function() {
               $("#logoutmdl").modal("show");
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
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_Perusahaan").removeClass('d-none');
                              $(".err_psn_edit_Perusahaan").removeClass('alert-info');
                              $(".err_psn_edit_Perusahaan").addClass('alert-danger');
                              $(".err_psn_edit_Perusahaan").html(data.pesan);
                              $(".err_psn_edit_Perusahaan").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_Perusahaan").slideUp(500);
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
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalPerusahaan").click(function() {
               $("#perPerusahaan").val('').trigger('change');
               $("#kodePerusahaan").val('');
               $("#Perusahaan").val('');
               $("#ketPerusahaan").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
          });

          $(document).ready(function() {
               $('#perPerusahaan').select2({
                    theme: 'bootstrap4'
               });

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("perusahaan/get_all") ?>",
                    data: {},
                    success: function(data) {
                         var data = JSON.parse(data);
                         $("#perPerusahaan").html(data.prs);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_Perusahaan").removeClass('d-none');
                         $(".err_psn_Perusahaan").removeClass('alert-info');
                         $(".err_psn_Perusahaan").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_Perusahaan").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                              $("#btnTambahPerusahaan").attr("disabled", true);
                         }
                    }
               })

               $('#perPerusahaan').change(function() {
                    let auth_per = $("#perPerusahaan").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("departemen/get_by_authper") ?>",
                         data: {
                              auth_per: auth_per
                         },
                         success: function(data) {
                              var data = JSON.parse(data);
                              $("#depPerusahaan").html(data.dprt);
                         }
                    })
               });
               $("#btnTambahPerusahaan").click(function() {
                    var prs = $("#perPerusahaan").val();
                    var kode = $("#kodePerusahaan").val();
                    var Perusahaan = $("#Perusahaan").val();
                    var ket = $("#ketPerusahaan").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("Perusahaan/input_Perusahaan") ?>",
                         data: {
                              prs: prs,
                              kode: kode,
                              Perusahaan: Perusahaan,
                              ket: ket
                         },
                         timeout: 20000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $(".err_psn_Perusahaan").removeClass('d-none');
                                   $(".err_psn_Perusahaan").removeClass('alert-danger');
                                   $(".err_psn_Perusahaan").addClass('alert-info');
                                   $(".err_psn_Perusahaan").html(data.pesan);
                                   $("#perPerusahaan").val('').trigger('change');
                                   $("#kodePerusahaan").val('');
                                   $("#Perusahaan").val('');
                                   $("#ketPerusahaan").val('');
                                   $(".error1").html('');
                                   $(".error2").html('');
                                   $(".error3").html('');
                                   $(".error4").html('');
                              } else if (data.statusCode == 201) {
                                   $(".err_psn_Perusahaan").removeClass('d-none');
                                   $(".err_psn_Perusahaan").removeClass('alert-info');
                                   $(".err_psn_Perusahaan").addClass('alert-danger');
                                   $(".err_psn_Perusahaan").html(data.pesan);
                              } else if (data.statusCode == 202) {
                                   $(".error1").html(data.prs);
                                   $(".error2").html(data.kode);
                                   $(".error3").html(data.Perusahaan);
                                   $(".error4").html(data.ket);
                              }

                              $(".err_psn_Perusahaan").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_Perusahaan").slideUp(500);
                              });
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_Perusahaan").removeClass("alert-primary");
                              $(".err_psn_Perusahaan").addClass("alert-danger");
                              $(".err_psn_Perusahaan").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_Perusahaan").html("Perusahaan gagal disimpan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_Perusahaan").html("Perusahaan gagal disimpan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_Perusahaan").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                              }

                              $(".err_psn_Perusahaan ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_Perusahaan ").slideUp(500);
                              });
                         }
                    })
               });

               $(document).on('click', '.hpsPerusahaan', function() {
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
                              "className": "text-center",
                              "width": "1%"
                         },
                         {
                              "data": 'kd_perusahaan',
                              "width": "10%"
                         },
                         {
                              "data": 'perusahaan',
                              "className": "text-nowrap",
                              "width": "25%"
                         },
                         {
                              "data": 'alamat_perusahaan',
                              "className": "text-nowrap",
                              "width": "25%"
                         },
                         {
                              "data": 'stat_perusahaan',
                              "className": "text-center text-nowrap",
                              "width": "1%"
                         },
                         {
                              "data": 'kode_perusahaan',
                              "className": "text-center text-nowrap",
                              "width": "1%"
                         },
                         {
                              "data": 'tgl_buat',
                              "className": "text-center text-nowrap",
                              "width": "8%"
                         },
                         {
                              "data": 'proses',
                              "className": "text-center text-nowrap",
                              "width": "1%"
                         }
                    ]
               });
          });

     });
</script>