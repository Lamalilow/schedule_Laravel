<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function addCabinets()
    {
        return view('classRooms.create_classRoom');
    }

    public function addCabinetsPost(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:class_rooms',
        ]);
        ClassRoom::create($request->all());
        return redirect()->route('admin');
    }
}
