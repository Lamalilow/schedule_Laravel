<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubject()
    {
        return view('subjects.create_subject');
    }

    public function addSubjectsPost(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects',
        ]);
        Subject::create($request->all());
        return redirect()->route('admin');
    }
}
