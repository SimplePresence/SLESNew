<div class="modal fade bd-example-modal-lg modal-add-in-non-po" data-backdrop="static" id="modal-add-in-non-po"
    data-keyboard="false" style="z-index: 1041" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supplier Masuk (NON PO)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card">
                            <form id="form-add-non-po" method="post" action="javascript:void(0)">
                                @csrf
                                @method('POST')
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Info IN</label>
                                    </div>
                                    <div class="col-2 mb-4">
                                        <select id="status_in_non_po" name="status_in_non_po" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;">
                                            <option value="">-- PILIH --</option>
                                            <option value="2">BAWA RAK BOX</option>
                                            <option value="3">KOSONG</option>
                                            <option value="4">TUKAR GULING</option>
                                            <option value="6">SJ SEMENTARA</option>
                                            <option value="7">SAMPLE</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="in_non_po_rak_box">
                                    <input type="hidden" id="info_in_rakbox_add" name="info_in_rakbox_add">
                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>No Pol / Driver (Rak Box)</label>
                                        </div>
                                        <div class="col-2 mb-1">
                                            <input type="text" name="no_pol_rakbok_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="no_pol_rakbok_add" maxlength="12">
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="driver_rakbok_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_rakbok_add" maxlength="15">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Kd sup / Nama supplier</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <div class="input-group">
                                                <input type="text" readonly placeholder="CARI SUPPLIER" autocomplete="off" id="kd_sup_rakbok_add" name="kd_sup_rakbok_add" required class="form-control form-control-sm"
                                                style="outline: 1px solid #b3cee5;">
                                                <span class="input-group-btn">
                                                    <button type="button" id="btnPopUpSupplier2" data-row="" data-id="" data-toggle="modal" class="btn btn-info btn-xs">
                                                    <i class="ti-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="nama_sup_rakbok_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_rakbok_add" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Rak / Box / Palet</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="rak_rakbok_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="rak_rakbok_add" placeholder="RAK" min="0" max="9999">
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="bok_rakbok_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_rakbok_add" placeholder="BOX"  min="0" max="9999">
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="palet_rakbok_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_rakbok_add" placeholder="PALET"  min="0" max="9999">
                                        </div>
                                    </div>
                                </div>
                                {{-- endCombined --}}

                                <div id="in_non_po_kosong">
                                    <input type="hidden" id="info_in_kosong_add" name="info_in_kosong_add">
                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>No Pol / Driver (Kosong)</label>
                                        </div>
                                        <div class="col-2 mb-1">
                                            <input type="text" name="no_pol_kosong_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="no_pol_kosong_add" maxlength="12">
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="driver_kosong_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_kosong_add" maxlength="15">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Kd sup / Nama supplier</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <div class="input-group">
                                                <input type="text" readonly placeholder="CARI SUPPLIER" autocomplete="off" id="kd_sup_kosong_add" name="kd_sup_kosong_add" required class="form-control form-control-sm"
                                                style="outline: 1px solid #b3cee5;">
                                                <span class="input-group-btn">
                                                    <button type="button" id="btnPopUpSupplier3" data-row="" data-id="" data-toggle="modal" class="btn btn-info btn-xs">
                                                    <i class="ti-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="nama_sup_kosong_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_kosong_add" readonly>
                                        </div>
                                    </div>
                                </div>
                                {{-- endCombined --}}

                                <div id="in_non_po_swapp">
                                    <input type="hidden" id="info_in_swapp_add" name="info_in_swapp_add">
                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>No Pol / Driver (Tukar Guling)</label>
                                        </div>
                                        <div class="col-2 mb-1">
                                            <input type="text" name="no_pol_swapp_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="no_pol_swapp_add" maxlength="12">
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="driver_swapp_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_swapp_add" maxlength="15">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Kd sup / Nama supplier</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <div class="input-group">
                                                <input type="text" readonly placeholder="CARI SUPPLIER" autocomplete="off" id="kd_sup_swapp_add" name="kd_sup_swapp_add" required class="form-control form-control-sm"
                                                style="outline: 1px solid #b3cee5;">
                                                <span class="input-group-btn">
                                                    <button type="button" id="btnPopUpSupplier4" data-row="" data-id="" data-toggle="modal" class="btn btn-info btn-xs">
                                                    <i class="ti-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="nama_sup_swapp_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_swapp_add" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Rak / Box / Palet</label>
                                        </div>
                                        <div class="col-2 mb-1">
                                            <input type="number" name="rak_swapp_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="rak_swapp_add" placeholder="RAK" min="0" max="9999">
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="bok_swapp_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_swapp_add" placeholder="BOX"  min="0" max="9999">
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="palet_swapp_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_swapp_add" placeholder="PALET"  min="0" max="9999">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>No Sj / Date Sj</label>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <input type="text" name="no_sj_swapp_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="no_sj_swapp_add" placeholder="NO SJ" maxlength="25">
                                        </div>
                                        <div class="col-2 mb-3">
                                            <input type="date" name="date_sj_swapp_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_sj_swapp_add">
                                        </div>
                                        <div class="col-2 mb-3">
                                            <button type="button" id="Add_tbl_non_po_swapp" class="btn btn-xs btn-success"> + Add</button>
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
                                                        <table id="tbl_in_add_swapp"
                                                            class="table table-striped table-bordered table-hover" width="100%">
                                                            <thead class="text-center">
                                                                <tr>
                                                                    <th width="50%">Sj No</th>
                                                                    <th width="30%">Date Sj</th>
                                                                    <th width="20%">Action</th>
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
                                    <input type="hidden" id="jml_row_add_swapp" name="jml_row_add_swapp">
                                </div>
                                {{-- endCombined --}}


                                <div id="in_non_po_sj_temporary">
                                    <input type="hidden" id="info_in_sj_temporary_add" name="info_in_sj_temporary_add">
                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>No Pol / Driver (Sj Sementara)</label>
                                        </div>
                                        <div class="col-2 mb-1">
                                            <input type="text" name="no_pol_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="no_pol_sj_temporary_add" maxlength="12">
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="driver_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_sj_temporary_add" maxlength="15">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Kd sup / Nama supplier</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <div class="input-group">
                                                <input type="text" readonly placeholder="CARI SUPPLIER" autocomplete="off" id="kd_sup_sj_temporary_add" name="kd_sup_sj_temporary_add" required class="form-control form-control-sm"
                                                style="outline: 1px solid #b3cee5;">
                                                <span class="input-group-btn">
                                                    <button type="button" id="btnPopUpSupplier6" data-row="" data-id="" data-toggle="modal" class="btn btn-info btn-xs">
                                                    <i class="ti-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="nama_sup_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_sj_temporary_add" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Rak / Box / Palet</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="rak_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="rak_sj_temporary_add" placeholder="RAK" min="0" max="9999">
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="bok_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_sj_temporary_add" placeholder="BOX"  min="0" max="9999">
                                        </div>
                                        <div class="col-2 mb-2">
                                            <input type="number" name="palet_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_sj_temporary_add" placeholder="PALET"  min="0" max="9999">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Keterangan</label>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <textarea name="ket_sj_temporary_add" id="ket_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;" cols="50" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>No Sj / Date Sj</label>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <input type="text" name="no_sj_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="no_sj_sj_temporary_add" placeholder="NO SJ" maxlength="25">
                                        </div>
                                        <div class="col-2 mb-3">
                                            <input type="date" name="date_sj_sj_temporary_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_sj_sj_temporary_add">
                                        </div>
                                        <div class="col-2 mb-3">
                                            <button type="button" id="Add_tbl_non_po_temporary" class="btn btn-xs btn-success"> + Add</button>
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
                                                        <table id="tbl_in_add_sj_temporary"
                                                            class="table table-striped table-bordered table-hover" width="100%">
                                                            <thead class="text-center">
                                                                <tr>
                                                                    <th width="50%">Sj No</th>
                                                                    <th width="30%">Date Sj</th>
                                                                    <th width="20%">Action</th>
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
                                    <input type="hidden" id="jml_row_add_sj_temporary" name="jml_row_add_sj_temporary">
                                </div>
                                {{-- endCombined --}}


                                <div id="in_non_po_sample">
                                    <input type="hidden" id="info_in_sample_add" name="info_in_sample_add">
                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>No Pol / Driver (Sample)</label>
                                        </div>
                                        <div class="col-2 mb-1">
                                            <input type="text" name="no_pol_sample_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                                id="no_pol_sample_add" maxlength="12">
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="driver_sample_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_sample_add" maxlength="15">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Kd sup / Nama supplier</label>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <div class="input-group">
                                                <input type="text" readonly placeholder="CARI SUPPLIER" autocomplete="off" id="kd_sup_sample_add" name="kd_sup_sample_add" required class="form-control form-control-sm"
                                                style="outline: 1px solid #b3cee5;">
                                                <span class="input-group-btn">
                                                    <button type="button" id="btnPopUpSupplier7" data-row="" data-id="" data-toggle="modal" class="btn btn-info btn-xs">
                                                    <i class="ti-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="text" name="nama_sup_sample_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_sample_add" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-1 mb-1"></div>
                                        <div class="col-2 mb-1">
                                            <label>Keterangan</label>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <textarea name="ket_sj_sample_add" id="ket_sj_sample_add" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;" cols="50" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- endCombined --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit_add_in_non_po" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#date_suplier").datetimepicker({
            date: moment(),
            format: "YYYY-MM-DD",
            useCurrent: true
        });

</script>
