<div class="modal fade bd-example-modal-lg modal-view-data-list-all" data-backdrop="static"
    id="modal-view-data-list-all" data-keyboard="false" style="z-index: 1041" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div id="info_in_1">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Bawa Barang)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_view_data_list_material" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>In / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="in_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="in_view_data_list_material" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_list_material" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_view_data_list_material" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_view_data_list_material" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="rak_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_view_data_list_material" min="0" max="9999" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_view_data_list_material" min="0" max="9999" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_view_data_list_material" min="0" max="9999" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Time</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_time_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_time_view_data_list_material" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Location</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_location_view_data_list_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_location_view_data_list_material" maxlength="12" readonly>
                                    </div>
                                </div>
                                

                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="datatable datatable-primary">
                                            <div class="table-responsive">
                                                <table id="tbl_material_view_data_list_material"
                                                    class="table table-striped table-hover" width="100%">
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
            {{-- endCombined --}}

            <div id="info_in_2">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Bawa Rak Box)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_view_data_list_rak_box" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>In / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="in_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="in_view_data_list_rak_box" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_list_rak_box" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_view_data_list_rak_box" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_view_data_list_rak_box" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="kd_sup_view_data_list_rak_box" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_view_data_list_rak_box" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="rak_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_view_data_list_rak_box" min="0" max="9999" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_view_data_list_rak_box" min="0" max="9999" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_view_data_list_rak_box" min="0" max="9999" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Time</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_time_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_time_view_data_list_rak_box" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Location</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_location_view_data_list_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_location_view_data_list_rak_box" maxlength="12" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endCombined --}}

            <div id="info_in_3">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Kosong)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_view_data_list_kosong" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>In / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="in_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="in_view_data_list_kosong" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_list_kosong" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_view_data_list_kosong" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_view_data_list_kosong" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="kd_sup_view_data_list_kosong" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_view_data_list_kosong" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Time</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_time_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_time_view_data_list_kosong" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Location</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_location_view_data_list_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_location_view_data_list_kosong" maxlength="12" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endCombined --}}

            <div id="info_in_4">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Tukar Guling)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <form id="form-out-tukar-guling-view" method="post" action="javascript:void(0)">
                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Sles No</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="text" name="sles_no_view_data_list_swapp"
                                                class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="sles_no_view_data_list_swapp" maxlength="12" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>In / Date</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="text" name="in_view_data_list_swapp"
                                                class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="in_view_data_list_swapp" maxlength="12" readonly>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="text" name="date_view_data_list_swapp"
                                                class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="date_view_data_list_swapp" maxlength="15" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>No Pol / Driver</label>
                                        </div>
                                        <div class="col-2 mb-1">
                                            <input type="text" name="no_pol_view_data_list_swapp"
                                                class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="no_pol_view_data_list_swapp" maxlength="12" readonly>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="driver_view_data_list_swapp"
                                                class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="driver_view_data_list_swapp" maxlength="15" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Kd sup / Nama supplier</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="text" name="kd_sup_view_data_list_swapp" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="kd_sup_view_data_list_swapp" readonly>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="nama_sup_view_data_list_swapp" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_view_data_list_swapp" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Rak / Box / Palet</label>
                                        </div>
                                        <div class="col-2 mb-1">
                                            <input type="number" name="rak_view_data_list_swapp"
                                                class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="rak_view_data_list_swapp" min="0" max="9999" readonly>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="bok_view_data_list_swapp"
                                                class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="bok_view_data_list_swapp" min="0" max="9999" readonly>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="palet_view_data_list_swapp"
                                                class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="palet_view_data_list_swapp" min="0" max="9999" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Time</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_time_view_data_list_swapp"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_time_view_data_list_swapp" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Location</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_location_view_data_list_swapp"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_location_view_data_list_swapp" maxlength="12" readonly>
                                    </div>
                                </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-3 mb-1"></div>
                                        <div class="col-6">
                                            <div class="datatable datatable-primary">
                                                <div class="table-responsive">
                                                    <table id="tbl_swapp_view_data_list_swapp"
                                                        class="table table-striped table-hover" width="100%">
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endCombined --}}

            <div id="info_in_5">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Masuk (Revisi SJ)</h5>
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
                                        <input type="text" name="sles_no_view_data_list_revisi_sj" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_view_data_list_revisi_sj" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>In / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="in_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="in_view_data_list_revisi_sj" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_list_revisi_sj" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_view_data_list_revisi_sj" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_view_data_list_revisi_sj" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="rak_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_view_data_list_revisi_sj" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_view_data_list_revisi_sj" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_view_data_list_revisi_sj" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Time</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_time_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_time_view_data_list_revisi_sj" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Location</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_location_view_data_list_revisi_sj"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_location_view_data_list_revisi_sj" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-5 mb-1">
                                        <textarea name="ket_view_data_list_revisi_sj" class="form-control form-control-sm"
                                            id="ket_view_data_list_revisi_sj" cols="50" rows="2"
                                            style="outline: 1px solid #b3cee5;" readonly></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="datatable datatable-primary">
                                            <div class="table-responsive">
                                                <table id="tbl_view_revisi_sj"
                                                    class="table table-striped table-hover" width="100%">
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
            {{-- endCombined --}}


            <div id="info_in_6">
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
                                        <input type="text" name="sles_no_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_view_data_list_sj_temporary" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>In / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="in_view_data_list_sj_temporary"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="in_view_data_list_sj_temporary" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_list_sj_temporary"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_list_sj_temporary" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_view_data_list_sj_temporary" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="driver_view_data_list_sj_temporary" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="kd_sup_view_data_list_sj_temporary" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_view_data_list_sj_temporary" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="rak_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_view_data_list_sj_temporary" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="bok_view_data_list_sj_temporary" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="palet_view_data_list_sj_temporary" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Time</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_time_view_data_list_sj_temporary"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_time_view_data_list_sj_temporary" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Location</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_location_view_data_list_sj_temporary"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_location_view_data_list_sj_temporary" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-5 mb-2">
                                        <textarea name="ket_view_data_list_sj_temporary" id="ket_view_data_list_sj_temporary" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;" cols="50" rows="2" readonly></textarea>
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
                                                    <table id="tbl_view_sj_temporary"
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

            <div id="info_in_7">
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
                                        <input type="text" name="sles_no_view_data_list_sample" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_view_data_list_sample" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>In / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="in_view_data_list_sample"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="in_view_data_list_sample" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_list_sample"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_list_sample" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_view_data_list_sample" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_view_data_list_sample" maxlength="12" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_view_data_list_sample" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="driver_view_data_list_sample" maxlength="15" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Kd sup / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="kd_sup_view_data_list_sample" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="kd_sup_view_data_list_sample" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_view_data_list_sample" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_view_data_list_sample" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Time</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_time_view_data_list_sample"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_time_view_data_list_sample" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Docking Location</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="docking_location_view_data_list_sample"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="docking_location_view_data_list_sample" maxlength="12" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- endCombined --}}


            <div id="info_out_1">
                <hr>
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Keluar (Bawa Barang)</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Out / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="out_view_data_detail_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="out_view_data_detail_material" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_detail_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_detail_material" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="rak_view_data_detail_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_view_data_detail_material" min="0" max="9999" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_view_data_detail_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_view_data_detail_material" min="0" max="9999" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_view_data_detail_material"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_view_data_detail_material" min="0" max="9999" readonly>
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
                                                    <table id="tbl_material_view_data_detail_material"
                                                        class="table table-striped table-bordered table-hover"
                                                        width="100%">
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

            <div id="info_out_2">
                <hr>
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Keluar (Bawa Rak Box)</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Out / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="out_view_data_detail_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="out_view_data_detail_rak_box" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_detail_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_detail_rak_box" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sj No / Date Sj</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="no_sj_view_data_detail_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_sj_view_data_detail_rak_box" maxlength="15" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_sj_view_data_detail_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_sj_view_data_detail_rak_box" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="rak_view_data_detail_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_view_data_detail_rak_box" min="0" max="9999" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_view_data_detail_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_view_data_detail_rak_box" min="0" max="9999" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_view_data_detail_rak_box"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_view_data_detail_rak_box" min="0" max="9999" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endCombined --}}

            <div id="info_out_3">
                <hr>
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Keluar (Kosong)</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Out / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="out_view_data_detail_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="out_view_data_detail_kosong" maxlength="12" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_view_data_detail_kosong"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_view_data_detail_kosong" maxlength="12" readonly>
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
