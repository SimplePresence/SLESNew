<div style="text-align: center; ">
    <div class="btn-group">
    <button type="button" class="btn btn-xs btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-search"></i>
    </button>
            <div class="dropdown-menu">
                <a href="#" style="color: black;" data-toggle="tooltip" row-id="{{ $model->sles_no }}" row-infoIn="{{ $model->info_in }}" data-placement="top" title="View" class="dropdown-item createOut_View"><i class="ti-eye"></i> View</a>
                {{-- <a href="#" style="color: black;" data-toggle="tooltip" row-id="{{ $model->sles_no }}" data-placement="top" title="Edit" class="dropdown-item editViewOut"> <i class="ti-pencil-alt"></i> Edit</a> --}}
                <a href="#" style="color: #218838;" data-toggle="tooltip" row-id="{{ $model->sles_no }}" row-nopol="{{ $model->no_pol }}" row-name="{{ $model->name_sup }}" data-placement="top" title="Bawa Barang" class="dropdown-item OutBawaBarang"> <i class="ti-truck"></i><font>  | BAWA BARANG</font></a>
                <a href="#" style="color: #E0A800;" data-toggle="tooltip" row-id="{{ $model->sles_no }}" row-nopol="{{ $model->no_pol }}" row-name="{{ $model->name_sup }}" data-placement="top" title="Bawa Rak Box" class="dropdown-item OutBawaBox"> <i class="ti-truck"></i><font>  | BAWA RAK BOX</font></a>
                <a href="#" style="color: #C82333;" data-toggle="tooltip" row-id="{{ $model->sles_no }}" row-nopol="{{ $model->no_pol }}" row-name="{{ $model->name_sup }}" data-placement="top" title="Kosong" class="dropdown-item OutKosong"> <i class="ti-truck"></i><font>  | KOSONG</font></a>
            </div>
    </div>
</div>
