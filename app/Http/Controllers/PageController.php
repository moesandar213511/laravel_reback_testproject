<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function index(){
    	$products = Product::orderBy('id', 'desc')->get();
    	// $products = Product::latest('id')->get();// next method to get all data with desc order
    	// echo "<pre>";
    	// print_r($products);
    	return view('home',compact('products'));
    }
    public function add_cart(Request $request,$id){ // card 1 / 2 / 3 / 4 / 5 / 6
        $items = array();
        echo "id is ".$request->id."<br>"; // 1 / 2 / 3 / 4 / 5 / 6
        if($request->session()->has('items')){
            $rr = $request->session()->has('items');
            echo $rr."<br>"; // 1
            $items = $request->session()->get('items');
            echo json_encode($items); // ["1","2","3","4","5"]
            if(!in_array($id, $items)){
                array_push($items,$id);
            }
        }else{
            array_push($items, $id);
        }

        $request->session()->put('items',$items); // to store data in the session

        //$request->session()->flush(); // session clear

        $products = Product::orderBy('id', 'desc')->get();
        return view('home',compact('products'));
    }
    public function show(Request $request){
        $carts = $request->session()->get('items');
        $products = array();

        for($i = 0; $i < count($carts); $i++){
            $product = Product::find($carts[$i]);
            array_push($products,$product);
        }

        return view('cart',compact('products'));
    }
}
