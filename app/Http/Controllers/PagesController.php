<?php namespace App\Http\Controllers;


use App\User;
use App\Vefspurn;
use App\Verktakar;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
use App\config;
use Request;
use Auth;

class PagesController extends Controller {

	//
		/*return view ('pages.about')->with([
	public function about ()
	{

		//$name ='Jeffrey <span style="color: red;">Way</span>';

			'first' => 'Jeffrey',
			'last' => 'Way'
			]);
		*/
		/*$data = [];
		$data['first'] = 'Helgi';
		$data['last'] = 'sigur';
		$first = 'Fox';
		$last = 'Mulder';
		$people = [
			'Taylor Otwell', 'Dayle Rees', 'Eric Barnes'
		];
		$people = [];
 		return view ('pages.about', compact('people'));
	}
	public function contact ()
	{
		return view('pages.contact');
	}
	public function login()
	{
		return view('auth/login');
	}


	public function signUp()
	{
			return view('auth.register');
	}

	public function store()
	{

			$input = Request::all();
			$user = new User;
			$input['password'] = bcrypt($input['password']);
		User::create($input);
		return redirect('/');


	}
		*/

  public function indextest()
  {
    return view('auth.login');
  }

  public function index()
    {
      if (Auth::guest())
      return view('auth.login');

    else
      $user = Auth::user();
      return view('indextest2', compact('user'));
    }

  public function signUp()
	{
			return view('auth.register');
	}
  public function profile($id)
	{
    $user = User::findOrFail($id);

		return view('profile', compact('user'));
	}

  public function store()
	{

			$input = Request::all();
			$user = new User;
			$input['password'] = bcrypt($input['password']);
		User::create($input);
		return redirect('/');
	}

  public function vefsidur()
  {
    if (Auth::guest())
          return view('auth.login');

    else
    {
          $user = Auth::user();
          $vefsida = Vefspurn::latest('published_at')->get();
          return view('vefsida', compact('vefsida', 'user'));
        }
  }

  public function verktak()
  {
    if (Auth::guest())
          return view('auth.login');

    else
    {
          $user = Auth::user();
          $verk = Verktakar::latest('published_at')->get();
          return view('verktakar', compact('verk', 'user'));

    }
  }

  public function show ($id)
  {
      if (Auth::guest())
        return view('auth.login');

        else
        {
        $user = Auth::user();
        $vefsida = Vefspurn::findOrFail($id);

        return view('show', compact('vefsida','user'));
      }
  }

  public function showverk ($id)
  {
      if (Auth::guest())
        return view('auth.login');

        else
        {
        $user = Auth::user();
        $verk = Verktakar::findOrFail($id);

        return view('showverk', compact('verk','user'));
      }
  }

public function create()
{
  if (Auth::guest())
        return view('auth.login');

  else
        {
        $user = Auth::user();
        return view('create',  compact('user'));
      }
}

public function createverk()
{
  if (Auth::guest())
        return view('auth.login');

  else
        {
        $user = Auth::user();
        return view('createVerk',  compact('user'));
      }
}

  public function VefStore()
	{

			$input = Request::all();
		Vefspurn::create($input);
		return redirect('/vefsida');
	}


  public function VerkStore()
  {
    $input = Request::all();
    Verktakar::Create($input);
    return redirect('/verktakar');
  }

public function PhotoId($id)
  {
    $user = Auth::findOrFail();
    $filename = 'Pomynd';
    $destinationpath = Request::profilephoto();

    $input = Request::file('photo')->move($destinationpath, $filename + $user->$id);
    return view('profile', compact('user'));
  }
}
