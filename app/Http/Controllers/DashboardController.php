<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){

        //SEARCH
        $search = request ('search');
        if ($search) {
            $products = Product::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        }else{
        // SELECT ALL PRODUCTS
        $products = Product::All();
        }


        if(Auth::user()->hasRole('user')){
            return view('/user/dashboard', ['products' => $products, 'search' => $search]);

        }elseif(Auth::user()->hasRole('admin')){
            return view('/admin/admindash');
        }

    }

    // FOR USERS

    public function mycart(){
        return view('/user/mycart');
    }

    // FOR ADMIN

    public function create(){
        return view('/admin/create');
    }

    public function store(Request $request){
        $product = new product();

        $product->name = $request->name;
        $product->price = $request->price;

        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid() ){

            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'), $imageName );

            $product->image = $imageName;

            $product->save();

        return redirect('/dashboard')->with('msg', 'Product released successfully');

        }

    }

    public function show($id){

        $product = Product::findOrFail($id); // Encontrar o ID do produto

        return view('/user/show', ['product' => $product]);

    }

}
