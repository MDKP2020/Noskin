@extends('layout.main')

@section('title')
    Majors
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h1>Направления</h1>
        </div>
        <div class="col col-2 text-right">
            <a href="{{route('majors.create')}}" class="btn btn-primary">
                Cоздать
            </a>
        </div>
    </div>
    <table class="table table-bordered ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">code</th>
            <th scope="col">name</th>
            <th scope="col">Дествие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($majors as $major)
            <tr>
                <th scope="row">{{$major->id}}</th>
                <td>{{$major->code}}</td>
                <td>{{$major->name}}</td>
                <td>
                    <form action="{{route('majors.api.delete.redirect',['id' => $major->id])}}" method="post">
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
