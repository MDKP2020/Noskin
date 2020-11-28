@extends('layout.main')

@section('title')
    Create Major
@endsection

@section('content')
    <h2>Создать направление</h2>
    <form method="post" action="{{route('majors.createFromForm')}}">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" aria-describedby="validationServerNameFeedback">
            @error('name')
            <div id="validationServerNameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="code">Код</label>
            <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" id="code" value="{{old('code')}}" aria-describedby="validationServerCodeFeedback">
            @error('code')
            <div id="validationServerCodeFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
