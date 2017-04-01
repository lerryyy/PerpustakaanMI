<div class="form-group {{ $errors->has('barcode') ? 'has-error' : ''}}">
    {!! Form::label('barcode', 'Barcode', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('barcode', null, ['class' => 'form-control']) !!}
        {!! $errors->first('barcode', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('judul_buku') ? 'has-error' : ''}}">
    {!! Form::label('judul_buku', 'Judul Buku', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('judul_buku', null, ['class' => 'form-control']) !!}
        {!! $errors->first('judul_buku', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('penulis') ? 'has-error' : ''}}">
    {!! Form::label('penulis', 'Penulis', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('penulis', null, ['class' => 'form-control']) !!}
        {!! $errors->first('penulis', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('penerbit') ? 'has-error' : ''}}">
    {!! Form::label('penerbit', 'Penerbit', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('penerbit', null, ['class' => 'form-control']) !!}
        {!! $errors->first('penerbit', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tahun_terbit') ? 'has-error' : ''}}">
    {!! Form::label('tahun_terbit', 'Tahun Terbit', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tahun_terbit', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tahun_terbit', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tahun_masuk') ? 'has-error' : ''}}">
    {!! Form::label('tahun_masuk', 'Tahun Masuk', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tahun_masuk', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tahun_masuk', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('isbn_buku') ? 'has-error' : ''}}">
    {!! Form::label('isbn_buku', 'Isbn Buku', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('isbn_buku', null, ['class' => 'form-control']) !!}
        {!! $errors->first('isbn_buku', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('kelas_rak') ? 'has-error' : ''}}">
    {!! Form::label('kelas_rak', 'Kelas Rak', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('kelas_rak', null, ['class' => 'form-control']) !!}
        {!! $errors->first('kelas_rak', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('kategori_id') ? 'has-error' : ''}}">
    {!! Form::label('kategori_id', 'Kategori', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('kategori_id',$kategori, null, ['class' => 'form-control']) !!}
        {!! $errors->first('kategori_id',$kategori, '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    {!! Form::label('foto', 'File Scan Buku', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('foto', null, ['class' => 'form-control']) !!}
        <br \>
        <div id="image-holder"> </div>

       
        <script type="text/javascript">
            $("#foto").on('change', function () {

                if (typeof (FileReader) != "undefined") {

                    var image_holder = $("#image-holder");
                    image_holder.empty();

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "thumb-image",
                            "width":300,
                        }).appendTo(image_holder);

                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }

            });
        </script>

        {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
