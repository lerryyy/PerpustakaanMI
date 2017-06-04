<?php

namespace App\Http\Controllers\user;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Buku;
use App\Kategori;
use Illuminate\Http\Request;
use Session;
use Illuminate\Routing\Redirector;
use Auth;

class BukuController extends Controller
{



    public function cariBuku(Request $request){
        $buku = Buku::where('judul_buku','LIKE','%'.(isset($request->search)?$request->search:'').'%')
            ->orwhere('penulis','LIKE','%'.(isset($request->search)?$request->search:'').'%')
            ->orwhere('penerbit','LIKE','%'.(isset($request->search)?$request->search:'').'%')
            ->get();

        return $buku;
    }

   
    public function index(Request $request)
    {
        $buku = Buku::where('judul_buku','LIKE','%'.(isset($request->search)?$request->search:'').'%')
                ->orwhere('penulis','LIKE','%'.(isset($request->search)?$request->search:'').'%')
                ->orwhere('penerbit','LIKE','%'.(isset($request->search)?$request->search:'').'%')
                ->paginate(25);

        return view('user.buku.index', compact('buku'));
    }

  
    public function show($id)
    {
        $buku = Buku::findOrFail($id);

        return view('user.buku.show', compact('buku'));
    }

    
}
