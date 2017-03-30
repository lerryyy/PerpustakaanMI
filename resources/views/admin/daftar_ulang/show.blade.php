@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">daftar_ulang {{ $daftar_ulang->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/daftar_ulang') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/daftar_ulang/' . $daftar_ulang->id . '/edit') }}" title="Edit daftar_ulang"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/daftar_ulang', $daftar_ulang->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete daftar_ulang',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $daftar_ulang->id }}</td>
                                    </tr>
                                    <tr><th> Users Id </th><td> {{ $daftar_ulang->users_id }} </td></tr><tr><th> Expired </th><td> {{ $daftar_ulang->expired }} </td></tr><tr><th> Biaya </th><td> {{ $daftar_ulang->biaya }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
