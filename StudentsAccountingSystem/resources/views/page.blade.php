<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

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
            <label style="width: 150px; margin: 0 auto; display: block" class="text-light mb-2" for="academicYearSelect">Учебный год</label>

            <div class="d-flex">
                <button type="button" class="btn btn-link" id="year-back-btn"><</button>

                    <select class="form-control" id="academicYearSelect">
                        <option default>2020-2021</option>
                        <option>Новый уч. год</option>
                        <option>2019-2020</option>
                        <option>2018-2019</option>
                        <option>2017-2018</option>
                    </select>

                <button type="button" class="btn btn-link" id="year-forward-btn">></button>
            </div>
        </div>
    </div>
</nav>

{{--    Content     --}}
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-3">
        @yield('section-header')
    </div>


    {{--Card--}}
    <div class="card mb-4">

        @yield('card-body')

        <div class="card-footer d-flex justify-content-end">
            @yield('card-footer')
        </div>

    </div>

</div>

</body>
</html>
