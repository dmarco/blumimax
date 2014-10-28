<?php

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

  protected $table = 'products';

  public static $rules = array(
   'category_id'=>'required',
   'title'=>'required|min:2',
   'description'=>'required|min:20',
   'price'=>'required|numeric',
   'pref_id'=>'required',
   'availability'=>'integer',
   'image'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
 );

  public function categories() {
    return $this->belongsToMany('Category', 'products_categories');
  }

  public function scopeCategorized($query, Category $category=null) {
    if ( is_null($category) ) return $query->with('categories');

    $categoryIds = $category->getDescendantsAndSelf()->lists('id');

    return $query->with('categories')
      ->join('products_categories', 'products_categories.product_id', '=', 'products.id')
      ->whereIn('products_categories.category_id', $categoryIds);
  }


}

// class Product extends Eloquent {

// 	protected $fillable = array('category_id', 'title', 'description', 'price', 'availability', 'image');

// 	public static $rules = array(
// 		'category_id'=>'required|integer',
// 		'title'=>'required|min:2',
// 		'description'=>'required|min:20',
// 		'price'=>'required|numeric',
// 		'availability'=>'integer',
// 		'image'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
// 	);

// 	public function category() {
// 		return $this->belongsTo('Category');
// 	}
// }