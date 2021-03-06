<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReservationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationUpdateRequest;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReservationDataTable $dataTable)
    {
        return $dataTable->render('admin.reservation.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('admin.reservation.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $rooms = Room::all();
        $reservation->with('rooms');

        return view('admin.reservation.edit', compact('reservation', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationUpdateRequest $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'id_room' => $request->id_room,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'verified_at' => $request->verified_at ? Carbon::now() : null,
        ]);
        $reservation->save();

        alert()->success('Sukces', 'Edytowano Rezerwacj??.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $res = Reservation::findOrFail($reservation->id);
        $res->delete();

        return response(['message' => 'Rezerwacja zosta??a usuni??ta.']);
    }
}
