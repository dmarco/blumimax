<?php

class CategoriasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /categorias
	 *
	 * @return Response
	 */

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categorias/create
	 *
	 * @return Response
	 */
	public function create($parent_id,$name)
	{
		$node = Categoria::create(['name' => $name]);
		$node->parent_id = $parent_id;
		$node->save();
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categorias
	 *
	 * @return Response
	 */
	public function store($id)
	{
		//
		$node = Categoria::find($id);
		return $node->getLevel();
	}

	/**
	 * Display the specified resource.
	 * GET /categorias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{

		/*$root = Categoria::all()->toHierarchy();
		return View::make('admin.categorias.index')
			->with('categorias', $root);*/

		// echo '<pre>';
		// $json = json_decode($root);
		// echo json_encode($json, JSON_PRETTY_PRINT);
		// echo '</pre>';
		
		/*
		$tree = array();
		$root = DB::table('categorias')->where('parent_id', '=', NULL)->get();

    foreach($root as $cat){
    	$categoria = array();
    	$categoria['id'] = $cat->id;
	    $categoria['name'] = $cat->name;
	    $children = DB::table('categorias')->where('parent_id', '=', $cat->id)->get();
	    
	    if(count($children > 0)) {
        $categoria['children'] = $this->getChildren($children);
	    }else{
        $categoria['children'] = array();
	    }

	    $tree[] = $categoria;
    }

    $node = json_encode($tree);

    return View::make('admin.categorias.index')
			->with('categorias', $node);
		*/

		$root = DB::table('categorias')->where('parent_id', '=', NULL)->get();
		$html = '<ul class="list-group">';
    foreach($root as $cat){
    	
    	$html .= '<li class="list-group-item">';
			$html .= '<a href="/delete/'.$cat->id.'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
			$html .= $cat->name;

			$children = DB::table('categorias')->where('parent_id', '=', $cat->id)->get();

			if(count($children > 0)) {
        $html .= $this->getChildrenHtml($children);
	    }else{
        $html .= 'asdasdasdasdasdas';
	    }

    }
    $html .= '</ul>';
    return View::make('admin.categorias.index')
			->with('html', $html);


	}
  
	public function getChildrenHtml($children) 
  {
  	$subhtml = '<ul class="list-group">';
    foreach($children as $child){
  		$subhtml .= '<li class="list-group-item">';
  		$subhtml .= '<a href="/delete/'.$child->id.'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
			$subhtml .= $child->name;
			$children = DB::table('categorias')->where('parent_id', '=', $child->id)->get();

      if(count($children > 0)) {
        $subhtml .= $this->getChildrenHtml($children);
      }else{
        $subhtml .= 'asdasdasdasdasdas';
      }
    }
    $subhtml .= '</ul>';
    return $subhtml;
	}
	/**
	 * GetChildren the form for editing the specified resource.
	 * GET /categorias/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
  public function getChildren($children) 
  {
    foreach($children as $child){
      $child_categoria = array();
      $child_categoria['id'] = $child->id;
      $child_categoria['name'] = $child->name;
      $children = DB::table('categorias')->where('parent_id', '=', $child->id)->get();

      if(count($children > 0)) {
        $child_categoria['children'] = $this->getChildren($children);
      }else{
        $child_categoria['children'] = array();
      }

      return $child_categoria;
    }
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categorias/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /categorias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categorias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$node = Categoria::find($id);
		$node->delete();
		// return $node->getDescendantsAndSelf();
		return Redirect::to('/list');
	}

}