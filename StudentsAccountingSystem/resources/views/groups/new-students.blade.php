@extends('layout.main')

@section('title')
    Добавление студента
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h1>Добавить студента в группу</h1>
        </div>
    </div>
    <div class="card">
        @if ($errorMessage != "")
            <div class="alert alert-danger" role="alert">
                {{ $errorMessage }}
            </div>
        @endif
        <form method="post" class="card-body p-0" action="{{route('groups.newStudentFromForm')}}">
            @csrf
            <div class="card-body p-4">
                <div class="">
                    @include('components.form-fields.text', ['name'=>'second_name', 'title'=>'Фамилия'])
                    @include('components.form-fields.text', ['name'=>'first_name', 'title'=>'Имя'])
                    @include('components.form-fields.text', ['name'=>'patronymic', 'title'=>'Отчество'])
                    @include('components.form-fields.text', ['name'=>'student_number', 'title'=>'Номер зачетной книжки'])
                </div>
                <input type="hidden" name="year_id" value="{{$year_id}}">
                <input type="hidden" name="group_id" value="{{$id}}">
            </div>
            <div class="card-footer text-muted">
                <div class="row justify-content-end px-4">
                    <div class="cel">
                        <button type="submit" class="btn btn-primary mr-1">Сохранить</button>
                        <a href="{{route('groups.info', [$year_id, $id])}}" class="btn btn-outline-dark">Отменить</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
