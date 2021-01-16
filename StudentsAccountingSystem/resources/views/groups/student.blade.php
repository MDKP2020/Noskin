@extends('layout.main')

@section('title')
    {{ $student->second_name . substr($student->first_name, 0, 1) . substr($student->patronymic, 0, 1) }}
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-white p-0">
                    <li class="breadcrumb-item">
                        <a class="h1 text-primary" href="{{route('groups.index')}}">Группы</a>
                    </li>
                    <li class="breadcrumb-item h1" aria-current="page">
                        <a class="h1 text-primary" href="{{route('groups.info', ['year' => $year_id, 'id' => $group->group->id])}}">
                            {{str_replace("*", $group->grade, $group->group->pattern->pattern)}}
                        </a>
                    </li>
                    <li class="breadcrumb-item active h1" aria-current="page">
                        {{$student->second_name}}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Информация о студенте</h2>
        </div>
        <div class="card-body p-4">
            <p>some content</p>
        </div>
        <div class="card-footer">
            <div class="row justify-content-end">
                <div class="cell px-4">
                    <button type="button" class="btn btn-danger">
                        Удалить
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
