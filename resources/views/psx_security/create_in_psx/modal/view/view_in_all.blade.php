<div class="modal fade bd-example-modal-lg modal-view-in-all" id="modal-view-in-all" style="z-index: 1041" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div id="view_in_material">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Bawa Barang)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_material_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_material_view_in" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_material_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_material_view_in" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_material_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_material_view_in" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="rak_material_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_material_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="bok_material_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_material_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="palet_material_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_material_view_in" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="datatable datatable-primary">
                                            <div class="table-responsive">
                                                <div class="dataTables_scrollBody"
                                                    style="position: relative; overflow: auto; max-height: 500px; width: 100%;">
                                                    <table id="tbl_in_view_material"
                                                        class="table table-striped table-bordered table-hover"
                                                        width="100%">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th width="15%">No Po</th>
                                                                <th width="10%">Status</th>
                                                                <th width="15%">Kd Sup</th>
                                                                <th width="25%">Nama Supplier</th>
                                                                <th width="25%">No Sj</th>
                                                                <th width="10%">Date Sj</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="body_item">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="jml_row_add_material" name="jml_row_add_material">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endCombined --}}

            <div id="view_in_rak_box">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Bawa Rak Box)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_rakbok_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_rakbok_view_in" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_rakbok_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_rakbok_view_in" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_rakbok_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="driver_rakbok_view_in" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_rakbok_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="kd_sup_rakbok_view_in" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_rakbok_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_rakbok_view_in" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="rak_rakbok_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_rakbok_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_rakbok_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="bok_rakbok_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_rakbok_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="palet_rakbok_view_in" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endCombined --}}

            <div id="view_in_kosong">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Kosong)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_kosong_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_kosong_view_in" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_kosong_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_kosong_view_in" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_kosong_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="driver_kosong_view_in" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_kosong_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="kd_sup_kosong_view_in" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_kosong_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_kosong_view_in" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endCombined --}}

            <div id="view_in_swapp">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Tukar Guling)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_swapp_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_swapp_view_in" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_swapp_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_swapp_view_in" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_swapp_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="driver_swapp_view_in" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_swapp_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="kd_sup_swapp_view_in" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_swapp_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_swapp_view_in" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="rak_swapp_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_swapp_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_swapp_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="bok_swapp_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_swapp_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="palet_swapp_view_in" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-3 mb-1"></div>
                                    <div class="col-6">
                                        <div class="datatable datatable-primary">
                                            <div class="table-responsive">
                                                <div class="dataTables_scrollBody"
                                                style="position: relative; overflow: auto; max-height: 500px; width: 100%;">
                                                    <table id="tbl_in_view_swapp"
                                                        class="table table-striped table-bordered table-hover" width="100%">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th width="50%">Sj No</th>
                                                                <th width="30%">Date Sj</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="body_item">
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
            {{-- endCombined --}}

            <div id="view_in_revisi_sj">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_revisi_sj_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_revisi_sj_view_in" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver (Revisi Sj)</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_revisi_sj_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_revisi_sj_view_in" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_revisi_sj_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_revisi_sj_view_in" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="rak_revisi_sj_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_revisi_sj_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_revisi_sj_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_revisi_sj_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_revisi_sj_view_in"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_revisi_sj_view_in" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-5 mb-1">
                                        <textarea name="ket_revisi_sj_view_in" class="form-control form-control-sm"
                                            id="ket_revisi_sj_view_in" cols="50" rows="2"
                                            style="outline: 1px solid #b3cee5;" readonly></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="datatable datatable-primary">
                                            <div class="table-responsive">
                                                <div class="dataTables_scrollBody"
                                                    style="position: relative; overflow: auto; max-height: 500px; width: 100%;">
                                                    <table id="tbl_in_view_revisi_sj"
                                                        class="table table-striped table-bordered table-hover"
                                                        width="100%">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th width="15%">No Po</th>
                                                                <th width="10%">Status</th>
                                                                <th width="15%">Kd Sup</th>
                                                                <th width="25%">Nama Supplier</th>
                                                                <th width="25%">No Sj</th>
                                                                <th width="10%">Date Sj</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="body_item">
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
            {{-- endCombined --}}

            <div id="view_in_sj_temporary">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (SJ Sementara)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_sj_temporary_view_in" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_sj_temporary_view_in" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="driver_sj_temporary_view_in" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="kd_sup_sj_temporary_view_in" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_sj_temporary_view_in" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="rak_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_sj_temporary_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="bok_sj_temporary_view_in" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="palet_sj_temporary_view_in" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-5 mb-2">
                                        <textarea name="ket_sj_temporary_view_in" id="ket_sj_temporary_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;" cols="50" rows="2" readonly></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-3 mb-1"></div>
                                    <div class="col-6">
                                        <div class="datatable datatable-primary">
                                            <div class="table-responsive">
                                                <div class="dataTables_scrollBody"
                                                style="position: relative; overflow: auto; max-height: 500px; width: 100%;">
                                                    <table id="tbl_in_view_sj_temporary"
                                                        class="table table-striped table-bordered table-hover" width="100%">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th width="50%">Sj No</th>
                                                                <th width="30%">Date Sj</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="body_item">
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
            {{-- endCombined --}}

            <div id="view_in_sample">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Sample)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_sample_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_sample_view_in" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_sample_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_sample_view_in" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_sample_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="driver_sample_view_in" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_sample_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="kd_sup_sample_view_in" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_sample_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_sample_view_in" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-5 mb-2">
                                        <textarea name="ket_sj_sample_view_in" id="ket_sj_sample_view_in" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;" cols="50" rows="2" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endCombined --}}


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
