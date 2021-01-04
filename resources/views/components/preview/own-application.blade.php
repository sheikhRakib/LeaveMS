<button id="btn{{$application->id}}" type="button" class="list-group-item list-group-item-action clearfix"
    data-toggle="modal" data-target="#modal{{$application->id}}">
    <span class="float-left">{{ $application->start_date }} @if ($application->end_date)
        - {{ $application->end_date }}
        @endif
    </span>
    @if ($application->status == 'approved')
    <span class="badge badge-pill badge-success float-right">{{ $application->status }}</span>
    @elseif($application->status == 'rejected')
    <span class="badge badge-pill badge-danger float-right">{{ $application->status }}</span>
    @else
    <span class="badge badge-pill badge-dark float-right">{{ $application->status }}</span>
    @endif
</button>
