<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DetailTransaksi;
use Illuminate\Http\Request;
use Session;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $detail_transaksi = DetailTransaksi::paginate(25);

       
        return view('admin.detail_transaksi.index', compact('detail_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.detail_transaksi.create');
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
        
        DetailTransaksi::create($requestData);

        Session::flash('flash_message', 'DetailTransaksi added!');

        return redirect('admin/detail_transaksi');
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
        $detail_transaksi = DetailTransaksi::findOrFail($id);

        return view('admin.detail_transaksi.show', compact('detail_transaksi'));
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
        $detail_transaksi = DetailTransaksi::findOrFail($id);

        return view('admin.detail_transaksi.edit', compact('detail_transaksi'));
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
        
        $detail_transaksi = DetailTransaksi::findOrFail($id);
        $detail_transaksi->update($requestData);

        Session::flash('flash_message', 'DetailTransaksi updated!');

        return redirect('admin/detail_transaksi');
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
        DetailTransaksi::destroy($id);

        Session::flash('flash_message', 'DetailTransaksi deleted!');

        return redirect('admin/detail_transaksi');
    }
}
