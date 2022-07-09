<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
// use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Tag extends Model{
    use HasFactory;

    public function product(){
        return $this->belongsToMany( Product::class ); // ->withPivot( 'role', 'removed', 'visits' )->withTimeStamps();
    } // end function tags

/*
    public function newPivot(Eloquent $parent, array $attributes, $table, $exists){
		if ($parent instanceof Product) {
			$pivot = ProductTag::where('product_id', '=', $attributes['product_id'])
				->where('tag_id', '=', $attributes['tag_id'])
				->first();
			if ($pivot) return $pivot;
		}
        
        // if ($parent instanceof Product) {
            // return new ProductTag($parent, $attributes, $table, $exists);
        // }
        
		return parent::pivot($parent, $attributes, $table, $exists);
		// return parent::newPivot($parent, $attributes, $table, $exists);
	}
*/
    // $tag->pivot or $product->pivot

    /** @var Product $product */
    /** @var Tag $tag */
    /*
    foreach ($product->tags as $tag) {
        assert($tag->pivot instanceof ProductsTags);
    }
    */

} // end class Tag
