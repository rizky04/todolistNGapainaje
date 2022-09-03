<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $categori = Categori::all();
        $categori = Categori::latest()->paginate(5);

        return view('admin.categori.index', compact('categori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categori.create');
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
        Categori::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('categori.index')->with(['success' => 'Data Berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function show(Categori $categori)
    {
        //

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function edit(Categori $categori)
    {
        //
        return view('admin.categori.edit', compact('categori'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categori $categori)
    {
        //
        $categori->update([
            'nama'     => $request->nama,
                'keterangan'   => $request->keterangan
        ]);

        return redirect()->route('categori.index')->with(['success' => 'data berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categori $categori)
    {
        //delete post
        $categori->delete();

        return redirect()->route('categori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
