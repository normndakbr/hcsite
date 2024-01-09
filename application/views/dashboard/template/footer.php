</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/vendor-all.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/ripple.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/pcoded.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/plugins/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/select2.full.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>assets/assets/js/loadingoverlay.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/assets/js/dataTables.fixedColumns.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>js/jquery.idle.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type='text/javascript' src="<?= base_url(); ?>assets/assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?= base_url(); ?>assets/assets/js/pages/dashboard-main.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
<script type='text/javascript' src="<?= base_url(); ?>assets/assets/js/jquery.inputmask.bundle.js"></script>
<script>
     let site_url = '<?=base_url()?>';

    $(document).ready(function () {

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

     $("#txtcarikary").on('keypress', function(e) {
          if (e.which == 13) {
               let txt = $("#txtcarikary").val().replace(/' '/g, "_");
               window.open(site_url + "cari?fdt=" + txt, '_blank');
          }
     });

   });

</script>