<?php

class CategoriesController extends BaseController {



	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}



	public function index()
	{

		$root = DB::table('categories')->where('parent_id', '=', NULL)->get();
		$list = '<ul class="list-group">';
		$select = '<ul class="list-group">';
    
    foreach($root as $cat){
    	
			$children = DB::table('categories')->where('parent_id', '=', $cat->id)->get();
    	
    	$list .= '<li class="list-group-item">';
    	$list .= '<span class="badge">'.count($children).'</span>';
			$list .= '<a href="/admin/categories/delete/'.$cat->id.'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
			$list .= $cat->name;

			$select .= '<li class="list-group-item">';
			$select .= '<div class="radio"><label><input type="radio" name="taker" value="'.$cat->id.'">'.$cat->name.'</label></div>';

			if(count($children) > 0) {
        $list .= $this->getChildrenList($children);
        $select .= $this->getChildrenSelect($children);
	    }

	    $list .= '</li>';
	    $select .= '</li>';

    }
    $list .= '</ul>';
    $select .= '</ul>';
    
    return View::make('admin.categories.index')
			->with('list', $list)
			->with('select', $select);
	}



	public function create()
	{
		$name = Input::get('name');
		$parent_id = Input::get('taker');
		// $node = Category::create(['name' => $name]);
		// $node->parent_id = $parent_id;
		// $node->save();

		// return Redirect::to('/admin/categories')
		// 	->with('message', 'Category Created')
		// 	->with('alert-type', 'alert-success');

		$validator = Validator::make(Input::all(), Category::$rules);


		if ($validator->passes()) {
			$category = Category::create(['name' => $name]);
			$category->parent_id = $parent_id;
			$category->save();

			return Redirect::to('/admin/categories')
				->with('message', 'Category Created')
				->with('alert-type', 'alert-success');
		}

		return Redirect::to('admin/categories')
			->with('message', 'Something went wrong')
			->with('alert-type', 'alert-danger')
			->withErrors($validator)
			->withInput();

	}



	public function store($id)
	{
		//
		$node = Category::find($id);
		return $node->getLevel();
	}



	public function show()
	{


	}



	public function edit($id)
	{
		//
	}



	public function update($id)
	{
		//
	}



	public function destroy($id)
	{
		//
		$node = Category::find($id);
		$node->delete();
		// return $node->getDescendantsAndSelf();
		return Redirect::to('/admin/categories');
	}



	public function getChildrenList($children) 
  {
    $list = '<ul class="list-group">';
    foreach($children as $child){
			
			$children = DB::table('categories')->where('parent_id', '=', $child->id)->get();
  		
  		$list .= '<li class="list-group-item">';
  		$list .= '<span class="badge">'.count($children).'</span>';
  		$list .= '<a href="/admin/categories/delete/'.$child->id.'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
			$list .= $child->name;

      if(count($children) > 0) {
        $list .= $this->getChildrenList($children);
      }

    }
    $list .= '</ul>';
    return $list;
	}



	public function getChildrenSelect($children) 
  {
    $select = '<ul class="list-group">';
    foreach($children as $child){
			
			$children = DB::table('categories')->where('parent_id', '=', $child->id)->get();
  		
  		$select .= '<li class="list-group-item">';
			$select .= '<div class="radio"><label><input type="radio" name="taker" value="'.$child->id.'">'.$child->name.'</label></div>';

      if(count($children) > 0) {
        $select .= $this->getChildrenSelect($children);
      }

    }
    $select .= '</ul>';
    return $select;
	}




}