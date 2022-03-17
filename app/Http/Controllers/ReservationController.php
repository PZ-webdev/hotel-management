<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Mail\ConfirmReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {   
        $checkRoom = Reservation::where('id_room', $request->id_room)
        ->where('date_end', '>', $request->date_in)
        ->orderBy('date_end', 'desc')
        ->first();

        if(!empty($checkRoom) > 0){
            alert()->error('Uuuups !','Wybrany pokój jest w trakcie rezerwacji do dnia: ' . $checkRoom->date_end);
        }else{          
            $reservation = new Reservation();
            $reservation->id_room    = $request->id_room;
            $reservation->first_name = $request->first_name;
            $reservation->last_name  = $request->last_name;
            $reservation->email      = $request->email;
            $reservation->address    = $request->address;
            $reservation->city       = $request->city;
            $reservation->phone      = $request->phone;
            $reservation->date_start = $request->date_in;
            $reservation->date_end   = $request->date_off;
            $reservation->confirm_code = time(); 
            $reservation->save();
            
            Mail::to('patryk.zaprzala@gmail.com')->send(new ConfirmReservation($reservation));
            alert()->success('Udało się !','Potwierdzenie rezerwacji zostało wysłane na podany adres e-mail');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
