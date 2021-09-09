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
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>

          </td>
        </tr>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        Are you sure to delete your booking ?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-danger"
            onclick="event.preventDefault();
            document.querySelector('#deleteForm').submit();">Confirm delete</button>
        </div>
        <form id="deleteForm" action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    </div>
</div>
@endsection
