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

		$root = DB::table('categorias')->where('parent_id', '=', NULL)->get();
		$html = '<ul class="list-group">';
    foreach($root as $cat){
    	
			$children = DB::table('categorias')->where('parent_id', '=', $cat->id)->get();
    	$html .= '<li class="list-group-item">';
    	$html .= '<span class="badge">'.count($children).'</span>';
			$html .= '<a href="/delete/'.$cat->id.'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
			$html .= $cat->name;

			if(count($children) > 0) {
        $html .= $this->getChildren($children);
	    }

    }
    $html .= '</ul>';
    
    return View::make('admin.categorias.index')
			->with('html', $html);

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
    $subhtml = '<ul class="list-group">';
    foreach($children as $child){
			
			$children = DB::table('categorias')->where('parent_id', '=', $child->id)->get();
  		$subhtml .= '<li class="list-group-item">';
  		$subhtml .= '<span class="badge">'.count($children).'</span>';
  		$subhtml .= '<a href="/delete/'.$child->id.'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
			$subhtml .= $child->name;

      if(count($children) > 0) {
        $subhtml .= $this->getChildren($children);
      }

    }
    $subhtml .= '</ul>';
    return $subhtml;
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