<div class="modal fade" id="edit-modal-data-view-out" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-view-out" method="post" action="javascript:void(0)">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id_data_view_out" id="id_data_view_out">
                    <div class="form-row">
                        <div class="col-3 mb-1">
                            <label>No PO</label>
                        </div>
                        <div class="col-7 mb-3">
                            <input type="text" name="po_view_out" class="form-control form-control-sm custominput"
                                id="po_view_out" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3 mb-1">
                            <label>Nama Sup</label>
                        </div>
                        <div class="col-7 mb-3">
                            <input type="text" name="suplier_view_out" class="form-control form-control-sm custominput"
                                id="suplier_view_out" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3 mb-1">
                            <label>Date Create</label>
                        </div>
                        <div class="col-7 mb-3">
                            <input type="text" name="date_view_out" class="form-control form-control-sm custominput"
                                id="date_view_out" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3 mb-1">
                            <label>In</label>
                        </div>
                        <div class="col-7 mb-3">
                            <input type="text" name="in_view_out" class="form-control form-control-sm custominput"
                                id="in_view_out" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3 mb-1">
                            <label>No Sj</label>
                        </div>
                        <div class="col-7 mb-3">
                            <input type="text" name="no_sj_view_out" class="form-control form-control-sm custominput"
                                id="no_sj_view_out" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3 mb-1">
                            <label>Tgl Sj</label>
                        </div>
                        <div class="col-7 mb-3">
                            <input type="text" name="date_sj_view_out" class="form-control form-control-sm custominput"
                                id="date_sj_view_out" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3 mb-1">
                            <label>No Pol</label>
                        </div>
                        <div class="col-7 mb-3">
                            <input type="text" name="no_pol_view_out" class="form-control form-control-sm custominput"
                                id="no_pol_view_out">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-3 mb-1">
                            <label>Driver</label>
                        </div>
                        <div class="col-7 mb-3">
                            <input type="text" name="driver_view_out" class="form-control form-control-sm custominput"
                                id="driver_view_out" readonly>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit_view_out_edit" class="btn btn-primary">Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>
