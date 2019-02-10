<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Illuminate\Validation\Rule;



class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $data=Kategori::all();
        return view('admin.pages.datakategori.index',compact('data')); 
    }
    public function create()
    {
        return view('admin.pages.datakategori.add');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:kategoris,name',
        ]);

        $data = Kategori::Create($request->all());
        return redirect()->route('datakategori.index')->with('message', 'Kategori berhasil Ditambah!');
    
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data = Kategori::findOrfail($id);
        return view('admin.pages.datakategori.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'name' => 'required|unique:kategoris,name',$id,
        ]);

        $data = Kategori::findOrFail($id)->update($request->all());
        return redirect()->route('datakategori.index')->with('message', 'Kategori berhasil diubah!');
        
    }
    public function destroy($id)
    {
        $data = Kategori::findOrFail($id)->delete();
        return redirect()->route('datakategori.index')->with('message', 'Ktegori berhasil dihapus!');
    }
}
