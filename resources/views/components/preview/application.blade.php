<button id="btn{{$application->id}}" type="button" class="list-group-item list-group-item-action clearfix rounded"
    data-toggle="modal" data-target="#modal{{$application->id}}">

    <div class="row">
        <div class="col-2">
            {{ $application->applier_name }}
        </div>
        <div class="col-4">
            {{ $application->start_date }} @if ($application->end_date)
            - {{ $application->end_date }}
            @endif
        </div>
        <div class="col-6">
            {{ $application->reason }}
        </div>
    </div>
</button>
