<div class="form-group row">
    <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
    <div class="col-md-6">
        {{ Form::text('firstname', null, [
            'class' => ($errors->has('firstname') ? ' is-invalid ' : '') . 'form-control'
        ]) }}
        @error('firstname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
    <div class="col-md-6">
        {{ Form::text('lastname', null, [
            'class' => ($errors->has('lastname') ? ' is-invalid ' : '') . 'form-control'
        ]) }}
        @error('lastname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
    <div class="col-md-6">
        {{ Form::text('surname', null, [
            'class' => ($errors->has('surname') ? ' is-invalid ' : '') . 'form-control'
        ]) }}
        @error('surname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>
    <div class="col-md-6">
        {{ Form::date('birthday', $student->birthday, [
            'class' => ($errors->has('birthday') ? ' is-invalid ' : '') . 'form-control'
        ]) }}
        @error('birthday')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Group') }}</label>
    <div class="col-md-6">
        {{ Form::select('group_id', $groupsList, null, [
            'class' => ($errors->has('group_id') ? ' is-invalid ' : '') . 'form-control',
            'placeholder' => __('Select a group...')
        ]) }}
        @error('group_id')
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
        <a href="{{route('students.index')}}" class="btn btn-secondary">
            {{ __('Cancel') }}
        </a>
    </div>
</div>
