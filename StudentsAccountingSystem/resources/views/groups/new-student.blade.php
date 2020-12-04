@extends('layout.page')

@section('title', 'Новый студент')

@section('section-header')
    <h4>Новый студент группы {{$id}}</h4>
@endsection

@section('card-body')
    <div class="d-flex justify-content-center align-items-center" style="width:50%;">
        <form class="m-4">
                <label for="lastNameInput">Фамилия</label>
                <input type="text" class="form-control mb-2" id="lastNameInput" placeholder="Иванов">
                <label for="firstNameInput">Имя</label>
                <input type="text" class="form-control mb-2" id="firstNameInput" placeholder="Иван">
                <label for="patronymicInput">Отчество</label>
                <input type="text" class="form-control mb-2" id="patronymicInput" placeholder="Иванович">
                <label for="recordBookIdInput">Номер зачетной книжки</label>
                <input type="text" class="form-control" id="recordBookIdInput" placeholder="88005553">
        </form>
        <p class="text-align-center my-auto mx-4">или</p>
        <button type="button" class="btn btn-primary ml-2" id="add-from-archive-btn">Добавить существующего</button>
    </div>
@endsection

@section('card-footer')
    <button type="button" class="btn btn-light bg-white" id="cancel-btn">Отменить</button>
    <button type="button" class="btn btn-primary ml-2" id="save-btn">Сохранить</button>
@endsection
