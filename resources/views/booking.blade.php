@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Flight | Booking</title>
  </head>
  <body>
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
  </body>
</html>
@endsection