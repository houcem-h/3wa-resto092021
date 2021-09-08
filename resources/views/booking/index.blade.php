@extends('layouts.app')

@section('content')
    <h3>Bookings list</h3>
    <div class="row">
        <div class="col-md-6">
            <h5>Coming bookings</h5>
            <ul class="list-group">
                @foreach ($coming_bookings as $item)
                        <li class="list-group-item list-group-item-action">
                            Booking will be <strong>{{ $item->booking_date->format('l, F jS Y') }}</strong>
                            at <strong>{{date('H:i',strtotime($item->booking_time))}}</strong>
                            <span class="badge badge-primary badge-pill float-right">{{ $item->number_of_seats }} persons</span>
                        </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h5>Passed bookings</h5>
            <ul class="list-group">
                @foreach ($passed_bookings as $item)
                <li class="list-group-item list-group-item-action">
                    Booking was for the <strong>{{ $item->booking_date->format('l, F jS Y') }}</strong>
                    at <strong>{{date('H:i',strtotime($item->booking_time))}}</strong>
                    <span class="badge badge-primary badge-pill float-right">{{ $item->number_of_seats }} persons</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
