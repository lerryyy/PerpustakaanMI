@extends('user.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title" align="center"> Buku</h2>
                    </div>
                   <div class="panel-body">
                        <a href="{{ url('/user/buku') }}" class="btn btn-success" title="">
                            <i class="fa fa-refresh" aria-hidden="true"></i> 
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/user/buku', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                   <th>Judul Buku</th><th>Penulis</th> <th>Kelas Rak</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($buku as $item)
                                    <tr>
                                        
                                     <td>{{ $item->judul_buku }}</td><td>{{ $item->penulis }}</td><td>{{ $item->kelas_rak }}</td>
                                        <td>
                                            <a href="{{ url('/user/buku/' . $item->id) }}" title="View buku"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $buku->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
