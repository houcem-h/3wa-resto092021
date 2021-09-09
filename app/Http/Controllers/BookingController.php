<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coming_bookings = Auth::user()->bookings()->comingBookings()->orderBy('booking_date')->get();
        $passed_bookings = Auth::user()->bookings()->passedBookings()->orderBy('booking_date', 'desc')->get();
        return view('booking.index', [
            'coming_bookings' => $coming_bookings,
            'passed_bookings' => $passed_bookings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        $booking = new Booking();
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->number_of_seats = $request->number_of_seats;
        $booking->user_id = Auth::id();
        $booking->save();
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::with('user')->find($id);
        return view('booking.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('booking.edit', ['booking' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate($this->validationRules());
        // solution 1
        // $booking->booking_date = $request->booking_date;
        // $booking->booking_time = $request->booking_time;
        // $booking->number_of_seats = $request->number_of_seats;
        // $booking->save();
        // solution 2: Mass assignment
        $booking->update($request->all());
        return redirect()->route('bookings.show', $booking->id)->with('success', 'Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully');
    }

    private function validationRules()
    {
        return [
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required',
            'number_of_seats' => 'required|integer|min:1|max:12',
        ];
    }
}
