<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function addGroup()
    {
        return view('groups.create_groups');
    }

    public function addGroupPost(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:groups',
        ]);
        Group::create($request->all());
        return redirect()->route('admin');
    }
}
