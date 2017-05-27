<div class="form-group {{ $errors->has('users_id') ? 'has-error' : ''}}">
    {!! Form::label('users_id', 'Users Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('users_id', null, ['class' => 'form-control','placeholder'=>'Masukkan User ID']) !!}
        {!! $errors->first('users_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('expired') ? 'has-error' : ''}}">
    {!! Form::label('expired', 'Expired', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('expired', null, ['class' => 'form-control','placeholder'=>'Expired']) !!}
        {!! $errors->first('expired', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('biaya') ? 'has-error' : ''}}">
    {!! Form::label('biaya', 'Biaya', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('biaya', null, ['class' => 'form-control','placeholder'=>'Masukkan Biaya']) !!}
        {!! $errors->first('biaya', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
