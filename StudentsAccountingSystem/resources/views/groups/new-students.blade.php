@extends('layout.main')

@section('title')
    Новый студент в {{str_replace("*", $group->grade, $group->pattern->pattern)}}
@endsection

@section('content')
    <p>Новый студент гр. {{str_replace("*", $group->grade, $group->pattern->pattern)}}</p>
@endsection
