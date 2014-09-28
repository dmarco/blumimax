<?php

class SearchController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		// $this->beforeFilter('auth', array('only'=>array('postAddtocart', 'getCart', 'getRemoveitem')));
	}

	public function getIndex() {
		// return View::make('store.index')
		// 	->with('products', Product::take(4)->orderBy('created_at', 'DESC')->get());
		// return Product::all();
		$keyword = Input::get('keyword');
		return Product::where('title', 'LIKE', '%'.$keyword.'%' );
	}

	
}