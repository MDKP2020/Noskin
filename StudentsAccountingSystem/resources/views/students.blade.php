@extends('page')

@section('title', 'Студенты группы '.$id)

@section('section-header')
    <div class="d-flex">
        <h4 class="breadcrumb-item"><a href="#">Группы</a></h4>
        <h4 class="breadcrumb-item active" aria-current="page">{{$id}}</h4>
    </div>
    <button type="button" class="btn btn-primary" id="add-student-btn">Зачислить студента</button>
@endsection

@section('card-body')
    {{--List--}}
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox"/>
                </th>
                <th scope="col">ФИО</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">
                    <input type="checkbox"/>️
                </th>
                <td>Иванов И В</td>
                <td class="text-secondary" style="width: 450px">Отчислен 01/10/20, Отчислен 01/10/20, Отчислен 01/10/20, Отчислен 01/10/20, Отчислен 01/10/20</td>
            </tr>
            <tr>
                <th scope="row">
                    <input type="checkbox"/>️
                </th>
                <td>Петров А Б</td>
                <td class="text-secondary" style="width: 450px"></td>
            </tr>
            <tr>
                <th scope="row">
                    <input type="checkbox"/>️
                </th>
                <td>Пушкин А С</td>
                <td class="text-secondary" style="width: 450px">Зачислен 10/10/20</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('card-footer')
    <button type="button" class="btn btn-light bg-white" id="expel-student-btn">Отчислить</button>
    <button type="button" class="btn btn-primary ml-2" id="move-group-btn">Перевести группу</button>
@endsection
