@extends('layout.main')

@section('title')
    Причины отчисления
@endsection

@section('content')
    @include('components.admin.admin-nav')
    <div class="row align-items-center">
        <div class="col">
            <h1>Причины отчисления</h1>
        </div>
        <div class="col col-2 text-right">
            <a href="{{route('reasons.create')}}" class="btn btn-primary">
                Cоздать
            </a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Причина</th>
            <th scope="col">Дествие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reasons as $reason)
            <tr>
                <th scope="row" class="text-center">{{$reason->id}}</th>
                <td class="text-center">{{$reason->reason}}</td>
                <td class="text-center">
                    <form action="{{route('reasons.api.delete.redirect', ['id' => $reason->id])}}" method="post">
                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
