<div class="pcoded-main-container">
     <div class="pcoded-content">
          <div class="page-header">
               <div class="page-block">
                    <div class="row align-items-center">
                         <div class="col-md-12">
                              <div class="page-header-title">
                                   <h5 class="m-b-10">Data Master</h5>
                              </div>
                              <ul class="breadcrumb">
                                   <li class="breadcrumb-item">
                                        <a href="<?= base_url('dash'); ?>">
                                             <i class="feather icon-home"></i>
                                        </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                        <a id="bc1" href="#">
                                             Struktur Perusahaan
                                        </a>
                                   </li>
                                   <li class="breadcrumb-item">
                                        <a id="bc2">
                                             Tabel Struktur Perusahaan
                                        </a>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="col-xl-12 col-md-12">
                    <div class="card latest-update-card">
                         <div class="card-header">
                              <h5>Struktur Perusahaan</h5>
                              <div class="card-header-right">
                                   <div class="btn-group card-option">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="feather icon-more-horizontal"></i>
                                        </button>
                                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                             <li class="dropdown-item full-card">
                                                  <a href="#"><span><i class="feather icon-maximize"></i>
                                                            Perbesar</span><span style="display: none"><i class="feather icon-minimize"></i> Restore</span></a>
                                             </li>
                                             <li class="dropdown-item minimize-card">
                                                  <a href="#"><span><i class="feather icon-minus"></i> collapse</span><span style="display: none"><i class="feather icon-plus"></i> expand</span></a>
                                             </li>
                                             <li class="dropdown-item reload-card">
                                                  <a href="#"><i class="feather icon-refresh-cw"></i> reload</a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="card-body">
                              <div class="mt-3">
                                   <div class="mb-2">
                                        <a href="<?= base_url('struktur'); ?>" class="btn btn-primary font-weight-bold">Refresh / Data</a>
                                        <a id="addbtn" href="<?= base_url('struktur/new'); ?>" class="btn btn-success font-weight-bold">Tambah Data</a>
                                   </div>
                                   <div class="alert alert-danger err_psn_struktur animate__animated animate__bounce d-none"></div>
                              </div>
                              <div class="row">
                                   <div class="col-lg-12">
                                        <div class="table-responsive">
                                             <table id="tbmStruktur" class="table table-striped table-bordered table-hover text-black" style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                                  <thead>
                                                       <tr class="font-weight-boldtext-white">
                                                            <th style="text-align:center;width:1%;">No.</th>
                                                            <th>Perusahaan</th>
                                                            <th>Jenis Perusahaan</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <?php
                                                       function GetStruktur($idparent)
                                                       {

                                                            $servername = "localhost";
                                                            $username = "root";
                                                            $password = "";
                                                            $dbname = "db_hc";

                                                            static $space;
                                                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                                                            $sql = "SELECT * from vw_m_perusahaan where id_parent=" . $idparent;

                                                            $result = mysqli_query($conn, $sql);

                                                            $no = 0;
                                                            $id = 0;
                                                            $penerbit = "";
                                                            if (mysqli_num_rows($result) > 0) {
                                                                 $space .= " " . "&roarr;";

                                                                 while ($row = mysqli_fetch_assoc($result)) {

                                                                      $id = $row["id_m_perusahaan"];
                                                                      $nama_per = $row["nama_perusahaan"];
                                                                      $jenis_per = $row["jenis_perusahaan"];

                                                                      echo "<tr class='rataTengah'>";

                                                                      if ($idparent == 0) {
                                                                           $no++;
                                                                           echo "<td style='text-align:center;width:1%;'>" . $no . "</td>";
                                                                           echo "<td style='color:red;width:70%;'><b>" . $nama_per . "</b></td>";
                                                                           echo "<td style='width:70%;'>" . $jenis_per . "</td>";
                                                                      } else {
                                                                           $no = "";
                                                                           echo "<td style='text-align:center;width:1%;'>" . $no . "</td>";
                                                                           echo "<td style='width:70%;'>" . $space . " " . $nama_per . "</td>";
                                                                           echo "<td style='width:70%;'>" . $jenis_per . "</td>";
                                                                      }

                                                                      echo "</tr>";

                                                                      GetStruktur($id);
                                                                 }

                                                                 $space = substr($space, 0, strlen($space) - 7);
                                                            }

                                                            mysqli_close($conn);
                                                       }

                                                       GetStruktur(0);

                                                       ?>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>