<div class="modal fade" id="edit-modal-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-user" method="post" action="javascript:void(0)">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id_user" id="id_user_edit">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">NIK:</label>
                        <input type="number" name="nik" class="form-control" id="nik_edit" readonly>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" id="nama_edit">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email_edit">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="text" name="password" class="form-control" id="password_edit">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Role:</label>
                        <select class="form-control" name="role" id="role_edit">
                            <option value="" selected>---Pilih---</option>
                            <option value="0" selected> User </option>
                            <option value="1" selected> Admin </option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submit_user_edit" class="btn btn-primary">Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>
