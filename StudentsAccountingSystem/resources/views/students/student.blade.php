@extends('layout.page')

@section('title', 'Студент')

@section('section-header')
    <h4>Студент</h4>
@endsection

@section('card-body')
    <form class="m-4" style="width:20%">
        <label for="lastNameInput">Фамилия</label>
        <input type="text" class="form-control mb-2" id="lastNameInput" readonly placeholder="Иванов">
        <label for="firstNameInput">Имя</label>
        <input type="text" class="form-control mb-2" id="firstNameInput" readonly placeholder="Иван">
        <label for="patronymicInput">Отчество</label>
        <input type="text" class="form-control mb-2" id="patronymicInput" readonly placeholder="Иванович">
        <label for="recordBookIdInput">Номер зачетной книжки</label>
        <input type="text" class="form-control" id="recordBookIdInput" readonly placeholder="88005553">
    </form>
@endsection
