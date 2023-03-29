@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Flight Info') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('stored') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="flight" class="col-md-4 col-form-label text-md-end">{{ __('Flight') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" name="flight" id="flight" class="form-control @error('flight') is-invalid @enderror" flight="flight" value="{{ old('flight') }}" required autocomplete="flight" autofocus>
                                <option>- Please Choose -</option>
                                @foreach($flights as $flight)
                                  <option value="{{$flight->id}}">{{$flight->name}}</option>
                                @endforeach
                              </select>
                                @error('flight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" name="date" class="form-control @error('date') is-invalid @enderror" date="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no" class="col-md-4 col-form-label text-md-end">{{ __('Seat No') }}</label>

                            <div class="col-md-6">
                                <input id="no" type="text" class="form-control @error('no') is-invalid @enderror" name="no" required autocomplete="current-password">

                                @error('no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="file_path" class="col-md-4 col-form-label text-md-end">{{ __('Select file') }}</label>

                            <div class="col-md-6">
                                <input id="file_path" type="file" class="form-control @error('file_path') is-invalid @enderror" name="file_path" accept="application/pdf" required>

                                @error('file_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection