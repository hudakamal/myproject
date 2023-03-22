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
      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
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
        <!-- <small>Donec id elit non mi porta.</small> -->
      </a>
      @endforeach
    </div>
  </div>


</body>
</html>
@endsection