<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function index()
    {
        $data = Wishlist::all();
        return view('list')->with('wishlist', $data);
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'product_link' => 'required',
        'description' => 'required',
        'thumbnail_name' => 'required',
        'price' => 'required'
        ]);
        Wishlist::create($request->all());
        return redirect('/');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Wishlist::where($where)->first();
        return view('edit')->with('wishlist', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'product_link' => 'required',
            'description' => 'required',
            'thumbnail_name' => 'required',
            'price' => 'required'
        ]);
        $update = [
            'name' => $request->name,
            'description' => $request->description,
            'product_link' => $request->product_link,
            'thumbnail_name' => $request->thumbnail_name,
            'price' => $request->price
        ];
        Wishlist::where('id', $id)->update($update);
        return redirect('/');
    }


    public function destroy($id)
    {
        Wishlist::where('id',$id)->delete();
        return redirect('/');
    }
}
