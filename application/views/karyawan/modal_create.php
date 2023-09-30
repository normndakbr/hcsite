<!-- Input KTP -->
<div class="modal fade" id="tambahKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document"
        style="margin-left: auto; margin-right: auto;max-width:50%;">
        <div class="modal-content">
            <div class="modal-header bg-c-blue">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-id-card"></i> Verifikasi No.
                    KTP</h5>
            </div>
            <form action="javascript:void(0);" id="formCheckKTP" data-parsley-validate>
                <div style="background-color:rgba(240,240,240,1);" class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mandatory">
                                <label for="noKTPCek" class="form-label">No. KTP</label>
                                <input type="text" id='noKTPCek' name='noKTPCek' spellcheck="false" autocomplete="off"
                                    class="form-control bg-white" data-parsley-16-character="true" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer m-3">
                    <button type="submit" name="btnverifikasiktp" id="btnverifikasiktp"
                        class="btn font-weight-bold btn-primary">Verifikasi
                        Data</button>
                    <button type="button" data-dismiss="modal" class="btn font-weight-bold btn-warning">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Verifikasi KTP -->
<div class="modal fade" id="mdldetkary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document"
        style="margin-left: auto; margin-right: auto;max-width:60%;">
        <div class="modal-content">
            <div class="modal-header bg-c-blue">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-id-card"></i> Verifikasi Data
                </h5>
            </div>

            <div style="background-color:rgba(240,240,240,1);" class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <div class="form-group">
                            <h5 id="pesanDet" class="text-danger"></h5>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: -5px;">
                        <hr>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4col-sm-12">
                                <div class="form-group">
                                    <label>No. KTP</label>
                                    <h5 id="noKTPDet"></h5>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <h5 id="namaDet"></h5>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Perusahaan</label>
                                    <h5 id="PerusahaanDet"></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <h5 id="StatusDet"></h5>
                                </div>
                            </div>
                            <div class="tglnonaktif col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Tanggal NonAktif</label>
                                    <h5 id="tglNonAktifDet"></h5>
                                </div>
                            </div>
                            <div class="lamanonaktif col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Lama NonAKtif</label>
                                    <h5 id="lamaNonAktifDet"></h5>
                                </div>
                            </div>
                            <div class="pelanggaran col-lg-12 col-md-12 col-sm-12">
                                <hr>
                                <h5 class="text-center text-danger">Data Pelanggaran/Incident/Accident : </h5>
                                <table id="tbmViolation"
                                    class="table table-striped table-bordered table-hover text-black text-nowrap"
                                    style="width:100%;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                    <thead>
                                        <tr>
                                            <td style="width:1%;text-align:center;">NO.</td>
                                            <td style="width:20%;font-style:bold;">HUKUMAN</td>
                                            <td style="width:79%;font-style:bold;">KETERANGAN</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer m-3">
                <button name="btnselesaiverktp" id="btnselesaiverktp" data-dismiss="modal"
                    class="btn font-weight-bold btn-primary">Selesai</button>
            </div>
        </div>
    </div>
</div>