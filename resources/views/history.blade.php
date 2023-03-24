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
<!--   <style>
  .container{
    border-radius: 12px;  
  }
</style> -->

<title>Hello, world!</title>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-between">
      <h5 class="mb-3">Booking History </h5>
      <span>Total Record: {{$bookings->count()}}</span>
    </div>
    <div class="list-group">
      @foreach ($bookings as $booking)
      <form class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">ID #{{$booking->id}} - {{$booking->flight?->name}}</h5>
          <small>{{$booking->created_at}}</small>
        </div>
        <p class="mb-1">Customer:<br>
          1. {{ $booking->customer?->name }}<br>
        </p>
        <p class="mb-1">Seat No:<br>
          {{ $booking->seatNo }}<br>
        </p>
        <p class="mb-1">Total Price:<br>
          RM {{ $booking->seatNo*$booking->flight->price }}<br>
        </p>
              </form>

      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $booking->id }}">
    {{ $booking->file_path }}
  </button>
    <div class="modal fade" id="exampleModal{{ $booking->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">PDF</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
      <iframe
      src="{{ asset('storage/receipt/booking/'.$booking->file_path) }}"
      frameBorder="0"
      scrolling="auto"
      height="350px"
      width="100%"
  ></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endforeach
    </div>
  </div>



</body>
</html>
@endsection