<?php namespace App\Http\Controllers\Auth;

use Auth;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/
	use AuthenticatesAndRegistersUsers;
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}


	public function getLogin()
	{
		return view('auth/login');
	}

	public function postLogin(Request $request)

	{

		$redirectTo = '/index';
		?><script> alert("Password Eða Emailið Er Rangt , Reyndu Aftur") </script> <?php
		$this->validate($request, [
			'email' => 'required', 'password' => 'required',
			]);

		$credentials = $request->only('email', 'password');

		if($this->auth->attempt($credentials, $request->has('remember')))
		{
				return redirect()->intended($redirectTo);
		}
		else {
			return view('auth/login');
		}

		return redirect('auth/login')
								->withInput($request->only('email'))
								->withErrors([
									'email' => 'These credentials do not match',
									]);


		/*$username = Input::get('username');
		$password = Input::get('password');

		if (Auth::attempt(['username' => $username, 'password' => $password])) {
	             // Authentication passed...
	             return redirect()->intended('articles');
	}
	else {
		echo(Auth::attempt(['username' => $username, 'password' => $password]));
	}
	public function redirectPath()
	{
		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home;'
	}
	*/
}





	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */

}
