<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHomepage()
	{
		return View::make('pages.homepage');
	}

	public function showResume()
	{
		return View::make('pages.resume');
	}

	public function showPortfolio()
	{
		return View::make('pages.portfolio');
	}

	public function showBlog()
	{
		return View::make('posts.create');
	}


	public function showLogin()
	{
		return View::make('posts.login');
	}

	public function showProfile() 
	{
		return View::make('posts.profile');
	}

	public function showWhack() 
	{
		return View::make('pages.whack');
	}

	public function doLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
			return Redirect::intended(action('PostsController@index'));
		}
		else {
			Session::flash('errorMessage', 'Email or password not found.');
			return Redirect::action('HomeController@showLogin')->withInput();
		}
	}	
	public function logout()
	{
		Auth::logout();
		return Redirect::action('PostsController@index');
	}

}
