<div style="text-align: center; ">
    <div class="btn-group">
    <button type="button" class="btn btn-xs btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-search"></i>
    </button>
          <div class="dropdown-menu">
            <a href="#" style="color: black;" data-toggle="tooltip" row-id="{{ $model->sles_no }}" row-InfoIn="{{ $model->info_in }}" row-InfoOut="{{ $model->info_out }}" data-placement="top" title="View" class="dropdown-item ViewView"> <i class="ti-eye"></i> View</a>

            @if ($model->info_out == '1')
                <a href="#" style="color: black;" data-toggle="tooltip" row-id="{{ $model->sles_no }}" row-infoOut="{{ $model->info_out }}" data-placement="top" title="Edit Out" class="dropdown-item EditView"> <i class="ti-pencil"></i> Edit Out</a>
            @endif

            @if ($model->status_out == '0')
                <a href="#" style="color: black;" data-toggle="tooltip" row-id="{{ $model->sles_no }}" data-placement="top" title="Void" class="dropdown-item destroyView"> <i class="ti-trash"></i> Void</a>
            @endif
        </div>
    </div>
</div>
