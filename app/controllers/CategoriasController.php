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
	public function store()
	{
		//
		// $node = Categoria::where('name', '=', 'Hombres')->first();
		$node = Categoria::roots()->get();

		return View::make('admin.categorias.index')
			// ->with('categorias', $node->getDescendantsAndSelf());
			->with('categorias', $node->getDescendantsAndSelf());

	}

	/**
	 * Display the specified resource.
	 * GET /categorias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$node = Categoria::find($id);
		return $node->getLevel();
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