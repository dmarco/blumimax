<?php

class UsersController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getNewaccount() {
		return View::make('users.newaccount');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			$user->save();

			return Redirect::to('users/signin')
				->with('message', 'Gracias por crear su cuenta.')
				->with('alert-type', 'alert-success');
		}

		return Redirect::to('users/newaccount')
			->with('message', 'Ocurrió un error.')
			->with('alert-type', 'alert-danger')
			->withErrors($validator)
			->withInput();
	}

	public function getSignin() {
		return View::make('users.signin');
	}

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('/home')->with('message', 'Gracias por loguearse.')->with('alert-type', 'alert-success');;
		}
		return Redirect::to('users/signin')->with('message', 'Su email/password es incorrecto.')->with('alert-type', 'alert-danger');;
	}

	public function getSignout() {
		Auth::logout();
		return Redirect::to('users/signin')->with('message', 'Usted se deslogueó.')->with('alert-type', 'alert-success');;
	}
}