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
  <div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a href="javascript:void(0)" class="btn btn-success mb-2" id="new-customer" data-toggle="modal"><i class="fa fa-plus"></i> New Profile</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
<div class="modal fade" id="crud-modal" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerCrudModal"></h4>
      </div>
      <div class="modal-body">
        <form name="custForm" action="" method="POST">
        @csrf
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" required>
            @error('name')
              <span class="text-danger">{{$message}}</span>
            @enderror  
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Code:</strong>
            <input type="text" name="code" id="code" class="form-control" placeholder="Code" onchange="validate()" required>
            @error('code')
              <span class="text-danger">{{$message}}</span>
            @enderror              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Price:</strong>
            <input type="text" name="price" id="price" class="form-control" placeholder="price" onchange="validate()" required>
            @error('price')
              <span class="text-danger">{{$message}}</span>
            @enderror              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="btn-save" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Action</th>
      <th scope="col">Book</th>
    </tr>
  </thead>
  @foreach ($flights as $flight)
    <tbody>
    <tr style="border:1px solid black">
    <td>{{ $flight->id }}</td>
    <td>{{ $flight->name }}</td>
    <td>{{ $flight->code }}</td>
    <td><a href = "{{ route('edit',$flight->id)}}"><i class="fa fa-pencil"></i></a> | <a href = 'delete/{{ $flight->id }}'><i class="fa fa-trash" style="color:red;"></a></td>
    <td><a href= "{{ route('booking',$flight->id)}}">Booking</td>
    </tr>
    </tbody>
    @endforeach

</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<script>
  $(document).ready(function () {
    $('#new-customer').click(function () {
    $('#btn-save').val("create-customer");
    $('#customer').trigger("reset");
    $('#customerCrudModal').html("Add New Profile");
    $('#crud-modal').modal('show');
    });
  });
</script>
@endsection