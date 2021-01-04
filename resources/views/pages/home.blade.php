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
                    <a href="#" class="btn btn-secondary btn-block">
                        <span>Notifications</span>
                        <span class="badge badge-primary badge-pill">14</span>
                    </a>
                    <a href="{{ Route('applyView') }}" class="btn btn-secondary btn-block">Leave Application</a>
                    <a href="{{ Route('actionView') }}" class="btn btn-secondary btn-block">Actions</a>
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
                                    foreach($leaveStat as $ls){
                                        $total += $ls;
                                    }
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
