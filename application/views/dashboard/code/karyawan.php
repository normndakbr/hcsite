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
                    {
                        "data": 'section',
                        "className": "text-nowrap align-middle",
                    },
                    {
                        "data": 'posisi',
                        "className": "text-wrap align-middle",
                    },
                    {
                        "data": 'proses',
                        "className": "text-center text-nowrap align-middle",
                        "width": "1%"
                    }
                ]
            });
        });

    });
</script>