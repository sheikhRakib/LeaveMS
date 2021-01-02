@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center">
                        <span>Hello,</span>
                        <span class="text-primary font-italic">{{ Auth::user()->name }}</span>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-secondary btn-block">Notifications</a>
                    <a href="{{ Route('applyView') }}" class="btn btn-secondary btn-block">Leave Application</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card">
                    <div class="card-header">dsa</div>
                    <div class="card-body">sad</div>
                </div>
            </div>
        </div>
    </div>


</main>
@endsection
