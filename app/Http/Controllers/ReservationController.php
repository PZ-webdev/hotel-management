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
            
            //TODO: change to email on email->request;
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

     /**
     * Confirm reservation no auth user.
     *
     * @param  int  $id
     * @param  string  $hash
     * @return \Illuminate\Http\Response
     */
    public function confirm($id, $hash)
    {
        $reservation = Reservation::find($id);
    
        if($reservation->verified_at == null){
            $hashCode = hash('sha512', $reservation->confirm_code);
            if($hash == $hashCode){
                $reservation->verified_at = now();
                $reservation->save();

                alert()->success('Udało się !','Twoja rezerwacja została potwierdzona. Do zobaczenia !');
            }else{
                alert()->error('Wystąpił Błąd','Niepoprawny odnośnik potwierdzający rezerwację.');
            }
        }else{
            alert()->info('Informacja','Twoja rezerwacja została potwierdzona, dnia: ' . $reservation->verified_at);
        }

        return redirect()->route('room.index');
    }
}
