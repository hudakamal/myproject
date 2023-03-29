@extends('layouts.app')

@section('content')
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif

  <div class="card">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5 text-center" style="font-size: 30px;">Thank for your purchase</p>
      <div class="row">
        <ul class="list-unstyled">
          <li class="text-black">{{ $booking->customer->name }}</li>
          <li class="text-muted mt-1"><span class="text-black">Invoice</span> #{{ $booking->id }}</li>
          <li class="text-black mt-1">{{ $booking->created_at_formatted }}</li>
        </ul>
        <hr>
        <div class="col-xl-10">
          <p>{{ $booking->flight->name }}</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">RM {{ $booking->seatNo*$booking->flight->price }}
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Service Tax</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">RM 160
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Surcharge</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">RM 300
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="row text-black">

        <div class="col-xl-12">
          <p class="float-end fw-bold">Total: RM {{ ($booking->seatNo*$booking->flight->price)+160+300 }}
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="text-center" style="margin-top: 90px;">
        <u class="text-info">    <button type="button" class="btn btn-outline-primary" onclick="window.print()">Print File</button></u>
        <p>Enjoy your trip to {{ $booking->flight->name }},Have Fun!!</p>
      </div>

    </div>
  </div>
</div>
  @endsection