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
                        <a class="h1 text-primary" href="{{route('groups.index', ['year_id' => $year_id])}}">Группы</a>
                    </li>
                    <li class="breadcrumb-item h1" aria-current="page">
                        <a class="h1 text-primary"
                           href="{{route('groups.info', ['year' => $year_id, 'id' => $group->group->id])}}">
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
        <div class="card-body p-4" style="font-size: 18px;">
            <dl class="row mb-1">
                <dt class="col-sm-2">Фамилия:</dt>
                <dd class="col-sm-10">{{$student->second_name}}</dd>
            </dl>
            <dl class="row mb-1">
                <dt class="col-sm-2">Имя:</dt>
                <dd class="col-sm-10">{{$student->first_name}}</dd>
            </dl>
            <dl class="row mb-1">
                <dt class="col-sm-2">Отчество:</dt>
                <dd class="col-sm-10">{{$student->patronymic}}</dd>
            </dl>
            <dl class="row mb-1">
                <dt class="col-sm-2">Номер ЗК:</dt>
                <dd class="col-sm-10">{{$student->student_number}}</dd>
            </dl>
            <dl class="mb-1">
                <p class="h3" style="text-align: center">История переводов и отчислений</p>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Группа</th>
                        <th scope="col">Дата зачисления</th>
                        <th scope="col">Дата перевода/отчисления</th>
                        <th scope="col">Причина отчисления</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($studentToGroups as $st)
                        <div style="display: none">{{ $year = \App\Http\Controllers\Utils::academicYearFromDate($st->start_date) }}</div>
                        <tr>
                            <td class="text-primary" style="font-weight: bold">
                                <a href="{{route('groups.info', ["year" => $year->id, "id" => $st->group_id])}}">
                                    {{ \App\Http\Controllers\Utils::getGroupName($st->group_id, $year->id) }}
                                </a>
                            </td>
                            <td>{{$st->start_date}}</td>
                            <td>{{$st->end_date}}</td>
                            <td>@if($st->expel_reason_id)
                                    {{$expelReasons[$st->expel_reason_id]}}
                                @else
                                    {{""}}
                            @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </dl>
        </div>
        <div class="card-footer">
            <div class="row justify-content-end">
                <div class="cell px-4">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-modal">
                        Удалить
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade delete-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтвердите удаление</h5>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите удалить студента: <b>{{$student->second_name}} {{$student->first_name}} {{$student->patronymic}}</b>?</p>
                    <p>Он также будет удален из всех групп в которых он находится</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <button class="js-delete-btn btn btn-danger">Подтвердить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(() => {
            $('.js-delete-btn').on('click', () => {
                $.ajax({
                    url: "{{route('students.api.delete', ['id' => $student->id])}}",
                    type: 'DELETE',
                    success: function (data) {
                        console.log(data)
                        window.location.href = "{{route('groups.info', ['year' => $year_id, 'id' => $group->group->id])}}";
                    }
                })
            })
        })
    </script>
@endpush
