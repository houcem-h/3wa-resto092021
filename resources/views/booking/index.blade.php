@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{session('success')}}
        </div>
    @endif
    <a href="{{ route('bookings.create') }}" class="btn btn-outline-primary btn-lg float-right">Book now!</a>
    <h3>My bookings list</h3>
    <div class="row">
        <div class="col-md-6">
            <h5>Coming bookings</h5>
            <ul class="list-group">
                @if (count($coming_bookings) > 0)
                    @foreach ($coming_bookings as $item)
                            <li class="list-group-item list-group-item-action">
                                Booking will be <strong>{{ $item->booking_date->format('l, F jS Y') }}</strong>
                                at <strong>{{date('H:i',strtotime($item->booking_time))}}</strong>
                                <span class="badge badge-primary badge-pill float-right">{{ $item->number_of_seats }} persons</span>
                            </li>
                    @endforeach
                @else
                    <li class="list-group-item list-group-item-action">No coming bookings</li>
                @endif
            </ul>
        </div>
        <div class="col-md-6">
            <h5>Passed bookings</h5>
            <ul class="list-group">
                @if (count($passed_bookings) > 0)
                        @foreach ($passed_bookings as $item)
                        <li class="list-group-item list-group-item-action">
                            Booking was for the <strong>{{ $item->booking_date->format('l, F jS Y') }}</strong>
                            at <strong>{{date('H:i',strtotime($item->booking_time))}}</strong>
                            <span class="badge badge-primary badge-pill float-right">{{ $item->number_of_seats }} persons</span>
                        </li>
                        @endforeach
                @else
                    <li class="list-group-item list-group-item-action">No passed bookings</li>
                @endif
            </ul>
        </div>
    </div>

@endsection
