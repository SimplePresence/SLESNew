<div class="modal fade bd-example-modal-lg modal-out-rakbox" data-backdrop="static" id="modal-out-rakbox"
    data-keyboard="false" style="z-index: 1041" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supplier Keluar (Bawa Rak Box)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <form id="form-out-rakbox" method="post" action="javascript:void(0)">
                                @csrf
                                @method('POST')
                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sles No</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="sles_no_out_rakbox" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="sles_no_out_rakbox" maxlength="12" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>No Pol / Nama supplier</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="no_pol_out_rakbox" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="no_pol_out_rakbox" readonly>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <input type="text" name="nama_sup_out_rakbox" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="nama_sup_out_rakbox" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Sj No / Date Sj</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="no_sj_out_rakbox" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="no_sj_out_rakbox" maxlength="15">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="text" name="date_sj_out_rakbox" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="date_sj_out_rakbox">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1 mb-1"></div>
                                    <div class="col-2 mb-1">
                                        <label>Rak / Box / Palet</label>
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="rak_out_rakbox" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                            id="rak_out_rakbox" placeholder="RAK" min="0" max="9999">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="bok_out_rakbox" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="bok_out_rakbox" placeholder="BOX"  min="0" max="9999">
                                    </div>
                                    <div class="col-2 mb-2">
                                        <input type="number" name="palet_out_rakbox" class="form-control form-control-sm" style="outline: 1px solid #b3cee5;"
                                        id="palet_out_rakbox" placeholder="PALET"  min="0" max="9999">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit_out_rakbox" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
$(function () {
  const $input = $('#date_sj_out_rakbox');

  function updateDateTime() {
    const now = moment().format("YYYY-MM-DD");
    $input.val(now);
  }

  // On page load set datetime and disable input interaction
  updateDateTime();
  $input.prop('readonly', true).css('pointer-events', 'none');

  // Update datetime on modal show and hide
  $('#modal-out-rakbox').on('show.bs.modal hidden.bs.modal', function () {
    updateDateTime();
  });
});



</script>
