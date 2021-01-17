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
            <div class="card">
                <div class="card-header">
                    <span>Unread Notifications</span>
                    <span class="float-right"><a href="{{ route('markAsRead') }}">Mark all as read</a></span><br>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group">
                        @forelse (Auth::user()->UnreadNotifications as $notification)
                        <li class="list-group-item">{{ $notification->data['data'] }}</li>
                        @empty
                        <li class="list-group-item">No New Notifications</li>                        
                        @endforelse
                    </ul>
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
