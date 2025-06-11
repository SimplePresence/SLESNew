<div class="modal fade bd-example-modal-lg modal-out-material" data-backdrop="static" id="modal-out-material"
    data-keyboard="false" style="z-index: 1041" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supplier Keluar (Bawa Barang)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card">
                            <form id="form-out-material" method="post" action="javascript:void(0)">
                                @csrf
                                @method('POST')
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_out_material" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_out_material" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="no_pol_out_material" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="no_pol_out_material" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_out_material" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_out_material" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="rak_out_material" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_out_material" placeholder="RAK" min="0" max="9999">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_out_material" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="bok_out_material" placeholder="BOX"  min="0" max="9999">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_out_material" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="palet_out_material" placeholder="PALET"  min="0" max="9999">
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
                                                    <table id="tbl_out_material_sj"
                                                        class="table table-striped table-bordered table-hover" width="100%">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th width="50%">Sj No</th>
                                                                <th width="30%">Date Sj</th>
                                                                <th width="20%">
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Tambah Sj No" class="btn btn-success btn-xs" id="addRowOutMaterial">
                                                                        <i class="ti-plus"></i>
                                                                    </button>
                                                                </th>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit_out_material" class="btn btn-success">Save</button>
                <input type="hidden" id="jml_row_out_material_sj" name="jml_row_out_material_sj" value="">
            </div>
        </div>
    </div>
</div>
