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


	public function remove_accent($str)
	{
		$a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','Ā','ā','Ă','ă','Ą','ą','Ć','ć','Ĉ','ĉ','Ċ','ċ','Č','č','Ď','ď','Đ','đ','Ē','ē','Ĕ','ĕ','Ė','ė','Ę','ę','Ě','ě','Ĝ','ĝ','Ğ','ğ','Ġ','ġ','Ģ','ģ','Ĥ','ĥ','Ħ','ħ','Ĩ','ĩ','Ī','ī','Ĭ','ĭ','Į','į','İ','ı','Ĳ','ĳ','Ĵ','ĵ','Ķ','ķ','Ĺ','ĺ','Ļ','ļ','Ľ','ľ','Ŀ','ŀ','Ł','ł','Ń','ń','Ņ','ņ','Ň','ň','ŉ','Ō','ō','Ŏ','ŏ','Ő','ő','Œ','œ','Ŕ','ŕ','Ŗ','ŗ','Ř','ř','Ś','ś','Ŝ','ŝ','Ş','ş','Š','š','Ţ','ţ','Ť','ť','Ŧ','ŧ','Ũ','ũ','Ū','ū','Ŭ','ŭ','Ů','ů','Ű','ű','Ų','ų','Ŵ','ŵ','Ŷ','ŷ','Ÿ','Ź','ź','Ż','ż','Ž','ž','ſ','ƒ','Ơ','ơ','Ư','ư','Ǎ','ǎ','Ǐ','ǐ','Ǒ','ǒ','Ǔ','ǔ','Ǖ','ǖ','Ǘ','ǘ','Ǚ','ǚ','Ǜ','ǜ','Ǻ','ǻ','Ǽ','ǽ','Ǿ','ǿ');
		$b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
		return str_replace($a, $b, $str);
	}
	public function create()
	{

		$name = Input::get('name');
		$parent_id = Input::get('taker');

		$validator = Validator::make(Input::all(), Category::$rules);

		$slug = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), $this->remove_accent($name)));
    // $slug = preg_replace('/[^\-\sa-zA-Z0-9]+/', '', mb_strtolower($name));
    // $slug = preg_replace('/[\-\s]+/', '-', $slug);
    // $slug = trim($slug, '-');

		if ($validator->passes()) {
			$category = Category::create(['name' => $name]);
			$category->parent_id = $parent_id;
			$category->slug = $slug;
			$category->save();

			// return View::make('admin.categories.index')
			return Redirect::to('/admin/categories')
				->with('message', 'Categoría Creada')
				->with('alert-type', 'alert-success');
		}

		// return View::make('admin.categories.index')
		return Redirect::to('admin/categories')
			->with('message', 'Hubo un error')
			->with('alert-type', 'alert-danger')
			->withErrors($validator)
			->withInput();

	}



	public function store($id)
	{
	
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
		
		$node = Category::find($id);
		$node->delete();
		return Redirect::to('admin/categories')
		// return View::make('admin.categories.index')
			->with('message', 'Categoría Eliminada')
			->with('alert-type', 'alert-success');

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