@extends('layout.page')

@section('title', 'Студент')

@section('section-header')
    <h4>Студент</h4>
@endsection

@section('card-body')
    <form class="m-4" style="width: 60%;">
        <label for="nameInput">ФИО</label>
        <input type="text" class="form-control" id="nameInput" readonly style="max-width: 300px;" value="Пушкин Александр Сергеевич">
    </form>
@endsection

