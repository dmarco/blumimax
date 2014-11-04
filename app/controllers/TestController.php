<?php

class TestController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /test
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$category = Category::roots()->first(); // Todo de Hombres
		$products = Product::categorized($category)->get();
		return $products;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /test/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$category = Category::find(17);
		$product = Product::find(1);
		$product->categories()->attach($category);
		return $category;
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /test
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /test/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /test/{id}/edit
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
	 * PUT /test/{id}
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
	 * DELETE /test/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}