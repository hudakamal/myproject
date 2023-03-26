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

  <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" height="250" width="250" src="@if($user->avatar_path == null) {{ asset('storage/avatars/default-avatar.jpg') }}  @else {{ asset('storage/avatars/'.$user->avatar_path) }} @endif" id="image_preview_container">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Profile') }}
                  <small><a href="{{ route('update') }}" class="text-secondary"><i class="fa fa-pencil"></i>Edit</a></small>
                </div>

                <div class="card-body">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                    <p>{{ $message }}</p>
                  </div>
                  @endif
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                        </div>
                        <!-- Add more fields as needed -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
@endsection