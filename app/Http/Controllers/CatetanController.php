<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\Catetan;
use Illuminate\Http\Request;

class CatetanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catetan = Catetan::latest()->paginate(5);

        return view('admin.catetan.index', compact('catetan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categori = Categori::all();
        return view('admin.catetan.create', compact('categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Catetan::create([
            'categori_id' => $request->categori_id,
            'catatan' => $request->catatan
        ]);

        return redirect()->route('catetan.index')->with(['success' => 'Data Berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catetan  $catetan
     * @return \Illuminate\Http\Response
     */
    public function show(Catetan $catetan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catetan  $catetan
     * @return \Illuminate\Http\Response
     */
    public function edit(Catetan $catetan)
    {
        //
        $categori = Categori::all();
        return view('admin.catetan.edit', compact('catetan', 'categori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catetan  $catetan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catetan $catetan)
    {
        $catetan->update([
            'categori_id'     => $request->categori_id,
                'catatan'   => $request->catatan
        ]);

        return redirect()->route('catetan.index')->with(['success' => 'data berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catetan  $catetan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catetan $catetan)
    {
        $catetan->delete();

        return redirect()->route('catetan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
