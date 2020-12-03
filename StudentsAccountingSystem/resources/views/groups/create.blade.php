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
        <form method="post" action="{{route('groups.createFromForm')}}" class="m-4">
            @csrf
            <div class="card-body p-0">
                <div class="m-4">

                    <div class="form-group" style="max-width: 200px">
                        <label for="yearOfStudySelect">Год</label>
                        <select name="academic_year_id" class="form-control" id="yearOfStudySelect">
                            @foreach($academicYears as $academicYear)
                                <option
                                    value="{{$academicYear->id}}">{{($academicYear['start_year']) . '-' . (($academicYear['start_year']) + 1)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="max-width: 200px">
                        <label for="gradeOfStudySelect">Курс</label>
                        <select name="grade" class="form-control" id="gradeOfStudySelect">
                            @foreach($grades as $grade)
                                <option value="{{$grade}}">{{$grade}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="max-width: 200px">
                        <label for="majorSelect">Направление</label>
                        <select name="major_id" class="form-control" id="majorSelect">
                            @foreach($majors as $major)
                                <option value="{{$major->id}}">{{$major->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="max-width: 200px">
                        <label for="namePatternSelect">Название</label>
                        <select name="pattern_id" class="form-control" id="namePatternSelect">
                            @foreach($patterns as $pattern)
                                <option value="{{$pattern->id}}">{{$pattern->pattern}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="row justify-content-end">
                    <div class="cel">
                        <button type="submit" class="btn btn-primary mr-1">Сохранить</button>
                        <a href="" class="btn btn-outline-dark">Отменить</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
