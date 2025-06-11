<div class="modal fade" id="modalKosong" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Kosong</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formKosong">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_pol">No Pol</label>
                            <input type="text" class="form-control" id="no_pol_kosong" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="driver">Driver</label>
                            <input type="text" class="form-control" id="driver_kosong" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="vendor_name">Vendor Name</label>
                            <input type="text" class="form-control" id="vendor_name_kosong" placeholder="Click to select vendor" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vendor_id">Vendor ID</label>
                            <input type="text" class="form-control" id="vendor_id_kosong" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="barang_datetime">Date & Time</label>
                        <div class="input-group date" id="barang_datetime_picker">
                            <input type="date" class="form-control" id="barang_datetime_kosong" placeholder="Select date and time"/>
                        </div>
                    </div>
                </form>

                <div class="text-right mb-3">
                    <button type="button" class="btn btn-success" id="addKosongRow">
                    <i class="fa fa-plus"></i> Add to Table
                    </button>
                </div>


                <hr>

                <table class="table table-bordered mt-3" id="tableDN">
                    <thead class="text-center">
                        <tr>
                            <th>Vendor Name</th>
                            <th>Vendor ID</th>
                            <th>Barang Date</th>
                            <th>No SJ</th>
                            <th>Date SJ</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="kosongItem"></tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveKosong">Save</button>
            </div>
        </div>
    </div>
</div>
