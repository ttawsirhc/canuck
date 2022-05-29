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
    public function up()
    {
        Schema::create( 'products', function ( Blueprint $table ){
            $table->id();
            $table->string( 'name' );
            $table->text( 'description' );
            $table->decimal( 'price', 9, 2 );
            $table->string( 'img_src_path' );
            $table->integer( 'number_sold' )->default( '0' );
            $table->timestamps();
            // $table->string( 'size' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
