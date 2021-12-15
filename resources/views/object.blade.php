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
    <body class="container my-3">
        <div class="row">
            <div class="col-3">
                <form method="post" action="{{ route("object-article-create") }}">
                    <input type="hidden" name="object_id" value="{{ $item->id }}">
                    @csrf
                    <h2>Создать {{ $item->title }}</h2>
        
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Название {{ $item->title }}</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Создать обьект</button>
                </form>
            </div>
            <div class="col-7">
                <h3>Список обьектов</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ route("delete", ["id" => $item->id]) }}" class="delete">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <div class="col-2 menu">
                <h4>Меню</h4>
                <a href="/">Обьекты</a>
                <a href="">Настройка обьектов</a>
                @foreach ($menu as $item)
                    <a href="{{ $item->get_permalink() }}">{{ $item->title }}</a>
                @endforeach
            </div>
        </div>
    </body>
</html>