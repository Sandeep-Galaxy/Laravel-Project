<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Post;
use Image;


class PostsController extends Controller
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
	public function index(Request $request, User $user)
	{

	    return view('admin.posts', [
            'posts' => $request->user()->posts()->orderBy('title', 'asc')->paginate(5)
        ]);
	}

	/**
	 * Display user profile.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function newpost(Request $request, User $user)
	{
	    return view('admin.create');
	}

	/**
	 * Create a new post.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
	    $this->validate($request, [
	        'title' => 'required|max:255',
	        'summary' => 'required',
	        'content' => 'required',
	    ]);


	    // Create The Task...
		$cre = $request->user()->posts()->create([
	        'title' => $request->title,
	        'summary' => $request->summary,
	        'content' => $request->content,
	        'slug'	  => substr($request->title, 0, 5),
	    ]);


	    return redirect('admin/posts');
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
