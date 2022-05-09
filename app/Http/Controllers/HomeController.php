<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationDetailResource;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reservations = Reservation::with('rooms')->where('email', Auth::user()->email)->get();
        return view('home.home', compact('reservations'));
    }

    public function getReservationDetails(Request $request)
    {
        return new ReservationDetailResource(Reservation::findOrFail($request->id));
    }
}
