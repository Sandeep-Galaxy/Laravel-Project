<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Image;


class ProfileController extends Controller
{
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
	 * Display user profile.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
	    return view('admin.profile', [
            'user' => $request->user(),
        ]);
	}


	/**
	 * Update Profile.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
	    $this->validate($request, [
	        'name' => 'required|max:255',
	        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        'password' => 'required|string|min:6|confirmed',
	    ]);

	    if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );
    	}

	    // Update Name...
		$user = $request->user();

		// Update Image path
		if(!empty($filename))
    	$user->avatar = $filename;
    	
	    
	    $user->name = $request->name;
	    $user->password = bcrypt($request->password);
	    
	    if($user->save())
	    $request->session()->flash('alert-success', 'Profile updation successfull!');
		else
		$request->session()->flash('alert-danger', 'Profile updation fail!');
			

	   	return redirect('admin/profile');
	}
}
