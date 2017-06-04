@extends('user.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">buku {{ $buku->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/buku') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $buku->id }}</td>
                                    </tr>
                                    <tr><th> Barcode </th><td> {{ $buku->barcode }} </td></tr><tr><th> Judul Buku </th><td> {{ $buku->judul_buku }} </td></tr><tr><th> Penulis </th><td> {{ $buku->penulis }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
