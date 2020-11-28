@extends('layout.main')

@section('title')
    Группа {{str_replace("*", $group->grade, $group->pattern->pattern)}}
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-white p-0">
                    <li class="breadcrumb-item"><a class="h1 text-primary" href="{{route('groups.index')}}">Группы</a></li>
                    <li class="breadcrumb-item active h1" aria-current="page">{{str_replace("*", $group->grade, $group->pattern->pattern)}}</li>
                </ol>
            </nav>
        </div>
        <div class="col col-3 text-right">
            <a href="{{route('groups.create')}}" class="btn btn-primary">
                Зачислить студента
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table mb-0 ">
                <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox"/>
                    </th>
                    <th scope="col">ФИО</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group->students as $student)
                    <tr class="tr">
                        <th scope="row"><input type="checkbox"/></th>
                        <td class="align-middle">{{$student->second_name . " " . $student->first_name . " " . $student->patronymic}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            <div class="row justify-content-end">
                <div class="cel">
                    <a href="" class="btn btn-primary mr-1">Первести студента(ов) на следующий курс</a>
                    <a href="" class="btn btn-outline-dark">Отчислить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
