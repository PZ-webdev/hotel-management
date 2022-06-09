<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use App\DataTables\RoomDataTable;
use App\Http\Requests\RoomStoreRequest;
use App\Models\RoomType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoomDataTable $dataTable)
    {
        return $dataTable->render('admin.room.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = RoomType::all();

        return view('admin.room.create', compact('types'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomStoreRequest $request)
    {
        $path = $request->image->store('images/rooms');
     
        $room = new Room($request->validated());
        $room->image = $path;
        $room->slug  = Str::slug($request->name);
        $room->save();

        alert()->success(__('admin.success'), __('admin.addRommSuccessfully'));
        return redirect()->route('admin.room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);

        return view('admin.room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $types = RoomType::all();

        return view('admin.room.edit', compact('room', 'types'));
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
    public function destroy(Room $room)
    {
        try {
            $room->delete();
            return response()->json(['message' => __('admin.roomDestroyed')], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => __('admin.roomIsReserved')], 400);
        }
    }
}
