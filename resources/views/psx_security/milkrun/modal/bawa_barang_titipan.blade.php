<div class="modal fade" id="modalBawaBarang" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Bawa Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formBawaBarang">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_pol">No Pol</label>
                            <input type="text" class="form-control" id="no_pol" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="driver">Driver</label>
                            <input type="text" class="form-control" id="driver" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="vendor_name">Vendor Name</label>
                            <input type="text" class="form-control" id="vendor_name" placeholder="Click to select vendor" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vendor_id">Vendor ID</label>
                            <input type="text" class="form-control" id="vendor_id" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kosong_datetime">Date & Time</label>
                        <div class="input-group date" id="kosong_datetime_picker">
                            <input type="date" class="form-control" id="barang_datetime" placeholder="Select date and time"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dn_number">Scan DN Number</label>
                        <input type="text" class="form-control" id="dn_number" placeholder="Scan DN Number">
                    </div>
                </form>

                <hr>

                <table class="table table-bordered mt-3" id="tableDN">
                    <thead class="text-center">
                        <tr>
                            <th>DN Number</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveBawaBarang">Save</button>
            </div>
        </div>
    </div>
</div>
