  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 

<script type="text/javascript">

    $( function() {
        $( "#tanggal_pinjam").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );
</script>

<script type="text/javascript">

    $( function() {
        $( "#tanggal_deadline").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );
</script>

<script type="text/javascript">

    $( function() {
        $( "#tanggal_kembali").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    } );
</script>


<div class="form-group {{ $errors->has('tanggal_pinjam') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_pinjam', 'Tanggal Pinjam', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tanggal_pinjam', null, ['required'=>'required','class' => 'form-control','placeholder'=>'Tanggal-Bulan-Hari']) !!}
        {!! $errors->first('tanggal_pinjam', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal_kembali') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_kembali', 'Tanggal Kembali', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tanggal_kembali', null, ['required'=>'required','class' => 'form-control','placeholder'=>'Tanggal-Bulan-Hari']) !!}
        {!! $errors->first('tanggal_kembali', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal_deadline') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_deadline', 'Tanggal Deadline', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tanggal_deadline', null, ['required'=>'required','class' => 'form-control','placeholder'=>'Tanggal-Bulan-Hari']) !!}
        {!! $errors->first('tanggal_deadline', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('denda') ? 'has-error' : ''}}">
    {!! Form::label('denda', 'Denda', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('denda', null, ['class' => 'form-control','placeholder'=>'Masukkan Denda']) !!}
        {!! $errors->first('denda', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('keterangan', null, ['class' => 'form-control','placeholder'=>'Masukkan Keterangan']) !!}
        {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control','placeholder'=>'Masukkan User ID']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
