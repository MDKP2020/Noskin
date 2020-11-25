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
