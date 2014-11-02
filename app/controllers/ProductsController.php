<?php

class ProductsController extends BaseController {

	public function __construct() {

		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');

	}


	public function index()
	{

		// Make List Object
		$root = DB::table('categories')->where('parent_id', '=', NULL)->get();
		$select = '<ul class="list-group">';
    
    foreach($root as $cat){
    	
			$children = DB::table('categories')->where('parent_id', '=', $cat->id)->get();
    	
			$select .= '<li class="list-group-item">';
			$select .= '<div class="radio"><label><input type="radio" name="category_id" value="'.$cat->id.'">'.$cat->name.'</label></div>';

			if(count($children) > 0) {
        $select .= $this->getChildrenSelect($children, NULL);
	    }

	    $select .= '</li>';

    }
    $select .= '</ul>';		
    
    return View::make('admin.products.index')
    	// ->with('category_id', $category_id)
    	// ->with('category_name', $category_name)
    	->with('products', Product::all())
			->with('select', $select);

	}

	public function create()
	{

		$validator = Validator::make(Input::all(), Product::$rules);

		if ($validator->passes()) {
			
			$product 									= new Product;
			$product->title 					= Input::get('title');
			$product->description 		= Input::get('description');
			$product->price 					= Input::get('price');
			$product->pref_id 				= Input::get('pref_id');
			$product->availability 		= 1;

			$image 										= Input::file('image');
      $filename 								= time().".".$image->getClientOriginalName();
      $path 										= 'img/products/' . $filename;
      // Image::make($image->getRealPath())->resize(468, 249)->save($path);
      Image::make($image->getRealPath())->save($path);
      $product->image = 'img/products/'. $filename;

			if (Input::hasFile('manual'))
			{
				$manual = Input::file('manual');
				$manual->move('img/manual', time().".".$manual->getClientOriginalName());
				$product->manual = 'img/manual/'. time().".".$manual->getClientOriginalName();
			}
			if (Input::hasFile('technical_data'))
			{
				$technical_data = Input::file('technical_data');
				$technical_data->move('img/technical_data', time().".".$technical_data->getClientOriginalName());
				$product->technical_data 	= 'img/technical_data/'. time().".".$technical_data->getClientOriginalName();
			}

      $product->save();

			$category_id = Input::get('category_id');
			$product_id = $product->id;

			$this->associateProductToCategory($category_id , $product_id);

			return Redirect::to('admin/products')
				->with('message', 'Product Created')
				->with('alert-type', 'alert-success');
		}

		// // return View::make('admin.categories.index')
		return Redirect::to('admin/products')
			->with('message', 'Hubo un error')
			->with('alert-type', 'alert-danger')
			->withErrors($validator)
			->withInput();

	}

	public function edit()
	{
    
		$id = Input::get('product_id');

    // Categoría
		$cat_id = DB::table('products_categories')->where('product_id', '=', $id)->pluck('category_id');
		// return $cat_id;

		// Make List Object
		$root = DB::table('categories')->where('parent_id', '=', NULL)->get();
		$select = '<ul class="list-group">';
    
    foreach($root as $cat){
    	
			$children = DB::table('categories')->where('parent_id', '=', $cat->id)->get();
    	
			$select .= '<li class="list-group-item">';

			if($cat->id == $cat_id){
				$select .= '<div class="radio"><label><input type="radio" name="category_id" value="'.$cat->id.'" checked>'.$cat->name.'</label></div>';
			}else{
				$select .= '<div class="radio"><label><input type="radio" name="category_id" value="'.$cat->id.'">'.$cat->name.'</label></div>';
			}

			if(count($children) > 0) {
        $select .= $this->getChildrenSelect($children, $cat_id);
	    }

	    $select .= '</li>';

    }
    $select .= '</ul>';


    // Producto
    $product = Product::find($id);

		// Armo Vista
		return View::make('admin.products.edit')
    	->with('test', $cat_id)
    	->with('product', $product)
			->with('select', $select);

	}

