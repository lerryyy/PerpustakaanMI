@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title" align="center">Transaksi</h2>
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/transaksi/create') }}" class="btn btn-success btn-sm" title="Add New transaksi">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/transaksi', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Tanggal Deadline</th><th>Denda</th><th>Keterangan</th><th>User ID</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transaksi as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tanggal_pinjam }}</td>
                                        <td>{{ $item->tanggal_kembali }}</td>
                                        <td>{{ $item->tanggal_deadline }}</td>
                                        <td>{{ $item->denda }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>
                                            <a href="{{ url('/admin/transaksi/' . $item->id) }}" title="View transaksi"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/transaksi/' . $item->id . '/edit') }}" title="Edit transaksi"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/transaksi', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete transaksi',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $transaksi->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
