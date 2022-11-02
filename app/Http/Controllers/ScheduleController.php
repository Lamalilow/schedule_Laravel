<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\DayOfWeek;
use App\Models\Group;
use App\Models\LessonTime;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function scheduleView()
    {

        $groups = Group::all();
        $schedules = Schedule::all();
        $group_select = null;
        return view('schedule.schedule', compact(
            'schedules',
            'groups',
            'group_select'
        ));
    }

    public function schedulePost(Request $request)
    {
        $schedules = Schedule::all();
        $groups = Group::all();
        $sortedSchedules = $schedules ->sortBy('lessonTime_id');
        $sortedSchedules -> values()->all();
        $group_select = $request -> group_id;

        return view('schedule.schedule', compact( 'sortedSchedules','group_select', 'groups'));
    }

    public function addPairs()
    {
        $lessonTime = LessonTime::all();
        $groups = Group::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $classRooms = ClassRoom::all();
        $dayOfWeeks = DayOfWeek::all();
        return view('schedule.create_schedule', compact(
            'lessonTime',
            'groups',
            'subjects',
            'teachers',
            'classRooms',
            'dayOfWeeks'
        ));
    }

    public function addPairsPost(Request $request)
    {

        $request -> validate([
            'lessonTime_id',
            'group_id',
            'subject_id',
            'teacher_id',
            'classRoom_id',
            'dayOfWeek_id',
        ]);
        $data = $request -> only('lessonTime_id',
            'group_id',
            'subject_id',
            'teacher_id',
            'classRoom_id',
            'dayOfWeeks_id');
        Schedule::create($data);
        return redirect()->route('schedule');
    }

    public function deleteScheduleView(Schedule $schedule)
    {
        if (Auth::user()->role_id == 1||3)
        {
            return view('schedule.delete_schedule', compact('schedule'));
        }
        return view('schedule.delete_schedule', compact('schedule'));
    }

    public function deleteSchedulePost(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedule');
    }

    public function editScheduleView(Schedule $schedule)
    {
        $lessonTime = LessonTime::all();
        $scheduleLessonTime = LessonTime::find($schedule->lessonTime_Id);
        $groups = Group::all();
        $scheduleGroup = Group::find($schedule->group_id);
        $subjects = Subject::all();
        $scheduleSubject = Subject::find($schedule->subject_id);
        $teachers = Teacher::all();
        $scheduleTeacher = Teacher::find($schedule->teacher_id);
        $classRooms = ClassRoom::all();
        $scheduleClassRoom = ClassRoom::find($schedule->classRoom_id);
        $dayOfWeeks = DayOfWeek::all();
        $scheduleDayOfWeek = DayOfWeek::find($schedule->dayOfWeeks_id);

        if (Auth::user()->role_id == 1)
        {
            return view('schedule.edit_schedule', compact('schedule',
                'lessonTime',
                'scheduleLessonTime',
                'groups',
                'scheduleGroup',
                'subjects',
                'scheduleSubject',
                'teachers',
                'scheduleTeacher',
                'classRooms',
                'scheduleClassRoom',
                'dayOfWeeks',
                'scheduleDayOfWeek',
            ));
        }
        return view('schedule.edit_schedule', compact('schedule',
            'lessonTime',
            'scheduleLessonTime',
            'groups',
            'scheduleGroup',
            'subjects',
            'scheduleSubject',
            'teachers',
            'scheduleTeacher',
            'classRooms',
            'scheduleClassRoom',
            'dayOfWeeks',
            'scheduleDayOfWeek',
        ));
    }

    public function editSchedulePost(Schedule $schedule, Request $request)
    {
        $schedule -> lessontime_id = $request->input('lessonTime_id');
        $schedule ->  group_id = $request->input('group_id');
        $schedule ->   subject_id = $request->input('subject_id');
        $schedule ->  teacher_id = $request->input('teacher_id');
        $schedule ->  classRoom_id = $request->input('classRoom_id');
        $schedule ->   dayOfWeeks_id = $request->input('dayOfWeeks_id');

        $schedule->save();
        return redirect()->route('schedule');
    }


}
