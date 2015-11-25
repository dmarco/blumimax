<?php

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

  protected $table = 'tags';

  public static $rules = array(
      'name' =>'required|min:3',
 );

  public function products() {
    return $this->belongsToMany('Product', 'product_tag');
  }


}

