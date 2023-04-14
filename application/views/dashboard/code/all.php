<script>
     //========================================== depart ========================================================
     $(document).ready(function() {

          $("#logout").click(function() {
               $("#logoutmdl").modal("show");
          });

          $('#btnupdatedepart').click(function() {
               let kode = $('#editDepartKode').val();
               let depart = $('#editDepart').val();
               let status = $('#editDepartStatus').val();
               let ket = $('#editDepartKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('departemen/edit_depart'); ?>",
                    data: {
                         kode: kode,
                         depart: depart,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmdepart.draw();
                              $("#editdepartmdl").modal("hide");
                              $(".err_psn_depart").removeClass('d-none');
                              $(".err_psn_depart").removeClass('alert-danger');
                              $(".err_psn_depart").addClass('alert-info');
                              $(".err_psn_depart").html(data.pesan);
                              $("#editDepartKode").val('');
                              $("#editDepart").val('');
                              $("#editDepartKet").val('');
                              $("#editDepartStatus").val('');
                              $("#error1ed").html('');
                              $("#error2ed").html('');
                              $("#error3ed").html('');
                              $(".err_psn_depart").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_depart").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_dprt").removeClass('d-none');
                              $(".err_psn_edit_dprt").removeClass('alert-info');
                              $(".err_psn_edit_dprt").addClass('alert-danger');
                              $(".err_psn_edit_dprt").html(data.pesan);
                              $(".err_psn_edit_dprt").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_dprt").slideUp(500);
                              });
                         } else if (data.statusCode == 202) {
                              $("#error1ed").html(data.kode);
                              $("#error2ed").html(data.depart);
                              $("#error3ed").html(data.status);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_depart").removeClass("alert-primary");
                         $(".err_psn_depart").addClass("alert-danger");
                         $(".err_psn_depart").css("display", "block");
                         if (xhr.status == 404) {
                              $(".err_psn_depart").html("Departemen gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_depart").html("Departemen gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_depart").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editdepartmdl").modal("hide");
                         $(".err_psn_depart ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_depart ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalDepart").click(function() {
               $("#perDepart").val('').trigger('change');
               $("#kodeDepart").val('');
               $("#Depart").val('');
               $("#ketDepart").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
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
               })

               $("#btnTambahDepart").click(function() {
                    var prs = $("#perDepart").val();
                    var kode = $("#kodeDepart").val();
                    var depart = $("#Depart").val();
                    var ket = $("#ketDepart").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("departemen/input_depart") ?>",
                         data: {
                              prs: prs,
                              kode: kode,
                              depart: depart,
                              ket: ket
                         },
                         timeout: 20000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $(".err_psn_depart").removeClass('d-none');
                                   $(".err_psn_depart").removeClass('alert-danger');
                                   $(".err_psn_depart").addClass('alert-info');
                                   $(".err_psn_depart").html(data.pesan);
                                   $("#perDepart").val('').trigger('change');
                                   $("#kodeDepart").val('');
                                   $("#Depart").val('');
                                   $("#ketDepart").val('');
                                   $(".error1").html('');
                                   $(".error2").html('');
                                   $(".error3").html('');
                              } else if (data.statusCode == 201) {
                                   $(".err_psn_depart").removeClass('d-none');
                                   $(".err_psn_depart").removeClass('alert-info');
                                   $(".err_psn_depart").addClass('alert-danger');
                                   $(".err_psn_depart").html(data.pesan);
                              } else if (data.statusCode == 202) {
                                   $(".error1").html(data.prs);
                                   $(".error2").html(data.kode);
                                   $(".error3").html(data.depart);
                              }

                              $(".err_psn_depart").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_depart").slideUp(500);
                              });
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_depart").removeClass("alert-primary");
                              $(".err_psn_depart").addClass("alert-danger");
                              $(".err_psn_depart").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_depart").html("Departemen gagal disimpan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_depart").html("Departemen gagal disimpan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_depart").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                              }

                              $(".err_psn_depart ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_depart ").slideUp(500);
                              });
                         }
                    })
               });

               $(document).on('click', '.hpsdepart', function() {
                    let authdepart = $(this).attr('id');
                    let namadepart = $(this).attr('value');

                    if (authdepart == "") {
                         swal("Error", "Departemen tidak ditemukan", "error");
                    } else {
                         swal({
                              title: "Hapus",
                              text: "Yakin departemen " + namadepart + " akan dihapus?",
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
                                        url: "<?= base_url('departemen/hapus_depart'); ?>",
                                        data: {
                                             authdepart: authdepart
                                        },
                                        timeout: 20000,
                                        success: function(data, textStatus, xhr) {
                                             var data = JSON.parse(data);
                                             if (data.statusCode == 200) {
                                                  tbmdepart.draw();
                                                  $(".err_psn_depart").removeClass("alert-danger");
                                                  $(".err_psn_depart").addClass("alert-primary");
                                                  $(".err_psn_depart").css("display", "block");
                                                  $(".err_psn_depart").html(data.pesan);
                                             } else {
                                                  $(".err_psn_depart").removeClass("alert-primary");
                                                  $(".err_psn_depart").addClass("alert-danger");
                                                  $(".err_psn_depart").css("display", "block");
                                                  $(".err_psn_depart").html(data.pesan);
                                             }

                                             $.LoadingOverlay("hide");
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                             $.LoadingOverlay("hide");
                                             $(".err_psn_depart").removeClass("alert-primary");
                                             $(".err_psn_depart").addClass("alert-danger");
                                             $(".err_psn_depart").css("display", "block");
                                             if (xhr.status == 404) {
                                                  $(".err_psn_depart").html("Departemen gagal dihapus, , Link data tidak ditemukan");
                                             } else if (xhr.status == 0) {
                                                  $(".err_psn_depart").html("Departemen gagal dihapus, Waktu koneksi habis");
                                             } else {
                                                  $(".err_psn_depart").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                             }
                                        }
                                   });

                                   $(".err_psn_depart").fadeTo(4000, 500).slideUp(500, function() {
                                        $(".err_psn_depart").slideUp(500);
                                   });
                              } else if (result.dismiss == 'cancel') {
                                   swal('Batal', 'Departemen ' + namadepart + ' batal dihapus', 'error');
                                   return false;
                              }
                         });
                    }
               });

               $(document).on('click', '.dtldepart', function() {
                    let authdepart = $(this).attr('id');
                    let namadepart = $(this).attr('value');

                    if (authdepart == "") {
                         swal("Error", "Departemen tidak ditemukan", "error");
                    } else {

                         $.ajax({
                              type: "post",
                              url: "<?= base_url('departemen/detail_depart'); ?>",
                              data: {
                                   authdepart: authdepart
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var data = JSON.parse(data);
                                   if (data.statusCode == 200) {
                                        $("#detailDepartPerusahaan").val(data.nama_perusahaan);
                                        $("#detailDepartKode").val(data.kode);
                                        $("#detailDepart").val(data.depart);
                                        $("#detailDepartStatus").val(data.status);
                                        $("#detailDepartKet").val(data.ket);
                                        $("#detailDepartBuat").val(data.pembuat);
                                        $("#detailDepartTglBuat").val(data.tgl_buat);
                                        $("#detaildepartmdl").modal("show");
                                   } else {
                                        $(".err_psn_depart").css("display", "block");
                                        $(".err_psn_depart").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_depart").removeClass("alert-primary");
                                   $(".err_psn_depart").addClass("alert-danger");
                                   $(".err_psn_depart").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_depart").html("Departemen gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_depart").html("Departemen gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_depart").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }
                                   $(".err_psn_depart ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_depart ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $(document).on('click', '.edttdepart', function() {
                    let authdepart = $(this).attr('id');
                    let namadepart = $(this).attr('value');

                    if (authdepart == "") {
                         swal("Error", "Departemen tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('departemen/detail_depart'); ?>",
                              data: {
                                   authdepart: authdepart
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var data = JSON.parse(data);
                                   if (data.statusCode == 200) {
                                        $("#editDepartKode").val(data.kode);
                                        $("#editDepart").val(data.depart);
                                        $("#editDepartStatus").val(data.status);
                                        $("#editDepartKet").val(data.ket);
                                        $("#editdepartmdl").modal("show");
                                        $("#error1ed").html('');
                                        $("#error2ed").html('');
                                        $("#error3ed").html('');
                                   } else {
                                        $(".err_psn_depart").css("display", "block");
                                        $(".err_psn_depart").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_depart").removeClass("alert-primary");
                                   $(".err_psn_depart").addClass("alert-danger");
                                   $(".err_psn_depart").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_depart").html("Departemen gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_depart").html("Departemen gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_depart").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }

                                   $(".err_psn_depart ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_depart ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $("#btnrefreshdepart").click(function() {
                    $('#tbmdepart').LoadingOverlay("show");
                    tbmdepart.draw()
                    $('#tbmdepart').LoadingOverlay("hide");
               });

               tbmdepart = $('#tbmdepart').DataTable({
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                         [1, 'desc']
                    ],
                    "ajax": {
                         "url": "<?= base_url('departemen/ajax_list'); ?>",
                         "type": "POST",
                         "error": function(xhr, error, code) {
                              if (code != "") {
                                   $(".err_psn_depart").removeClass("d-none");
                                   $(".err_psn_depart").css("display", "block");
                                   $(".err_psn_depart").html("terjadi kesalahan saat melakukan load data departemen, hubungi administrator");
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
                              data: 'no',
                              name: 'id_depart',
                              render: function(data, type, row, meta) {
                                   return meta.row + meta.settings._iDisplayStart + 1;
                              },
                              "className": "text-center",
                              "width": "1%"
                         },
                         {
                              "data": 'kd_depart',
                              "width": "10%"
                         },
                         {
                              "data": 'depart',
                              "className": "text-nowrap",
                              "width": "67%"
                         },
                         {
                              "data": 'stat_depart',
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

<script>
     //========================================== section ========================================================
     $(document).ready(function() {
          $('#btnupdateSection').click(function() {
               let kode = $('#editSectionKode').val();
               let section = $('#editSection').val();
               let depart = $('#editSectionDepart').val();
               let status = $('#editSectionStatus').val();
               let ket = $('#editSectionKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('section/edit_section'); ?>",
                    data: {
                         kode: kode,
                         section: section,
                         depart: depart,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmsection.draw();
                              $("#editSectionmdl").modal("hide");
                              $(".err_psn_section").removeClass('d-none');
                              $(".err_psn_section").removeClass('alert-danger');
                              $(".err_psn_section").addClass('alert-info');
                              $(".err_psn_section").html(data.pesan);
                              $("#editsectionKode").val('');
                              $("#editsection").val('');
                              $("#editsectionKet").val('');
                              $("#editsectionStatus").val('');
                              $("#error1es").html('');
                              $("#error2es").html('');
                              $("#error3es").html('');
                              $("#error4es").html('');
                              $("#error5es").html('');
                              $(".err_psn_section").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_section").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_dprt").removeClass('d-none');
                              $(".err_psn_edit_dprt").removeClass('alert-info');
                              $(".err_psn_edit_dprt").addClass('alert-danger');
                              $(".err_psn_edit_dprt").html(data.pesan);
                              $(".err_psn_edit_dprt").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_dprt").slideUp(500);
                              });
                         } else if (data.statusCode == 202) {
                              $("#error1es").html(data.kode);
                              $("#error2es").html(data.section);
                              $("#error3es").html(data.depart);
                              $("#error4es").html(data.status);
                              $("#error5es").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_section").removeClass("alert-primary");
                         $(".err_psn_section").addClass("alert-danger");
                         $(".err_psn_section").css("display", "block");
                         if (xhr.status == 404) {
                              $(".err_psn_section").html("section gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_section").html("section gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_section").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editsectionmdl").modal("hide");
                         $(".err_psn_section ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_section ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalSection").click(function() {
               $("#perSection").val('').trigger('change');
               $("#depSection").val('').trigger('change');
               $("#kodSsection").val('');
               $("#Section").val('');
               $("#ketSection").val('');
               $("#error1es").html('');
               $("#error2es").html('');
               $("#error3es").html('');
               $("#error4es").html('');
               $("#error5es").html('');
          });

          $(document).ready(function() {
               $('#depSection').select2({
                    theme: 'bootstrap4'
               });
               $('#perSection').select2({
                    theme: 'bootstrap4'
               });
               $('#editSectionDepart').select2({
                    theme: 'bootstrap4',
                    dropdownParent: $('#editSectionmdl')
               });

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("perusahaan/get_all") ?>",
                    data: {},
                    success: function(data) {
                         var data = JSON.parse(data);
                         $("#perSection").html(data.prs);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_section").removeClass('d-none');
                         $(".err_psn_section").removeClass('alert-info');
                         $(".err_psn_section").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_section").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                              $("#secadd").attr("disabled", true);
                         }
                    }
               })

               $('#perSection').change(function() {
                    let auth_per = $("#perSection").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("departemen/get_by_authper") ?>",
                         data: {
                              auth_per: auth_per
                         },
                         success: function(data) {
                              var data = JSON.parse(data);
                              $("#depSection").html(data.dprt);
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_section").removeClass('d-none');
                              $(".err_psn_section").removeClass('alert-info');
                              $(".err_psn_section").addClass('alert-danger');
                              if (thrownError != "") {
                                   $(".err_psn_section").html("Terjadi kesalahan saat load data departemen, hubungi administrator");
                                   $("#secadd").attr("disabled", true);
                              }
                         }
                    })
               });
               $("#btnTambahSection").click(function() {
                    var prs = $("#perSection").val();
                    var depart = $("#depSection").val();
                    var kode = $("#kodeSection").val();
                    var section = $("#Section").val();
                    var ket = $("#ketSection").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("section/input_section") ?>",
                         data: {
                              prs: prs,
                              kode: kode,
                              section: section,
                              depart: depart,
                              ket: ket
                         },
                         timeout: 20000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $(".err_psn_section").removeClass('d-none');
                                   $(".err_psn_section").removeClass('alert-danger');
                                   $(".err_psn_section").addClass('alert-info');
                                   $(".err_psn_section").html(data.pesan);
                                   $("#perSection").val('').trigger('change');
                                   $("#depSection").val('').trigger('change');
                                   $("#kodesection").val('');
                                   $("#section").val('');
                                   $("#ketsection").val('');
                                   $(".error1").html('');
                                   $(".error2").html('');
                                   $(".error3").html('');
                                   $(".error4").html('');
                                   $(".error5").html('');
                              } else if (data.statusCode == 201) {
                                   $(".err_psn_section").removeClass('d-none');
                                   $(".err_psn_section").removeClass('alert-info');
                                   $(".err_psn_section").addClass('alert-danger');
                                   $(".err_psn_section").html(data.pesan);
                              } else if (data.statusCode == 202) {
                                   $(".error1").html(data.prs);
                                   $(".error2").html(data.depart);
                                   $(".error3").html(data.kode);
                                   $(".error4").html(data.section);
                                   $(".error5").html(data.ket);
                              }

                              $(".err_psn_section").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_section").slideUp(500);
                              });
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_section").removeClass("alert-primary");
                              $(".err_psn_section").addClass("alert-danger");
                              $(".err_psn_section").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_section").html("Section gagal disimpan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_section").html("Section gagal disimpan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_section").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                              }

                              $(".err_psn_section ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_section ").slideUp(500);
                              });
                         }
                    })
               });

               $(document).on('click', '.hpssection', function() {
                    let authsection = $(this).attr('id');
                    let namasection = $(this).attr('value');

                    if (authsection == "") {
                         swal("Error", "Section tidak ditemukan", "error");
                    } else {
                         swal({
                              title: "Hapus",
                              text: "Yakin section " + namasection + " akan dihapus?",
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
                                        url: "<?= base_url('section/hapus_section'); ?>",
                                        data: {
                                             authsection: authsection
                                        },
                                        timeout: 20000,
                                        success: function(data, textStatus, xhr) {
                                             var data = JSON.parse(data);
                                             if (data.statusCode == 200) {
                                                  tbmsection.draw();
                                                  $(".err_psn_section").removeClass("alert-danger");
                                                  $(".err_psn_section").addClass("alert-primary");
                                                  $(".err_psn_section").css("display", "block");
                                                  $(".err_psn_section").html(data.pesan);
                                             } else {
                                                  $(".err_psn_section").removeClass("alert-primary");
                                                  $(".err_psn_section").addClass("alert-danger");
                                                  $(".err_psn_section").css("display", "block");
                                                  $(".err_psn_section").html(data.pesan);
                                             }

                                             $.LoadingOverlay("hide");
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                             $.LoadingOverlay("hide");
                                             $(".err_psn_section").removeClass("alert-primary");
                                             $(".err_psn_section").addClass("alert-danger");
                                             $(".err_psn_section").css("display", "block");
                                             if (xhr.status == 404) {
                                                  $(".err_psn_section").html("section gagal dihapus, , Link data tidak ditemukan");
                                             } else if (xhr.status == 0) {
                                                  $(".err_psn_section").html("section gagal dihapus, Waktu koneksi habis");
                                             } else {
                                                  $(".err_psn_section").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                             }
                                        }
                                   });

                                   $(".err_psn_section").fadeTo(4000, 500).slideUp(500, function() {
                                        $(".err_psn_section").slideUp(500);
                                   });
                              } else if (result.dismiss == 'cancel') {
                                   swal('Batal', 'Section ' + namasection + ' batal dihapus', 'error');
                                   return false;
                              }
                         });
                    }
               });

               $(document).on('click', '.dtlsection', function() {
                    let authsection = $(this).attr('id');
                    let namasection = $(this).attr('value');

                    if (authsection == "") {
                         swal("Error", "Section tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('section/detail_section'); ?>",
                              data: {
                                   authsection: authsection
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var data = JSON.parse(data);
                                   if (data.statusCode == 200) {
                                        $("#detailSectionPerusahaan").val(data.nama_perusahaan);
                                        $("#detailSectionDepart").val(data.depart);
                                        $("#detailSectionKode").val(data.kode);
                                        $("#detailSection").val(data.section);
                                        $("#detailSectionStatus").val(data.status);
                                        $("#detailSectionKet").val(data.ket);
                                        $("#detailSectionBuat").val(data.pembuat);
                                        $("#detailSectionTglBuat").val(data.tgl_buat);
                                        $("#detailSectionmdl").modal("show");
                                   } else {
                                        $(".err_psn_section").css("display", "block");
                                        $(".err_psn_section").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_section").removeClass("alert-primary");
                                   $(".err_psn_section").addClass("alert-danger");
                                   $(".err_psn_section").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_section").html("section gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_section").html("section gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_section").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }

                                   $(".err_psn_section ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_section ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $(document).on('click', '.edttsection', function() {
                    let authsection = $(this).attr('id');
                    let namasection = $(this).attr('value');

                    if (authsection == "") {
                         swal("Error", "Section tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('section/detail_section'); ?>",
                              data: {
                                   authsection: authsection
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var dataSection = JSON.parse(data);
                                   if (dataSection.statusCode == 200) {
                                        $.ajax({
                                             type: "POST",
                                             url: "<?= base_url('section/get_by_idper'); ?>",
                                             success: function(data) {
                                                  var data = JSON.parse(data);
                                                  if (data.statusCode == 200) {
                                                       $("#editSectionDepart").html(data.depart);
                                                       $.LoadingOverlay("hide");
                                                  } else {
                                                       $("#editSectionDepart").html(data.depart);
                                                       $.LoadingOverlay("hide");
                                                       $(".err_psn_edit_dprt").removeClass("alert-primary");
                                                       $(".err_psn_edit_dprt").addClass("alert-danger");
                                                       $(".err_psn_edit_dprt").css("display", "block");
                                                       $(".err_psn_edit_dprt").html(data.pesan);
                                                  }
                                                  $("#editSectionKode").val(dataSection.kode);
                                                  $("#editSectionDepart").val(dataSection.auth_depart);
                                                  $("#editSection").val(dataSection.section);
                                                  $("#editSectionStatus").val(dataSection.status);
                                                  $("#editSectionKet").val(dataSection.ket);
                                                  $("#editSectionmdl").modal("show");
                                                  $("#error1es").html('');
                                                  $("#error2es").html('');
                                                  $("#error3es").html('');
                                                  $("#error4es").html('');
                                                  $("#error5es").html('');
                                             },
                                             error: function(xhr, ajaxOptions, thrownError) {
                                                  $.LoadingOverlay("hide");
                                                  $(".err_psn_edit_dprt").removeClass("alert-primary");
                                                  $(".err_psn_edit_dprt").addClass("alert-danger");
                                                  $(".err_psn_edit_dprt").css("display", "block");
                                                  if (xhr.status == 404) {
                                                       $(".err_psn_edit_dprt").html("Departemen gagal ditampilkan, Link data tidak ditemukan");
                                                  } else if (xhr.status == 0) {
                                                       $(".err_psn_edit_dprt").html("Departemen gagal ditampilkan, Waktu koneksi habis");
                                                  } else {
                                                       $(".err_psn_edit_dprt").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                                  }

                                                  $(".err_psn_edit_dprt ").fadeTo(3000, 500).slideUp(500, function() {
                                                       $(".err_psn_edit_dprt ").slideUp(500);
                                                  });
                                             }
                                        });
                                   } else {
                                        $(".err_psn_section").css("display", "block");
                                        $(".err_psn_section").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_section").removeClass("alert-primary");
                                   $(".err_psn_section").addClass("alert-danger");
                                   $(".err_psn_section").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_section").html("section gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_section").html("section gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_section").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }

                                   $(".err_psn_section ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_section ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $("#btnrefreshsection").click(function() {
                    $('#tbmsection').LoadingOverlay("show");
                    tbmsection.draw()
                    $('#tbmsection').LoadingOverlay("hide");
               });

               tbmsection = $('#tbmSection').DataTable({
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                         [5, 'asc'],
                    ],
                    "ajax": {
                         "url": "<?= base_url('section/ajax_list'); ?>",
                         "type": "POST",
                         "error": function(xhr, error, code) {
                              if (code != "") {
                                   $(".err_psn_section").removeClass("d-none");
                                   $(".err_psn_section").css("display", "block");
                                   $(".err_psn_section").html("terjadi kesalahan saat melakukan load data section, hubungi administrator");
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
                              name: 'id_section',
                              render: function(data, type, row, meta) {
                                   return meta.row + meta.settings._iDisplayStart + 1;
                              },
                              "className": "text-center",
                              "width": "1%"
                         },
                         {
                              "data": 'kd_section',
                              "width": "10%"
                         },
                         {
                              "data": 'section',
                              "className": "text-nowrap",
                              "width": "25%"
                         },
                         {
                              "data": 'depart',
                              "className": "text-nowrap",
                              "width": "42%"
                         },
                         {
                              "data": 'stat_section',
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

<script>
     //========================================== Posisi ========================================================
     $(document).ready(function() {
          $('#btnupdatePosisi').click(function() {
               let kode = $('#editPosisiKode').val();
               let posisi = $('#editPosisi').val();
               let depart = $('#editPosisiDepart').val();
               let status = $('#editPosisiStatus').val();
               let ket = $('#editPosisiKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('posisi/edit_posisi'); ?>",
                    data: {
                         kode: kode,
                         posisi: posisi,
                         depart: depart,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmPosisi.draw();
                              $("#editPosisimdl").modal("hide");
                              $(".err_psn_posisi").removeClass('d-none');
                              $(".err_psn_posisi").removeClass('alert-danger');
                              $(".err_psn_posisi").addClass('alert-info');
                              $(".err_psn_posisi").html(data.pesan);
                              $("#editPosisiKode").val('');
                              $("#editPosisi").val('');
                              $("#editPosisiKet").val('');
                              $("#editPosisiStatus").val('');
                              $("#error1ep").html('');
                              $("#error2ep").html('');
                              $("#error3ep").html('');
                              $("#error4ep").html('');
                              $("#error5ep").html('');
                              $(".err_psn_posisi").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_posisi").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_posisi").removeClass('d-none');
                              $(".err_psn_edit_posisi").removeClass('alert-info');
                              $(".err_psn_edit_posisi").addClass('alert-danger');
                              $(".err_psn_edit_posisi").html(data.pesan);
                              $(".err_psn_edit_posisi").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_posisi").slideUp(500);
                              });
                         } else if (data.statusCode == 202) {
                              $("#error1ep").html(data.kode);
                              $("#error2ep").html(data.posisi);
                              $("#error3ep").html(data.depart);
                              $("#error4ep").html(data.status);
                              $("#error5ep").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_posisi").removeClass("alert-primary");
                         $(".err_psn_posisi").addClass("alert-danger");
                         $(".err_psn_posisi").css("display", "block");
                         if (xhr.status == 404) {
                              $(".err_psn_posisi").html("Posisi gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_posisi").html("Posisi gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_posisi").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editPosisimdl").modal("hide");
                         $(".err_psn_posisi ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_posisi ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalPosisi").click(function() {
               $("#perPosisi").val('').trigger('change');
               $("#depPosisi").val('').trigger('change');
               $("#kodSPosisi").val('');
               $("#Posisi").val('');
               $("#ketPosisi").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
          });

          $(document).ready(function() {
               $('#depPosisi').select2({
                    theme: 'bootstrap4'
               });
               $('#perPosisi').select2({
                    theme: 'bootstrap4'
               });
               $('#editPosisiDepart').select2({
                    theme: 'bootstrap4',
                    dropdownParent: $('#editPosisimdl')
               });
               $.ajax({
                    type: "POST",
                    url: "<?= base_url("perusahaan/get_all") ?>",
                    data: {},
                    success: function(data) {
                         var data = JSON.parse(data);
                         $("#perPosisi").html(data.prs);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_posisi").removeClass('d-none');
                         $(".err_psn_posisi").removeClass('alert-info');
                         $(".err_psn_posisi").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_posisi").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                              $("#btnTambahPosisi").attr("disabled", true);
                         }
                    }
               })

               $('#perPosisi').change(function() {
                    let auth_per = $("#perPosisi").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("departemen/get_by_authper") ?>",
                         data: {
                              auth_per: auth_per
                         },
                         success: function(data) {
                              var data = JSON.parse(data);
                              $("#depPosisi").html(data.dprt);
                         }
                    })
               });
               $("#btnTambahPosisi").click(function() {
                    var prs = $("#perPosisi").val();
                    var depart = $("#depPosisi").val();
                    var kode = $("#kodePosisi").val();
                    var posisi = $("#Posisi").val();
                    var ket = $("#ketPosisi").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("Posisi/input_Posisi") ?>",
                         data: {
                              prs: prs,
                              kode: kode,
                              posisi: posisi,
                              depart: depart,
                              ket: ket
                         },
                         timeout: 20000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $(".err_psn_posisi").removeClass('d-none');
                                   $(".err_psn_posisi").removeClass('alert-danger');
                                   $(".err_psn_posisi").addClass('alert-info');
                                   $(".err_psn_posisi").html(data.pesan);
                                   $("#perPosisi").val('').trigger('change');
                                   $("#depPosisi").val('').trigger('change');
                                   $("#kodePosisi").val('');
                                   $("#Posisi").val('');
                                   $("#ketPosisi").val('');
                                   $(".error1").html('');
                                   $(".error2").html('');
                                   $(".error3").html('');
                                   $(".error4").html('');
                                   $(".error5").html('');
                              } else if (data.statusCode == 201) {
                                   $(".err_psn_posisi").removeClass('d-none');
                                   $(".err_psn_posisi").removeClass('alert-info');
                                   $(".err_psn_posisi").addClass('alert-danger');
                                   $(".err_psn_posisi").html(data.pesan);
                              } else if (data.statusCode == 202) {
                                   $(".error1").html(data.prs);
                                   $(".error2").html(data.depart);
                                   $(".error3").html(data.kode);
                                   $(".error4").html(data.posisi);
                                   $(".error5").html(data.ket);
                              }

                              $(".err_psn_posisi").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_posisi").slideUp(500);
                              });
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_posisi").removeClass("alert-primary");
                              $(".err_psn_posisi").addClass("alert-danger");
                              $(".err_psn_posisi").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_posisi").html("Posisi gagal disimpan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_posisi").html("Posisi gagal disimpan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_posisi").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                              }

                              $(".err_psn_posisi ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_posisi ").slideUp(500);
                              });
                         }
                    })
               });

               $(document).on('click', '.hpsposisi', function() {
                    let authposisi = $(this).attr('id');
                    let namaPosisi = $(this).attr('value');

                    if (authposisi == "") {
                         swal("Error", "Posisi tidak ditemukan", "error");
                    } else {
                         swal({
                              title: "Hapus",
                              text: "Yakin Posisi " + namaPosisi + " akan dihapus?",
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
                                        url: "<?= base_url('Posisi/hapus_Posisi'); ?>",
                                        data: {
                                             authposisi: authposisi
                                        },
                                        timeout: 20000,
                                        success: function(data, textStatus, xhr) {
                                             var data = JSON.parse(data);
                                             if (data.statusCode == 200) {
                                                  tbmPosisi.draw();
                                                  $(".err_psn_posisi").removeClass("d-none");
                                                  $(".err_psn_posisi").removeClass("alert-danger");
                                                  $(".err_psn_posisi").addClass("alert-primary");
                                                  $(".err_psn_posisi").html(data.pesan);
                                             } else {
                                                  $(".err_psn_posisi").removeClass("d-none");
                                                  $(".err_psn_posisi").removeClass("alert-primary");
                                                  $(".err_psn_posisi").addClass("alert-danger");
                                                  $(".err_psn_posisi").html(data.pesan);
                                             }

                                             $.LoadingOverlay("hide");
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                             $.LoadingOverlay("hide");
                                             $(".err_psn_posisi").removeClass("d-none");
                                             $(".err_psn_posisi").removeClass("alert-primary");
                                             $(".err_psn_posisi").addClass("alert-danger");

                                             if (xhr.status == 404) {
                                                  $(".err_psn_posisi").html("Posisi gagal dihapus, , Link data tidak ditemukan");
                                             } else if (xhr.status == 0) {
                                                  $(".err_psn_posisi").html("Posisi gagal dihapus, Waktu koneksi habis");
                                             } else {
                                                  $(".err_psn_posisi").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                             }
                                        }
                                   });

                                   $(".err_psn_posisi").fadeTo(4000, 500).slideUp(500, function() {
                                        $(".err_psn_posisi").slideUp(500);
                                   });
                              } else if (result.dismiss == 'cancel') {
                                   swal('Batal', 'Posisi ' + namaPosisi + ' batal dihapus', 'error');
                                   return false;
                              }
                         });
                    }
               });

               $(document).on('click', '.dtlposisi', function() {
                    let authposisi = $(this).attr('id');
                    let namaposisi = $(this).attr('value');

                    if (authposisi == "") {
                         swal("Error", "Posisi tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('posisi/detail_posisi'); ?>",
                              data: {
                                   authposisi: authposisi
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var data = JSON.parse(data);
                                   if (data.statusCode == 200) {
                                        $("#detailPosisiPerusahaan").val(data.nama_perusahaan);
                                        $("#detailPosisiDepart").val(data.depart);
                                        $("#detailPosisiKode").val(data.kode);
                                        $("#detailPosisi").val(data.posisi);
                                        $("#detailPosisiStatus").val(data.status);
                                        $("#detailPosisiKet").val(data.ket);
                                        $("#detailPosisiBuat").val(data.pembuat);
                                        $("#detailPosisiTglBuat").val(data.tgl_buat);
                                        $("#detailPosisimdl").modal("show");
                                   } else {
                                        $(".err_psn_posisi").css("display", "block");
                                        $(".err_psn_posisi").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_posisi").removeClass("alert-primary");
                                   $(".err_psn_posisi").addClass("alert-danger");
                                   $(".err_psn_posisi").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_posisi").html("Posisi gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_posisi").html("Posisi gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_posisi").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }
                                   $(".err_psn_posisi ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_posisi ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $(document).on('click', '.edttposisi', function() {
                    let authposisi = $(this).attr('id');
                    let namaposisi = $(this).attr('value');

                    if (authposisi == "") {
                         swal("Error", "Posisi tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('posisi/detail_posisi'); ?>",
                              data: {
                                   authposisi: authposisi
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var dataPosisi = JSON.parse(data);
                                   if (dataPosisi.statusCode == 200) {
                                        $.ajax({
                                             type: "POST",
                                             url: "<?= base_url('Posisi/get_by_idper'); ?>",
                                             success: function(data) {
                                                  var data = JSON.parse(data);
                                                  if (data.statusCode == 200) {
                                                       $("#editPosisiDepart").html(data.depart);
                                                       $.LoadingOverlay("hide");
                                                  } else {
                                                       $("#editPosisiDepart").html(data.depart);
                                                       $.LoadingOverlay("hide");
                                                       $(".err_psn_edit_dprt").removeClass("alert-primary");
                                                       $(".err_psn_edit_dprt").addClass("alert-danger");
                                                       $(".err_psn_edit_dprt").css("display", "block");
                                                       $(".err_psn_edit_dprt").html(data.pesan);
                                                  }
                                                  $("#editPosisiKode").val(dataPosisi.kode);
                                                  $("#editPosisiDepart").val(dataPosisi.auth_depart);
                                                  $("#editPosisi").val(dataPosisi.posisi);
                                                  $("#editPosisiStatus").val(dataPosisi.status);
                                                  $("#editPosisiKet").val(dataPosisi.ket);
                                                  $("#editPosisimdl").modal("show");
                                                  $("#error1ep").html('');
                                                  $("#error2ep").html('');
                                                  $("#error3ep").html('');
                                                  $("#error4ep").html('');
                                                  $("#error5ep").html('');
                                             },
                                             error: function(xhr, ajaxOptions, thrownError) {
                                                  $.LoadingOverlay("hide");
                                                  $(".err_psn_edit_dprt").removeClass("alert-primary");
                                                  $(".err_psn_edit_dprt").addClass("alert-danger");
                                                  $(".err_psn_edit_dprt").css("display", "block");
                                                  if (xhr.status == 404) {
                                                       $(".err_psn_edit_dprt").html("Departemen gagal ditampilkan, Link data tidak ditemukan");
                                                  } else if (xhr.status == 0) {
                                                       $(".err_psn_edit_dprt").html("Departemen gagal ditampilkan, Waktu koneksi habis");
                                                  } else {
                                                       $(".err_psn_edit_dprt").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                                  }
                                                  $(".err_psn_edit_dprt ").fadeTo(3000, 500).slideUp(500, function() {
                                                       $(".err_psn_edit_dprt ").slideUp(500);
                                                  });
                                             }
                                        });
                                   } else {
                                        $(".err_psn_posisi").css("display", "block");
                                        $(".err_psn_posisi").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_posisi").removeClass("alert-primary");
                                   $(".err_psn_posisi").addClass("alert-danger");
                                   $(".err_psn_posisi").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_posisi").html("Posisi gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_posisi").html("Posisi gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_posisi").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }

                                   $(".err_psn_posisi ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_posisi ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $("#btnrefreshPosisi").click(function() {
                    $('#tbmPosisi').LoadingOverlay("show");
                    tbmPosisi.draw()
                    $('#tbmPosisi').LoadingOverlay("hide");
               });

               tbmPosisi = $('#tbmPosisi').DataTable({
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                         [5, 'asc'],
                    ],
                    "ajax": {
                         "url": "<?= base_url('posisi/ajax_list'); ?>",
                         "type": "POST",
                         "error": function(xhr, error, code) {
                              if (code != "") {
                                   $(".err_psn_posisi").removeClass("d-none");
                                   $(".err_psn_posisi").css("display", "block");
                                   $(".err_psn_posisi").html("terjadi kesalahan saat melakukan load data posisi, hubungi administrator");
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
                              name: 'id_posisi',
                              render: function(data, type, row, meta) {
                                   return meta.row + meta.settings._iDisplayStart + 1;
                              },
                              "className": "text-center",
                              "width": "1%"
                         },
                         {
                              "data": 'kd_posisi',
                              "width": "10%"
                         },
                         {
                              "data": 'posisi',
                              "className": "text-nowrap",
                              "width": "25%"
                         },
                         {
                              "data": 'depart',
                              "className": "text-nowrap",
                              "width": "42%"
                         },
                         {
                              "data": 'stat_posisi',
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

<script>
     //========================================== Level ========================================================
     $(document).ready(function() {
          $('#btnupdateLevel').click(function() {
               let kode = $('#editLevelKode').val();
               let level = $('#editLevel').val();
               let status = $('#editLevelStatus').val();
               let ket = $('#editLevelKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('Level/edit_Level'); ?>",
                    data: {
                         kode: kode,
                         level: level,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmLevel.draw();
                              $("#editLevelmdl").modal("hide");
                              $(".err_psn_level").removeClass('d-none');
                              $(".err_psn_level").removeClass('alert-danger');
                              $(".err_psn_level").addClass('alert-info');
                              $(".err_psn_level").html(data.pesan);
                              $("#editLevelKode").val('');
                              $("#editLevel").val('');
                              $("#editLevelKet").val('');
                              $("#editLevelStatus").val('');
                              $("#error1el").html('');
                              $("#error2el").html('');
                              $("#error3el").html('');
                              $("#error4el").html('');
                              $(".err_psn_level").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_level").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_Level").removeClass('d-none');
                              $(".err_psn_edit_Level").removeClass('alert-info');
                              $(".err_psn_edit_Level").addClass('alert-danger');
                              $(".err_psn_edit_Level").html(data.pesan);
                              $(".err_psn_edit_Level").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_Level").slideUp(500);
                              });
                              $("#error1el").html('');
                              $("#error2el").html('');
                              $("#error3el").html('');
                              $("#error4el").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1el").html(data.kode);
                              $("#error2el").html(data.level);
                              $("#error3el").html(data.status);
                              $("#error4el").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_level").removeClass("alert-primary");
                         $(".err_psn_level").addClass("alert-danger");
                         $(".err_psn_level").css("display", "block");
                         if (xhr.status == 404) {
                              $(".err_psn_level").html("Level gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_level").html("Level gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_level").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editLevelmdl").modal("hide");
                         $(".err_psn_level ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_level ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalLevel").click(function() {
               $("#perLevel").val('').trigger('change');
               $("#kodeLevel").val('');
               $("#Level").val('');
               $("#ketLevel").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
          });

          $(document).ready(function() {
               $('#perLevel').select2({
                    theme: 'bootstrap4'
               });

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("perusahaan/get_all") ?>",
                    data: {},
                    success: function(data) {
                         var data = JSON.parse(data);
                         $("#perLevel").html(data.prs);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_level").removeClass('d-none');
                         $(".err_psn_level").removeClass('alert-info');
                         $(".err_psn_level").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_level").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                              $("#btnTambahLevel").attr("disabled", true);
                         }
                    }
               })

               $('#perLevel').change(function() {
                    let auth_per = $("#perLevel").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("departemen/get_by_authper") ?>",
                         data: {
                              auth_per: auth_per
                         },
                         success: function(data) {
                              var data = JSON.parse(data);
                              $("#depLevel").html(data.dprt);
                         }
                    })
               });
               $("#btnTambahLevel").click(function() {
                    var prs = $("#perLevel").val();
                    var kode = $("#kodeLevel").val();
                    var level = $("#Level").val();
                    var ket = $("#ketLevel").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("Level/input_Level") ?>",
                         data: {
                              prs: prs,
                              kode: kode,
                              level: level,
                              ket: ket
                         },
                         timeout: 20000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $(".err_psn_level").removeClass('d-none');
                                   $(".err_psn_level").removeClass('alert-danger');
                                   $(".err_psn_level").addClass('alert-info');
                                   $(".err_psn_level").html(data.pesan);
                                   $("#perLevel").val('').trigger('change');
                                   $("#kodeLevel").val('');
                                   $("#Level").val('');
                                   $("#ketLevel").val('');
                                   $(".error1").html('');
                                   $(".error2").html('');
                                   $(".error3").html('');
                                   $(".error4").html('');
                              } else if (data.statusCode == 201) {
                                   $(".err_psn_level").removeClass('d-none');
                                   $(".err_psn_level").removeClass('alert-info');
                                   $(".err_psn_level").addClass('alert-danger');
                                   $(".err_psn_level").html(data.pesan);
                              } else if (data.statusCode == 202) {
                                   $(".error1").html(data.prs);
                                   $(".error2").html(data.kode);
                                   $(".error3").html(data.level);
                                   $(".error4").html(data.ket);
                              }

                              $(".err_psn_level").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_level").slideUp(500);
                              });
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_level").removeClass("alert-primary");
                              $(".err_psn_level").addClass("alert-danger");
                              $(".err_psn_level").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_level").html("Level gagal disimpan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_level").html("Level gagal disimpan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_level").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                              }

                              $(".err_psn_level ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_level ").slideUp(500);
                              });
                         }
                    })
               });

               $(document).on('click', '.hpslevel', function() {
                    let authlevel = $(this).attr('id');
                    let namaLevel = $(this).attr('value');

                    if (authlevel == "") {
                         swal("Error", "Level tidak ditemukan", "error");
                    } else {
                         swal({
                              title: "Hapus",
                              text: "Yakin Level " + namaLevel + " akan dihapus?",
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
                                        url: "<?= base_url('Level/hapus_Level'); ?>",
                                        data: {
                                             authlevel: authlevel
                                        },
                                        timeout: 20000,
                                        success: function(data, textStatus, xhr) {
                                             var data = JSON.parse(data);
                                             if (data.statusCode == 200) {
                                                  tbmLevel.draw();
                                                  $(".err_psn_level").removeClass("alert-danger");
                                                  $(".err_psn_level").addClass("alert-primary");
                                                  $(".err_psn_level").css("display", "block");
                                                  $(".err_psn_level").html(data.pesan);
                                             } else {
                                                  $(".err_psn_level").removeClass("alert-primary");
                                                  $(".err_psn_level").addClass("alert-danger");
                                                  $(".err_psn_level").css("display", "block");
                                                  $(".err_psn_level").html(data.pesan);
                                             }

                                             $.LoadingOverlay("hide");
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                             $.LoadingOverlay("hide");
                                             $(".err_psn_level").removeClass("alert-primary");
                                             $(".err_psn_level").addClass("alert-danger");
                                             $(".err_psn_level").css("display", "block");
                                             if (xhr.status == 404) {
                                                  $(".err_psn_level").html("Level gagal dihapus, , Link data tidak ditemukan");
                                             } else if (xhr.status == 0) {
                                                  $(".err_psn_level").html("Level gagal dihapus, Waktu koneksi habis");
                                             } else {
                                                  $(".err_psn_level").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                             }
                                        }
                                   });

                                   $(".err_psn_level").fadeTo(4000, 500).slideUp(500, function() {
                                        $(".err_psn_level").slideUp(500);
                                   });
                              } else if (result.dismiss == 'cancel') {
                                   swal('Batal', 'Level ' + namaLevel + ' batal dihapus', 'error');
                                   return false;
                              }
                         });
                    }
               });

               $(document).on('click', '.dtllevel', function() {
                    let authlevel = $(this).attr('id');
                    let namalevel = $(this).attr('value');

                    if (authlevel == "") {
                         swal("Error", "Level tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('Level/detail_Level'); ?>",
                              data: {
                                   authlevel: authlevel
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var data = JSON.parse(data);
                                   if (data.statusCode == 200) {
                                        $("#detailLevelPerusahaan").val(data.nama_perusahaan);
                                        $("#detailLevelDepart").val(data.depart);
                                        $("#detailLevelKode").val(data.kode);
                                        $("#detailLevel").val(data.level);
                                        $("#detailLevelStatus").val(data.status);
                                        $("#detailLevelKet").val(data.ket);
                                        $("#detailLevelBuat").val(data.pembuat);
                                        $("#detailLevelTglBuat").val(data.tgl_buat);
                                        $("#detailLevelmdl").modal("show");
                                   } else {
                                        $(".err_psn_level").css("display", "block");
                                        $(".err_psn_level").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_level").removeClass("alert-primary");
                                   $(".err_psn_level").addClass("alert-danger");
                                   $(".err_psn_level").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_level").html("Level gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_level").html("Level gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_level").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }
                                   $(".err_psn_level ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_level ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $(document).on('click', '.edttlevel', function() {
                    let authlevel = $(this).attr('id');
                    let namaLevel = $(this).attr('value');

                    if (authlevel == "") {
                         swal("Error", "Level tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('Level/detail_Level'); ?>",
                              data: {
                                   authlevel: authlevel
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var dataLevel = JSON.parse(data);
                                   if (dataLevel.statusCode == 200) {
                                        $("#editLevelKode").val(dataLevel.kode);
                                        $("#editLevel").val(dataLevel.level);
                                        $("#editLevelStatus").val(dataLevel.status);
                                        $("#editLevelKet").val(dataLevel.ket);
                                        $("#editLevelmdl").modal("show");
                                        $("#error1el").html('');
                                        $("#error2el").html('');
                                        $("#error3el").html('');
                                        $("#error4el").html('');
                                   } else {
                                        $(".err_psn_level").css("display", "block");
                                        $(".err_psn_level").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_level").removeClass("alert-primary");
                                   $(".err_psn_level").addClass("alert-danger");
                                   $(".err_psn_level").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_level").html("Level gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_level").html("Level gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_level").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }

                                   $(".err_psn_level ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_level ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $("#btnrefreshLevel").click(function() {
                    $('#tbmLevel').LoadingOverlay("show");
                    tbmLevel.draw()
                    $('#tbmLevel').LoadingOverlay("hide");
               });

               tbmLevel = $('#tbmLevel').DataTable({
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                         [1, 'asc'],
                    ],
                    "ajax": {
                         "url": "<?= base_url('Level/ajax_list'); ?>",
                         "type": "POST",
                         "error": function(xhr, error, code) {
                              if (code != "") {
                                   $(".err_psn_level").removeClass("d-none");
                                   $(".err_psn_level").css("display", "block");
                                   $(".err_psn_level").html("terjadi kesalahan saat melakukan load data Level, hubungi administrator");
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
                              name: 'id_Level',
                              render: function(data, type, row, meta) {
                                   return meta.row + meta.settings._iDisplayStart + 1;
                              },
                              "className": "text-center",
                              "width": "1%"
                         },
                         {
                              "data": 'kd_level',
                              "width": "10%"
                         },
                         {
                              "data": 'level',
                              "className": "text-nowrap",
                              "width": "25%"
                         },
                         {
                              "data": 'stat_level',
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

<script>
     //========================================== Grade ========================================================
     $(document).ready(function() {
          $('#btnupdateGrade').click(function() {
               let kode = $('#editGradeKode').val();
               let grade = $('#editGrade').val();
               let level = $('#editGradeLevel').val();
               let status = $('#editGradeStatus').val();
               let ket = $('#editGradeKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('grade/edit_grade'); ?>",
                    data: {
                         kode: kode,
                         grade: grade,
                         level: level,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmGrade.draw();
                              $("#editGrademdl").modal("hide");
                              $(".err_psn_grade").removeClass('d-none');
                              $(".err_psn_grade").removeClass('alert-danger');
                              $(".err_psn_grade").addClass('alert-info');
                              $(".err_psn_grade").html(data.pesan);
                              $("#editGradeKode").val('');
                              $("#editGrade").val('');
                              $("#editGradeKet").val('');
                              $("#editGradeStatus").val('');
                              $("#error1eg").html('');
                              $("#error2eg").html('');
                              $("#error3eg").html('');
                              $("#error4eg").html('');
                              $("#error5eg").html('');
                              $(".err_psn_grade").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_grade").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_grade").removeClass('d-none');
                              $(".err_psn_edit_grade").removeClass('alert-info');
                              $(".err_psn_edit_grade").addClass('alert-danger');
                              $(".err_psn_edit_grade").html(data.pesan);
                              $(".err_psn_edit_grade").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_grade").slideUp(500);
                              });
                              $("#error1eg").html('');
                              $("#error2eg").html('');
                              $("#error3eg").html('');
                              $("#error4eg").html('');
                              $("#error5eg").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1eg").html(data.kode);
                              $("#error2eg").html(data.grade);
                              $("#error3eg").html(data.level);
                              $("#error4eg").html(data.status);
                              $("#error5eg").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         alert(xhr.status);
                         $(".err_psn_grade").removeClass("alert-primary");
                         $(".err_psn_grade").addClass("alert-danger");
                         $(".err_psn_grade").css("display", "block");
                         if (xhr.status == 404) {
                              $(".err_psn_grade").html("Grade gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_grade").html("Grade gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_grade").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editGrademdl").modal("hide");
                         $(".err_psn_grade ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_grade ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalGrade").click(function() {
               $("#perGrade").val('').trigger('change');
               $("#lvlGrade").val('').trigger('change');
               $("#kodSGrade").val('');
               $("#Grade").val('');
               $("#ketGrade").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
          });

          $(document).ready(function() {
               $('#lvlGrade').select2({
                    theme: 'bootstrap4'
               });
               $('#perGrade').select2({
                    theme: 'bootstrap4'
               });
               $('#editGradeLevel').select2({
                    theme: 'bootstrap4',
                    dropdownParent: $('#editGrademdl')
               });
               $.ajax({
                    type: "POST",
                    url: "<?= base_url("perusahaan/get_all") ?>",
                    success: function(data) {
                         var data = JSON.parse(data);
                         $("#perGrade").html(data.prs);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_grade").removeClass('d-none');
                         $(".err_psn_grade").removeClass('alert-info');
                         $(".err_psn_grade").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_grade").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                              $("#btnTambahGrade").attr("disabled", true);
                         }
                    }
               })

               $('#perGrade').change(function() {
                    let auth_per = $("#perGrade").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("level/get_by_authper") ?>",
                         data: {
                              auth_per: auth_per
                         },
                         success: function(data) {
                              var data = JSON.parse(data);
                              $("#lvlGrade").html(data.lvl);
                         }
                    })
               });
               $("#btnTambahGrade").click(function() {
                    let prs = $("#perGrade").val();
                    let kode = $("#kodeGrade").val();
                    let level = $("#lvlGrade").val();
                    let grade = $("#Grade").val();
                    let ket = $("#ketGrade").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("grade/input_grade") ?>",
                         data: {
                              prs: prs,
                              kode: kode,
                              level: level,
                              grade: grade,
                              ket: ket
                         },
                         timeout: 20000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $(".err_psn_grade").removeClass('d-none');
                                   $(".err_psn_grade").removeClass('alert-danger');
                                   $(".err_psn_grade").addClass('alert-info');
                                   $(".err_psn_grade").html(data.pesan);
                                   $("#perGrade").val('').trigger('change');
                                   $("#depGrade").val('').trigger('change');
                                   $("#kodeGrade").val('');
                                   $("#Grade").val('');
                                   $("#ketGrade").val('');
                                   $(".error1").html('');
                                   $(".error2").html('');
                                   $(".error3").html('');
                                   $(".error4").html('');
                                   $(".error5").html('');
                              } else if (data.statusCode == 201) {
                                   $(".err_psn_grade").removeClass('d-none');
                                   $(".err_psn_grade").removeClass('alert-info');
                                   $(".err_psn_grade").addClass('alert-danger');
                                   $(".err_psn_grade").html(data.pesan);
                              } else if (data.statusCode == 202) {
                                   $(".error1").html(data.prs);
                                   $(".error2").html(data.level);
                                   $(".error3").html(data.kode);
                                   $(".error4").html(data.grade);
                                   $(".error5").html(data.ket);
                              }

                              $(".err_psn_grade").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_grade").slideUp(500);
                              });
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_grade").removeClass("alert-primary");
                              $(".err_psn_grade").addClass("alert-danger");
                              $(".err_psn_grade").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_grade").html("Grade gagal disimpan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_grade").html("Grade gagal disimpan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_grade").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                              }

                              $(".err_psn_grade ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_grade ").slideUp(500);
                              });
                         }
                    })
               });

               $(document).on('click', '.hpsgrade', function() {
                    let authgrade = $(this).attr('id');
                    let namaGrade = $(this).attr('value');

                    if (authgrade == "") {
                         swal("Error", "Grade tidak ditemukan", "error");
                    } else {
                         swal({
                              title: "Hapus",
                              text: "Yakin Grade " + namaGrade + " akan dihapus?",
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
                                        url: "<?= base_url('Grade/hapus_Grade'); ?>",
                                        data: {
                                             authgrade: authgrade
                                        },
                                        timeout: 20000,
                                        success: function(data, textStatus, xhr) {
                                             var data = JSON.parse(data);
                                             if (data.statusCode == 200) {
                                                  tbmGrade.draw();
                                                  $(".err_psn_grade").removeClass("alert-danger");
                                                  $(".err_psn_grade").addClass("alert-primary");
                                                  $(".err_psn_grade").css("display", "block");
                                                  $(".err_psn_grade").html(data.pesan);
                                             } else {
                                                  $(".err_psn_grade").removeClass("alert-primary");
                                                  $(".err_psn_grade").addClass("alert-danger");
                                                  $(".err_psn_grade").css("display", "block");
                                                  $(".err_psn_grade").html(data.pesan);
                                             }

                                             $.LoadingOverlay("hide");
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                             $.LoadingOverlay("hide");
                                             $(".err_psn_grade").removeClass("alert-primary");
                                             $(".err_psn_grade").addClass("alert-danger");
                                             $(".err_psn_grade").css("display", "block");
                                             if (xhr.status == 404) {
                                                  $(".err_psn_grade").html("Grade gagal dihapus, , Link data tidak ditemukan");
                                             } else if (xhr.status == 0) {
                                                  $(".err_psn_grade").html("Grade gagal dihapus, Waktu koneksi habis");
                                             } else {
                                                  $(".err_psn_grade").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                             }
                                        }
                                   });

                                   $(".err_psn_grade").fadeTo(4000, 500).slideUp(500, function() {
                                        $(".err_psn_grade").slideUp(500);
                                   });
                              } else if (result.dismiss == 'cancel') {
                                   swal('Batal', 'Grade ' + namaGrade + ' batal dihapus', 'error');
                                   return false;
                              }
                         });
                    }
               });

               $(document).on('click', '.dtlgrade', function() {
                    let authgrade = $(this).attr('id');
                    let namaGrade = $(this).attr('value');

                    if (authgrade == "") {
                         swal("Error", "Grade tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('Grade/detail_Grade'); ?>",
                              data: {
                                   authgrade: authgrade
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var data = JSON.parse(data);
                                   if (data.statusCode == 200) {
                                        $("#detailGradePerusahaan").val(data.nama_perusahaan);
                                        $("#detailGradeLevel").val(data.level);
                                        $("#detailGradeKode").val(data.kode);
                                        $("#detailGrade").val(data.grade);
                                        $("#detailGradeStatus").val(data.status);
                                        $("#detailGradeKet").val(data.ket);
                                        $("#detailGradeBuat").val(data.pembuat);
                                        $("#detailGradeTglBuat").val(data.tgl_buat);
                                        $("#detailGrademdl").modal("show");
                                   } else {
                                        $(".err_psn_grade").css("display", "block");
                                        $(".err_psn_grade").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_grade").removeClass("alert-primary");
                                   $(".err_psn_grade").addClass("alert-danger");
                                   $(".err_psn_grade").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_grade").html("Grade gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_grade").html("Grade gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_grade").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }
                                   $(".err_psn_grade ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_grade ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $(document).on('click', '.edttgrade', function() {
                    let authgrade = $(this).attr('id');
                    let namaGrade = $(this).attr('value');

                    if (authgrade == "") {
                         swal("Error", "Grade tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('grade/detail_grade'); ?>",
                              data: {
                                   authgrade: authgrade
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var dataGrade = JSON.parse(data);
                                   if (dataGrade.statusCode == 200) {
                                        $.ajax({
                                             type: "POST",
                                             url: "<?= base_url('level/get_by_idper'); ?>",
                                             success: function(data) {

                                                  var data = JSON.parse(data);
                                                  if (data.statusCode == 200) {
                                                       $("#editGradeLevel").html(data.level);
                                                       $.LoadingOverlay("hide");
                                                  } else {
                                                       $("#editGradeLevel").html(data.level);
                                                       $.LoadingOverlay("hide");
                                                       $(".err_psn_edit_dprt").removeClass("alert-primary");
                                                       $(".err_psn_edit_dprt").addClass("alert-danger");
                                                       $(".err_psn_edit_dprt").css("display", "block");
                                                       $(".err_psn_edit_dprt").html(data.pesan);
                                                  }
                                                  $("#editGradeKode").val(dataGrade.kode);
                                                  $("#editGrade").val(dataGrade.grade);
                                                  $("#editGradeLevel").val(dataGrade.auth_level);
                                                  $("#editGradeStatus").val(dataGrade.status);
                                                  $("#editGradeKet").val(dataGrade.ket);
                                                  $("#editGrademdl").modal("show");
                                                  $("#error1eg").html('');
                                                  $("#error2eg").html('');
                                                  $("#error3eg").html('');
                                                  $("#error4eg").html('');
                                                  $("#error5eg").html('');
                                             },
                                             error: function(xhr, ajaxOptions, thrownError) {
                                                  $.LoadingOverlay("hide");
                                                  $(".err_psn_edit_dprt").removeClass("alert-primary");
                                                  $(".err_psn_edit_dprt").addClass("alert-danger");
                                                  $(".err_psn_edit_dprt").css("display", "block");
                                                  if (xhr.status == 404) {
                                                       $(".err_psn_edit_dprt").html("Departemen gagal ditampilkan, Link data tidak ditemukan");
                                                  } else if (xhr.status == 0) {
                                                       $(".err_psn_edit_dprt").html("Departemen gagal ditampilkan, Waktu koneksi habis");
                                                  } else {
                                                       $(".err_psn_edit_dprt").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                                  }
                                                  $(".err_psn_edit_dprt ").fadeTo(3000, 500).slideUp(500, function() {
                                                       $(".err_psn_edit_dprt ").slideUp(500);
                                                  });
                                             }
                                        });
                                   } else {
                                        $(".err_psn_grade").css("display", "block");
                                        $(".err_psn_grade").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_grade").removeClass("alert-primary");
                                   $(".err_psn_grade").addClass("alert-danger");
                                   $(".err_psn_grade").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_grade").html("Grade gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_grade").html("Grade gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_grade").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }

                                   $(".err_psn_grade ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_grade ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $("#btnrefreshGrade").click(function() {
                    $('#tbmGrade').LoadingOverlay("show");
                    tbmGrade.draw()
                    $('#tbmGrade').LoadingOverlay("hide");
               });

               tbmGrade = $('#tbmGrade').DataTable({
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                         [2, 'asc'],
                    ],
                    "ajax": {
                         "url": "<?= base_url('grade/ajax_list'); ?>",
                         "type": "POST",
                         "error": function(xhr, error, code) {
                              if (code != "") {
                                   $(".err_psn_grade").removeClass("d-none");
                                   $(".err_psn_grade").css("display", "block");
                                   $(".err_psn_grade").html("Terjadi kesalahan saat melakukan load data grade, hubungi administrator");
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
                              name: 'id_grade',
                              render: function(data, type, row, meta) {
                                   return meta.row + meta.settings._iDisplayStart + 1;
                              },
                              "className": "text-center",
                              "width": "1%"
                         },
                         {
                              "data": 'kd_grade',
                              "width": "10%"
                         },
                         {
                              "data": 'grade',
                              "className": "text-center text-nowrap",
                              "width": "1%"
                         },
                         {
                              "data": 'level',
                              "className": "text-nowrap",
                              "width": "40%"
                         },
                         {
                              "data": 'stat_grade',
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

<script>
     //========================================== Tipe ========================================================
     $(document).ready(function() {
          $('#btnupdateTipe').click(function() {
               let kode = $('#editTipeKode').val();
               let tipe = $('#editTipe').val();
               let status = $('#editTipeStatus').val();
               let ket = $('#editTipeKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('tipe/edit_tipe'); ?>",
                    data: {
                         kode: kode,
                         tipe: tipe,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmTipe.draw();
                              $("#editTipemdl").modal("hide");
                              $(".err_psn_tipe").removeClass('d-none');
                              $(".err_psn_tipe").removeClass('alert-danger');
                              $(".err_psn_tipe").addClass('alert-info');
                              $(".err_psn_tipe").html(data.pesan);
                              $("#editTipeKode").val('');
                              $("#editTipe").val('');
                              $("#editTipeKet").val('');
                              $("#editTipeStatus").val('');
                              $("#error1et").html('');
                              $("#error2et").html('');
                              $("#error3et").html('');
                              $("#error4et").html('');
                              $(".err_psn_tipe").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_tipe").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_tipe").removeClass('d-none');
                              $(".err_psn_edit_tipe").removeClass('alert-info');
                              $(".err_psn_edit_tipe").addClass('alert-danger');
                              $(".err_psn_edit_tipe").html(data.pesan);
                              $(".err_psn_edit_tipe").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_tipe").slideUp(500);
                              });
                              $("#error1et").html('');
                              $("#error2et").html('');
                              $("#error3et").html('');
                              $("#error4et").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1et").html(data.kode);
                              $("#error2et").html(data.tipe);
                              $("#error3et").html(data.status);
                              $("#error4et").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_tipe").removeClass("alert-primary");
                         $(".err_psn_tipe").addClass("alert-danger");
                         $(".err_psn_tipe").css("display", "block");
                         if (xhr.status == 404) {
                              $(".err_psn_tipe").html("Tipe gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_tipe").html("Tipe gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_tipe").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editTipemdl").modal("hide");
                         $(".err_psn_tipe ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_tipe ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalTipe").click(function() {
               $("#perTipe").val('').trigger('change');
               $("#kodeTipe").val('');
               $("#Tipe").val('');
               $("#ketTipe").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
          });

          $(document).ready(function() {
               $('#perTipe').select2({
                    theme: 'bootstrap4'
               });

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("perusahaan/get_all") ?>",
                    data: {},
                    success: function(data) {
                         var data = JSON.parse(data);
                         $("#perTipe").html(data.prs);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_tipe").removeClass('d-none');
                         $(".err_psn_tipe").removeClass('alert-info');
                         $(".err_psn_tipe").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_tipe").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                              $("#btnTambahTipe").attr("disabled", true);
                         }
                    }
               });
               $('#perTipe').change(function() {
                    let auth_per = $("#perTipe").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("departemen/get_by_authper") ?>",
                         data: {
                              auth_per: auth_per
                         },
                         success: function(data) {
                              var data = JSON.parse(data);
                              $("#depTipe").html(data.dprt);
                         }
                    })
               });
               $("#btnTambahTipe").click(function() {
                    var prs = $("#perTipe").val();
                    var kode = $("#kodeTipe").val();
                    var tipe = $("#Tipe").val();
                    var ket = $("#ketTipe").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("tipe/input_tipe") ?>",
                         data: {
                              prs: prs,
                              kode: kode,
                              tipe: tipe,
                              ket: ket
                         },
                         timeout: 20000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $(".err_psn_tipe").removeClass('d-none');
                                   $(".err_psn_tipe").removeClass('alert-danger');
                                   $(".err_psn_tipe").addClass('alert-info');
                                   $(".err_psn_tipe").html(data.pesan);
                                   $("#perTipe").val('').trigger('change');
                                   $("#kodeTipe").val('');
                                   $("#Tipe").val('');
                                   $("#ketTipe").val('');
                                   $(".error1").html('');
                                   $(".error2").html('');
                                   $(".error3").html('');
                                   $(".error4").html('');
                              } else if (data.statusCode == 201) {
                                   $(".err_psn_tipe").removeClass('d-none');
                                   $(".err_psn_tipe").removeClass('alert-info');
                                   $(".err_psn_tipe").addClass('alert-danger');
                                   $(".err_psn_tipe").html(data.pesan);
                              } else if (data.statusCode == 202) {
                                   $(".error1").html(data.prs);
                                   $(".error2").html(data.kode);
                                   $(".error3").html(data.tipe);
                                   $(".error4").html(data.ket);
                              }

                              $(".err_psn_tipe").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_tipe").slideUp(500);
                              });
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_tipe").removeClass("alert-primary");
                              $(".err_psn_tipe").addClass("alert-danger");
                              $(".err_psn_tipe").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_tipe").html("Tipe gagal disimpan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_tipe").html("Tipe gagal disimpan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_tipe").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                              }

                              $(".err_psn_tipe ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_tipe ").slideUp(500);
                              });
                         }
                    })
               });

               $(document).on('click', '.hpstipe', function() {
                    let authtipe = $(this).attr('id');
                    let namaTipe = $(this).attr('value');

                    if (authtipe == "") {
                         swal("Error", "Tipe tidak ditemukan", "error");
                    } else {
                         swal({
                              title: "Hapus",
                              text: "Yakin Tipe " + namaTipe + " akan dihapus?",
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
                                        url: "<?= base_url('tipe/hapus_tipe'); ?>",
                                        data: {
                                             authtipe: authtipe
                                        },
                                        timeout: 20000,
                                        success: function(data, textStatus, xhr) {
                                             var data = JSON.parse(data);
                                             if (data.statusCode == 200) {
                                                  tbmTipe.draw();
                                                  $(".err_psn_tipe").removeClass("alert-danger");
                                                  $(".err_psn_tipe").addClass("alert-primary");
                                                  $(".err_psn_tipe").css("display", "block");
                                                  $(".err_psn_tipe").html(data.pesan);
                                             } else {
                                                  $(".err_psn_tipe").removeClass("alert-primary");
                                                  $(".err_psn_tipe").addClass("alert-danger");
                                                  $(".err_psn_tipe").css("display", "block");
                                                  $(".err_psn_tipe").html(data.pesan);
                                             }

                                             $.LoadingOverlay("hide");
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                             $.LoadingOverlay("hide");
                                             $(".err_psn_tipe").removeClass("alert-primary");
                                             $(".err_psn_tipe").addClass("alert-danger");
                                             $(".err_psn_tipe").css("display", "block");
                                             if (xhr.status == 404) {
                                                  $(".err_psn_tipe").html("Tipe gagal dihapus, , Link data tidak ditemukan");
                                             } else if (xhr.status == 0) {
                                                  $(".err_psn_tipe").html("Tipe gagal dihapus, Waktu koneksi habis");
                                             } else {
                                                  $(".err_psn_tipe").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                             }
                                        }
                                   });

                                   $(".err_psn_tipe").fadeTo(4000, 500).slideUp(500, function() {
                                        $(".err_psn_tipe").slideUp(500);
                                   });
                              } else if (result.dismiss == 'cancel') {
                                   swal('Batal', 'Tipe ' + namaTipe + ' batal dihapus', 'error');
                                   return false;
                              }
                         });
                    }
               });

               $(document).on('click', '.dtltipe', function() {
                    let authtipe = $(this).attr('id');
                    let namaTipe = $(this).attr('value');

                    if (authtipe == "") {
                         swal("Error", "Tipe tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('tipe/detail_tipe'); ?>",
                              data: {
                                   authtipe: authtipe
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var data = JSON.parse(data);
                                   if (data.statusCode == 200) {
                                        $("#detailTipePerusahaan").val(data.nama_perusahaan);
                                        $("#detailTipeDepart").val(data.depart);
                                        $("#detailTipeKode").val(data.kode);
                                        $("#detailTipe").val(data.tipe);
                                        $("#detailTipeStatus").val(data.status);
                                        $("#detailTipeKet").val(data.ket);
                                        $("#detailTipeBuat").val(data.pembuat);
                                        $("#detailTipeTglBuat").val(data.tgl_buat);
                                        $("#detailTipemdl").modal("show");
                                   } else {
                                        $(".err_psn_tipe").css("display", "block");
                                        $(".err_psn_tipe").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_tipe").removeClass("alert-primary");
                                   $(".err_psn_tipe").addClass("alert-danger");
                                   $(".err_psn_tipe").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_tipe").html("Tipe gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_tipe").html("Tipe gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_tipe").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }
                                   $(".err_psn_tipe ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_tipe ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $(document).on('click', '.edtttipe', function() {
                    let authtipe = $(this).attr('id');
                    let namaTipe = $(this).attr('value');

                    if (authtipe == "") {
                         swal("Error", "Tipe tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('tipe/detail_Tipe'); ?>",
                              data: {
                                   authtipe: authtipe
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var dataTipe = JSON.parse(data);
                                   if (dataTipe.statusCode == 200) {
                                        $("#editTipeKode").val(dataTipe.kode);
                                        $("#editTipe").val(dataTipe.tipe);
                                        $("#editTipeStatus").val(dataTipe.status);
                                        $("#editTipeKet").val(dataTipe.ket);
                                        $("#editTipemdl").modal("show");
                                        $("#error1et").html('');
                                        $("#error2et").html('');
                                        $("#error3et").html('');
                                        $("#error4et").html('');
                                   } else {
                                        $(".err_psn_tipe").css("display", "block");
                                        $(".err_psn_tipe").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_tipe").removeClass("alert-primary");
                                   $(".err_psn_tipe").addClass("alert-danger");
                                   $(".err_psn_tipe").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_tipe").html("Tipe gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_tipe").html("Tipe gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_tipe").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }

                                   $(".err_psn_tipe ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_tipe ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $("#btnrefreshTipe").click(function() {
                    $('#tbmTipe').LoadingOverlay("show");
                    tbmTipe.draw()
                    $('#tbmTipe').LoadingOverlay("hide");
               });

               tbmTipe = $('#tbmTipe').DataTable({
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                         [1, 'asc'],
                    ],
                    "ajax": {
                         "url": "<?= base_url('tipe/ajax_list'); ?>",
                         "type": "POST",
                         "error": function(xhr, error, code) {
                              if (code != "") {
                                   $(".err_psn_tipe").removeClass("d-none");
                                   $(".err_psn_tipe").css("display", "block");
                                   $(".err_psn_tipe").html("terjadi kesalahan saat melakukan load data tipe, hubungi administrator");
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
                              name: 'id_tipe',
                              render: function(data, type, row, meta) {
                                   return meta.row + meta.settings._iDisplayStart + 1;
                              },
                              "className": "text-center",
                              "width": "1%"
                         },
                         {
                              "data": 'kd_tipe',
                              "width": "10%"
                         },
                         {
                              "data": 'tipe',
                              "className": "text-nowrap",
                              "width": "25%"
                         },
                         {
                              "data": 'stat_tipe',
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

<script>
     //========================================== StatJanji ========================================================
     $(document).ready(function() {
          $('#btnupdateStatJanji').click(function() {
               let kode = $('#editStatJanjiKode').val();
               let stat_perjanjian = $('#editStatJanji').val();
               let status = $('#editStatJanjiStatus').val();
               let ket = $('#editStatJanjiKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('perjanjian/edit_stat_perjanjian'); ?>",
                    data: {
                         kode: kode,
                         stat_perjanjian: stat_perjanjian,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         alert(data);
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmStatJanji.draw();
                              $("#editStatJanjimdl").modal("hide");
                              $(".err_psn_statjanji").removeClass('d-none');
                              $(".err_psn_statjanji").removeClass('alert-danger');
                              $(".err_psn_statjanji").addClass('alert-info');
                              $(".err_psn_statjanji").html(data.pesan);
                              $("#editStatJanjiKode").val('');
                              $("#editStatJanji").val('');
                              $("#editStatJanjiKet").val('');
                              $("#editStatJanjiStatus").val('');
                              $("#error1est").html('');
                              $("#error2est").html('');
                              $("#error3est").html('');
                              $("#error4est").html('');
                              $(".err_psn_statjanji").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_statjanji").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_statjanji").removeClass('d-none');
                              $(".err_psn_edit_statjanji").removeClass('alert-info');
                              $(".err_psn_edit_statjanji").addClass('alert-danger');
                              $(".err_psn_edit_statjanji").html(data.pesan);
                              $(".err_psn_edit_statjanji").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_statjanji").slideUp(500);
                              });
                              $("#error1est").html('');
                              $("#error2est").html('');
                              $("#error3est").html('');
                              $("#error4est").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1est").html(data.kode);
                              $("#error2est").html(data.stat_perjanjian);
                              $("#error3est").html(data.status);
                              $("#error4est").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_statjanji").removeClass("alert-primary");
                         $(".err_psn_statjanji").addClass("alert-danger");
                         $(".err_psn_statjanji").css("display", "block");
                         if (xhr.status == 404) {
                              $(".err_psn_statjanji").html("StatJanji gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_statjanji").html("StatJanji gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_statjanji").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editStatJanjimdl").modal("hide");
                         $(".err_psn_statjanji ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_statjanji ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalStatJanji").click(function() {
               $("#perStatJanji").val('').trigger('change');
               $("#kodeStatJanji").val('');
               $("#StatJanji").val('');
               $("#ketStatJanji").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
          });

          $(document).ready(function() {
               $('#perStatJanji').select2({
                    theme: 'bootstrap4'
               });

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("perusahaan/get_all") ?>",
                    data: {},
                    success: function(data) {
                         var data = JSON.parse(data);
                         $("#perStatJanji").html(data.prs);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_statjanji").removeClass('d-none');
                         $(".err_psn_statjanji").removeClass('alert-info');
                         $(".err_psn_statjanji").addClass('alert-danger');
                         if (thrownError != "") {
                              $(".err_psn_statjanji").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                              $("#btnTambahStatJanji").attr("disabled", true);
                         }
                    }
               });
               $("#btnTambahStatJanji").click(function() {
                    var prs = $("#perStatJanji").val();
                    var kode = $("#kodeStatJanji").val();
                    var stat_perjanjian = $("#StatJanji").val();
                    var ket = $("#ketStatJanji").val();

                    $.ajax({
                         type: "POST",
                         url: "<?= base_url("perjanjian/input_stat_perjanjian") ?>",
                         data: {
                              prs: prs,
                              kode: kode,
                              stat_perjanjian: stat_perjanjian,
                              ket: ket
                         },
                         timeout: 20000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $(".err_psn_statjanji").removeClass('d-none');
                                   $(".err_psn_statjanji").removeClass('alert-danger');
                                   $(".err_psn_statjanji").addClass('alert-info');
                                   $(".err_psn_statjanji").html(data.pesan);
                                   $("#perStatJanji").val('').trigger('change');
                                   $("#kodeStatJanji").val('');
                                   $("#StatJanji").val('');
                                   $("#ketStatJanji").val('');
                                   $(".error1").html('');
                                   $(".error2").html('');
                                   $(".error3").html('');
                                   $(".error4").html('');
                              } else if (data.statusCode == 201) {
                                   $(".err_psn_statjanji").removeClass('d-none');
                                   $(".err_psn_statjanji").removeClass('alert-info');
                                   $(".err_psn_statjanji").addClass('alert-danger');
                                   $(".err_psn_statjanji").html(data.pesan);
                              } else if (data.statusCode == 202) {
                                   $(".error1").html(data.prs);
                                   $(".error2").html(data.kode);
                                   $(".error3").html(data.stat_perjanjian);
                                   $(".error4").html(data.ket);
                              }

                              $(".err_psn_statjanji").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_statjanji").slideUp(500);
                              });
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_statjanji").removeClass("alert-primary");
                              $(".err_psn_statjanji").addClass("alert-danger");
                              $(".err_psn_statjanji").css("display", "block");
                              if (xhr.status == 404) {
                                   $(".err_psn_statjanji").html("StatJanji gagal disimpan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_statjanji").html("StatJanji gagal disimpan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_statjanji").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                              }

                              $(".err_psn_statjanji ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_statjanji ").slideUp(500);
                              });
                         }
                    })
               });

               $(document).on('click', '.hpsstat_perjanjian', function() {
                    let auth_stat_perjanjian = $(this).attr('id');
                    let namaStatJanji = $(this).attr('value');

                    if (auth_stat_perjanjian == "") {
                         swal("Error", "Status perjanjian tidak ditemukan", "error");
                    } else {
                         swal({
                              title: "Hapus",
                              text: "Yakin status perjanjian " + namaStatJanji + " akan dihapus?",
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
                                        url: "<?= base_url('perjanjian/hapus_stat_perjanjian'); ?>",
                                        data: {
                                             auth_stat_perjanjian: auth_stat_perjanjian
                                        },
                                        timeout: 20000,
                                        success: function(data, textStatus, xhr) {
                                             var data = JSON.parse(data);
                                             if (data.statusCode == 200) {
                                                  tbmStatJanji.draw();
                                                  $(".err_psn_statjanji").removeClass("d-none");
                                                  $(".err_psn_statjanji").removeClass("alert-danger");
                                                  $(".err_psn_statjanji").addClass("alert-primary");
                                                  $(".err_psn_statjanji").html(data.pesan);
                                             } else {
                                                  $(".err_psn_statjanji").removeClass("alert-primary");
                                                  $(".err_psn_statjanji").addClass("alert-danger");
                                                  $(".err_psn_statjanji").css("display", "block");
                                                  $(".err_psn_statjanji").html(data.pesan);
                                             }

                                             $.LoadingOverlay("hide");
                                        },
                                        error: function(xhr, ajaxOptions, thrownError) {
                                             $.LoadingOverlay("hide");
                                             $(".err_psn_statjanji").removeClass("d-none");
                                             $(".err_psn_statjanji").removeClass("alert-primary");
                                             $(".err_psn_statjanji").addClass("alert-danger");
                                             if (xhr.status == 404) {
                                                  $(".err_psn_statjanji").html("StatJanji gagal dihapus, , Link data tidak ditemukan");
                                             } else if (xhr.status == 0) {
                                                  $(".err_psn_statjanji").html("StatJanji gagal dihapus, Waktu koneksi habis");
                                             } else {
                                                  $(".err_psn_statjanji").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                             }
                                        }
                                   });

                                   $(".err_psn_statjanji").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_statjanji").slideUp(500);
                                   });
                              } else if (result.dismiss == 'cancel') {
                                   swal('Batal', 'Status Perjanjian ' + namaStatJanji + ' batal dihapus', 'error');
                                   return false;
                              }
                         });
                    }
               });

               $(document).on('click', '.dtlstat_perjanjian', function() {
                    let auth_stat_perjanjian = $(this).attr('id');
                    let namaStatJanji = $(this).attr('value');

                    if (auth_stat_perjanjian == "") {
                         swal("Error", "Status Perjanjian tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('perjanjian/detail_stat_perjanjian'); ?>",
                              data: {
                                   auth_stat_perjanjian: auth_stat_perjanjian
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var data = JSON.parse(data);
                                   if (data.statusCode == 200) {
                                        $("#detailStatJanjiPerusahaan").val(data.nama_perusahaan);
                                        $("#detailStatJanjiDepart").val(data.depart);
                                        $("#detailStatJanjiKode").val(data.kode);
                                        $("#detailStatJanji").val(data.stat_perjanjian);
                                        $("#detailStatJanjiStatus").val(data.status);
                                        $("#detailStatJanjiKet").val(data.ket);
                                        $("#detailStatJanjiBuat").val(data.pembuat);
                                        $("#detailStatJanjiTglBuat").val(data.tgl_buat);
                                        $("#detailStatJanjimdl").modal("show");
                                   } else {
                                        $(".err_psn_statjanji").css("display", "block");
                                        $(".err_psn_statjanji").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_statjanji").removeClass("alert-primary");
                                   $(".err_psn_statjanji").addClass("alert-danger");
                                   $(".err_psn_statjanji").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_statjanji").html("Status Perjanjian gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_statjanji").html("Status Perjanjian gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_statjanji").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }
                                   $(".err_psn_statjanji ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_statjanji ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $(document).on('click', '.edttstat_perjanjian', function() {
                    let auth_stat_perjanjian = $(this).attr('id');
                    let namaStatJanji = $(this).attr('value');

                    if (auth_stat_perjanjian == "") {
                         swal("Error", "Status Perjanjian tidak ditemukan", "error");
                    } else {
                         $.ajax({
                              type: "post",
                              url: "<?= base_url('perjanjian/detail_stat_perjanjian'); ?>",
                              data: {
                                   auth_stat_perjanjian: auth_stat_perjanjian
                              },
                              timeout: 15000,
                              success: function(data) {
                                   var dataStatJanji = JSON.parse(data);
                                   if (dataStatJanji.statusCode == 200) {
                                        $("#editStatJanjiKode").val(dataStatJanji.kode);
                                        $("#editStatJanji").val(dataStatJanji.stat_perjanjian);
                                        $("#editStatJanjiStatus").val(dataStatJanji.status);
                                        $("#editStatJanjiKet").val(dataStatJanji.ket);
                                        $("#editStatJanjimdl").modal("show");
                                        $("#error1et").html('');
                                        $("#error2et").html('');
                                        $("#error3et").html('');
                                        $("#error4et").html('');
                                   } else {
                                        $(".err_psn_statjanji").css("display", "block");
                                        $(".err_psn_statjanji").html(data.pesan);
                                   }
                              },
                              error: function(xhr, ajaxOptions, thrownError) {
                                   $.LoadingOverlay("hide");
                                   $(".err_psn_statjanji").removeClass("alert-primary");
                                   $(".err_psn_statjanji").addClass("alert-danger");
                                   $(".err_psn_statjanji").css("display", "block");
                                   if (xhr.status == 404) {
                                        $(".err_psn_statjanji").html("StatJanji gagal ditampilkan, Link data tidak ditemukan");
                                   } else if (xhr.status == 0) {
                                        $(".err_psn_statjanji").html("StatJanji gagal ditampilkan, Waktu koneksi habis");
                                   } else {
                                        $(".err_psn_statjanji").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                                   }

                                   $(".err_psn_statjanji ").fadeTo(3000, 500).slideUp(500, function() {
                                        $(".err_psn_statjanji ").slideUp(500);
                                   });
                              }
                         });
                    }
               });

               $("#btnrefreshStatJanji").click(function() {
                    $('#tbmStatJanji').LoadingOverlay("show");
                    tbmStatJanji.draw()
                    $('#tbmStatJanji').LoadingOverlay("hide");
               });

               tbmStatJanji = $('#tbmStatJanji').DataTable({
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                         [1, 'asc'],
                    ],
                    "ajax": {
                         "url": "<?= base_url('perjanjian/ajax_list'); ?>",
                         "type": "POST",
                         "error": function(xhr, error, code) {
                              if (code != "") {
                                   $(".err_psn_statjanji").removeClass("d-none");
                                   $(".err_psn_statjanji").css("display", "block");
                                   $(".err_psn_statjanji").html("terjadi kesalahan saat melakukan load data perjanjian, hubungi administrator");
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
                              name: 'id_stat_perjanjian',
                              render: function(data, type, row, meta) {
                                   return meta.row + meta.settings._iDisplayStart + 1;
                              },
                              "className": "text-center",
                              "width": "1%"
                         },
                         {
                              "data": 'kd_stat_perjanjian',
                              "width": "5%"
                         },
                         {
                              "data": 'stat_perjanjian',
                              "className": "text-nowrap",
                              "width": "30%"
                         },
                         {
                              "data": 'stat_stat_perjanjian',
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
                              "width": "1%"
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
<script>
     //========================================== Bank ========================================================
     $(document).ready(function() {
          $('#btnupdateBank').click(function() {
               let kode = $('#editBankKode').val();
               let bank = $('#editBank').val();
               let status = $('#editBankStatus').val();
               let ket = $('#editBankKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('bank/edit_bank'); ?>",
                    data: {
                         kode: kode,
                         bank: bank,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmBank.draw();
                              $("#editBankmdl").modal("hide");
                              $(".err_psn_bank").removeClass('d-none');
                              $(".err_psn_bank").removeClass('alert-danger');
                              $(".err_psn_bank").addClass('alert-info');
                              $(".err_psn_bank").html(data.pesan);
                              $("#editBankKode").val('');
                              $("#editBank").val('');
                              $("#editBankKet").val('');
                              $("#editBankStatus").val('');
                              $("#error1ebk").html('');
                              $("#error2ebk").html('');
                              $("#error3ebk").html('');
                              $("#error4ebk").html('');
                              $(".err_psn_bank").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_bank").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_bank").removeClass('d-none');
                              $(".err_psn_edit_bank").removeClass('alert-info');
                              $(".err_psn_edit_bank").addClass('alert-danger');
                              $(".err_psn_edit_bank").html(data.pesan);
                              $(".err_psn_edit_bank").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_bank").slideUp(500);
                              });
                              $("#error1ebk").html('');
                              $("#error2ebk").html('');
                              $("#error3ebk").html('');
                              $("#error4ebk").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1ebk").html(data.kode);
                              $("#error2ebk").html(data.bank);
                              $("#error3ebk").html(data.status);
                              $("#error4ebk").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_bank").removeClass("alert-primary");
                         $(".err_psn_bank").addClass("alert-danger");
                         $(".err_psn_bank").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_bank").html("Bank gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_bank").html("Bank gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_bank").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }

                         $("#editBankmdl").modal("hide");
                         $(".err_psn_bank ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_bank ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          $("#btnBatalBank").click(function() {
               $("#kodeBank").val('');
               $("#Bank").val('');
               $("#ketBank").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
          });

          $("#btnTambahBank").click(function() {
               var kode = $("#kodeBank").val();
               var bank = $("#Bank").val();
               var ket = $("#ketBank").val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("bank/input_bank") ?>",
                    data: {
                         kode: kode,
                         bank: bank,
                         ket: ket
                    },
                    timeout: 20000,
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $(".err_psn_bank").removeClass('d-none');
                              $(".err_psn_bank").removeClass('alert-danger');
                              $(".err_psn_bank").addClass('alert-info');
                              $(".err_psn_bank").html(data.pesan);
                              $("#kodeBank").val('');
                              $("#Bank").val('');
                              $("#ketBank").val('');
                              $(".error1").html('');
                              $(".error2").html('');
                              $(".error3").html('');
                         } else if (data.statusCode == 201) {
                              $(".err_psn_bank").removeClass('d-none');
                              $(".err_psn_bank").removeClass('alert-info');
                              $(".err_psn_bank").addClass('alert-danger');
                              $(".err_psn_bank").html(data.pesan);
                         } else if (data.statusCode == 202) {
                              $(".error1").html(data.kode);
                              $(".error2").html(data.bank);
                              $(".error3").html(data.ket);
                         }

                         $(".err_psn_bank").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_bank").slideUp(500);
                         });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_bank").removeClass('d-none');
                         $(".err_psn_bank").removeClass("alert-primary");
                         $(".err_psn_bank").addClass("alert-danger");
                         if (xhr.status == 404) {
                              $(".err_psn_bank").html("Bank gagal disimpan, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_bank").html("Bank gagal disimpan, Waktu koneksi habis");
                         } else {
                              $(".err_psn_bank").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                         }

                         $(".err_psn_bank ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_bank ").slideUp(500);
                         });
                    }
               })
          });

          $(document).on('click', '.hpsbank', function() {
               let auth_bank = $(this).attr('id');
               let namaBank = $(this).attr('value');

               if (auth_bank == "") {
                    $(".err_psn_bank").removeClass("alert-primary");
                    $(".err_psn_bank").addClass("alert-danger");
                    $(".err_psn_bank").removeClass('d-none');
                    $(".err_psn_bank").html("Bank tidak ditemukan");
               } else {
                    swal({
                         title: "Hapus",
                         text: "Yakin " + namaBank + " akan dihapus?",
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
                                   url: "<?= base_url('Bank/hapus_bank'); ?>",
                                   data: {
                                        auth_bank: auth_bank
                                   },
                                   timeout: 20000,
                                   success: function(data, textStatus, xhr) {
                                        var data = JSON.parse(data);
                                        if (data.statusCode == 200) {
                                             tbmBank.draw();
                                             $(".err_psn_bank").removeClass("alert-danger");
                                             $(".err_psn_bank").addClass("alert-primary");
                                             $(".err_psn_bank").removeClass('d-none');
                                             $(".err_psn_bank").html(data.pesan);
                                        } else {
                                             $(".err_psn_bank").removeClass("alert-primary");
                                             $(".err_psn_bank").addClass("alert-danger");
                                             $(".err_psn_bank").removeClass('d-none');
                                             $(".err_psn_bank").html(data.pesan);
                                        }

                                        $.LoadingOverlay("hide");
                                   },
                                   error: function(xhr, ajaxOptions, thrownError) {
                                        $.LoadingOverlay("hide");
                                        $(".err_psn_bank").removeClass("alert-primary");
                                        $(".err_psn_bank").addClass("alert-danger");
                                        $(".err_psn_bank").removeClass('d-none');
                                        if (xhr.status == 404) {
                                             $(".err_psn_bank").html("Bank gagal dihapus, , Link data tidak ditemukan");
                                        } else if (xhr.status == 0) {
                                             $(".err_psn_bank").html("Bank gagal dihapus, Waktu koneksi habis");
                                        } else {
                                             $(".err_psn_bank").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                        }
                                   }
                              });

                              $(".err_psn_bank").fadeTo(4000, 500).slideUp(500, function() {
                                   $(".err_psn_bank").slideUp(500);
                              });
                         } else if (result.dismiss == 'cancel') {
                              swal('Batal', 'Bank ' + namaBank + ' batal dihapus', 'error');
                              return false;
                         }
                    });
               }
          });

          $(document).on('click', '.dtlbank', function() {
               let auth_bank = $(this).attr('id');
               let namaBank = $(this).attr('value');

               if (auth_bank == "") {
                    $(".err_psn_bank").removeClass("alert-primary");
                    $(".err_psn_bank").addClass("alert-danger");
                    $(".err_psn_bank").removeClass('d-none');
                    $(".err_psn_bank").html("Bank tidak ditemukan");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('bank/detail_bank'); ?>",
                         data: {
                              auth_bank: auth_bank
                         },
                         timeout: 15000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $("#detailBankKode").val(data.kode);
                                   $("#detailBank").val(data.bank);
                                   $("#detailBankStatus").val(data.status);
                                   $("#detailBankKet").val(data.ket);
                                   $("#detailBankBuat").val(data.pembuat);
                                   $("#detailBankTglBuat").val(data.tgl_buat);
                                   $("#detailBankmdl").modal("show");
                              } else {
                                   $(".err_psn_bank").removeClass('d-none');
                                   $(".err_psn_bank").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_bank").removeClass("alert-primary");
                              $(".err_psn_bank").addClass("alert-danger");
                              $(".err_psn_bank").removeClass('d-none');
                              if (xhr.status == 404) {
                                   $(".err_psn_bank").html("Bank gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_bank").html("Bank gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_bank").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }
                              $(".err_psn_bank ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_bank ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $(document).on('click', '.edttbank', function() {
               let auth_bank = $(this).attr('id');
               let namaBank = $(this).attr('value');

               if (auth_bank == "") {
                    swal("Error", "Bank tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('Bank/detail_bank'); ?>",
                         data: {
                              auth_bank: auth_bank
                         },
                         timeout: 15000,
                         success: function(data) {
                              var dataBank = JSON.parse(data);
                              if (dataBank.statusCode == 200) {
                                   $("#editBankKode").val(dataBank.kode);
                                   $("#editBank").val(dataBank.bank);
                                   $("#editBankStatus").val(dataBank.status);
                                   $("#editBankKet").val(dataBank.ket);
                                   $("#editBankmdl").modal("show");
                                   $("#error1et").html('');
                                   $("#error2et").html('');
                                   $("#error3et").html('');
                                   $("#error4et").html('');
                              } else {
                                   $(".err_psn_bank").removeClass('d-none');
                                   $(".err_psn_bank").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_bank").removeClass("alert-primary");
                              $(".err_psn_bank").addClass("alert-danger");
                              $(".err_psn_bank").removeClass('d-none');
                              if (xhr.status == 404) {
                                   $(".err_psn_bank").html("Bank gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_bank").html("Bank gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_bank").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }

                              $(".err_psn_bank ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_bank ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $("#btnrefreshBank").click(function() {
               $('#tbmBank').LoadingOverlay("show");
               tbmBank.draw()
               $('#tbmBank').LoadingOverlay("hide");
          });

          tbmBank = $('#tbmBank').DataTable({
               "processing": true,
               "responsive": true,
               "serverSide": true,
               "ordering": true,
               "order": [
                    [1, 'asc'],
               ],
               "ajax": {
                    "url": "<?= base_url('bank/ajax_list'); ?>",
                    "type": "POST",
                    "error": function(xhr, error, code) {
                         if (code != "") {
                              $(".err_psn_bank").removeClass("d-none");
                              $(".err_psn_bank").removeClass('d-none');
                              $(".err_psn_bank").html("terjadi kesalahan saat melakukan load data Bank, hubungi administrator");
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
                         name: 'id_bank',
                         render: function(data, type, row, meta) {
                              return meta.row + meta.settings._iDisplayStart + 1;
                         },
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'kd_bank',
                         "className": "text-nowrap align-middle",
                         "width": "10%"
                    },
                    {
                         "data": 'bank',
                         "className": "text-nowrap align-middle",
                         "width": "50%"
                    },
                    {
                         "data": 'stat_bank',
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'tgl_buat',
                         "className": "text-center text-nowrap align-middle",
                         "width": "8%"
                    },
                    {
                         "data": 'proses',
                         "className": "text-center text-nowrap align-middle",
                         "width": "1%"
                    }
               ]
          });
     });
</script>
<script>
     //========================================== Sanksi ========================================================
     $(document).ready(function() {
          function resetedit() {
               $("#editSanksiKode").val('');
               $("#editSanksi").val('');
               $('#editMasaBerlaku').val();
               $("#editSanksiKet").val('');
               $("#editSanksiStatus").val('');
               $("#error1esk").html('');
               $("#error2esk").html('');
               $("#error3esk").html('');
               $("#error4esk").html('');
          }

          $('#btnupdateSanksi').click(function() {
               let kode = $('#editSanksiKode').val();
               let sanksi = $('#editSanksi').val();
               let jml_hari = $('#editMasaBerlaku').val();
               let status = $('#editSanksiStatus').val();
               let ket = $('#editSanksiKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('sanksi/edit_sanksi'); ?>",
                    data: {
                         kode: kode,
                         sanksi: sanksi,
                         jml_hari: jml_hari,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmSanksi.draw();
                              $("#editSanksimdl").modal("hide");
                              $(".err_psn_sanksi").removeClass('d-none');
                              $(".err_psn_sanksi").removeClass('alert-danger');
                              $(".err_psn_sanksi").addClass('alert-info');
                              $(".err_psn_sanksi").html(data.pesan);
                              resetedit();
                              $(".err_psn_sanksi").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_sanksi").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_sanksi").removeClass('d-none');
                              $(".err_psn_edit_sanksi").removeClass('alert-info');
                              $(".err_psn_edit_sanksi").addClass('alert-danger');
                              $(".err_psn_edit_sanksi").html(data.pesan);
                              $(".err_psn_edit_sanksi").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_sanksi").slideUp(500);
                              });
                              $("#error1esk").html('');
                              $("#error2esk").html('');
                              $("#error3esk").html('');
                              $("#error4esk").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1esk").html(data.kode);
                              $("#error2esk").html(data.sanksi);
                              $("#error3esk").html(data.status);
                              $("#error4esk").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_sanksi").removeClass("alert-primary");
                         $(".err_psn_sanksi").addClass("alert-danger");
                         $(".err_psn_sanksi").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_sanksi").html("Sanksi gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_sanksi").html("Sanksi gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_sanksi").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }

                         $("#editSanksimdl").modal("hide");
                         $(".err_psn_sanksi ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_sanksi ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          function resettambah() {
               $("#kodeSanksi").val('');
               $("#Sanksi").val('');
               $("#masaBerlakuSanksi").val('');
               $("#ketSanksi").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
          }

          $("#btnBatalSanksi").click(function() {
               resettambah();
          });

          $("#btnTambahSanksi").click(function() {
               var kode = $("#kodeSanksi").val();
               var sanksi = $("#Sanksi").val();
               var jml_hari = $("#masaBerlakuSanksi").val();
               var ket = $("#ketSanksi").val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("sanksi/input_sanksi") ?>",
                    data: {
                         kode: kode,
                         sanksi: sanksi,
                         jml_hari: jml_hari,
                         ket: ket
                    },
                    timeout: 20000,
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $(".err_psn_sanksi").removeClass('d-none');
                              $(".err_psn_sanksi").removeClass('alert-danger');
                              $(".err_psn_sanksi").addClass('alert-info');
                              $(".err_psn_sanksi").html(data.pesan);
                              resettambah();
                         } else if (data.statusCode == 201) {
                              $(".err_psn_sanksi").removeClass('d-none');
                              $(".err_psn_sanksi").removeClass('alert-info');
                              $(".err_psn_sanksi").addClass('alert-danger');
                              $(".err_psn_sanksi").html(data.pesan);
                         } else if (data.statusCode == 202) {
                              $(".error1").html(data.kode);
                              $(".error2").html(data.sanksi);
                              $(".error3").html(data.jml_hari);
                              $(".error4").html(data.ket);
                         }

                         $(".err_psn_sanksi").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_sanksi").slideUp(500);
                         });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_sanksi").removeClass('d-none');
                         $(".err_psn_sanksi").removeClass("alert-primary");
                         $(".err_psn_sanksi").addClass("alert-danger");
                         if (xhr.status == 404) {
                              $(".err_psn_sanksi").html("Sanksi gagal disimpan, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_sanksi").html("Sanksi gagal disimpan, Waktu koneksi habis");
                         } else {
                              $(".err_psn_sanksi").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                         }

                         $(".err_psn_sanksi ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_sanksi ").slideUp(500);
                         });
                    }
               })
          });

          $(document).on('click', '.hpssanksi', function() {
               let auth_sanksi = $(this).attr('id');
               let namaSanksi = $(this).attr('value');

               if (auth_sanksi == "") {
                    $(".err_psn_sanksi").removeClass("alert-primary");
                    $(".err_psn_sanksi").addClass("alert-danger");
                    $(".err_psn_sanksi").removeClass('d-none');
                    $(".err_psn_sanksi").html("Sanksi tidak ditemukan");
               } else {
                    swal({
                         title: "Hapus",
                         text: "Yakin " + namaSanksi + " akan dihapus?",
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
                                   url: "<?= base_url('sanksi/hapus_sanksi'); ?>",
                                   data: {
                                        auth_sanksi: auth_sanksi
                                   },
                                   timeout: 20000,
                                   success: function(data, textStatus, xhr) {
                                        var data = JSON.parse(data);
                                        if (data.statusCode == 200) {
                                             tbmSanksi.draw();
                                             $(".err_psn_sanksi").removeClass("alert-danger");
                                             $(".err_psn_sanksi").addClass("alert-primary");
                                             $(".err_psn_sanksi").removeClass('d-none');
                                             $(".err_psn_sanksi").html(data.pesan);
                                        } else {
                                             $(".err_psn_sanksi").removeClass("alert-primary");
                                             $(".err_psn_sanksi").addClass("alert-danger");
                                             $(".err_psn_sanksi").removeClass('d-none');
                                             $(".err_psn_sanksi").html(data.pesan);
                                        }

                                        $.LoadingOverlay("hide");
                                   },
                                   error: function(xhr, ajaxOptions, thrownError) {
                                        $.LoadingOverlay("hide");
                                        $(".err_psn_sanksi").removeClass("alert-primary");
                                        $(".err_psn_sanksi").addClass("alert-danger");
                                        $(".err_psn_sanksi").removeClass('d-none');
                                        if (xhr.status == 404) {
                                             $(".err_psn_sanksi").html("Sanksi gagal dihapus, , Link data tidak ditemukan");
                                        } else if (xhr.status == 0) {
                                             $(".err_psn_sanksi").html("Sanksi gagal dihapus, Waktu koneksi habis");
                                        } else {
                                             $(".err_psn_sanksi").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                        }
                                   }
                              });

                              $(".err_psn_sanksi").fadeTo(4000, 500).slideUp(500, function() {
                                   $(".err_psn_sanksi").slideUp(500);
                              });
                         } else if (result.dismiss == 'cancel') {
                              swal('Batal', 'Sanksi ' + namaSanksi + ' batal dihapus', 'error');
                              return false;
                         }
                    });
               }
          });

          $(document).on('click', '.dtlsanksi', function() {
               let auth_sanksi = $(this).attr('id');
               let namaSanksi = $(this).attr('value');

               if (auth_sanksi == "") {
                    $(".err_psn_sanksi").removeClass("alert-primary");
                    $(".err_psn_sanksi").addClass("alert-danger");
                    $(".err_psn_sanksi").removeClass('d-none');
                    $(".err_psn_sanksi").html("Sanksi tidak ditemukan");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('sanksi/detail_sanksi'); ?>",
                         data: {
                              auth_sanksi: auth_sanksi
                         },
                         timeout: 15000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $("#detailSanksiKode").val(data.kode);
                                   $("#detailSanksi").val(data.sanksi);
                                   $("#detailMasaBerlaku").val(data.jml_hari_berlaku + " Hari");
                                   $("#detailSanksiStatus").val(data.status);
                                   $("#detailSanksiKet").val(data.ket);
                                   $("#detailSanksiBuat").val(data.pembuat);
                                   $("#detailSanksiTglBuat").val(data.tgl_buat);
                                   $("#detailSanksimdl").modal("show");
                              } else {
                                   $(".err_psn_sanksi").removeClass('d-none');
                                   $(".err_psn_sanksi").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_sanksi").removeClass("alert-primary");
                              $(".err_psn_sanksi").addClass("alert-danger");
                              $(".err_psn_sanksi").removeClass('d-none');
                              if (xhr.status == 404) {
                                   $(".err_psn_sanksi").html("Sanksi gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_sanksi").html("Sanksi gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_sanksi").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }
                              $(".err_psn_sanksi ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_sanksi ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $(document).on('click', '.edttsanksi', function() {
               let auth_sanksi = $(this).attr('id');
               let namaSanksi = $(this).attr('value');

               if (auth_sanksi == "") {
                    swal("Error", "Sanksi tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('sanksi/detail_sanksi'); ?>",
                         data: {
                              auth_sanksi: auth_sanksi
                         },
                         timeout: 15000,
                         success: function(data) {
                              var dataSanksi = JSON.parse(data);
                              if (dataSanksi.statusCode == 200) {
                                   resetedit();
                                   $("#editSanksiKode").val(dataSanksi.kode);
                                   $("#editSanksi").val(dataSanksi.sanksi);
                                   $("#editMasaBerlaku").val(dataSanksi.jml_hari_berlaku);
                                   $("#editSanksiStatus").val(dataSanksi.status);
                                   $("#editSanksiKet").val(dataSanksi.ket);
                                   $("#editSanksimdl").modal("show");
                                   $("#error1esk").html('');
                                   $("#error2esk").html('');
                                   $("#error3esk").html('');
                                   $("#error4esk").html('');
                                   $("#error5esk").html('');
                              } else {
                                   $(".err_psn_sanksi").removeClass('d-none');
                                   $(".err_psn_sanksi").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_sanksi").removeClass("alert-primary");
                              $(".err_psn_sanksi").addClass("alert-danger");
                              $(".err_psn_sanksi").removeClass('d-none');
                              if (xhr.status == 404) {
                                   $(".err_psn_sanksi").html("Sanksi gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_sanksi").html("Sanksi gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_sanksi").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }

                              $(".err_psn_sanksi ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_sanksi ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $("#btnrefreshSanksi").click(function() {
               $('#tbmSanksi').LoadingOverlay("show");
               tbmSanksi.draw()
               $('#tbmSanksi').LoadingOverlay("hide");
          });

          tbmSanksi = $('#tbmSanksi').DataTable({
               "processing": true,
               "responsive": true,
               "serverSide": true,
               "ordering": true,
               "order": [
                    [0, 'asc'],
               ],
               "ajax": {
                    "url": "<?= base_url('sanksi/ajax_list'); ?>",
                    "type": "POST",
                    "error": function(xhr, error, code) {
                         if (code != "") {
                              $(".err_psn_sanksi").removeClass("d-none");
                              $(".err_psn_sanksi").removeClass('d-none');
                              $(".err_psn_sanksi").html("terjadi kesalahan saat melakukan load data Sanksi, hubungi administrator");
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
                         name: 'id_sanksi',
                         render: function(data, type, row, meta) {
                              return meta.row + meta.settings._iDisplayStart + 1;
                         },
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'kd_sanksi',
                         "className": "text-nowrap align-middle",
                         "width": "10%"
                    },
                    {
                         "data": 'sanksi',
                         "className": "text-nowrap align-middle",
                         "width": "60%"
                    },
                    {
                         "data": 'jml_hari_berlaku',
                         "className": "text-nowrap align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'stat_sanksi',
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'tgl_buat',
                         "className": "text-center text-nowrap align-middle",
                         "width": "8%"
                    },
                    {
                         "data": 'proses',
                         "className": "text-center text-nowrap align-middle",
                         "width": "1%"
                    }
               ]
          });
     });
</script>
<script>
     //========================================== Roster ========================================================
     $(document).ready(function() {
          $('#perRoster').select2({
               theme: 'bootstrap4'
          });

          $.ajax({
               type: "POST",
               url: "<?= base_url("perusahaan/get_all") ?>",
               success: function(data) {
                    var data = JSON.parse(data);
                    $("#perRoster").html(data.prs);
               },
               error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".err_psn_roster").removeClass('d-none');
                    $(".err_psn_roster").removeClass('alert-info');
                    $(".err_psn_roster").addClass('alert-danger');
                    if (thrownError != "") {
                         $(".err_psn_roster").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                         $("#btnTambahRoster").attr("disabled", true);
                    }
               }
          })

          function reseteditroster() {
               $("#editRosterKode").val('');
               $("#editRoster").val('');
               $("#editMasaOnsite").val('');
               $("#editMasaOffsite").val('');
               $("#editRosterStatus").val('');
               $("#editRosterKet").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
               $(".error6").html('');
          }

          $('#btnupdateRoster').click(function() {
               let kode = $('#editRosterKode').val();
               let roster = $('#editRoster').val();
               let masa_onsite = $('#editMasaOnsite').val();
               let masa_offsite = $('#editMasaOffsite').val();
               let status = $('#editRosterStatus').val();
               let ket = $('#editRosterKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('roster/edit_roster'); ?>",
                    data: {
                         kode: kode,
                         roster: roster,
                         masa_onsite: masa_onsite,
                         masa_offsite: masa_offsite,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmRoster.draw();
                              $("#editRostermdl").modal("hide");
                              $(".err_psn_roster").removeClass('d-none');
                              $(".err_psn_roster").removeClass('alert-danger');
                              $(".err_psn_roster").addClass('alert-info');
                              $(".err_psn_roster").html(data.pesan);
                              reseteditroster();
                              $(".err_psn_roster").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_roster").slideUp(500);
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_roster").removeClass('d-none');
                              $(".err_psn_edit_roster").removeClass('alert-info');
                              $(".err_psn_edit_roster").addClass('alert-danger');
                              $(".err_psn_edit_roster").html(data.pesan);
                              $(".err_psn_edit_roster").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_roster").slideUp(500);
                              });
                              $("#error1ers").html('');
                              $("#error2ers").html('');
                              $("#error3ers").html('');
                              $("#error4ers").html('');
                              $("#error5ers").html('');
                              $("#error6ers").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1ers").html(data.kode);
                              $("#error2ers").html(data.roster);
                              $("#error3ers").html(data.masa_onsite);
                              $("#error4ers").html(data.masa_offsite);
                              $("#error5ers").html(data.status);
                              $("#error6ers").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         alert(xhr.status);
                         $(".err_psn_roster").removeClass("alert-primary");
                         $(".err_psn_roster").addClass("alert-danger");
                         $(".err_psn_roster").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_roster").html("Roster gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_roster").html("Roster gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_roster").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editRostermdl").modal("hide");
                         $(".err_psn_roster ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_roster ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          function resetaddroster() {
               $("#perRoster").val('').trigger('change');
               $("#kodeRoster").val('');
               $("#Roster").val('');
               $("#masaOnsiteRoster").val('');
               $("#masaOffsiteRoster").val('');
               $("#ketRoster").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
               $(".error5").html('');
               $(".error6").html('');
          }
          $("#btnBatalRoster").click(function() {
               resetaddroster();
          });
          $("#btnTambahRoster").click(function() {
               let prs = $("#perRoster").val();
               let kode = $("#kodeRoster").val();
               let roster = $("#Roster").val();
               let masa_onsite = $("#masaOnsiteRoster").val();
               let masa_offsite = $("#masaOffsiteRoster").val();
               let ket = $("#ketRoster").val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("roster/input_roster"); ?>",
                    data: {
                         prs: prs,
                         kode: kode,
                         roster: roster,
                         masa_onsite: masa_onsite,
                         masa_offsite: masa_offsite,
                         ket: ket
                    },
                    timeout: 20000,
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $(".err_psn_roster").removeClass('d-none');
                              $(".err_psn_roster").removeClass('alert-danger');
                              $(".err_psn_roster").addClass('alert-info');
                              $(".err_psn_roster").html(data.pesan);
                              resetaddroster();
                         } else if (data.statusCode == 201) {
                              $(".err_psn_roster").removeClass('d-none');
                              $(".err_psn_roster").removeClass('alert-info');
                              $(".err_psn_roster").addClass('alert-danger');
                              $(".err_psn_roster").html(data.pesan);
                         } else if (data.statusCode == 202) {
                              $(".error1").html(data.prs);
                              $(".error2").html(data.kode);
                              $(".error3").html(data.roster);
                              $(".error4").html(data.masa_onsite);
                              $(".error5").html(data.masa_offsite);
                              $(".error6").html(data.ket);
                         }

                         $(".err_psn_roster").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_roster").slideUp(500);
                         });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_roster").removeClass("alert-primary");
                         $(".err_psn_roster").addClass("alert-danger");
                         $(".err_psn_roster").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_roster").html("Roster gagal disimpan, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_roster").html("Roster gagal disimpan, Waktu koneksi habis");
                         } else {
                              $(".err_psn_roster").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                         }

                         $(".err_psn_roster ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_roster ").slideUp(500);
                         });
                    }
               })
          });

          $(document).on('click', '.hpsroster', function() {
               let auth_roster = $(this).attr('id');
               let namaRoster = $(this).attr('value');

               if (auth_roster == "") {
                    swal("Error", "Roster tidak ditemukan", "error");
               } else {
                    swal({
                         title: "Hapus",
                         text: "Yakin Roster " + namaRoster + " akan dihapus?",
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
                                   url: "<?= base_url('roster/hapus_roster'); ?>",
                                   data: {
                                        auth_roster: auth_roster
                                   },
                                   timeout: 20000,
                                   success: function(data, textStatus, xhr) {
                                        var data = JSON.parse(data);
                                        if (data.statusCode == 200) {
                                             tbmRoster.draw();
                                             $(".err_psn_roster").removeClass("alert-danger");
                                             $(".err_psn_roster").addClass("alert-primary");
                                             $(".err_psn_roster").removeClass("d-none");
                                             $(".err_psn_roster").html(data.pesan);
                                        } else {
                                             $(".err_psn_roster").removeClass("alert-primary");
                                             $(".err_psn_roster").addClass("alert-danger");
                                             $(".err_psn_roster").removeClass("d-none");
                                             $(".err_psn_roster").html(data.pesan);
                                        }

                                        $.LoadingOverlay("hide");
                                   },
                                   error: function(xhr, ajaxOptions, thrownError) {
                                        $.LoadingOverlay("hide");
                                        $(".err_psn_roster").removeClass("alert-primary");
                                        $(".err_psn_roster").addClass("alert-danger");
                                        $(".err_psn_roster").removeClass("d-none");
                                        if (xhr.status == 404) {
                                             $(".err_psn_roster").html("Roster gagal dihapus, , Link data tidak ditemukan");
                                        } else if (xhr.status == 0) {
                                             $(".err_psn_roster").html("Roster gagal dihapus, Waktu koneksi habis");
                                        } else {
                                             $(".err_psn_roster").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                        }
                                   }
                              });

                              $(".err_psn_roster").fadeTo(4000, 500).slideUp(500, function() {
                                   $(".err_psn_roster").slideUp(500);
                              });
                         } else if (result.dismiss == 'cancel') {
                              swal('Batal', 'Roster ' + namaRoster + ' batal dihapus', 'error');
                              return false;
                         }
                    });
               }
          });

          $(document).on('click', '.dtlroster', function() {
               let auth_roster = $(this).attr('id');
               let namaRoster = $(this).attr('value');

               if (auth_roster == "") {
                    swal("Error", "Roster tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('roster/detail_roster'); ?>",
                         data: {
                              auth_roster: auth_roster
                         },
                         timeout: 15000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $("#detailRosterPerusahaan").val(data.nama_perusahaan);
                                   $("#detailRosterLevel").val(data.level);
                                   $("#detailRosterKode").val(data.kode);
                                   $("#detailRoster").val(data.roster);
                                   $("#detailMasaOnsite").val(data.masa_onsite + " Hari");
                                   $("#detailMasaOffsite").val(data.masa_offsite + " Hari");
                                   $("#detailRosterStatus").val(data.status);
                                   $("#detailRosterKet").val(data.ket);
                                   $("#detailRosterBuat").val(data.pembuat);
                                   $("#detailRosterTglBuat").val(data.tgl_buat);
                                   $("#detailRostermdl").modal("show");
                              } else {
                                   $(".err_psn_roster").removeClass("d-none");
                                   $(".err_psn_roster").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_roster").removeClass("alert-primary");
                              $(".err_psn_roster").addClass("alert-danger");
                              $(".err_psn_roster").removeClass("d-none");
                              if (xhr.status == 404) {
                                   $(".err_psn_roster").html("Roster gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_roster").html("Roster gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_roster").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }
                              $(".err_psn_roster ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_roster ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $(document).on('click', '.edttroster', function() {
               let auth_roster = $(this).attr('id');
               let namaRoster = $(this).attr('value');

               if (auth_roster == "") {
                    swal("Error", "Roster tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('roster/detail_roster'); ?>",
                         data: {
                              auth_roster: auth_roster
                         },
                         timeout: 15000,
                         success: function(data) {
                              var dataRoster = JSON.parse(data);
                              if (dataRoster.statusCode == 200) {
                                   $("#editRosterKode").val(dataRoster.kode);
                                   $("#editRoster").val(dataRoster.roster);
                                   $("#editMasaOnsite").val(dataRoster.masa_onsite);
                                   $("#editMasaOffsite").val(dataRoster.masa_offsite);
                                   $("#editRosterStatus").val(dataRoster.status);
                                   $("#editRosterKet").val(dataRoster.ket);
                                   $("#editRostermdl").modal("show");
                                   $("#error1ers").html('');
                                   $("#error2ers").html('');
                                   $("#error3ers").html('');
                                   $("#error4ers").html('');
                                   $("#error5ers").html('');
                                   $("#error6ers").html('');
                              } else {
                                   $(".err_psn_roster").removeClass("d-none");
                                   $(".err_psn_roster").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_roster").removeClass("alert-primary");
                              $(".err_psn_roster").addClass("alert-danger");
                              $(".err_psn_roster").removeClass("d-none");
                              if (xhr.status == 404) {
                                   $(".err_psn_roster").html("Roster gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_roster").html("Roster gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_roster").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }

                              $(".err_psn_roster ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_roster ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $("#btnrefreshRoster").click(function() {
               $('#tbmRoster').LoadingOverlay("show");
               tbmRoster.draw()
               $('#tbmRoster').LoadingOverlay("hide");
          });

          tbmRoster = $('#tbmRoster').DataTable({
               "processing": true,
               "responsive": true,
               "serverSide": true,
               "ordering": true,
               "order": [
                    [6, 'desc']
               ],
               "ajax": {
                    "url": "<?= base_url('roster/ajax_list'); ?>",
                    "type": "POST",
                    "error": function(xhr, error, code) {
                         if (code != "") {
                              $(".err_psn_roster").removeClass("d-none");
                              $(".err_psn_roster").removeClass("d-none");
                              $(".err_psn_roster").html("Terjadi kesalahan saat melakukan load data Roster, hubungi administrator");
                              $("#addbtn").addClass("disabled");
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
                         name: 'id_roster',
                         render: function(data, type, row, meta) {
                              return meta.row + meta.settings._iDisplayStart + 1;
                         },
                         "className": "text-center",
                         "width": "1%"
                    },
                    {
                         "data": 'kd_roster',
                         "className": "text-nowrap align-middle",
                         "width": "10%"
                    },
                    {
                         "data": 'roster',
                         "className": "text-nowrap align-middle",
                         "width": "50%"
                    },
                    {
                         "data": 'jml_hari_onsite',
                         "className": "align-middle",
                         "width": "5%"
                    },
                    {
                         "data": 'jml_hari_offsite',
                         "className": "align-middle",
                         "width": "5%"
                    },
                    {
                         "data": 'stat_roster',
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'kode_perusahaan',
                         "className": "text-center text-nowrap align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'tgl_buat',
                         "className": "text-center text-nowrap align-middle",
                         "width": "8%"
                    },
                    {
                         "data": 'proses',
                         "className": "text-center text-nowrap align-middle",
                         "width": "1%"
                    }
               ]
          });

     });
</script>
<script>
     //========================================== Lokker ========================================================
     $(document).ready(function() {
          $('#perLokker').select2({
               theme: 'bootstrap4'
          });

          $.ajax({
               type: "POST",
               url: "<?= base_url("perusahaan/get_all") ?>",
               data: {},
               success: function(data) {
                    var data = JSON.parse(data);
                    $("#perLokker").html(data.prs);
               },
               error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".err_psn_lokker").removeClass('d-none');
                    $(".err_psn_lokker").removeClass('alert-info');
                    $(".err_psn_lokker").addClass('alert-danger');
                    if (thrownError != "") {
                         $(".err_psn_lokker").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                         $("#btnTambahLokker").attr("disabled", true);
                    }
               }
          })

          function reseteditlokker() {
               $("#editLokkerKode").val('');
               $("#editLokker").val('');
               $("#editLokkerKet").val('');
               $("#editLokkerStatus").val('');
               $("#error1elkr").html('');
               $("#error2elkr").html('');
               $("#error3elkr").html('');
               $("#error4elkr").html('');
          }

          $('#btnupdateLokker').click(function() {
               let kode = $('#editLokkerKode').val();
               let lokker = $('#editLokker').val();
               let status = $('#editLokkerStatus').val();
               let ket = $('#editLokkerKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('lokasikerja/edit_lokker'); ?>",
                    data: {
                         kode: kode,
                         lokker: lokker,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmLokker.draw();
                              $("#editLokkermdl").modal("hide");
                              $(".err_psn_lokker").removeClass('d-none');
                              $(".err_psn_lokker").removeClass('alert-danger');
                              $(".err_psn_lokker").addClass('alert-info');
                              $(".err_psn_lokker").html(data.pesan);
                              reseteditlokker();
                              $(".err_psn_lokker").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_lokker").slideUp(500);
                                   $(".err_psn_lokker").addClass('d-none');
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_lokker").removeClass('d-none');
                              $(".err_psn_edit_lokker").removeClass('alert-info');
                              $(".err_psn_edit_lokker").addClass('alert-danger');
                              $(".err_psn_edit_lokker").html(data.pesan);
                              $(".err_psn_edit_lokker").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_lokker").slideUp(500);
                                   $(".err_psn_lokker").addClass('d-none');
                              });
                              $("#error1elkr").html('');
                              $("#error2elkr").html('');
                              $("#error3elkr").html('');
                              $("#error4elkr").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1elkr").html(data.kode);
                              $("#error2elkr").html(data.lokker);
                              $("#error3elkr").html(data.status);
                              $("#error4elkr").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_lokker").removeClass("alert-primary");
                         $(".err_psn_lokker").addClass("alert-danger");
                         $(".err_psn_lokker").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_lokker").html("Lokasi kerja gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_lokker").html("Lokasi kerja gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_lokker").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editLokkermdl").modal("hide");
                         $(".err_psn_lokker ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_lokker ").slideUp(500);
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          function resetaddlokker() {
               $("#kodeLokker").val('');
               $("#Lokker").val('');
               $("#ketLokker").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
          }

          $("#btnBatalLokker").click(function() {
               resetaddlokker();
          });

          $("#btnTambahLokker").click(function() {
               var kode = $("#kodeLokker").val();
               var lokker = $("#Lokker").val();
               var ket = $("#ketLokker").val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("lokasikerja/input_lokker") ?>",
                    data: {
                         kode: kode,
                         lokker: lokker,
                         ket: ket
                    },
                    timeout: 20000,
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $(".err_psn_lokker").removeClass('d-none');
                              $(".err_psn_lokker").removeClass('alert-danger');
                              $(".err_psn_lokker").addClass('alert-info');
                              $(".err_psn_lokker").html(data.pesan);
                              resetaddlokker();
                         } else if (data.statusCode == 201) {
                              $(".err_psn_lokker").removeClass('d-none');
                              $(".err_psn_lokker").removeClass('alert-info');
                              $(".err_psn_lokker").addClass('alert-danger');
                              $(".err_psn_lokker").html(data.pesan);
                         } else if (data.statusCode == 202) {
                              $(".error1").html(data.kode);
                              $(".error2").html(data.lokker);
                              $(".error3").html(data.ket);
                         }

                         $(".err_psn_lokker").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_lokker").slideUp(500);
                              $(".err_psn_lokker").addClass('d-none');
                         });


                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_lokker").removeClass("alert-primary");
                         $(".err_psn_lokker").addClass("alert-danger");
                         $(".err_psn_lokker").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_lokker").html("Lokasi kerja gagal disimpan, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_lokker").html("Lokasi kerja kerjakker gagal disimpan, Waktu koneksi habis");
                         } else {
                              $(".err_psn_lokker").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                         }

                         $(".err_psn_lokker ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_lokker ").slideUp(500);
                              $(".err_psn_lokker").addClass('d-none');
                         });
                    }
               })
          });

          $(document).on('click', '.hpslokker', function() {
               let auth_lokker = $(this).attr('id');
               let namaLokker = $(this).attr('value');

               if (auth_lokker == "") {
                    swal("Error", "Lokasi kerja tidak ditemukan", "error");
               } else {
                    swal({
                         title: "Hapus",
                         text: "Yakin Lokasi kerja " + namaLokker + " akan dihapus?",
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
                                   url: "<?= base_url('lokasikerja/hapus_lokker'); ?>",
                                   data: {
                                        auth_lokker: auth_lokker
                                   },
                                   timeout: 20000,
                                   success: function(data, textStatus, xhr) {
                                        var data = JSON.parse(data);
                                        if (data.statusCode == 200) {
                                             tbmLokker.draw();
                                             $(".err_psn_lokker").removeClass("alert-danger");
                                             $(".err_psn_lokker").addClass("alert-primary");
                                             $(".err_psn_lokker").removeClass("d-none");
                                             $(".err_psn_lokker").html(data.pesan);
                                        } else {
                                             $(".err_psn_lokker").removeClass("alert-primary");
                                             $(".err_psn_lokker").addClass("alert-danger");
                                             $(".err_psn_lokker").removeClass("d-none");
                                             $(".err_psn_lokker").html(data.pesan);
                                        }

                                        $.LoadingOverlay("hide");
                                   },
                                   error: function(xhr, ajaxOptions, thrownError) {
                                        $.LoadingOverlay("hide");
                                        $(".err_psn_lokker").removeClass("alert-primary");
                                        $(".err_psn_lokker").addClass("alert-danger");
                                        $(".err_psn_lokker").removeClass("d-none");
                                        if (xhr.status == 404) {
                                             $(".err_psn_lokker").html("Lokasi kerja gagal dihapus, , Link data tidak ditemukan");
                                        } else if (xhr.status == 0) {
                                             $(".err_psn_lokker").html("Lokasi kerja gagal dihapus, Waktu koneksi habis");
                                        } else {
                                             $(".err_psn_lokker").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                        }
                                   }
                              });

                              $(".err_psn_lokker").fadeTo(4000, 500).slideUp(500, function() {
                                   $(".err_psn_lokker").slideUp(500);
                                   $(".err_psn_lokker").addClass('d-none');
                              });
                         } else if (result.dismiss == 'cancel') {
                              swal('Batal', 'Lokasi kerja ' + namaLokker + ' batal dihapus', 'error');
                              return false;
                         }
                    });
               }
          });

          $(document).on('click', '.dtllokker', function() {
               let auth_lokker = $(this).attr('id');
               let namaLokker = $(this).attr('value');

               if (auth_lokker == "") {
                    swal("Error", "Lokasi kerja tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('lokasikerja/detail_lokker'); ?>",
                         data: {
                              auth_lokker: auth_lokker
                         },
                         timeout: 15000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $("#detailLokkerKode").val(data.kode);
                                   $("#detailLokker").val(data.lokker);
                                   $("#detailLokkerStatus").val(data.status);
                                   $("#detailLokkerKet").val(data.ket);
                                   $("#detailLokkerBuat").val(data.pembuat);
                                   $("#detailLokkerTglBuat").val(data.tgl_buat);
                                   $("#detailLokkermdl").modal("show");
                              } else {
                                   $(".err_psn_lokker").removeClass("d-none");
                                   $(".err_psn_lokker").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_lokker").removeClass("alert-primary");
                              $(".err_psn_lokker").addClass("alert-danger");
                              $(".err_psn_lokker").removeClass("d-none");
                              if (xhr.status == 404) {
                                   $(".err_psn_lokker").html("Lokasi kerja gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_lokker").html("Lokasi kerja gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_lokker").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }
                              $(".err_psn_lokker ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_lokker ").slideUp(500);
                                   $(".err_psn_lokker").addClass('d-none');
                              });
                         }
                    });
               }
          });

          $(document).on('click', '.edttlokker', function() {
               let auth_lokker = $(this).attr('id');
               let namaLokker = $(this).attr('value');

               if (auth_lokker == "") {
                    swal("Error", "Lokasi kerja tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('lokasikerja/detail_lokker'); ?>",
                         data: {
                              auth_lokker: auth_lokker
                         },
                         timeout: 15000,
                         success: function(data) {
                              var dataLokker = JSON.parse(data);
                              if (dataLokker.statusCode == 200) {
                                   reseteditlokker();
                                   $("#editLokkerKode").val(dataLokker.kode);
                                   $("#editLokker").val(dataLokker.lokker);
                                   $("#editLokkerStatus").val(dataLokker.status);
                                   $("#editLokkerKet").val(dataLokker.ket);
                                   $("#editLokkermdl").modal("show");
                              } else {
                                   $(".err_psn_lokker").removeClass("d-none");
                                   $(".err_psn_lokker").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_lokker").removeClass("alert-primary");
                              $(".err_psn_lokker").addClass("alert-danger");
                              $(".err_psn_lokker").removeClass("d-none");
                              if (xhr.status == 404) {
                                   $(".err_psn_lokker").html("Lokasi kerja gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_lokker").html("Lokasi kerja gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_lokker").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }

                              $(".err_psn_lokker ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_lokker ").slideUp(500);
                                   $(".err_psn_lokker").addClass('d-none');
                              });
                         }
                    });
               }
          });

          $("#btnrefreshLokker").click(function() {
               $('#tbmLokker').LoadingOverlay("show");
               tbmLokker.draw()
               $('#tbmLokker').LoadingOverlay("hide");
          });

          tbmLokker = $('#tbmLokker').DataTable({
               "processing": true,
               "responsive": true,
               "serverSide": true,
               "ordering": true,
               "order": [
                    [1, 'asc'],
               ],
               "ajax": {
                    "url": "<?= base_url('lokasikerja/ajax_list'); ?>",
                    "type": "POST",
                    "error": function(xhr, error, code) {
                         if (code != "") {
                              $(".err_psn_lokker").removeClass("d-none");
                              $(".err_psn_lokker").html("terjadi kesalahan saat melakukan load data lokasi kerja, hubungi administrator");
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
                         name: 'id_lokker',
                         render: function(data, type, row, meta) {
                              return meta.row + meta.settings._iDisplayStart + 1;
                         },
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'kd_lokker',
                         "className": "text-nowrap align-middle",
                         "width": "10%"
                    },
                    {
                         "data": 'lokker',
                         "className": "text-nowrap  align-middle",
                         "width": "25%"
                    },
                    {
                         "data": 'stat_lokker',
                         "className": "text-center  align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'tgl_buat',
                         "className": "text-center text-nowrap",
                         "width": "8%"
                    },
                    {
                         "data": 'proses',
                         "className": "text-center text-nowrap align-middle",
                         "width": "1%"
                    }
               ]
          });

     });
</script>
<script>
     //========================================== Lokterima ========================================================
     $(document).ready(function() {
          $('#perLokterima').select2({
               theme: 'bootstrap4'
          });

          $.ajax({
               type: "POST",
               url: "<?= base_url("perusahaan/get_all") ?>",
               data: {},
               success: function(data) {
                    var data = JSON.parse(data);
                    $("#perLokterima").html(data.prs);
               },
               error: function(xhr, ajaxOptions, thrownError) {
                    $.LoadingOverlay("hide");
                    $(".err_psn_lokterima").removeClass('d-none');
                    $(".err_psn_lokterima").removeClass('alert-info');
                    $(".err_psn_lokterima").addClass('alert-danger');
                    if (thrownError != "") {
                         $(".err_psn_lokterima").html("Terjadi kesalahan saat load data perusahaan, hubungi administrator");
                         $("#btnTambahLokterima").attr("disabled", true);
                    }
               }
          });

          function reseteditlokterima() {
               $("#editLokterimaKode").val('');
               $("#editLokterima").val('');
               $("#editLokterimaKet").val('');
               $("#editLokterimaStatus").val('');
               $("#error1elkt").html('');
               $("#error2elkt").html('');
               $("#error3elkt").html('');
               $("#error4elkt").html('');
          }

          $('#btnupdateLokterima').click(function() {
               let kode = $('#editLokterimaKode').val();
               let lokterima = $('#editLokterima').val();
               let status = $('#editLokterimaStatus').val();
               let ket = $('#editLokterimaKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('lokasipenerimaan/edit_lokterima'); ?>",
                    data: {
                         kode: kode,
                         lokterima: lokterima,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmLokterima.draw();
                              $("#editLokterimamdl").modal("hide");
                              $(".err_psn_lokterima").removeClass('d-none');
                              $(".err_psn_lokterima").removeClass('alert-danger');
                              $(".err_psn_lokterima").addClass('alert-info');
                              $(".err_psn_lokterima").html(data.pesan);
                              reseteditlokterima();
                              $(".err_psn_lokterima").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_lokterima").slideUp(500);
                                   $(".err_psn_lokterima").addClass('d-none');
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_lokterima").removeClass('d-none');
                              $(".err_psn_edit_lokterima").removeClass('alert-info');
                              $(".err_psn_edit_lokterima").addClass('alert-danger');
                              $(".err_psn_edit_lokterima").html(data.pesan);
                              $(".err_psn_edit_lokterima").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_lokterima").slideUp(500);
                                   $(".err_psn_edit_lokterima").addClass('d-none');
                              });
                              $("#error1elkt").html('');
                              $("#error2elkt").html('');
                              $("#error3elkt").html('');
                              $("#error4elkt").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1elkt").html(data.kode);
                              $("#error2elkt").html(data.lokterima);
                              $("#error3elkt").html(data.status);
                              $("#error4elkt").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_lokterima").removeClass("alert-primary");
                         $(".err_psn_lokterima").addClass("alert-danger");
                         $(".err_psn_lokterima").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_lokterima").html("Lokasi penerimaan gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_lokterima").html("Lokasi penerimaan gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_lokterima").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }
                         $("#editLokterimamdl").modal("hide");
                         $(".err_psn_lokterima ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_lokterima ").slideUp(500);
                              $(".err_psn_lokterima").addClass('d-none');
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          function resetaddlokterima() {
               $("#perLokterima").val('').trigger('change');
               $("#kodeLokterima").val('');
               $("#Lokterima").val('');
               $("#ketLokterima").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
               $(".error4").html('');
          }

          $("#btnBatalLokterima").click(function() {
               resetaddlokterima();
          });

          $("#btnTambahLokterima").click(function() {
               var prs = $("#perLokterima").val();
               var kode = $("#kodeLokterima").val();
               var lokterima = $("#Lokterima").val();
               var ket = $("#ketLokterima").val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("lokasipenerimaan/input_lokterima") ?>",
                    data: {
                         prs: prs,
                         kode: kode,
                         lokterima: lokterima,
                         ket: ket
                    },
                    timeout: 20000,
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $(".err_psn_lokterima").removeClass('d-none');
                              $(".err_psn_lokterima").removeClass('alert-danger');
                              $(".err_psn_lokterima").addClass('alert-info');
                              $(".err_psn_lokterima").html(data.pesan);
                              resetaddlokterima();
                         } else if (data.statusCode == 201) {
                              $(".err_psn_lokterima").removeClass('d-none');
                              $(".err_psn_lokterima").removeClass('alert-info');
                              $(".err_psn_lokterima").addClass('alert-danger');
                              $(".err_psn_lokterima").html(data.pesan);
                         } else if (data.statusCode == 202) {
                              $(".error1").html(data.prs);
                              $(".error2").html(data.kode);
                              $(".error3").html(data.lokterima);
                              $(".error4").html(data.ket);
                         }

                         $(".err_psn_lokterima").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_lokterima").slideUp(500);
                              $(".err_psn_lokterima").addClass('d-none');
                         });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_lokterima").removeClass("alert-primary");
                         $(".err_psn_lokterima").addClass("alert-danger");
                         $(".err_psn_lokterima").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_lokterima").html("Lokasi penerimaan gagal disimpan, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_lokterima").html("Lokasi penerimaan gagal disimpan, Waktu koneksi habis");
                         } else {
                              $(".err_psn_lokterima").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                         }

                         $(".err_psn_lokterima ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_lokterima ").slideUp(500);
                              $(".err_psn_lokterima").addClass('d-none');
                         });
                    }
               })
          });

          $(document).on('click', '.hpslokterima', function() {
               let auth_lokterima = $(this).attr('id');
               let namaLokterima = $(this).attr('value');

               if (auth_lokterima == "") {
                    swal("Error", "Lokasi penerimaan tidak ditemukan", "error");
               } else {
                    swal({
                         title: "Hapus",
                         text: "Yakin Lokasi penerimaan " + namaLokterima + " akan dihapus?",
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
                                   url: "<?= base_url('lokasipenerimaan/hapus_lokterima'); ?>",
                                   data: {
                                        auth_lokterima: auth_lokterima
                                   },
                                   timeout: 20000,
                                   success: function(data, textStatus, xhr) {
                                        var data = JSON.parse(data);
                                        if (data.statusCode == 200) {
                                             tbmLokterima.draw();
                                             $(".err_psn_lokterima").removeClass("alert-danger");
                                             $(".err_psn_lokterima").addClass("alert-primary");
                                             $(".err_psn_lokterima").removeClass("d-none");
                                             $(".err_psn_lokterima").html(data.pesan);
                                        } else {
                                             $(".err_psn_lokterima").removeClass("alert-primary");
                                             $(".err_psn_lokterima").addClass("alert-danger");
                                             $(".err_psn_lokterima").removeClass("d-none");
                                             $(".err_psn_lokterima").html(data.pesan);
                                        }

                                        $.LoadingOverlay("hide");
                                   },
                                   error: function(xhr, ajaxOptions, thrownError) {
                                        $.LoadingOverlay("hide");
                                        $(".err_psn_lokterima").removeClass("alert-primary");
                                        $(".err_psn_lokterima").addClass("alert-danger");
                                        $(".err_psn_lokterima").removeClass("d-none");
                                        if (xhr.status == 404) {
                                             $(".err_psn_lokterima").html("Lokasi penerimaan gagal dihapus, , Link data tidak ditemukan");
                                        } else if (xhr.status == 0) {
                                             $(".err_psn_lokterima").html("Lokasi penerimaan gagal dihapus, Waktu koneksi habis");
                                        } else {
                                             $(".err_psn_lokterima").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                        }
                                   }
                              });

                              $(".err_psn_lokterima").fadeTo(4000, 500).slideUp(500, function() {
                                   $(".err_psn_lokterima").slideUp(500);
                                   $(".err_psn_lokterima").addClass('d-none');
                              });
                         } else if (result.dismiss == 'cancel') {
                              swal('Batal', 'Lokasi penerimaan ' + namaLokterima + ' batal dihapus', 'error');
                              return false;
                         }
                    });
               }
          });

          $(document).on('click', '.dtllokterima', function() {
               let auth_lokterima = $(this).attr('id');
               let namaLokterima = $(this).attr('value');

               if (auth_lokterima == "") {
                    swal("Error", "Lokasi penerimaan tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('lokasipenerimaan/detail_lokterima'); ?>",
                         data: {
                              auth_lokterima: auth_lokterima
                         },
                         timeout: 15000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $("#detailLokterimaPerusahaan").val(data.nama_perusahaan);
                                   $("#detailLokterimaDepart").val(data.depart);
                                   $("#detailLokterimaKode").val(data.kode);
                                   $("#detailLokterima").val(data.lokterima);
                                   $("#detailLokterimaStatus").val(data.status);
                                   $("#detailLokterimaKet").val(data.ket);
                                   $("#detailLokterimaBuat").val(data.pembuat);
                                   $("#detailLokterimaTglBuat").val(data.tgl_buat);
                                   $("#detailLokterimamdl").modal("show");
                              } else {
                                   $(".err_psn_lokterima").removeClass("d-none");
                                   $(".err_psn_lokterima").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_lokterima").removeClass("alert-primary");
                              $(".err_psn_lokterima").addClass("alert-danger");
                              $(".err_psn_lokterima").removeClass("d-none");
                              if (xhr.status == 404) {
                                   $(".err_psn_lokterima").html("Lokasi penerimaan gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_lokterima").html("Lokasi penerimaan gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_lokterima").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }
                              $(".err_psn_lokterima ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_lokterima ").slideUp(500);
                                   $(".err_psn_lokterima").addClass('d-none');
                              });
                         }
                    });
               }
          });

          $(document).on('click', '.edttlokterima', function() {
               let auth_lokterima = $(this).attr('id');
               let namaLokterima = $(this).attr('value');

               if (auth_lokterima == "") {
                    swal("Error", "Lokasi penerimaan tidak ditemukan", "error");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('lokasipenerimaan/detail_lokterima'); ?>",
                         data: {
                              auth_lokterima: auth_lokterima
                         },
                         timeout: 15000,
                         success: function(data) {
                              var dataLokterima = JSON.parse(data);
                              if (dataLokterima.statusCode == 200) {
                                   reseteditlokterima();
                                   $("#editLokterimaKode").val(dataLokterima.kode);
                                   $("#editLokterima").val(dataLokterima.lokterima);
                                   $("#editLokterimaStatus").val(dataLokterima.status);
                                   $("#editLokterimaKet").val(dataLokterima.ket);
                                   $("#editLokterimamdl").modal("show");
                                   $("#error1elkt").html('');
                                   $("#error2elkt").html('');
                                   $("#error3elkt").html('');
                                   $("#error4elkt").html('');
                              } else {
                                   $(".err_psn_lokterima").removeClass("d-none");
                                   $(".err_psn_lokterima").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_lokterima").removeClass("alert-primary");
                              $(".err_psn_lokterima").addClass("alert-danger");
                              $(".err_psn_lokterima").removeClass("d-none");
                              if (xhr.status == 404) {
                                   $(".err_psn_lokterima").html("Lokasi penerimaan gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_lokterima").html("Lokasi penerimaan gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_lokterima").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }

                              $(".err_psn_lokterima").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_lokterima ").slideUp(500);
                                   $(".err_psn_lokterima").addClass('d-none');
                              });
                         }
                    });
               }
          });

          $("#btnrefreshLokterima").click(function() {
               $('#tbmLokterima').LoadingOverlay("show");
               tbmLokterima.draw()
               $('#tbmLokterima').LoadingOverlay("hide");
          });

          tbmLokterima = $('#tbmLokterima').DataTable({
               "processing": true,
               "responsive": true,
               "serverSide": true,
               "ordering": true,
               "order": [
                    [1, 'asc'],
               ],
               "ajax": {
                    "url": "<?= base_url('lokasipenerimaan/ajax_list'); ?>",
                    "type": "POST",
                    "error": function(xhr, error, code) {
                         if (code != "") {
                              $(".err_psn_okterima").removeClass("d-none");
                              $(".err_psn_lokterima").removeClass("d-none");
                              $(".err_psn_lokterima").html("Terjadi kesalahan saat melakukan load data lokasi penerimaan, hubungi administrator");
                              $("#addbtn").addClass("disabled");
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
                         name: 'id_lokterima',
                         render: function(data, type, row, meta) {
                              return meta.row + meta.settings._iDisplayStart + 1;
                         },
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'kd_lokterima',
                         "className": "align-middle",
                         "width": "10%"
                    },
                    {
                         "data": 'lokterima',
                         "className": "text-nowrap align-middle",
                         "width": "50%"
                    },
                    {
                         "data": 'stat_lokterima',
                         "className": "text-center  align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'kode_perusahaan',
                         "className": "text-center text-nowrap align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'tgl_buat',
                         "className": "text-center text-nowrap align-middle",
                         "width": "8%"
                    },
                    {
                         "data": 'proses',
                         "className": "text-center text-nowrap align-middle",
                         "width": "1%"
                    }
               ]
          });

     });
