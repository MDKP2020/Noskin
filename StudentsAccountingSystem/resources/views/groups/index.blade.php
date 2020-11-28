@extends('layout.main')

@section('title')
    Группы
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h1>Группы</h1>
        </div>
        <div class="col col-2 text-right">
            <a href="{{route('groups.create')}}" class="btn btn-primary">
                Создать
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form>
                <div class="form-row align-items-end">
                    <div class="col">
                        <p>Курс</p>
                        <select class="custom-select">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <p>Направление</p>
                        <select name="major" class="custom-select">
                            <option value @if(empty($_GET['major'])) selected @endif>Все</option>
                            @foreach($majors as $major)
                                <option @if(($_GET['major'] ?? -1) == $major->id) selected
                                        @endif value="{{$major->id}}">{{$major->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-primary mr-1">Применить</button>
                        <a href="{{route('groups.index')}}" class="btn btn-outline-dark">Сбросить</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0 ">
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
                @foreach($groups as $group)
                    <tr>
                        <th scope="row"><input type="checkbox"/></th>
                        <td>{{$group->pattern->pattern}}</td>
                        <td>Отчислена</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
@endsection
