$(document).ready(function() {

    $("#logout").click(function() {
        $("#logoutmdl").modal("show");
    });

    $("#btnSelesai").click(function() {
        window.top.close();
    });
   
});
