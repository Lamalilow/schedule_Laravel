@extends('welcome')
@section('title', 'Авторизация')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col-6">
                <form method="POST">
                        @csrf
                        @error('errorSuccess') <p class="alert alert-danger"> {{$message}}</p> @enderror
                        <div class="mb-3">
                            <label for="inputLogin" class="form-label @error('login') is-invalid @enderror ">Логин</label>
                            <input type="text" class="form-control" id="inputLogin" name="login" aria-describedby="loginHelp">
                            @error('login')
                            <div id="invalidLogin" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label @error('password') is-invalid @enderror ">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword">
                            @error('login')
                            <div id="invalidPassword" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Авторизация</button>

                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
