<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ClassRoom;
use App\Models\DayOfWeek;
use App\Models\Group;
use App\Models\LessonTime;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::insert([
            'name' => 'Админ',
        ]);
        Role::insert([
            'name' => 'Студент',
        ]);
        Role::insert([
            'name' => 'Преподаватель',
        ]);
        User::insert([
           'name' => 'Иванов Иван Иванович',
           'login' => 'admin',
           'password' => Hash::make('admin'),
           'role_id' => 1,
        ]);
        Teacher::insert([
            'first_name' => 'Софья',
            'second_name' => 'Литвинова',
            'third_name' => 'Александровна',
        ]);
        Teacher::insert([
            'first_name' => 'София',
            'second_name' => 'Хилько',
            'third_name' => 'Дмитриевна',
        ]);
        Subject::insert([
           'name' => 'Расслабон',
        ]);
        Subject::insert([
            'name' => 'Чилл',
        ]);
        ClassRoom::insert([
            'number' => '111'
        ]);
        ClassRoom::insert([
            'number' => '101'
        ]);
        ClassRoom::insert([
            'number' => '404'
        ]);
        ClassRoom::insert([
            'number' => '412'
        ]);
        Group::insert([
            'name' => 'IS442'
        ]);
        Group::insert([
            'name' => 'IS441'
        ]);
        Group::insert([
            'name' => 'SA445'
        ]);
        DayOfWeek::insert([
            'name' => 'Понедельник'
        ]);
        DayOfWeek::insert([
            'name' => 'Вторник'
        ]);
        DayOfWeek::insert([
            'name' => 'Среда'
        ]);
        DayOfWeek::insert([
            'name' => 'Четверг'
        ]);
        DayOfWeek::insert([
            'name' => 'Пятница'
        ]);
        DayOfWeek::insert([
            'name' => 'Суббота'
        ]);
        DayOfWeek::insert([
            'name' => 'Воскресенье'
        ]);
        LessonTime::insert([
            'number' => 1,
            'start_lesson' => '8:30:00',
            'end_lesson' => '10:00:00'
        ]);
        LessonTime::insert([
            'number' => 2,
            'start_lesson' => '10:10:00',
            'end_lesson' => '11:40:00'
        ]);
        LessonTime::insert([
            'number' => 3,
            'start_lesson' => '12:25:00',
            'end_lesson' => '13:55:00'
        ]);
        LessonTime::insert([
            'number' => 4,
            'start_lesson' => '14:05:00',
            'end_lesson' => '15:35:00'
        ]);
        LessonTime::insert([
            'number' => 5,
            'start_lesson' => '15:45:00',
            'end_lesson' => '17:15:00'
        ]);
        LessonTime::insert([
            'number' => 6,
            'start_lesson' => '17:25:00',
            'end_lesson' => '18:55:00'
        ]);





    }
}
