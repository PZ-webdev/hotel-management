<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationDetailResource;
use App\Mail\ConfirmReservation;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $reservations = Reservation::with('rooms')->where('email', Auth::user()->email)->get();
        return view('home.home', compact('reservations'));
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
        $room = Room::find($request->id_room);
        if ($room == null) {
            alert()->error(__('custom.oops'), __('custom.roomNotFound'));
            return back();
        }

        $checkRoom = Reservation::where('id_room', $request->id_room)
            ->where('date_end', '>', $request->date_in)
            ->orderBy('date_end', 'desc')
            ->first();

        if (!empty($checkRoom) > 0) {
            alert()->error(__('custom.oops'), __('custom.roomIsReservated')  . $checkRoom->date_end);
        } else {
            $reservation = new Reservation();
            
            $days  = $reservation->dateDiffInDays($request->date_start, $request->date_end);
            $price = $reservation->payment($days, $room->room_fee);

            $reservation->id_room    = $request->id_room;
            $reservation->first_name = $request->first_name;
            $reservation->last_name  = $request->last_name;
            $reservation->email      = $request->email;
            $reservation->address    = $request->address;
            $reservation->city       = $request->city;
            $reservation->phone      = $request->phone;
            $reservation->date_start = $request->date_in;
            $reservation->date_end   = $request->date_off;
            $reservation->price_for_reservation = $price;
            $reservation->confirm_code = time();
            $reservation->save();

            //TODO: change to email on email->request;
            Mail::to('patryk.zaprzala@gmail.com')->send(new ConfirmReservation($reservation));
            alert()->success(__('custom.success'),  __('custom.confirmSendEmail'));
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
        $res = Reservation::findOrFail($id);
        $res->delete();

        return response(['message' => __('custom.deleteReservation')]);
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
        $reservation = Reservation::findOrFail($id);

        if ($reservation->verified_at == null) {
            $hashCode = hash('sha512', $reservation->confirm_code);
            if ($hash == $hashCode) {
                $reservation->verified_at = now();
                $reservation->save();

                alert()->success(__('custom.confirm'), __('custom.confirmReservation'));
            } else {
                alert()->error(__('custom.error'),  __('custom.errorURL'));
            }
        } else {
            alert()->info(__('custom.information'), __('custom.confirmReservationAtDay') . $reservation->verified_at);
        }

        return redirect()->route('room.index');
    }

    public function getReservationDetails(Request $request)
    {
        return new ReservationDetailResource(Reservation::findOrFail($request->id));
    }

    public function confirmAuth($id)
    {
        $reservation = Reservation::where('id', $id)->where('email', Auth::user()->email)->where('verified_at', null)->firstOrFail();

        $reservation->update([
            'verified_at' => now()
        ]);
        $reservation->save();

        alert()->success(__('custom.confirm'), __('custom.confirmReservation'));
        return redirect()->back();
    }
}
