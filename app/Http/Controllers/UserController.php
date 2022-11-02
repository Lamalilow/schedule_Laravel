<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
use App\Models\Group;

class UserController extends Controller
{
    public function loginView()
    {
        return view('user.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($request->only('login', 'password')))
        {
            $request->session()->regenerate();
            return redirect()->route('/');
        }
        return back()->with(['errorLogin' => 'Неверный логин или пароль']);
    }

    public function registration()
    {
        $roles = Role::all();
        $groups = Group::all();
        return view('user.registration', compact('roles', 'groups'));
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'login'=>'required|unique:users',
            'password'=>'required|confirmed',
            'role_id' => 'required',
        ]);
        if($request->role_id != 2)
        {
            $request->merge(['group_id' => null]);
        }
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('admin')->with(['success' => 'Пользователь зарегистрирован']);
    }

    public function adminView()
    {
        return view('user.admin');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function studentList()
    {
        $students = User::where('role_id', 2)->get();
        return view('user.students_list', compact('students'));
    }
    public function teacherList()
    {
        $teachers = Teacher::all();
        return view('user.teacher_list', compact('teachers'));
    }

    public function deleteUser(User $user)
    {
        if(Auth::user()->role_id == 1){
            return view('user.delete_user', compact('user'));
        }
        return redirect()->route('/');
    }

    public function deleteUserPost(User $user)
    {
        $user->delete();
        return redirect()->route('admin');
    }

    public function warning()
    {
        return view('warning');
    }

}
