@extends('layout.main')

@section('title')
    Группа {{str_replace("*", $group->grade, $group->group->pattern->pattern)}}
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-white p-0">
                    <li class="breadcrumb-item"><a class="h1 text-primary" href="{{route('groups.index')}}">Группы</a>
                    </li>
                    <li class="breadcrumb-item active h1"
                        aria-current="page">{{str_replace("*", $group->grade, $group->group->pattern->pattern)}}</li>
                </ol>
            </nav>
        </div>
        <div class="col col-3 text-right">
            <a href="{{route('groups.new', [$group->year_id, $group->group_id])}}" class="btn btn-primary">
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
                @foreach($group->group->students as $student)
                    <tr class="tr">
                        <th scope="row"><input type="checkbox" name="select[]" class="js-user-item"
                                               value="{{$student->id}}"/></th>
                        <td class="align-middle">{{$student->second_name . " " . $student->first_name . " " . $student->patronymic}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            <div class="row justify-content-end">
                <div class="cel">
                    <button type="button" data-toggle="modal" data-target='.transfer_modal'
                            class="btn btn-primary mr-1">Первести студента(ов) на следующий курс
                    </button>
                    <button type="button" data-toggle="modal" data-target='.expel_modal'
                            class="btn btn-outline-dark">Отчислить
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade expel_modal">
        <div class="modal-dialog">
            <form id="expelform">
                <div class="modal-content">
                    <div class="modal-body">
                        Отчисление студента (ов)
                    </div>
                    <input type="button" value="Submit"
                           class="js-expel-btn btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade transfer_modal">
        <div class="modal-dialog">
            <form id="transferform">
                <div class="modal-content">
                    <div class="modal-body">
                        Перевод студента (ов)
                    </div>
                    <input type="button" value="Submit"
                           class="js-transfer-btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(() => {
            $('.js-expel-btn').on('click', () => {
                const ids = [];
                $('.js-user-item').each((index, item) => {
                    if (item.checked) {
                        ids.push(item.value)
                    }
                })
                console.log(ids)
                $.ajax({
                    url: "{{route('groups.students.expel')}}",
                    type: "POST",
                    data: {
                        expel: 1,
                        select: ids
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        window.location.reload();
                    }
                });
            })
        })
    </script>
@endpush
