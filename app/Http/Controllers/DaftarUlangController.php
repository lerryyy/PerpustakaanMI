<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DaftarUlang;
use Illuminate\Http\Request;
use Session;
use Auth;

class DaftarUlangController extends Controller
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
        $daftar_ulang = DaftarUlang::paginate(25);


        return view('admin.daftar_ulang.index', compact('daftar_ulang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.daftar_ulang.create');
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
        
        DaftarUlang::create($requestData);

        Session::flash('flash_message', 'DaftarUlang added!');

        return redirect('admin/daftar_ulang');
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
        $daftar_ulang = DaftarUlang::findOrFail($id);

        return view('admin.daftar_ulang.show', compact('daftar_ulang'));
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
        $daftar_ulang = DaftarUlang::findOrFail($id);

        return view('admin.daftar_ulang.edit', compact('daftar_ulang'));
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
        
        $daftar_ulang = DaftarUlang::findOrFail($id);
        $daftar_ulang->update($requestData);

        Session::flash('flash_message', 'DaftarUlang updated!');

        return redirect('admin/daftar_ulang');
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
        DaftarUlang::destroy($id);

        Session::flash('flash_message', 'DaftarUlang deleted!');

        return redirect('admin/daftar_ulang');
    }
}
