@extends('layout.main')

@section('title')
    Создать группу
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h1>Создать группу</h1>
        </div>
    </div>

    <div class="card">

        <div class="card-body p-0">
            <form class="m-4">
                <div class="form-group" style="max-width: 200px">
                    <label for="yearOfStudySelect">Год</label>
                    <select class="form-control" id="yearOfStudySelect">
                        @foreach($academicYears as $academicYear)
                            <option>{{($academicYear['start_year']) . '-' . (($academicYear['start_year']) + 1)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="max-width: 200px">
                    <label for="gradeOfStudySelect">Курс</label>
                    <select class="form-control" id="gradeOfStudySelect">
                        @foreach($grades as $grade)
                            <option>{{$grade}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="max-width: 200px">
                    <label for="majorSelect">Направление</label>
                    <select class="form-control" id="majorSelect">
                        @foreach($majors as $major)
                            <option>{{$major->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="max-width: 200px">
                    <label for="namePatternSelect">Название</label>
                    <select class="form-control" id="namePatternSelect">
                        @foreach($patterns as $pattern)
                            <option>{{$pattern->pattern}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            <div class="row justify-content-end">
                <div class="cel">
                    <a href="" class="btn btn-primary mr-1">Сохранить</a>
                    <a href="" class="btn btn-outline-dark">Отменить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
