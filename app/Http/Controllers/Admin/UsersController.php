<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //
    protected $redirectTo = '/users';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show all the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function users(User $user)
    {
    	$users = $user->orderBy('created_at', 'asc')
                    ->where('usertype_id', 2)
                    ->paginate(3);

        return view('admin.users', ['users' => $users]);
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('root');
    }

}
