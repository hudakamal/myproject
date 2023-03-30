@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Flight Info') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('stored') }}" enctype="multipart/form-data" id="myForm">
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
                            <span id="name-error"></span>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" name="date" class="form-control" date="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                            </div>
                            <span id="date-error"></span>
                        </div>

                        <div class="row mb-3">
                            <label for="no" class="col-md-4 col-form-label text-md-end">{{ __('Seat No') }}</label>

                            <div class="col-md-6">
                                <input id="no" type="text" class="form-control" name="no" required autocomplete="current-password">
                            <span id="no-error"></span>
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
@push('js')
<script>
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                flight:{
                    required: true,
                    maxlength: 20
                },
                date: {
                    required: true,
                    date: true
                },
                no: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                }
            },
            messages: {
                flight:{
                    required: "First name is required",
                    maxlength: "First name cannot be more than 20 characters"
                },
                date:{
                    required: "Date is required",
                    date: "Date should be a valid date"
                },
                no:{
                    required: "Seat No is required"
                }
            }
        });
    });
</script>
@endpush