</script>
<script>
     //========================================== Poh ========================================================
     $(document).ready(function() {
          function reseteditpoh() {
               $("#editPohKode").val('');
               $("#editPoh").val('');
               $("#editPohKet").val('');
               $("#editPohStatus").val('');
               $("#error1epoh").html('');
               $("#error2epoh").html('');
               $("#error3epoh").html('');
               $("#error4epoh").html('');
          }

          $('#btnupdatePoh').click(function() {
               let kode = $('#editPohKode').val();
               let poh = $('#editPoh').val();
               let status = $('#editPohStatus').val();
               let ket = $('#editPohKet').val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url('poh/edit_poh'); ?>",
                    data: {
                         kode: kode,
                         poh: poh,
                         status: status,
                         ket: ket
                    },
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              tbmPoh.draw();
                              $("#editPohmdl").modal("hide");
                              $(".err_psn_poh").removeClass('d-none');
                              $(".err_psn_poh").removeClass('alert-danger');
                              $(".err_psn_poh").addClass('alert-info');
                              $(".err_psn_poh").html(data.pesan);
                              reseteditpoh();
                              $(".err_psn_poh").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_poh").slideUp(500);
                                   $(".err_psn_poh").addClass('d-none');
                              });
                         } else if (data.statusCode == 201 || data.statusCode == 203 || data.statusCode == 204 || data.statusCode == 205) {
                              $(".err_psn_edit_poh").removeClass('d-none');
                              $(".err_psn_edit_poh").removeClass('alert-info');
                              $(".err_psn_edit_poh").addClass('alert-danger');
                              $(".err_psn_edit_poh").html(data.pesan);
                              $(".err_psn_edit_poh").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_edit_poh").slideUp(500);
                                   $(".err_psn_edit_poh").addClass('d-none');
                              });
                              $("#error1epoh").html('');
                              $("#error2epoh").html('');
                              $("#error3epoh").html('');
                              $("#error4epoh").html('');
                         } else if (data.statusCode == 202) {
                              $("#error1epoh").html(data.kode);
                              $("#error2epoh").html(data.poh);
                              $("#error3epoh").html(data.status);
                              $("#error4epoh").html(data.ket);
                         }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_poh").removeClass("alert-primary");
                         $(".err_psn_poh").addClass("alert-danger");
                         $(".err_psn_poh").removeClass("d-none");
                         if (xhr.status == 404) {
                              $(".err_psn_poh").html("Point of hire gagal diupdate, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_poh").html("Point of hire gagal diupdate, Waktu koneksi habis");
                         } else {
                              $(".err_psn_poh").html("Terjadi kesalahan saat meng-update data, hubungi administrator");
                         }

                         $("#editPohmdl").modal("hide");
                         $(".err_psn_poh ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_poh").slideUp(500);
                              $(".err_psn_poh").addClass('d-none');
                         });
                    }
               })
          });

          $.LoadingOverlay("hide");

          function resetaddpoh() {
               $("#kodePoh").val('');
               $("#Poh").val('');
               $("#ketPoh").val('');
               $(".error1").html('');
               $(".error2").html('');
               $(".error3").html('');
          }
          $("#btnBatalPoh").click(function() {
               resetaddpoh();
          });

          $("#btnTambahPoh").click(function() {
               var kode = $("#kodePoh").val();
               var poh = $("#Poh").val();
               var ket = $("#ketPoh").val();

               $.ajax({
                    type: "POST",
                    url: "<?= base_url("poh/input_poh") ?>",
                    data: {
                         kode: kode,
                         poh: poh,
                         ket: ket
                    },
                    timeout: 20000,
                    success: function(data) {
                         var data = JSON.parse(data);
                         if (data.statusCode == 200) {
                              $(".err_psn_poh").removeClass('d-none');
                              $(".err_psn_poh").removeClass('alert-danger');
                              $(".err_psn_poh").addClass('alert-info');
                              $(".err_psn_poh").html(data.pesan);
                              resetaddpoh()
                         } else if (data.statusCode == 201) {
                              $(".err_psn_poh").removeClass('d-none');
                              $(".err_psn_poh").removeClass('alert-info');
                              $(".err_psn_poh").addClass('alert-danger');
                              $(".err_psn_poh").html(data.pesan);
                         } else if (data.statusCode == 202) {
                              $(".error1").html(data.kode);
                              $(".error2").html(data.poh);
                              $(".error3").html(data.ket);
                         }

                         $(".err_psn_poh").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_poh").slideUp(500);
                              $(".err_psn_poh").addClass('d-none');
                         });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                         $.LoadingOverlay("hide");
                         $(".err_psn_poh").removeClass('d-none');
                         $(".err_psn_poh").removeClass("alert-primary");
                         $(".err_psn_poh").addClass("alert-danger");
                         if (xhr.status == 404) {
                              $(".err_psn_poh").html("Point of hire gagal disimpan, Link data tidak ditemukan");
                         } else if (xhr.status == 0) {
                              $(".err_psn_poh").html("Point of hire gagal disimpan, Waktu koneksi habis");
                         } else {
                              $(".err_psn_poh").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                         }

                         $(".err_psn_poh ").fadeTo(3000, 500).slideUp(500, function() {
                              $(".err_psn_poh ").slideUp(500);
                              $(".err_psn_poh").addClass('d-none');
                         });
                    }
               })
          });

          $(document).on('click', '.hpspoh', function() {
               let auth_poh = $(this).attr('id');
               let namaPoh = $(this).attr('value');

               if (auth_poh == "") {
                    $(".err_psn_poh").removeClass("alert-primary");
                    $(".err_psn_poh").addClass("alert-danger");
                    $(".err_psn_poh").removeClass('d-none');
                    $(".err_psn_poh").html("Point of hire tidak ditemukan");
               } else {
                    swal({
                         title: "Hapus",
                         text: "Yakin " + namaPoh + " akan dihapus?",
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
                                   url: "<?= base_url('poh/hapus_poh'); ?>",
                                   data: {
                                        auth_poh: auth_poh
                                   },
                                   timeout: 20000,
                                   success: function(data, textStatus, xhr) {
                                        var data = JSON.parse(data);
                                        if (data.statusCode == 200) {
                                             tbmPoh.draw();
                                             $(".err_psn_poh").removeClass("alert-danger");
                                             $(".err_psn_poh").addClass("alert-primary");
                                             $(".err_psn_poh").removeClass('d-none');
                                             $(".err_psn_poh").html(data.pesan);
                                        } else {
                                             $(".err_psn_poh").removeClass("alert-primary");
                                             $(".err_psn_poh").addClass("alert-danger");
                                             $(".err_psn_poh").removeClass('d-none');
                                             $(".err_psn_poh").html(data.pesan);
                                        }

                                        $.LoadingOverlay("hide");
                                   },
                                   error: function(xhr, ajaxOptions, thrownError) {
                                        $.LoadingOverlay("hide");
                                        $(".err_psn_poh").removeClass("alert-primary");
                                        $(".err_psn_poh").addClass("alert-danger");
                                        $(".err_psn_poh").removeClass('d-none');
                                        if (xhr.status == 404) {
                                             $(".err_psn_poh").html("Point of hire gagal dihapus, , Link data tidak ditemukan");
                                        } else if (xhr.status == 0) {
                                             $(".err_psn_poh").html("Point of hire gagal dihapus, Waktu koneksi habis");
                                        } else {
                                             $(".err_psn_poh").html("Terjadi kesalahan saat menghapus data, hubungi administrator");
                                        }
                                   }
                              });

                              $(".err_psn_poh").fadeTo(4000, 500).slideUp(500, function() {
                                   $(".err_psn_poh").slideUp(500);
                                   $(".err_psn_poh").addClass('d-none');
                              });
                         } else if (result.dismiss == 'cancel') {
                              swal('Batal', 'Point of hire ' + namaPoh + ' batal dihapus', 'error');
                              return false;
                         }
                    });
               }
          });

          $(document).on('click', '.dtlpoh', function() {
               let auth_poh = $(this).attr('id');
               let namaPoh = $(this).attr('value');

               if (auth_poh == "") {
                    $(".err_psn_poh").removeClass("alert-primary");
                    $(".err_psn_poh").addClass("alert-danger");
                    $(".err_psn_poh").removeClass('d-none');
                    $(".err_psn_poh").html("Point of hire tidak ditemukan");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('poh/detail_poh'); ?>",
                         data: {
                              auth_poh: auth_poh
                         },
                         timeout: 15000,
                         success: function(data) {
                              var data = JSON.parse(data);
                              if (data.statusCode == 200) {
                                   $("#detailPohKode").val(data.kode);
                                   $("#detailPoh").val(data.poh);
                                   $("#detailPohStatus").val(data.status);
                                   $("#detailPohKet").val(data.ket);
                                   $("#detailPohBuat").val(data.pembuat);
                                   $("#detailPohTglBuat").val(data.tgl_buat);
                                   $("#detailPohmdl").modal("show");
                              } else {
                                   $(".err_psn_poh").removeClass('d-none');
                                   $(".err_psn_poh").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_poh").removeClass("alert-primary");
                              $(".err_psn_poh").addClass("alert-danger");
                              $(".err_psn_poh").removeClass('d-none');
                              if (xhr.status == 404) {
                                   $(".err_psn_poh").html("Point of hire gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_poh").html("Point of hire gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_poh").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }
                              $(".err_psn_poh ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_poh ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $(document).on('click', '.edttpoh', function() {
               let auth_poh = $(this).attr('id');
               let namaPoh = $(this).attr('value');

               if (auth_poh == "") {
                    $(".err_psn_poh").removeClass("alert-primary");
                    $(".err_psn_poh").addClass("alert-danger");
                    $(".err_psn_poh").removeClass('d-none');
                    $(".err_psn_poh").html("Point of hire tidak ditemukan");
               } else {
                    $.ajax({
                         type: "post",
                         url: "<?= base_url('poh/detail_poh'); ?>",
                         data: {
                              auth_poh: auth_poh
                         },
                         timeout: 15000,
                         success: function(data) {
                              var dataPoh = JSON.parse(data);
                              if (dataPoh.statusCode == 200) {
                                   $("#editPohKode").val(dataPoh.kode);
                                   $("#editPoh").val(dataPoh.poh);
                                   $("#editPohStatus").val(dataPoh.status);
                                   $("#editPohKet").val(dataPoh.ket);
                                   $("#editPohmdl").modal("show");
                                   $("#error1epoh").html('');
                                   $("#error2epoh").html('');
                                   $("#error3epoh").html('');
                                   $("#error4epoh").html('');
                              } else {
                                   $(".err_psn_poh").removeClass('d-none');
                                   $(".err_psn_poh").html(data.pesan);
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              $.LoadingOverlay("hide");
                              $(".err_psn_poh").removeClass("alert-primary");
                              $(".err_psn_poh").addClass("alert-danger");
                              $(".err_psn_poh").removeClass('d-none');
                              if (xhr.status == 404) {
                                   $(".err_psn_poh").html("Poh gagal ditampilkan, Link data tidak ditemukan");
                              } else if (xhr.status == 0) {
                                   $(".err_psn_poh").html("Poh gagal ditampilkan, Waktu koneksi habis");
                              } else {
                                   $(".err_psn_poh").html("Terjadi kesalahan saat menampilkan data, hubungi administrator");
                              }

                              $(".err_psn_poh ").fadeTo(3000, 500).slideUp(500, function() {
                                   $(".err_psn_poh ").slideUp(500);
                              });
                         }
                    });
               }
          });

          $("#btnrefreshPoh").click(function() {
               $('#tbmPoh').LoadingOverlay("show");
               tbmPoh.draw()
               $('#tbmPoh').LoadingOverlay("hide");
          });

          tbmPoh = $('#tbmPoh').DataTable({
               "processing": true,
               "responsive": true,
               "serverSide": true,
               "ordering": true,
               "order": [
                    [1, 'asc'],
               ],
               "ajax": {
                    "url": "<?= base_url('poh/ajax_list'); ?>",
                    "type": "POST",
                    "error": function(xhr, error, code) {
                         if (code != "") {
                              $(".err_psn_poh").removeClass("d-none");
                              $(".err_psn_poh").removeClass('d-none');
                              $(".err_psn_poh").html("terjadi kesalahan saat melakukan load data Poh, hubungi administrator");
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
                         name: 'id_poh',
                         render: function(data, type, row, meta) {
                              return meta.row + meta.settings._iDisplayStart + 1;
                         },
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'kd_poh',
                         "className": "text-nowrap align-middle",
                         "width": "10%"
                    },
                    {
                         "data": 'poh',
                         "className": "text-nowrap align-middle",
                         "width": "50%"
                    },
                    {
                         "data": 'stat_poh',
                         "className": "text-center align-middle",
                         "width": "1%"
                    },
                    {
                         "data": 'tgl_buat',
                         "className": "text-center text-nowrap align-middle",
                         "width": "8%"
                    },
                    {
                         "data": 'proses',
                         "className": "text-center text-nowrap align-middle",
                         "width": "1%"
                    }
               ]
          });
     });
</script>
</body>

</html>