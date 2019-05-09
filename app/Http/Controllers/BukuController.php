<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::all()->toArray();
        return view('data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
          'judul'         =>  'required',
          'pengarang'     =>  'required',
          'kategori'      =>  'required',
          'tahunTerbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = new Buku([
          'judul'         =>  $request->get('judul'),
          'pengarang'     =>  $request->get('pengarang'),
          'kategori'      =>  $request->get('kategori'),
          'tahunTerbit'   =>  $request->get('tahunTerbit'),
          'penerbit'      =>  $request->get('penerbit')
      ]);
      $data->save();
      return redirect()->route('data.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku, $id)
    {
        $data = Buku::find($id);
        return view('data.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku, $id)
    {
        $this->validate($request, [
          'judul'         =>  'required',
          'pengarang'     =>  'required',
          'kategori'      =>  'required',
          'tahunTerbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);

      $data = Buku::find($id);

      $data->judul=$request->get('judul');
      $data->pengarang=$request->get('pengarang');
      $data->kategori=$request->get('kategori');
      $data->tahunTerbit=$request->get('tahunTerbit');
      $data->penerbit=$request->get('penerbit');

      $data->save();
      return redirect()->route('data.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku, $id)
    {
        $data = Buku::find($id);
      $data->delete();
      return redirect()->route('data.index')->with('success', 'Data Deleted');
    }
}
