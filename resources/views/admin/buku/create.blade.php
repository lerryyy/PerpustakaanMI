@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title" align="center">Create New Buku</h2>
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/buku') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/buku', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.buku.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
