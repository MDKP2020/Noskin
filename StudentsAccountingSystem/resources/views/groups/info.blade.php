@extends('layout.main')

@section('title')
    Группа {{str_replace("*", $group->grade, $group->group->pattern->pattern)}}
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-white p-0">
                    <li class="breadcrumb-item"><a class="h1 text-primary"
                                                   href="{{route('groups.index', ['year_id' => $year_id])}}">Группы</a>
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
                        <input class="js-header-checkbox" type="checkbox"/>
                    </th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Информация</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($group->group->students as $student)
                    @if (\App\Http\Controllers\Utils::createFirstDateFromId($year_id) == $student->pivot->start_date)
                        <tr class="tr">
                            <th scope="row">

                                <input type="checkbox" name="select[]" class="js-user-item align-middle"
                                       value="{{$student}}"
                                       @if (\App\Http\Controllers\Utils::isTransferredById($student->pivot->id)
                                        || \App\Http\Controllers\Utils::isExpelledById($student->pivot->id) )
                                       disabled
                                    @endif
                                />

                            </th>
                            <td class="align-middle">{{$student->second_name . " " . $student->first_name . " " . $student->patronymic}}</td>

                            <td id="info" class="align-middle">
                                {{  \App\Http\Controllers\Utils::getInfoString($student)  }}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-outline-primary"
                                   href="{{route('group.student', ['year' => $year_id, 'group_id' => $group->group->id, 'id' => $student->id])}}">Перейти</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            <div class="row justify-content-end">
                <div class="cel">
                    @if ($group->grade != 4)
                        <button type="button" data-toggle="modal" data-target='.transfer_modal'
                                class="js-transfer-modal-button btn btn-primary mr-1" disabled>Перевести студента(ов) на
                            следующий курс
                        </button>
                    @endif
                    <button type="button" data-toggle="modal" data-target='.expel_modal'
                            class="js-expel-modal-button btn btn-outline-dark" disabled>Отчислить
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade expel_modal">
        <div class="modal-dialog modal-dialog-centered">
            <form id="expelform">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтвердите действие</h5>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите отчислить студента(ов)?</p>
                        <ul class="js-expel-users-list list-unstyled">

                        </ul>
                        <p>Выберите причину отчисления</p>
                        <select name="expel_reason" class="js-expel-reason-select custom-select">
                            @foreach($expelReasons as $expelReason)
                                <option value="{{$expelReason->id}}">{{$expelReason->reason}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                        <input type="button" class="js-expel-btn btn btn-primary" value="Подтвердить">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade transfer_modal">
        <div class="modal-dialog modal-dialog-centered">
            <form id="transferform">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтвердите действие</h5>
                    </div>
                    <div class="modal-body">
                        <p>Вы уверены что хотите перевести этих студентов на следующий курс?</p>
                        <ul class="js-transfer-users-list list-unstyled">

                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                        <input type="button" class="js-transfer-btn btn btn-primary" value="Подтвердить">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(() => {
            $('.js-expel-modal-button').on('click', () => {
                $('.js-expel-users-list').empty();
                let selectedUsers = []
                $('.js-user-item').each((index, item) => {
                    if (item.checked) {
                        selectedUsers.push(JSON.parse(item.value));
                    }
                });
                selectedUsers.forEach((item) => {
                    $('.js-expel-users-list').append(`<li><b>${item.second_name} ${item.first_name} ${item.patronymic}</b></li>`)
                });
            });

            $('.js-transfer-modal-button').on('click', () => {
                $('.js-transfer-users-list').empty();
                let selectedUsers = []
                $('.js-user-item').each((index, item) => {
                    if (item.checked) {
                        selectedUsers.push(JSON.parse(item.value));
                    }
                });
                selectedUsers.forEach((item) => {
                    $('.js-transfer-users-list').append(`<li><b>${item.second_name} ${item.first_name} ${item.patronymic}</b></li>`)
                });
            });

            $('.js-header-checkbox').on('click', () => {
                const isChecked = $('.js-header-checkbox')[0].checked
                let checkboxes = []
                $('.js-user-item').each((index, item) => {
                    if (!item.disabled) {
                        item.checked = isChecked;
                        checkboxes.push(item);
                    }
                });

                let checkedCount = 0;
                for (let i = 0; i < checkboxes.length; ++i) {
                    if (checkboxes[i].checked) {
                        checkedCount++;
                    }
                }
                if ($('.js-transfer-modal-button')[0])
                    $('.js-transfer-modal-button')[0].disabled = checkedCount === 0
                $('.js-expel-modal-button')[0].disabled = checkedCount === 0
            });

            $('.js-user-item').on('click', () => {
                let checkboxes = []
                $('.js-user-item').each((index, data) => {
                    if (!data.disabled)
                        checkboxes.push(data)
                })

                let checkedCount = 0;
                for (let i = 0; i < checkboxes.length; ++i) {
                    if (checkboxes[i].checked) {
                        checkedCount++;
                    }
                }

                if ($('.js-transfer-modal-button')[0])
                    $('.js-transfer-modal-button')[0].disabled = checkedCount === 0
                $('.js-expel-modal-button')[0].disabled = checkedCount === 0

                $('.js-header-checkbox')[0].checked = checkedCount === checkboxes.length
            })

            $('.js-expel-btn').on('click', () => {
                const selectedUsers = [];
                $('.js-user-item').each((index, item) => {
                    if (item.checked && !item.disabled) {
                        selectedUsers.push(JSON.parse(item.value));
                    }
                })
                console.info(selectedUsers);
                $.ajax({
                    url: "{{route('groups.students.expel')}}",
                    type: "POST",
                    data: {
                        group_id: "{{$group->group->id}}",
                        expel: 1,
                        select: selectedUsers.map((item) => item.id),
                        year_id: "{{$year_id}}",
                        expel_reason_id: $('.js-expel-reason-select')[0].value
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        window.location.reload();
                    }
                });
            });

            $('.js-transfer-btn').on('click', () => {
                const selectedUsers = [];
                $('.js-user-item').each((index, item) => {
                    if (item.checked && !item.disabled) {
                        selectedUsers.push(JSON.parse(item.value));
                    }
                })
                console.log(selectedUsers);

                $.ajax({
                    url: "{{route('groups.students.transfer')}}",
                    type: "POST",
                    data: {
                        expel: 1,
                        year_id: "{{$year_id}}",
                        group_id: "{{$group->group->id}}",
                        select: selectedUsers.map((item) => item.id)
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
