<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Tag extends Model{
    use HasFactory;

    public function product(){ // relationship to products
        return $this->belongsToMany( Product::class );
    } // end function tags

} // end class Tag
