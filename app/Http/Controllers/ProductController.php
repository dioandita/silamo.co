<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Kategori;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RajaOngkir;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $data=Product::with('kategoris')->get();
        return view('admin.pages.dataproduct.index',compact('data')); 
    }
    public function create()
    {
        $data=Kategori::all();
        return view('admin.pages.dataproduct.add',compact('data'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
            'berat' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $input['name'] = $request->name;
        $input['deskripsi'] = $request->deskripsi;   
        $input['id_kategori'] = $request->id_kategori;   
        $input['berat'] = $request->berat;
        $input['qty'] = $request->qty; 
        $input['price'] = $request->price; 

        //image Upload
        if ($request->hasFile('image')) {
            $dir = 'images/shop';
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $input['image'] = str_random().'.'.$request->image->getClientOriginalExtension(); // rename image 
            $request->file('image')->move($dir, $input['image']); //move image
            
        }
                
        Product::Create($input);
        return redirect()->route('dataproduct.index')->with('message', 'Product berhasil Ditambah!');
    
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data=Kategori::all();
        $item = Product::findOrfail($id);
        return view('admin.pages.dataproduct.edit', compact('item','data'));
    }
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'name' => 'required',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
            'berat' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data= Product::findOrfail($id);
       
        $input['name'] = $request->name;
        $input['deskripsi'] = $request->deskripsi;   
        $input['id_kategori'] = $request->id_kategori;   
        $input['berat'] = $request->berat;
        $input['qty'] = $request->qty; 
        $input['price'] = $request->price; 
        //image edit
        $image = Product::find($id);
        if ($request->hasFile('image')) {
            $dir = 'images/shop/';
            if ($image->image != '' && Product::exists($dir . $image->image))
                File::delete($dir . $image->image);
                $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
                $input['image'] = str_random().'.'.$request->image->getClientOriginalExtension(); // rename image 
                $request->file('image')->move($dir, $input['image']); //move image
           
        } elseif ($request->remove == 1 && File::exists('images/shop/' . $image->image)) {
            File::delete('images/shop/' . $image->post_image);
            $input['image'] = null;
        }
        
        Product::find($id)->update($input);
        return redirect()->route('dataproduct.index')->with('message', 'Product berhasil diubah!');
        
    }
    public function destroy($id)
    {
            $image=Product::find($id);
            $dir = 'images/shop/';
            if ($image->image != '' && Product::exists($dir . $image->image)){
                File::delete($dir . $image->image);
                Product::destroy($id);
                return redirect()->route('dataproduct.index')->with('message', 'Product berhasil dihapus!');
            }
                
            
        
    }
}
