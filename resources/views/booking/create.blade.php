@extends('layouts.app')

@section('content')
    <fieldset>
        <legend>New Booking</legend>
        <form action="{{ route('bookings.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="booking_date">Booking Date</label>
                        <input type="date" name="booking_date" id="booking_date" class="form-control @error('booking_date'){{ 'is-invalid' }}@enderror" value="{{ old('booking_date') }}" >
                        @error('booking_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="booking_time">Booking time</label>
                      <input type="time" name="booking_time" id="booking_time" class="form-control @error('booking_time'){{ 'is-invalid' }}@enderror" value="{{ old('booking_time') }}" >
                      @error('booking_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="seats_nbr">Number of seats</label>
                      <input type="number" name="number_of_seats" min="1" max="20" id="seats_nbr" class="form-control @error('number_of_seats'){{ 'is-invalid' }}@enderror" value="{{ old('number_of_seats') }}" >
                      @error('number_of_seats')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-outline-primary btn-block">Book now !</button>
            </div>
        </form>
    </fieldset>
@endsection
