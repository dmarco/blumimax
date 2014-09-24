<?php

class BaseController extends Controller {

	public function __construct() {
		$this->beforeFilter(function() {
			View::share('catnav', Category::all()); // Comparte catnav entre todas las vistas
		});
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
