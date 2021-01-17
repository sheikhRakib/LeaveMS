@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body px-0">
                    <div class="card-title text-center">
                        <span>Hello,</span>
                        <span class="display-5 font-italic">{{ Auth::user()->name }}</span>
                    </div>

                    <hr>
                    <a href="{{ route('notificationView') }}" class="btn btn-secondary btn-block">
                        <span>Notifications</span>
                        @php $cn = count(Auth::user()->Unreadnotifications) @endphp
                        @if($cn)<span class="badge badge-primary badge-pill">{{ $cn }}</span> @endif
                    </a>
                    @can('application.create')
                    <a href="{{ Route('applyView') }}" class="btn btn-secondary btn-block">Leave Application</a>
                    @endcan
                    @can('application.authorize')
                    <a href="{{ Route('actionView') }}" class="btn btn-secondary btn-block">Actions</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-md-9 mb-5">
            <div class="card mb-4">
                <div class="card-header display-5">Application Data</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-3 mb-3">
                            <div class="card text-center">
                                <div class="card-header">Total</div>
                                @php
                                $total = 0;
                                foreach($leaveStat as $ls) $total += $ls;
                                @endphp
                                <div class="card-body">{{ $total }}</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">

                            <div class="card text-center">
                                <div class="card-header">Pending</div>
                                <div class="card-body">{{ $leaveStat['pending'] ?? 0 }}</div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 mb-3">
                            <div class="card text-center">
                                <div class="card-header">Approved</div>
                                <div class="card-body">{{ $leaveStat['approved'] ?? 0 }}</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="card text-center">
                                <div class="card-header">Rejected</div>
                                <div class="card-body">{{ $leaveStat['rejected'] ?? 0 }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                Leave Balance
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Allowance Per Year (days)</th>
                                        <th>Used (days)</th>
                                        <th>Remaining (days)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($types as $type)
                                    <tr>
                                        <td>{{ $type->type }}</td>
                                        <td>{{ $type->days }}</td>
                                        <td>{{ $leaveCount[$type->type] }}</td>
                                        <td>{{ $type->days - $leaveCount[$type->type] }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">No Data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header pb-0">
                    <span class="display-5">My Applications</span>
                    <span class="float-right">{{ $myApplications->links('pagination.bootstrap-4') }}</span><br>

                </div>
                <div class="card-body p-0">
                    <div class="list-group" id="applications">
                        @forelse ($myApplications as $application)
                        <x-preview.ownApplication :application="$application" />
                        <x-modal.ownApplication :application="$application" />
                        @empty
                        <div class="d-block px-3">No applications yet</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('css')
<style>
    .display-5 {
        font-size: 1.5rem !important;
    }

</style>
@endpush
