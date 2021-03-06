<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kategori;
use Illuminate\Http\Request;
use Session;
use Auth;

class KategoriController extends Controller
{


    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->admin_perpustakaan!=1) {
                return redirect('/home');
            }

            return $next($request);
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $kategori = Kategori::where('nama','LIKE','%'.(isset($request->search)?$request->search:'').'%')
                ->paginate(25);
       
        return view('admin.kategori.index', compact('kategori'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kategori.create');
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
        
        Kategori::create($requestData);

        Session::flash('flash_message', 'Kategori added!');

        return redirect('admin/kategori');
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
        $kategori = Kategori::findOrFail($id);

        return view('admin.kategori.show', compact('kategori'));
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
        $kategori = Kategori::findOrFail($id);

        return view('admin.kategori.edit', compact('kategori'));
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
        
        $kategori = Kategori::findOrFail($id);
        $kategori->update($requestData);

        Session::flash('flash_message', 'Kategori updated!');

        return redirect('admin/kategori');
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
        Kategori::destroy($id);

        Session::flash('flash_message', 'Kategori deleted!');

        return redirect('admin/kategori');
    }
}
