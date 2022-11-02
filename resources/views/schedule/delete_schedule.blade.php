@extends('user.admin')
@section('title', 'Удаление')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h2>Удаление заявки</h2>
                <p>Номер пары {{ $schedule -> lessontime() }}</p>
                <p>Номер кабинета {{  $schedule -> classroom() }}</p>
                <p>Название предмета {{  $schedule -> subject() }}</p>
                <p>Название группы {{  $schedule -> group() }}</p>
                <p>Преподаватель {{  $schedule -> teacher() }}</p>
                <p class="text text-danger">Вы точно хотите удалить заявку?</p>
                <form method="POST">
                    @csrf

                    <a href="{{ route('schedule') }}">Отмена операции</a>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
