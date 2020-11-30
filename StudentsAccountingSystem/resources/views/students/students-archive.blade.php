@extends('layout.page')

@section('title', 'Архив')

@section('section-header')
    <h4>Архив студентов</h4>
@endsection

@section('card-body')
    {{--List--}}
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th></th>
                <th scope="col">ФИО</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td>Иванов И В</td>
                <td class="text-secondary" style="width: 450px">Отчислен 01/10/20, Отчислен 01/10/20, Отчислен 01/10/20, Отчислен 01/10/20, Отчислен 01/10/20</td>
            </tr>
            <tr>
                <td></td>
                <td>Петров А Б</td>
                <td class="text-secondary" style="width: 450px"></td>
            </tr>
            <tr>
                <td></td>
                <td>Пушкин А С</td>
                <td class="text-secondary" style="width: 450px">Зачислен 10/10/20</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
