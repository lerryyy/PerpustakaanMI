@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">detail_transaksi {{ $detail_transaksi->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/detail_transaksi') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/detail_transaksi/' . $detail_transaksi->id . '/edit') }}" title="Edit detail_transaksi"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/detail_transaksi', $detail_transaksi->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete detail_transaksi',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $detail_transaksi->id }}</td>
                                    </tr>
                                    <tr><th> Kondisi Buku </th><td> {{ $detail_transaksi->kondisi_buku }} </td></tr><tr><th> Buku Id </th><td> {{ $detail_transaksi->buku_id }} </td></tr><tr><th> Transaksi Id </th><td> {{ $detail_transaksi->transaksi_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
