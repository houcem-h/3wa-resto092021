@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{session('success')}}
    </div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
          <th scope="col">Booker</th>
          <th scope="col">Phone</th>
          <th scope="col">Booking date</th>
          <th scope="col">Booking time</th>
          <th scope="col">Number of seats</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td> {{ $booking->user->name }}</td>
          <td> {{ $booking->user->phone }}</td>
          <td> {{ $booking->booking_date->format('d/m/Y') }}</td>
          <td> {{ date('H:i', strtotime($booking->booking_time)) }}</td>
          <td> {{ $booking->number_of_seats }}</td>
          <td>
              <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning">Edit</a>
              <a href="" class="btn btn-danger">Delete</a>

          </td>
        </tr>
    </tbody>
</table>
@endsection
