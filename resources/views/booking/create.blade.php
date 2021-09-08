@extends('layouts.app')

@section('content')
    <fieldset>
        <legend>New Booking</legend>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="booking_date">Booking Date</label>
                        <input type="date" name="booking_date" id="booking_date" class="form-control" placeholder="" >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="booking_time">Booking time</label>
                      <input type="time" name="booking_time" id="booking_time" class="form-control" placeholder="" >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="seats_nbr">Number of seats</label>
                      <input type="number" name="seats_nbr" min="1" max="20" id="seats_nbr" class="form-control" placeholder="" >
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-outline-primary btn-block">Book now !</button>
            </div>
        </form>
    </fieldset>
@endsection
