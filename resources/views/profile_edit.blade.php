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
    <form method="post" action="{{ route('edit', ['user' => Auth::id()]) }}" enctype="multipart/form-data">
        @csrf
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" height="250" width="250" src="@if($user->avatar_path == null) {{ asset('storage/avatars/default-avatar.jpg') }}  @else {{ asset('storage/avatars/'.$user->avatar_path) }} @endif" id="image_preview_container">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Edit Profile') }}
                </div>

                <div class="card-body">  
                        <div class="mb-3">
                            <label for="avatar_path" class="form-label">{{ __('Avatar') }}</label>
                            <input id="avatar_path" type="file" class="form-control @error('success') is-invalid @enderror" name="avatar_path" value="{{ old('avatar_path') }}" autocomplete="avatar_path">
  
                                @error('success')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>                      
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <!-- Add more fields as needed -->
                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</body>
</html>
@endsection