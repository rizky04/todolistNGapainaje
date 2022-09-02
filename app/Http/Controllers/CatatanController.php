<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Catatan::all();

        return view('welcome', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $simpan = Catatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'prioritas' => $request->prioritas
        ]);

        if($simpan){
            return response()->json(['text', 'Catatan berhasil disimpan'], 200);
        }else{
            return response()->json(['text', 'Catatan gagal disimpan'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function show(Catatan $catatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $data = Catatan::find($request->id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Catatan::find($request->id);
        $update = $data->update($request->all());
        if($update){
            return response()->json(['text'=>'Data Berhasil Disimpan'], 200);
        }else{
            return response()->json(['text'=>'Data Gagal Disimpan'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Catatan::find($request->id);
        $hapus = $data->delete($request->all());

        if($hapus){
            return response()->json(['text' => 'Data berhasil dihapus'], 200);
        }else{
            return response()->json(['text' => 'sistem error'], 400);
        }
    }

    public function isDone(Catatan $catatan){

        $catatan->update(['isDone' => true]);


        return view('welcome');

    }
}
