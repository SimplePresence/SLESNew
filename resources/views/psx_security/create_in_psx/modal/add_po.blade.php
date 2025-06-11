<div class="modal fade bd-example-modal-lg modal-add-in-po" data-backdrop="static" id="modal-add-in-po" tabindex="-1"
    data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supplier Masuk (PO)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mt-1">
                        <div class="card">
                            <form id="form-add-po" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <div class="form-row">
                                <div class="col-1 mb-1"></div>
                                <div class="col-2 mb-1">
                                    <label>Info IN</label>
                                </div>
                                <div class="col-2 mb-2">
                                    <select id="status_in_po" name="status_in_po" class="form-control form-control-sm"
                                        style="outline: 1px solid #b3cee5;">
                                        <option value="">-- PILIH --</option>
                                        <option value="1">BAWA BARANG</option>
                                        <option value="5">REVISI SJ</option>
                                    </select>
                                </div>
                            </div>

                            <div id="in_po_material">
                                <input type="hidden" id="info_in_material_add" name="info_in_material_add">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver (Bawa Barang)</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_material_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_material_add" maxlength="12">
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_material_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_material_add" maxlength="15">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="rak_material_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_material_add" placeholder="RAK" min="0" max="9999">
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="bok_material_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_material_add" placeholder="BOX" min="0" max="9999">
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="palet_material_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_material_add" placeholder="PALET" min="0" max="9999">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-2 mb-1">
                                        <label>Po / kd Sup / Sup / Sj / Date</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="no_po_material_add1"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_po_material_add1" placeholder="NO PO" maxlength="11">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <div class="input-group">
                                            <input type="text" readonly placeholder="CARI SUPPLIER"
                                                autocomplete="off" id="kd_sup_material_add1"
                                                name="kd_sup_material_add1" required
                                                class="form-control form-control-sm"
                                                style="outline: 1px solid #b3cee5;">
                                            <span class="input-group-btn">
                                                <button type="button" id="btnPopUpSupplier1" data-row="" data-id=""
                                                    data-toggle="modal" class="btn btn-info btn-xs">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="nama_sup_material_add1"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_material_add1" placeholder="NAMA SUPPLIER" readonly>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="date" name="date_sj_material_add1"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_sj_material_add1">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <button type="button" id="Add_tbl_po_material_manual"
                                            class="btn btn-xs btn-danger"> + Add PO Manual</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="datatable datatable-primary">
                                            <div class="table-responsive">
                                                <div class="dataTables_scrollBody"
                                                    style="position: relative; overflow: auto; max-height: 350px; width: 100%;">
                                                    <table id="tbl_in_add_material"
                                                        class="table table-striped table-bordered table-hover"
                                                        width="100%">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th width="15%">No Po</th>
                                                                <th width="5%">Status</th>
                                                                <th width="15%">Kd Sup</th>
                                                                <th width="25%">Nama Supplier</th>
                                                                <th width="25%">No Sj</th>
                                                                <th width="10%">Date Sj</th>
                                                                <th width="5%">Action</th>
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
                            {{-- endCombined --}}


                            <div id="in_po_revisi_sj">
                                <input type="hidden" id="info_in_revisi_sj_add" name="info_in_revisi_sj_add">
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Driver (Revisi Sj)</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="text" name="no_pol_revisi_sj_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_pol_revisi_sj_add" maxlength="12">
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="driver_revisi_sj_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="driver_revisi_sj_add" maxlength="15">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="rak_revisi_sj_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_revisi_sj_add" placeholder="RAK" min="0" max="9999">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_revisi_sj_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="bok_revisi_sj_add" placeholder="BOX" min="0" max="9999">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_revisi_sj_add"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="palet_revisi_sj_add" placeholder="PALET" min="0" max="9999">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-5 mb-1">
                                        <textarea name="ket_revisi_sj_add" class="form-control form-control-sm"
                                            id="ket_revisi_sj_add" cols="50" rows="2"
                                            style="outline: 1px solid #b3cee5;"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-2 mb-1">
                                        <label>Po / kd Sup / Sup / Sj / Date</label>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="number" name="no_po_revisi_sj_add1"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="no_po_revisi_sj_add1" placeholder="NO PO" maxlength="11">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <div class="input-group">
                                            <input type="text" readonly placeholder="CARI SUPPLIER"
                                                autocomplete="off" id="kd_sup_revisi_sj_add1"
                                                name="kd_sup_revisi_sj_add1" required
                                                class="form-control form-control-sm"
                                                style="outline: 1px solid #b3cee5;">
                                            <span class="input-group-btn">
                                                <button type="button" id="btnPopUpSupplier5" data-row="" data-id=""
                                                    data-toggle="modal" class="btn btn-info btn-xs">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="nama_sup_revisi_sj_add1"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="nama_sup_revisi_sj_add1" placeholder="NAMA SUPPLIER" readonly>
                                    </div>
                                    <div class="col-2 mb-1">
                                        <input type="date" name="date_sj_revisi_sj_add1"
                                            class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="date_sj_revisi_sj_add1">
                                    </div>
                                    <div class="col-2 mb-1">
                                        <button type="button" id="Add_tbl_po_revisi_sj_manual"
                                            class="btn btn-xs btn-danger"> + Add PO Manual</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="datatable datatable-primary">
                                            <div class="table-responsive">
                                                <div class="dataTables_scrollBody"
                                                    style="position: relative; overflow: auto; max-height: 300px; width: 100%;">
                                                    <table id="tbl_in_add_revisi_sj"
                                                        class="table table-striped table-bordered table-hover"
                                                        width="100%">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th width="15%">No Po</th>
                                                                <th width="5%">Status</th>
                                                                <th width="15%">Kd Sup</th>
                                                                <th width="25%">Nama Supplier</th>
                                                                <th width="25%">No Sj</th>
                                                                <th width="10%">Date Sj</th>
                                                                <th width="5%">Action</th>
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
                                <input type="hidden" id="jml_row_add_revisi_sj" name="jml_row_add_revisi_sj">
                            </div>
                            {{-- endCombined --}}



                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit_add_in_po" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
