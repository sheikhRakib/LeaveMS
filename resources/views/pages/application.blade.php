@extends('layouts.app')

@section('content')
<main class="container">
    <div class="card col-md-6 mx-auto px-0">
        <div class="card-header">
            <h1 class="text-center">Leave Application</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ Route('store') }}">
                @csrf

                <!-- Date From -->
                <div class="form-group row">
                    <label for="dates" class="col-md-3 col-form-label text-md-right text-md">Date</label>

                    <div class="col-md-9" id="dates">
                        <div class="col-md-8">
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                id="start_date" name="start_date" value="{{ old('start_date') }}"
                                area-describedby="DateFromHelp">
                            @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <span class="col-md-8 form-control w-100 text-center border-0">To</span>
                        <div class="col-md-8">
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                                name="end_date" value="{{ old('end_date') }}" aria-describedby="dateToHelp">
                            <small id="dateToHelp" class="form-text text-muted text-center">Optional. Click to get leave
                                more
                                than one day.</small>
                            @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>


                    </div>
                </div>
                <!-- ./Date From -->

                <!-- Reason -->
                <div class="form-group row">
                    <label for="reason" class="col-md-3 col-form-label text-md-right text-md">Reason</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason"
                            name="reason" placeholder="i.e. Due to sickness" value="{{ old('reason') }}">
                        @error('reason')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- ./Reason -->


                <!-- Type -->
                <div class="form-group row">
                    <label for="leave_type" class="col-md-3 col-form-label text-md-right text-md">Leave Type</label>
                    <div class="col-md-9">
                        <select class="form-control @error('leave_type') is-invalid @enderror" id="leave_type"
                            name="leave_type">
                            <option value="" disabled hidden selected>Select</option>
                            @foreach ($leaveTypes as $leaveType)
                            <option value="{{ $leaveType->id }}">{{ $leaveType->type }}</option>
                            @endforeach
                        </select>
                        @error('leave_type')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- ./Type -->


                <!-- ./Information -->
                <div class="form-group row">
                    <label for="information" class="col-md-3 col-form-label text-md-right text-md">      Information</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="information" name="information" rows="5"
                            placeholder="Justify your reason"></textarea>
                    </div>
                </div>
                <!-- ./Information -->

                <button type="submit" class="btn btn-primary float-right">Submit</button>

            </form>
        </div>
    </div>

    </div>

</main>
@endsection
