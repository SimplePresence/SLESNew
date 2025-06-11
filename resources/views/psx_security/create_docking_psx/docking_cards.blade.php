@php
    $dockNames = [
        1 => 'Surface Finish',
        2 => 'Raw Material',
        3 => 'OHP',
        4 => 'OHP',
        5 => 'Consumable',
    ];
@endphp

<div class="row" style="margin-left: 0px; margin-right: 0px;">
    @foreach ($dockNames as $dock => $name)
        @php
            $dockEntry = $dockingList->firstWhere('docking_location', $dock);
            $status = 'Available';
            $bgColor = 'bg-success';
            $sles = '';
            $no_pol = '';

            if ($dockEntry) {
                if (is_null($dockEntry->out)) {
                    $status = 'In Progress';
                    $bgColor = 'bg-warning';
                    $sles = $dockEntry->sles_no;
                    $no_pol = $dockEntry->no_pol;
                } else {
                    $status = 'Finished';
                    $bgColor = 'bg-secondary';
                    $sles = $dockEntry->sles_no;
                    $no_pol = $dockEntry->no_pol;
                }
            }
        @endphp

        <div class="col-md-4 mb-4">
            <div class="card {{ $bgColor }}">
                <div class="card-body">
                    <h5 class="card-title">Docking {{ $dock }} – {{ $name }}</h5>
                    <p class="card-text status-text">Status: {{ $status }}</p>
                    @if($sles)
                        <p class="card-text">SLES No: {{ $sles }}</p>
                        <p class="card-text">No Polisi: {{ $no_pol }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
