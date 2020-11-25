<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Список групп</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

    {{--    Header  --}}
    <nav class="navbar sticky-top navbar-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="#">Students Accounting System</a>

            <a class="nav-link" href="#">К списку групп</a>

            <div class="year-picker ml-auto mb-2">
                <p class="text-light text-center mb-2">Учебный год</p>

                <button type="button" class="btn btn-link" id="year-back-btn"><</button>

                <div class="btn-group" role="group">
                    <button id="academic-year-dropdown" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        2020-2021
                    </button>
                    <div class="dropdown-menu" aria-labelledby="academic-year-dropdown">
                        <a class="dropdown-item" href="#">2019-2020</a>
                        <a class="dropdown-item" href="#">2018-2019</a>
                    </div>
                </div>

                <button type="button" class="btn btn-link" id="year-forward-btn">></button>
            </div>
        </div>
    </nav>

    {{--    Content     --}}
    <div class="container">
        {{--    Page header    --}}
        <div class="d-flex justify-content-between my-4">
            <h4>Группы</h4>
            <button type="button" class="btn btn-primary" id="add-group-btn">Добавить группу</button>
        </div>

        {{--    Card    --}}
        <div class="card mb-4">
            {{--      Filters      --}}
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

            {{--    List    --}}
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

            {{--    Card Footer    --}}
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-light bg-white" id="expel-group-btn">Окончить обучение</button>
                <button type="button" class="btn btn-primary ml-2" id="move-group-btn">Перевести группу</button>
            </div>

        </div>
    </div>

</body>
</html>
