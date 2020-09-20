<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WishlistController extends Controller
{

    public function index()
    {
        $data = Wishlist::all();
        return view('wishlist.list')->with('wishlist', $data);
    }


    public function create()
    {
        return view('wishlist.create');
    }

    public function store(Request $request)
    {

        if (!Auth::check()) { return; }

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'null.jpg';
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::id();
        $wishlist->name = $request->name;
        $wishlist->thumbnail_name = $fileNameToStore;
        $wishlist->description = $request->description;
        $wishlist->price = $request->price;
        $wishlist->product_link = $request->product_link;
        $wishlist->save();

        return redirect('wishlist.list');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Wishlist::where($where)->first();
        return view('wishlist.edit')->with('wishlist', $data);
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
        return redirect('wishlist.list');
    }


    public function destroy($id)
    {
        Wishlist::where('id',$id)->delete();
        return redirect('/');
    }
}
