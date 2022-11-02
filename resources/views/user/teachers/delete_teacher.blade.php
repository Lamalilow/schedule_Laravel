@extends('user.admin')
@section('title', 'Удаление преподавателя')
@section('content')
    <div class="container p-4">
        <div class="row d-grid justify-content-center">
            <div class="col"></div>
            <div class="col-m6">
                <h2 class="pt-5 pb-5">Удаление преподавателя</h2>
                <p>Фамилия преподавателя - {{$teacher->second_name}}</p>
                <p>Имя преподавателя - {{$teacher->first_name}}</p>
                <p>Отчество преподавателя - {{$teacher->third_name}}</p>
                <p class="text text-danger">Вы точно хотите удалить преподавателя?</p>
                <form method="post">
                    @csrf
                    <a class="link-secondary text-decoration-none" href="{{ route('admin') }}">Отмена операции</a>
                    <button type="submit" class="btn btn-danger ms-3">Удалить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
