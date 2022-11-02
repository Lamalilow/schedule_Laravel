<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function addTeacherView()
    {
        return view('user.teachers.create_teacher');
    }

    public function addTeacherPost(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'third_name' => 'required',
        ]);
        Teacher::create($request->all());
        return redirect()->route('admin');
    }

    public function deleteTeacher(Teacher $teacher)
    {
        if (Auth::user()->role_id == 1)
        {
            return view('user.teachers.delete_teacher', compact('teacher'));
        }

        return view('user.teachers.delete_teacher', compact('teacher'));
    }


    public function deleteTeacherPost(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin');
    }

}
