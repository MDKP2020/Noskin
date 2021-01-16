@extends('layout.main')

@section('title')
    Create Pattern
@endsection

@section('content')
    <h2>Создать паттерн</h2>
    <form method="post">
        @csrf

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
