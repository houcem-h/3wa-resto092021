@extends('layouts.app')

@section('content')
    <h3>Bookings list</h3>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <h5>Coming bookings</h5>
                @foreach ($coming_bookings as $item)
                        <li class="list-group-item"><li class="list-group-item list-group-item-action">
                            Your bookings will be for the <strong>{{ date('d/m/Y', strtotime($item->booking_date)) }}</strong>
                            at <strong>{{ $item->booking_time }}</strong>
                            for <strong>{{ $item->number_of_seats }}</strong> persons.
                        </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                <h5>Passed bookings</h5>
                @foreach ($passed_bookings as $item)
                <li class="list-group-item"><li class="list-group-item list-group-item-action">
                    Your bookings will be for the <strong>{{ date('d/m/Y', strtotime($item->booking_date)) }}</strong>
                    at <strong>{{ $item->booking_time }}</strong>
                    for <strong>{{ $item->number_of_seats }}</strong> persons.
                </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
