@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
</div>
@endif

@if (session('failed'))
<div class="alert alert-danger" role="alert">
  {{ session('failed') }}
</div>
@endif

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a href="" class="btn btn-primary mb-2" id="new-customer" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i> New Flight</a>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerCrudModal"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="custForm" action="" method="POST" id="insertForm">
          @csrf
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror  
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" id="code" class="form-control" placeholder="Code" required>
                @error('code')
                <span class="text-danger">{{$message}}</span>
                @enderror              
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Price:</strong>
                <input type="text" name="price" id="price" class="form-control" placeholder="price" required>
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror              
              </div>
            </div>
          </div>         
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="btn-save" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Price</th>
      <th scope="col">Book</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach ($flights as $key => $flight)
  <tbody>
    <tr style="border:1px solid black">
      <td>{{ $key+1 }}</td>
      <td>{{ $flight->name }}</td>
      <td>{{ $flight->code }}</td>
      <td>{{ $flight->price }}</td>
      <td><a href= "{{ route('booking',$flight->id)}}" class="text-decoration-none">Booking</td>
        <td>
          <a href = "#{{$flight->id}}" class="btn btn-success btn-show-booking" data-id="{{$flight->id}}" data-name="{{$flight->name}}" data-code="{{$flight->code}}" data-price="{{$flight->price}}"><i class="fa fa-pencil"></i></a> | <a href = 'delete/{{ $flight->id }}' class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>

  <div id="myModalTest" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Show Flight</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="update-form">
            @csrf
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <input type="show" name="id" id="id1" class="form-control">
                  <strong>Name:</strong>
                  <input type="text" name="name" id="name1" class="form-control" placeholder="Name" value="">
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror  
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Code:</strong>
                  <input type="text" name="code" id="code1" class="form-control" placeholder="Code" value="" required>
                  @error('code')
                  <span class="text-danger">{{$message}}</span>
                @enderror              </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Price:</strong>
                  <input type="text" name="price" id="price1" class="form-control" placeholder="price" value="" required>
                  @error('price')
                  <span class="text-danger">{{$message}}</span>
                  @enderror              
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" id="update-btn" name="btn_submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @push('js')
  <script>
    $(document).ready(function () {
      $('#new-customer').click(function () {
        $('#btn-save').val("create-customer");
        $('#customer').trigger("reset");
        $('#customerCrudModal').html("Add New Flight");
        $('#crud-modal').modal('show');
      });


      $('.btn-show-booking').click(function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var code = $(this).data('code');
        var price = $(this).data('price');

        $("#id1").val(id);
        $('#name1').val(name);
        $('#code1').val(code);
        $('#price1').val(price);

        $('#myModalTest').modal('show');
        return false;
        $.ajax({
          url: '/flight' + id,
          type: 'GET',
          success: function(response) {
            alert(response);
          },
          error: function(jqXHR, textStatus, errorThrown) {
          // Handle error response
            console.error(textStatus, errorThrown);
          }
        });

      });

      $('#update-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
          url: '/flight/update',
          type: 'POST',
          data: formData,
          success: function(response) {
              // Handle success response
            var modalId = "#myModalTest";
            $(modalId).modal("hide");          
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert("please try again");        
          }
        });
      });

      $('#insertForm').submit(function(event) {
        event.preventDefault();
        var formData1 = $(this).serialize();

        $.ajax({
          url: '/flight',
          type: 'POST',
          data: formData1,
          success: function(response) {
              // Handle success response
            var modalId = "#exampleModal";

              // Close modal
            $(modalId).modal("hide");
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert("please try again");        
          }
        });
      });
    });
  </script>
  @endpush