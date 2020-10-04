<div class="form-group row">
    <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
    <div class="col-md-6">
        {{ Form::text('number', null, [
            'class' => ($errors->has('number') ? ' is-invalid ' : '') . 'form-control'
        ]) }}
        @error('number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="Course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>
    <div class="col-md-6">
        {{ Form::number('course', null, [
            'class' => ($errors->has('course') ? ' is-invalid ' : '') . 'form-control',
            'min' => 1, 'max' => 5,
        ]) }}
        @error('course')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Faculty') }}</label>
    <div class="col-md-6">
        {{ Form::text('faculty', null, [
            'class' => ($errors->has('faculty') ? ' is-invalid ' : '') . 'form-control'
        ]) }}
        @error('faculty')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Ok') }}
        </button>
        <a href="{{route('groups.index')}}" class="btn btn-secondary">
            {{ __('Cancel') }}
        </a>
    </div>
</div>
