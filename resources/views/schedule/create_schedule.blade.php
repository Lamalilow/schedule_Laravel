@extends('welcome')
@section('title', 'Добавление расписания')
@section('content')
    <div class="container p-5">
        <h2 class="text-center p-4">Добавление расписания</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label mb-2" for="number">Номер пары</label>
                        <select id="number" name="lessonTime_id" class="form-select @error('lessonTime_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите время урока</option>
                        @foreach($lessonTime as $item)
                                <option value="{{ $item -> id }}">{{ $item -> number }}: {{ $item -> start_lesson }} -  {{ $item -> end_lesson }}</option>
                            @endforeach
                        </select>
                        @error('lessonTime_id')
                        <div id="invalidName" class="invalid-feedback">Вы не указали номер пары</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="group">Группа</label>
                        <select id="group" name="group_id" class="form-select @error('group_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите группу</option>
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                        @error('group_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали группу</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="subject">Предмет</label>
                        <select id="subject" name="subject_id" class="form-select @error('subject_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите предмет</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали предмет</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="user">Преподаватель</label>
                        <select id="user" name="teacher_id" class="form-select @error('taecher_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите преподавателя</option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->second_name}} {{$teacher->first_name}} {{$teacher->third_name}}  </option>
                            @endforeach
                        </select>
                        @error('teacher_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали преподавателя</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="cabinet">Кабинет</label>
                        <select id="cabinet" name="classRoom_id" class="form-select @error('cabinet_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите кабинет</option>
                            @foreach($classRooms as $classRoom)
                                <option value="{{$classRoom->id}}">{{$classRoom->number}}</option>
                            @endforeach
                        </select>
                        @error('$classRoom_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали кабинет</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2" for="date">Дата</label>
                        <select id="dayOfWeek" name="dayOfWeeks_id" class="form-select @error('dayOfWeeks_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите день недели</option>
                            @foreach($dayOfWeeks as $dayOfWeek)
                                <option value="{{$dayOfWeek->id}}">{{$dayOfWeek->name}}</option>
                            @endforeach
                        </select>
                        @error('dayOfWeeks_id')
                        <div id="invalidName" class="invalid-feedback">Вы не выбрали день недели</div>
                        @enderror
                    </div>
                    <button class="btn btn-success d-block m-auto" type="submit">Добавить расписание</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
