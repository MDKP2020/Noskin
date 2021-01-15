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
                        <input class="js-header-checkbox" type="checkbox"/>
                    </th>
                    <th scope="col">ФИО</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group->group->students as $student)
                    <tr class="tr">
                        <th scope="row">
                            <input type="checkbox" name="select[]" class="js-user-item" value="{{$student->id}}"/>
                        </th>
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
                            class="js-transfer-modal-button btn btn-primary mr-1" disabled>Первести студента(ов) на следующий курс
                    </button>
                    <button type="button" data-toggle="modal" data-target='.expel_modal'
                            class="js-expel-modal-button btn btn-outline-dark" disabled>Отчислить
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade expel_modal">
        <div class="modal-dialog">
            <form id="expelform">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подвтердите действие</h5>
                    </div>
                    <div class="modal-body">
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
        <div class="modal-dialog">
            <form id="transferform">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подвтердите действие</h5>
                    </div>
                    <div class="modal-body">
                        <p>Вы уверены что хотите первести эти группы на следющий курс?</p>
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
            $('.js-header-checkbox').on('click', () => {
                const isChecked = $('.js-header-checkbox')[0].checked
                let checkboxes = []
                $('.js-user-item').each((index, item) => {
                    item.checked = isChecked;
                    checkboxes.push(item);
                });

                let checkedCount = 0;
                for(let i = 0; i < checkboxes.length; ++i) {
                    if(checkboxes[i].checked) {
                        checkedCount++;
                    }
                }

                $('.js-transfer-modal-button')[0].disabled = checkedCount === 0
                $('.js-expel-modal-button')[0].disabled = checkedCount === 0
            });

            $('.js-user-item').on('click', () => {
                let checkboxes = []
                $('.js-user-item').each((index, data) => { checkboxes.push(data) })

                let checkedCount = 0;
                for(let i = 0; i < checkboxes.length; ++i) {
                    if(checkboxes[i].checked) {
                        checkedCount++;
                    }
                }

                $('.js-transfer-modal-button')[0].disabled = checkedCount === 0
                $('.js-expel-modal-button')[0].disabled = checkedCount === 0

                $('.js-header-checkbox')[0].checked = checkedCount === checkboxes.length
            })

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
                        select: ids,
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
                const ids = [];
                $('.js-user-item').each((index, item) => {
                    if (item.checked) {
                        ids.push(item.value)
                    }
                })
                console.log(ids)
                $.ajax({
                    url: "{{route('groups.students.transfer')}}",
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
