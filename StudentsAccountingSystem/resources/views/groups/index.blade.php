@extends('layout.main')

@section('title')
    Группы
@endsection

@section('academicYearsSelector')
    <form>
        <div class="d-flex">
            <select class="custom-select mr-2" id="academicYearSelect" name="year_id">
                @foreach($academicYears as $academicYear)
                    <option @if(($_GET['year_id'] ?? -1) == $academicYear['id']) selected
                            @endif value="{{$academicYear['id']}}">
                        {{($academicYear['start_year']) . '-' . (($academicYear['start_year']) + 1)}}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary ml-2" id="group-select-button">
                Перейти
            </button>
        </div>
    </form>
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h1>Группы</h1>
        </div>
        <div class="col col-3 text-right">
            <a href="{{route('groups.create')}}" class="btn btn-primary">
                Добавить группу
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form>
                <input type="text" value="{{$_GET['year_id'] ?? $academicYear[0]}}" name="year_id"
                       style="display: none">
                <div class="form-row align-items-end">
                    <div class="col">
                        <p>Курс</p>
                        <select name="grade" class="custom-select">
                            <option value @if(empty($_GET['grade'])) selected @endif>Все</option>
                            @foreach($grades as $grade)
                                <option @if(($_GET['grade'] ?? -1) == $grade) selected
                                        @endif value="{{$grade}}">{{$grade}}</option>
                            @endforeach
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
                        <input type="checkbox" class="js-header-checkbox"/>
                    </th>
                    <th scope="col">Название</th>
                    <th scope="col">Кол-во студентов</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    @if($group->year_id == ($_GET['year_id'] ?? $academicYear[0]))
                        <tr class="tr">
                            <th scope="row">
                                <input type="checkbox" class="js-group-item" value="{{$group}}"
                                       @if (! \App\Http\Controllers\Utils::canBeTransferredOrExpelled($group))
                                       disabled
                                    @endif
                                />
                            </th>
                            <td class="align-middle">{{str_replace("*", $group->grade, $group->group->pattern->pattern)}}</td>
                            <td class="align-middle">{{\App\Http\Controllers\Utils::getCountInfo($group)}}</td>
                            <td class="text-right">
                                <a class="btn btn-outline-primary"
                                   href="{{route('groups.info', ['year' => $group->year_id, 'id' => $group->group->id])}}">Перейти</a>
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
                    <button class="js-transfer-modal-button btn btn-primary mr-1" data-toggle="modal"
                            data-target=".transfer_modal" disabled>Перевести группу на следующий курс
                    </button>
                    <button class="js-expel-modal-button btn btn-outline-dark" data-toggle="modal"
                            data-target=".expel_modal"
                            disabled>Отчислить
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in-dev-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">В разработке</h5>
                </div>
                <div class="modal-body">
                    <p>Данная функциональнасть находится в разработке :(</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Ок</button>
                </div>
            </div>
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
                        <ul class="js-transfer-group-list list-unstyled">

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

@endsection

@push('scripts')
    <script>
        $(document).ready(() => {
            const canBeTransferred = {!! $canBeTransferred !!}

            $(".js-header-checkbox").on('click', () => {
                const checkboxes = [];
                $(".js-group-item").each((index, item) => {
                    checkboxes.push(item);
                })
                const isChecked = $(".js-header-checkbox")[0].checked
                checkboxes.forEach((item) => item.checked = isChecked);

                let checkedCount = 0;
                checkboxes.forEach((item) => {
                    if (item.checked) checkedCount++;
                })

                let anyCheckedCannotBeTransferred = false;
                for (let checkBox of checkboxes) {
                    const parsed = JSON.parse(checkBox.value);
                    if (checkBox.checked && !canBeTransferred[parsed['id']])
                        anyCheckedCannotBeTransferred = true;
                }

                console.log(anyCheckedCannotBeTransferred)

                $(".js-transfer-modal-button")[0].disabled = checkedCount === 0 || anyCheckedCannotBeTransferred
                $(".js-expel-modal-button")[0].disabled = checkedCount === 0
            });

            $(".js-group-item").on('click', () => {
                const checkboxes = [];
                $(".js-group-item").each((index, item) => {
                    checkboxes.push(item);
                })

                let checkedCount = 0;
                checkboxes.forEach((item) => {
                    if (item.checked) checkedCount++;
                })

                let anyCheckedCannotBeTransferred = false;
                for (let checkBox of checkboxes) {
                    const parsed = JSON.parse(checkBox.value);
                    if (checkBox.checked && !canBeTransferred[parsed['id']])
                        anyCheckedCannotBeTransferred = true;
                }

                $(".js-transfer-modal-button")[0].disabled = checkedCount === 0 || anyCheckedCannotBeTransferred
                $(".js-expel-modal-button")[0].disabled = checkedCount === 0

                $(".js-header-checkbox")[0].checked = checkedCount === checkboxes.length
            })

            $('.js-transfer-modal-button').on('click', () => {
                $('.js-transfer-group-list').empty();
                let selectedGroups = []
                $('.js-group-item').each((index, item) => {
                    if (item.checked) {
                        selectedGroups.push(JSON.parse(item.value));
                    }
                });

                selectedGroups.forEach((item) => {
                    $('.js-transfer-group-list').append(`<li><b>${item.group.pattern.pattern}</b></li>`.replace("*", item.grade))
                });
            });

            $('.js-transfer-btn').on('click', () => {
                const selectedGroups = [];
                $('.js-group-item').each((index, item) => {
                    if (item.checked && !item.disabled) {
                        selectedGroups.push(JSON.parse(item.value));
                    }
                })
                console.log(selectedGroups);

                $.ajax({
                    url: "{{route('groups.transfer')}}",
                    type: "POST",
                    data: {
                        year_id: {{$_GET['year_id'] ?? $academicYear[0]}},
                        select: selectedGroups.map((item) => item.id)
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        window.location.reload();
                    }
                });
            })

            $('.js-expel-btn').on('click', () => {
                const selectedGroups = [];
                $('.js-group-item').each((index, item) => {
                    if (item.checked && !item.disabled) {
                        selectedGroups.push(JSON.parse(item.value));
                    }
                })
                console.log(selectedGroups);
                $.ajax({
                    url: "{{route('groups.expel')}}",
                    type: "POST",
                    data: {
                        select: selectedGroups.map((item) => item.id),
                        year_id: "{{$_GET['year_id'] ?? $academicYear[0]}}",
                        expel_reason_id: $('.js-expel-reason-select')[0].value
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        window.location.reload();
                    }
                });
            });
        })
    </script>
@endpush
