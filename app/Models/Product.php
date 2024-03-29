<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Product extends Model{ // model for products
    use HasFactory;

    protected $fillable = [ 'name' ];

    public function tags(){ // relationship to tags
        return $this->belongsToMany( Tag::class );
    } // end function tags

} // end class Product
