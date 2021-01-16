@extends('layout.main')

@section('title')
    Create Pattern
@endsection

@section('content')
    <h2>Создать паттерн</h2>
    <form method="post" action="{{route('patterns.createFromForm')}}">
        @csrf
        @include('components.form-fields.text', ['name'=>'pattern', 'title'=>'Паттерн'])
        <label for="majorSelect">Направление</label>
        <select name="major_id" class="form-control mb-4" id="majorSelect">
            @foreach($majors as $major)
                <option value="{{$major->id}}">{{$major->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
