<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $column = "rating_avg";
        $sort = "DESC";
        $rooms = DB::table('ratings AS r')
            ->select([
                'rooms.*',
                DB::raw('COUNT(*) AS count_rating'),
                DB::raw('AVG(r.rating) AS rating_avg')
            ])
            ->join('rooms', 'rooms.id', '=', 'r.id_room')
            ->when(request('sort'), function($q){
                switch (request('sort')) {
                    
                    case "name_asc":
                        $column = 'name';
                        $sort = 'ASC';
                        break;

                    case "name_desc":
                        $column = 'name';
                        $sort = 'DESC';
                        break;

                    case "price_asc":
                        $column = 'room_fee';
                        $sort = 'ASC';
                        break;

                    case "price_desc":
                        $column = 'room_fee';
                        $sort = 'DESC';
                        break;

                    default:
                        $column = "rating_avg";
                        $sort = "DESC";
                        break;
                }

                $q->orderBy($column, $sort);
            })
            ->groupBy('id_room')
            ->when(request('price_from'), function($q){
                $q->where('room_fee', '>=', request('price_from'));
            })
            ->when(request('price_to'), function($q){
                $q->where('room_fee', '<=', request('price_to'));
            })
            ->paginate(9);

        $roomTypes = RoomType::all();

        return view('room.index', compact('rooms', 'roomTypes'));
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
    public function show(Room $room)
    {
        return view('room.show', compact('room'));
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

    private function filtr($request)
    {
        //   
    }

}
