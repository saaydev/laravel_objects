<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ URL::asset("css/app.css") }}">
        <link rel="shortcut icon" href="{{ URL::asset('favicon.jpg') }}" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class="container my-3 page-edit">
        <form class="form-edit" method="post" action="{{ route("edit", ["id" => $item->id]) }}">
            @csrf
           
            <h3>Редактирование обьекта</h3>

            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if(Session::has("message"))
                <div class="alert alert-success">
                    {{ Session::get("message") }}
                </div>
            @endif

            <div class="page-edit-inputs">
                <span class="input-group-text">Название</span>
                <input type="text" class="form-control" name="title" id="title" value="{{ $item->title }}">

                <span class="input-group-text">Тип</span>
                <input type="text" class="form-control" name="type" value="{{ $item->type }}">
            </div>

            <button class="btn btn-primary">Обновить</button>
        </form>
        <div class="menu">
            <h4>Меню</h4>
            <a href="/">Обьекты</a>
            <a href="">Настройка обьектов</a>
            @foreach ($menu as $item)
                <a href="{{ $item->get_permalink() }}">{{ $item->title }}</a>
            @endforeach
        </div>
    </body>
</html>
