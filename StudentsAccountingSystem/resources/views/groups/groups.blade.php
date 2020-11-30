@extends('layout.page')

@section('title', 'Список групп')

@section('section-header')
    <h4>Группы</h4>
    <button type="button" class="btn btn-primary" id="add-group-btn">Добавить группу</button>
@endsection

@section('card-body')
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="filter-feature-block">
            <p>Курс</p>
            <div class="btn-group" role="group">
                <button id="year-of-study-dropdown" type="button" class="btn btn-light dropdown-toggle bg-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Не указано
                </button>
                <div class="dropdown-menu" aria-labelledby="year-of-study-dropdown">
                    <a class="dropdown-item" href="#">1</a>
                    <a class="dropdown-item" href="#">2</a>
                    <a class="dropdown-item" href="#">3</a>
                    <a class="dropdown-item" href="#">4</a>
                    <a class="dropdown-item" href="#">5</a>
                    <a class="dropdown-item" href="#">6</a>
                </div>
            </div>
        </div>

        <div class="filter-feature-block ml-4">

            <p>Направление</p>
            <div class="btn-group" role="group">
                <button id="majors-dropdown" type="button" class="btn btn-light dropdown-toggle bg-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Не указано
                </button>
                <div class="dropdown-menu" aria-labelledby="majors-dropdown">
                    <a class="dropdown-item" href="#">ИВТ</a>
                    <a class="dropdown-item" href="#">ПрИн</a>
                    <a class="dropdown-item" href="#">Физика</a>
                    <a class="dropdown-item" href="#">Приборостроение</a>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-light bg-white ml-auto" id="reset-filters-btn">Сбросить</button>
        <button type="button" class="btn btn-primary ml-2" id="apply-filters-btn">Применить</button>

    </div>

    {{--List--}}
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox"/>
                    </th>
                    <th scope="col">Название</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <input type="checkbox"/>️
                    </th>
                    <td><a href="#">ИВТ-161</a></td>
                    <td class="text-secondary">Переведена</td>
                </tr>
                <tr>
                    <th scope="row">
                        <input type="checkbox"/>️
                    </th>
                    <td><a href="#">ИВТ-162</a></td>
                    <td class="text-secondary">Переведена</td>
                </tr>
                <tr>
                    <th scope="row">
                        <input type="checkbox"/>️
                    </th>
                    <td><a href="#">ИВТ-163</a></td>
                    <td class="text-secondary">Переведена</td>
                </tr>
                <tr>
                    <th scope="row">
                        <input type="checkbox"/>️
                    </th>
                    <td><a href="#">ПрИн-166</a></td>
                    <td class="text-secondary">Переведена</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('card-footer')
    <button type="button" class="btn btn-light bg-white" id="expel-group-btn">Окончить обучение</button>
    <button type="button" class="btn btn-primary ml-2" id="move-group-btn">Перевести группу</button>
@endsection
