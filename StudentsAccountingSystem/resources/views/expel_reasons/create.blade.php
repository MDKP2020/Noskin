@extends('layout.main')

@section('title')
    Создать причину отчисления
@endsection

@section('content')
    <h2>Создать причину отчисления</h2>
    <form method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