	public function modify()
	{

		$validator = Validator::make(Input::all(), Product::$rules);

		if ($validator->passes()) {
			
			$product 									= Product::find(Input::get('id'));
			$product->title 					= Input::get('title');
			$product->description 		= Input::get('description');
			$product->price 					= Input::get('price');
			$product->pref_id 				= Input::get('pref_id');
			$product->availability 		= 1;

			// return $product->description;

			if (Input::hasFile('image'))
			{
				$image = Input::file('image');
	      $filename = time().".".$image->getClientOriginalName();
	      $path = 'img/products/' . $filename;
	      Image::make($image->getRealPath())->save($path);
	      $product->image = 'img/products/'. $filename;
      }
			if (Input::hasFile('manual'))
			{
				$manual = Input::file('manual');
				$manual->move('img/manual', time().".".$manual->getClientOriginalName());
				$product->manual = 'img/manual/'. time().".".$manual->getClientOriginalName();
			}
			if (Input::hasFile('technical_data'))
			{
				$technical_data = Input::file('technical_data');
				$technical_data->move('img/technical_data', time().".".$technical_data->getClientOriginalName());
				$product->technical_data 	= 'img/technical_data/'. time().".".$technical_data->getClientOriginalName();
			}

      $product->save();

			return Redirect::to('admin/products')
				->with('message', 'Product Created')
				->with('alert-type', 'alert-success');
		}

		// // return View::make('admin.categories.index')
		return Redirect::to('admin/products')
			->with('message', 'Hubo un error')
			->with('alert-type', 'alert-danger')
			->withErrors($validator)
			->withInput();

	}

	public function destroy() {

		$product = Product::find(Input::get('product_id'));
		
		$product_id = $product->id;
		$category_id = Input::get('category_id');
		$this->deassociateProductToCategory($category_id , $product_id);

		if ($product->manual !== '' ) {
			File::delete(public_path()."/".$product->manual);
		}

		if ($product->technical_data !== '' ) {
			File::delete(public_path()."/".$product->technical_data);
		}

		if ($product) {
			File::delete(public_path()."/".$product->image);
			$product->delete();
			return Redirect::to('admin/products')
				->with('message', 'Product Deleted')
				->with('alert-type', 'alert-success');
		}

		return Redirect::to('admin/products')
			->with('message', 'Something went wrong, please try again')
			->with('alert-type', 'alert-danger');
	}

	public function postToggleAvailability() {
		$product = Product::find(Input::get('id'));

		if ($product) {
			$product->availability = Input::get('availability');
			$product->save();
			return Redirect::to('admin/products')->with('message', 'Product Updated')->with('alert-type', 'alert-success');
		}

		return Redirect::to('admin/products')->with('message', 'Invalid Product')->with('alert-type', 'alert-danger');
	}


	public function associateProductToCategory($category_id , $product_id) 
  {

  	// dd($category_id, $product_id);
  	$category = Category::find($category_id);
		$product = Product::find($product_id);
		$product->categories()->attach($category);

	}

	public function deassociateProductToCategory($category_id , $product_id) 
  {

  	// dd($category_id, $product_id);
  	$category = Category::find($category_id);
		$product = Product::find($product_id);
		$product->categorieS()->detach($category);

	}


	public function getChildrenSelect($children, $cat_id) 
  {

    $select = '<ul class="list-group">';
    foreach($children as $child){
			
			$children = DB::table('categories')->where('parent_id', '=', $child->id)->get();
  		
  		$select .= '<li class="list-group-item">';

  		if($child->id == $cat_id){
				$select .= '<div class="radio"><label><input type="radio" name="category_id" value="'.$child->id.'" checked>'.$child->name.'</label></div>';
			}else{
				$select .= '<div class="radio"><label><input type="radio" name="category_id" value="'.$child->id.'">'.$child->name.'</label></div>';
			}
			

      if(count($children) > 0) {
        $select .= $this->getChildrenSelect($children, $cat_id);
      }

    }
    $select .= '</ul>';
    return $select;

	}



}