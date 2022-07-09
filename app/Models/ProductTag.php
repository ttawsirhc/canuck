<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductTag extends Model // class ProductTag extends Pivot
{
    use HasFactory;

    protected $fillable = [ 'name' ];

    public function products(){ // relationship to tags
        return $this->belongsToMany( Product::class );
    } // end function products
}
