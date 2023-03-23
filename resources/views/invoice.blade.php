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
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif

  <div style="margin: 0 auto;width: 80%;"><strong>ID #{{ $booking->id }}</strong></div>
  <div class="bs-example"  style="margin: 0 auto;width: 80%;">
    <div class="d-flex justify-content-between">
      <div>{{ $booking->customer->name }}</div>
      <div>Invoice Date:{{ $booking->customer->created_at }}</div>
    </div>
  </div>


  <br>
  <table class="table dt-responsive nowrap">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Seat No</th>
        <th scope="col">Price</th>
      </tr><!--NURUL HUDA ALIYA BINTI MOHD KAMAL huda_aliya-->
    </thead>
    <tbody>   
      <tr>
        <th scope="row">1</th>
        <td>{{ $booking->flight->name }}</td>
        <td>{{ $booking->seatNo }}</td>
        <td>{{ $booking->seatNo*$booking->flight->price }}</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Tax</td>
        <td>-</td>
        <td>160</td>
        <tr>
          <td colspan="3" class="text-end">Total Price :</td>
          <td>RM {{ $booking->seatNo*$booking->flight->price+160 }}</td>
        </tr>
      </tbody>
    </table>
    <div class="text-center">
      <button type="button" class="btn btn-outline-success" onclick="window.print()" >Print</button>&nbsp
      <button  class="btn btn-success text " onclick="window.location='{{ URL::route('flight'); }}'">
        Save
      </button>
    </div>
  </body>
  </html>
  @endsection