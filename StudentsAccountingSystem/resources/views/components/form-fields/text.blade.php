@if(!empty($name))

    <div class="form-group">
        <label for="{{$name}}">{{$title}}</label>
        <input name="{{$name}}" type="{{$type ?? 'text'}}" class="form-control @error($name) is-invalid @enderror"
               id="{{$name}}" value="{{old($name)}}" aria-describedby="validation_server_{{$name}}_feedback">
        @error($name)
        <div id="validation_server_{{$name}}_feedback" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

@endif
