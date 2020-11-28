@extends('layout.main')

@section('title')
    Create Major
@endsection

@section('content')
    <h2>Создать направление</h2>
    <form method="post" action="{{route('majors.createFromForm')}}">
        @csrf
        @include('components.form-fields.text', ['name'=>'name', 'title'=>'Имя'])
        @include('components.form-fields.text', ['name'=>'code', 'title'=>'Код'])
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
