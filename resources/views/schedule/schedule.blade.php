@extends('welcome')
@section('title', 'Расписание')
@section('content')
    <div class="container">
        <div class="row">
            <form action="" method="POST" class="mt-5">
                @csrf
                <div class="mb-3 col-6">
                    <select id="group_name" onchange="this.form.submit()" name="group_id" class="form-select @error('group_id') is-invalid @enderror" aria-label="Default select example">
                        <option selected>Выберите группу</option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                    <div id="invalidName" class="invalid-feedback">Вы не выбрали группу</div>
                    @enderror
                </div>
            </form>
        </div>
        <div class="main-grid mx-auto">
            @foreach($groups as $group)
                @if($group->id == $group_select)
                    <div class="bg-schedule">
                        <h5 class="card-title text-center mt-5">{{$group->name}}</h5>
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th scope="col">Время урока</th>
                                <th scope="col">Предмет</th>
                                <th scope="col">Преподователь</th>
                                <th scope="col">Кабинет</th>
                                @auth()
                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || 3)
                                <th scope="col">Изменить</th>
                                <th scope="col">Удалить</th>
                                    @endif
                                @endauth
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            @foreach($sortedSchedules as $schedule)
                                @if($schedule->group_id == $group->id)
                                    <tr>
                                        <th scope="row">{{$schedule->lessonTime()}}</th>
                                        <td>{{$schedule->subject()}}</td>
                                        <td>{{$schedule->teacher()}}</td>
                                        <td>{{$schedule->classroom()}}</td>
                                        @auth()
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || 3)
                                                <td><a class="link-secondary text-decoration-none" href="{{route('edit_schedule', $schedule->id)}}">Изменить</a></td>
                                                <td><a class="link-secondary text-decoration-none" href="{{route('delete_schedule', $schedule->id)}}">Удалить</a></td>
                                            @endif
                                        @endauth
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
