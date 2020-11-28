@extends('page')

@section('title', 'Новый студент')

@section('section-header')
    <h4>Новый студент группы {{$id}}</h4>
@endsection

@section('card-body')
    <form class="m-4" style="width: 60%;">
        <label for="nameInput">ФИО</label>
        <div class="d-flex justify-content-between">
            <input type="text" class="form-control" id="nameInput" placeholder="Пушкин Александр Сергеевич" style="max-width: 300px;">
            <p class="text-align-center m-auto">или</p>
            <button type="button" class="btn btn-primary ml-2" id="add-from-archive-btn">Добавить существующего</button>
        </div>
    </form>
@endsection

@section('card-footer')
    <button type="button" class="btn btn-light bg-white" id="cancel-btn">Отменить</button>
    <button type="button" class="btn btn-primary ml-2" id="save-btn">Сохранить</button>
@endsection
