<?php

class StoreController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('postAddtocart', 'getCart', 'getRemoveitem')));
	}

	public function getIndex() {
		return View::make('store.index')
			->with('products', Product::orderBy('created_at', 'DESC')->paginate(12));
	}

	public function getView($id) {
		$category = ProductsCategories::where('product_id', '=', $id)->pluck('category_id');
		$category = Category::find($category);
		$category = Category::where('slug', '=', $category->slug)->first();
		$breadcrumbs = $category->ancestors()->get();
		return View::make('store.view')
			->with('breadcrumbs', $breadcrumbs)
			->with('product', Product::find($id));
	}

	public function getCategory($cat_name) {
		$category = Category::where('slug', '=', $cat_name)->first();
		$categories = $category->getDescendants(1,array('id', 'parent_id', 'name', 'slug'));
		$products = Product::categorized($category)->paginate(12);
		$breadcrumbs = $category->ancestors()->get();
		return View::make('store.category')
			->with('products', $products )
			->with('categories', $categories )
			->with('breadcrumbs', $breadcrumbs )
			->with('category', $category );
	}

	public function getCategoryPriceFilter() {
		$products = DB::table('products')->whereBetween('price', array(1501, 2000))->paginate(12);
		return View::make('store.category')
			->with('products', $products );
	}

	public function getSearch() {
		$keyword = Input::get('keyword');
		return View::make('store.search')
			->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->paginate(12) )
			->with('keyword', $keyword);
	}

	public function postAddtocart() {
		$product = Product::find(Input::get('id'));
		$quantity = Input::get('quantity');
		Cart::insert(array(
			'id'=>$product->id,
			'name'=>$product->title,
			'price'=>$product->price,
			'quantity'=>$quantity,
			'image'=>$product->image
		));
		return Redirect::to('store/cart');
	}

	public function getCart() {
		return View::make('store.cart')->with('products', Cart::contents());
	}

	public function getRemoveitem($identifier) {
		$item = Cart::item($identifier);
		$item->remove();
		return Redirect::to('store/cart');
	}

	public function getContact() {
		return View::make('store.contact');
	}
}