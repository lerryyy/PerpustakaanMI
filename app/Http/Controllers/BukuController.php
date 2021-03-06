<?php

namespace App\Http\Controllers;

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

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->admin_perpustakaan!=1) {
                return redirect('/home');
            }

            return $next($request);
        });

    }

    public function cariBuku(Request $request){
        $buku = Buku::where('judul_buku','LIKE','%'.(isset($request->search)?$request->search:'').'%')
            ->orwhere('penulis','LIKE','%'.(isset($request->search)?$request->search:'').'%')
            ->orwhere('penerbit','LIKE','%'.(isset($request->search)?$request->search:'').'%')
            ->get();

        return $buku;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $buku = Buku::where('judul_buku','LIKE','%'.(isset($request->search)?$request->search:'').'%')
                ->orwhere('penulis','LIKE','%'.(isset($request->search)?$request->search:'').'%')
                ->orwhere('penerbit','LIKE','%'.(isset($request->search)?$request->search:'').'%')
                ->paginate(25);

        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $kategori = Kategori::pluck('nama','id');

        return view('admin.buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

       try{
            DB::beginTransaction();

            $buku=Buku::create($requestData);

            $path=null;

            if( $request->hasFile('foto')) {
                $ext=File::extension($request->file('foto')->getClientOriginalName());
                $path = $request->foto->storeAs('scan_buku', $buku->id.'.'.$ext,'local_public');
            }
            if($path!=null){
                $buku->foto=$path;
                $buku->save();
            }


            DB::commit();

            Session::flash('flash_message', 'Buku added!');
            }catch(Exception $e){
            DB::rollback();
        }

            return redirect('admin/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);

        return view('admin.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::pluck('nama','id');

        return view('admin.buku.edit', compact('buku','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        try{
            DB::beginTransaction();

           $buku = Buku::where('id',$id)->firstOrFail();
            $buku->update($requestData);

            $path=null;

            if( $request->hasFile('foto')) {
                $ext=File::extension($request->file('foto')->getClientOriginalName());
                $path = $request->foto->storeAs('scan_buku', $buku->id.'.'.$ext,'local_public');
            }
            if($path!=null){
                $buku->foto=$path;
                $buku->save();
            }


            DB::commit();

            Session::flash('flash_message', 'Buku added!');
            }catch(Exception $e){
            DB::rollback();
        }

            return redirect('admin/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    { 
        try{

        $buku=Buku::where('id',$id);
        File::delete(public_path().'\\'.str_replace("/","\\",$buku->first()->foto));
        $buku->delete();
        Session::flash('flash_message', 'Buku deleted!');

        return redirect('admin/buku');

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
