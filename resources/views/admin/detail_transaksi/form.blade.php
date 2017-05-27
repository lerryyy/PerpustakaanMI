<div class="form-group {{ $errors->has('kondisi_buku') ? 'has-error' : ''}}">
    {!! Form::label('kondisi_buku', 'Kondisi Buku', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('kondisi_buku', null, ['class' => 'form-control','placeholder'=>'Masukkan Kondisi Buku']) !!}
        {!! $errors->first('kondisi_buku', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('buku_id') ? 'has-error' : ''}}">
    {!! Form::label('buku_id', 'Buku', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('buku_id', $buku, null, ['class' => 'form-control','placeholder'=>'Masukkan Buku ID']) !!}
        {!! $errors->first('buku_id', $buku, '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('transaksi_id') ? 'has-error' : ''}}">
    {!! Form::label('transaksi_id', 'Transaksi Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('transaksi_id', null, ['class' => 'form-control','placeholder'=>'Masukkan Transaksi ID']) !!}
        {!! $errors->first('transaksi_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
