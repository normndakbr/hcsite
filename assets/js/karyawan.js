$(document).ready(function () {
  // Token Auth
  let token = $("#token").val();

  // Function
  // Table Karyawan
  function tbKary(prs, ckc = 0) {
    tbmKaryawan = $("#tbmKaryawan").DataTable({
      processing: true,
      serverSide: true,
      ordering: true,
      order: [[6, "asc"]],
      ajax: {
        url:
          site_url +
          "karyawan/ajax_list?auth_m_per=" +
          prs +
          "&authtoken=" +
          $("#token").val() +
          "&ck=" +
          ckc,
        type: "POST",
        error: function (xhr, error, code) {
          if (code != "") {
            $(".err_psn_kary").removeClass("d-none");
            $(".err_psn_kary").css("display", "block");
            $(".err_psn_kary").html(
              "terjadi kesalahan saat melakukan load data karyawan ss, hubungi administrator"
            );
            $("#addTambahKary").addClass("disabled");
            $(".err_psn_kary ")
              .fadeTo(3000, 500)
              .slideUp(500, function () {
                $(".err_psn_kary ").slideUp(500);
              });
          }
        },
      },
      deferRender: true,
      aLengthMenu: [
        [10, 25, 50],
        [10, 25, 50],
      ],
      columns: [
        {
          data: "proses",
          className: "text-center align-middle",
        },
        {
          data: "no",
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
          className: "text-center align-middle",
        },
        {
          data: "no_nik",
          className: "align-middle text-truncate tooltips",
          createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
            cell.setAttribute("style", "max-width: 100px;");
            cell.setAttribute("title", cellData);
          },
        },
        {
          data: "nama_lengkap",
          className: "align-middle text-truncate tooltips",
          createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
            cell.setAttribute("style", "max-width: 100px;");
            cell.setAttribute("title", cellData);
          },
        },
        {
          data: "depart",
          className: "align-middle text-truncate tooltips",
          createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
            cell.setAttribute("style", "max-width: 100px;");
            cell.setAttribute("title", cellData);
          },
        },
        {
          data: "posisi",
          className: "align-middle text-truncate tooltips",
          createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
            cell.setAttribute("style", "max-width: 100px;");
            cell.setAttribute("title", cellData);
          },
        },
        {
          data: "kode_m_perusahaan",
          className: "align-middle text-center",
        },
        {
          data: "stat_aktif",
          className: "align-middle text-center",
        },
      ],
    });

    tbmKaryawan.on("draw.dt", function () {
      var tooltipTriggerList = [].slice.call(
        document.querySelectorAll(".tooltips")
      );
      tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });
    });
    $("#tbmKaryawan").LoadingOverlay("hide");
  }

  // Initialize Searchable Select
  $("#perJenisData").select2({
    theme: "bootstrap4",
  });

  // Testing
  $("#perJenisData option:eq(1)").prop("selected", true);
  $("#perJenisData").trigger("change.select2");

  // Click or Change Event
  $("#perJenisData").change(function () {
    let prs = $("#perJenisData").val();
    $("#tbmKaryawan").LoadingOverlay("show");
    $("#tbmKaryawan").DataTable().destroy();
    tbKary(prs);
  });

  $("#addRefreshKary").click(function () {
    let prs = $("#perJenisData").val();
    $("#tbmKaryawan").LoadingOverlay("show");
    $("#tbmKaryawan").DataTable().destroy();
    $("#krycekNonaktif").prop("checked", false);
    tbKary(prs);
  });

  $("#krycekNonaktif").click(function () {
    let ckkary = $("#krycekNonaktif");
    let prs = $("#perJenisData").val();

    $("#tbmKaryawan").LoadingOverlay("show");
    if (prs != "") {
      if (ckkary.is(":checked")) {
        ckc = 1;
      } else {
        ckc = 0;
      }
      $("#tbmKaryawan").DataTable().destroy();
      tbKary(prs, ckc);
      $("#tbmKaryawan").LoadingOverlay("hide");
    }
  });

  // Initialize Datatables
  tbKary($("#perJenisData").val());

  // Resize
  window.addEventListener(
    "resize",
    function (event) {
      $("#perJenisData").select2({
        theme: "bootstrap4",
      });
    },
    true
  );
});
