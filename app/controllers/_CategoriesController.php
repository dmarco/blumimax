<?php

class _CategoriesController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex() {
		return View::make('admin.categories.index')
			->with('categories', Category::all());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Category::$rules);

		if ($validator->passes()) {
			$category = new Category;
			$category->parent_id = Input::get('category_id');
			$category->name = Input::get('name');
			$category->save();

			return Redirect::to('admin/categories/index')
				->with('message', 'Category Created')
				->with('alert-type', 'alert-success');
		}

		return Redirect::to('admin/categories/index')
			->with('message', 'Something went wrong')
			->with('alert-type', 'alert-danger')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy() {
		$category = Category::find(Input::get('id'));

		if ($category) {
			$category->delete();
			return Redirect::to('admin/categories/index')
				->with('message', 'Category Deleted')
				->with('alert-type', 'alert-success');
		}

		return Redirect::to('admin/categories/index')
			->with('message', 'Something went wrong, please try again')
			->with('alert-type', 'alert-danger');
	}
}