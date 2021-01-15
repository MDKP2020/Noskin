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
                    <th scope="col">Статус</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    @if($group->year_id == ($_GET['year_id'] ?? $academicYear[0]))
                        <tr class="tr">
                            <th scope="row"><input type="checkbox" class="js-group-item"/></th>
                            <td class="align-middle">{{str_replace("*", $group->grade, $group->group->pattern->pattern)}}</td>
                            <td class="align-middle">Отчислена</td>
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
                    <button class="js-transfer-button btn btn-primary mr-1" disabled>Первести группу на следующий курс</button>
                    <button class="js-expel-button btn btn-outline-dark" disabled>Отчислить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(() => {
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

                $(".js-transfer-button")[0].disabled = checkedCount === 0
                $(".js-expel-button")[0].disabled = checkedCount === 0
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

                $(".js-transfer-button")[0].disabled = checkedCount === 0
                $(".js-expel-button")[0].disabled = checkedCount === 0

                $(".js-header-checkbox")[0].checked = checkedCount === checkboxes.length
            })


        })
    </script>
@endpush
