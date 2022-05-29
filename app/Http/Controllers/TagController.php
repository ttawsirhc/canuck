<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Tag::orderBy( 'name', 'DESC' )->get();
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
        $newTag = new Tag;
        $newTag->name = $request->tag[ 'name' ];
        $newTag->save();

        return $newTag;
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
        $existingTag = Tag::find( $id ); // could use findOrFail($id)

        if($existingTag){
            $existingTag->name = $request->tag[ 'name' ];
            $existingTag->save();
            return $existingTag;
        }

        return "Tag not found.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ){
        $existingTag = Tag::find( $id );

        if( $existingTag ){
            $existingTag->delete();
            return "Tag successfully deleted.";
        }

        return "Tag not found.";
   }
}
