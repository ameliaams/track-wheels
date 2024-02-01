<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // dd($request);
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required|string',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('name' => $input['name'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'Admin') {
                return redirect()->route('admin.index');
            } else if (auth()->user()->role == 'User') {
                return redirect()->route('user.index');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Username And Password Are Wrong!');
        }
    }
}
