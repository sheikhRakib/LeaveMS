@extends('layouts.app')

@section('content')
<main class="container">
    <div class="card">
        <div class="card-header">
            <span class="display-5">Pending Applications</span>
        </div>
        <div class="card-body">
            @forelse ($applications as $application)
                <x-preview.application :application='$application' />
                <x-modal.application :application='$application' />
            @empty
                <p>No Data Available</p>
            @endforelse
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
