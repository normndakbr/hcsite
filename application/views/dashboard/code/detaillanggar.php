<script>
    //========================================== Detail Langgar ========================================================
    $(document).ready(function() {

        $("#logout").click(function() {
            $("#logoutmdl").modal("show");
        });

        $("#btnSelesai").click(function() {
            window.top.close();
        });

        $('#jenisLgrEdit').select2({
            theme: 'bootstrap4',
            width: '100%'
        });

        window.addEventListener('resize', function(event) {
            $('#jenisLgrEdit').select2({
                theme: 'bootstrap4',
                width: '100%'
            });

        }, true);
    });
</script>