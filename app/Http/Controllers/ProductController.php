<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $products = Product::orderBy( 'name', 'DESC' )->get();
        return $products;
    }

    public function productsWithTags(){
        $products = Product::with( 'tags' )->get();
        return $products;
    }

    /*** Show the form for creating a new resource. @return \Illuminate\Http\Response */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ){
        $newProduct = new Product;
        $newProduct->name = $request->product[ 'name' ];
        $newProduct->description = $request->product[ 'description' ];
        $newProduct->price = $request->product[ 'price' ];
        $newProduct->img_src_path = $request->product[ 'img_src_path' ];
        $newProduct->save();

        return $newProduct;
    }

    /*** Display the specified resource. @param  int  $id @return \Illuminate\Http\Response */
    public function show( $id ){}

    /*** Show the form for editing the specified resource. @param  int  $id @return \Illuminate\Http\Response */
    public function edit( $id ){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ){
        $existingProduct = Product::find( $id ); // could use findOrFail($id)

        if($existingProduct){
            $existingProduct->name = $request->product[ 'name' ];
            $existingProduct->description = $request->product[ 'description' ];
            $existingProduct->price = $request->product[ 'price' ];
            $existingProduct->img_src_path = $request->product[ 'img_src_path' ];
            $existingProduct->save();

            return $existingProduct;
        }

        return "Prduct not found.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ){
        $existingProduct = Product::find( $id );

        if( $existingProduct ){
            $existingProduct->delete();
            return "Product successfully deleted.";
        }

        return "Product not found.";
   }
}
