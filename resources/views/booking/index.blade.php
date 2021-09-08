@extends('layouts.app')

@section('content')
    <h3>Bookings list</h3>
    <ul class="list-group">
        @foreach ($bookings as $item)
            <li class="list-group-item list-group-item-action">
                Your bookings will be for the <strong>{{ $item->booking_date }}</strong>
                at <strong>{{ $item->booking_time }}</strong>
                for <strong>{{ $item->number_of_seats }}</strong> persons.
            </li>
        @endforeach
    </ul>
@endsection
