<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create( 'product_tag', function ( Blueprint $table ){
            $table->foreignId( 'product_id' )->constrained();
            $table->foreignId( 'tag_id' )->constrained();
        });
    } // end fuction up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop( 'product_tag' );
    } // end function down
};
