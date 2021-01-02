@extends('layouts.app')

@section('content')
<main class="container">
    <div class="card col-md-6 mx-auto px-0">
        <div class="card-header">
            <h1 class="text-center">Leave Application</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="#">
                @csrf

                <!-- Date From -->
                <div class="form-group row">
                    <label for="date_from" class="col-md-3 col-form-label text-md-right text-md">Date</label>

                    <div class="col-md-9">
                        <div class="col-md-8">
                            <input type="date" class="form-control @error('date_from') is-invalid @enderror"
                                id="date_from" name="date_from" value="{{ old('date_from') }}"
                                area-describedby="DateFromHelp">
                            @error('date_from')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <span class="col-md-8 form-control w-100 text-center border-0">To</span>
                        <div class="col-md-8">
                            <input type="date" class="form-control @error('date_to') is-invalid @enderror" id="date_to"
                                name="date_to" value="{{ old('date_to') }}" aria-describedby="dateToHelp">
                            <small id="dateToHelp" class="form-text text-muted text-center">Optional. Click to get leave
                                more
                                than one day.</small>
                            @error('date_to')
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
                            @foreach ($maxLeaveInfos as $maxLeave)
                            <option value="{{ $maxLeave->id }}">{{ $maxLeave->leave_type }}</option>
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


                <!-- ./Additional Info -->
                <div class="form-group row">
                    <label for="adinfo" class="col-md-3 col-form-label text-md-right text-md">Additional
                        Information</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="adinfo" name="adinfo" rows="5"
                            placeholder="Additional Information"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right">Submit</button>

            </form>
        </div>
    </div>

    </div>

</main>
@endsection
