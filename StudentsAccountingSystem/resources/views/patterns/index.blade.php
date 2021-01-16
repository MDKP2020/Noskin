@extends('layout.main')

@section('title')
    Patterns
@endsection

@section('content')
    @include('components.admin.admin-nav')
    <div class="row align-items-center">
        <div class="col">
            <h1>Паттерны</h1>
        </div>
        <div class="col col-2 text-right">
            <a href="{{route('patterns.create')}}" class="btn btn-primary">
                Cоздать
            </a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Паттерн</th>
            <th scope="col">направление</th>
            <th scope="col">Дествие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patterns as $pattern)
            <tr>
                <th scope="row" class="text-center">{{$pattern->id}}</th>
                <td class="text-center">{{$pattern->pattern}}</td>
                <td class="text-center">{{$pattern->major_id}}</td>
                <td class="text-center">
                    <form action="{{route('patterns.api.delete.redirect',['id' => $pattern->id])}}" method="post">
                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
