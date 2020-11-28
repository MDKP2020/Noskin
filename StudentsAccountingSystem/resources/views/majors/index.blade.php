@extends('layout.main')

@section('title')
    Majors
@endsection

@section('content')
    <div class="container pt-4">
        <table class="table table-bordered ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">code</th>
                <th scope="col">name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($majors as $major)
                <tr>
                    <th scope="row">{{$major->id}}</th>
                    <td>{{$major->code}}</td>
                    <td>{{$major->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
