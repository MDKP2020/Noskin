@extends('page')

@section('title', 'Новая группа')

@section('section-header')
    <h4>Новая группа</h4>
@endsection

@section('card-body')
    <form class="m-4">
        <div class="form-group" style="max-width: 200px">
            <label for="yearOfStudySelect">Курс</label>
            <select class="form-control" id="yearOfStudySelect">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group" style="max-width: 200px">
            <label for="majorSelect">Направление</label>
            <select class="form-control" id="majorSelect">
                <option>ИВТ</option>
                <option>ПрИн</option>
            </select>
        </div>
        <div class="form-group" style="max-width: 200px">
            <label for="namePatternSelect">Название</label>
            <select class="form-control" id="namePatternSelect">
                <option>ИВТ-*60</option>
                <option>ИВТ-*61</option>
                <option>ИВТ-*62</option>
                <option>ПрИн-*66</option>
                <option>ПрИн-*67</option>
            </select>
        </div>
    </form>
@endsection

@section('card-footer')
    <button type="button" class="btn btn-light bg-white" id="cancel-btn">Отменить</button>
    <button type="button" class="btn btn-primary ml-2" id="save-btn">Сохранить</button>
@endsection
