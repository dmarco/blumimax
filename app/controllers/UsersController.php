<?php

class UsersController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getNewaccount() {
		return View::make('frontend.users.newaccount');
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
		return View::make('frontend.users.signin');
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

	public function getFacebookLogin(){
			$fb = new Facebook\Facebook([  'app_id' => '',
  'app_secret' => 'f47b21cb7a6ab51ee485d7e633c32308',
  'default_graph_version' => 'v2.5',]);
			$helper = $fb->getRedirectLoginHelper();
			$permissions = ['email', 'user_likes']; // optional
			$loginUrl = $helper->getLoginUrl('http://{your-website}/login-callback.php', $permissions);
			echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
	public function postFacebookLogin(){

	}

}