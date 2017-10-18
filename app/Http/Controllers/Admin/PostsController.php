<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
	        'slug'	  => substr(str_replace(' ', '', $request->title), 0, 5),
	    ]);


	    return redirect('admin/posts');
	}

	/**
	 * Activate Post.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function active(Request $request, $post)
	{               
		DB::table('posts')
            ->where('id', $post)
            ->update(['active' => 1]);

       	return redirect('admin/posts');

	}


	/**
	 * Deactivate Post.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function deactive(Request $request, $post)
	{
		
		DB::table('posts')
            ->where('id', $post)
            ->update(['active' => 0]);

       	return redirect('admin/posts');

	}

	/**
	 * Edit Post.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function edit(Request $request, $post)
	{
		
		return view('admin.edit',[
			
			'post' => DB::table('posts')
            			->where('id', $post)
            			->get(),

			]);

	}

	/**
	 * Destroy the given post.
	 *
	 * @param  Request  $request
	 * @param  Post  $post
	 * @return Response
	 */
	public function destroy(Request $request, Post $post)
	{
	    
	    // Delete The Task...
	    $post->delete();

    	return redirect('admin/posts');
	}

	/**
	 * Update Post.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function updatepost(Request $request, $post)
	{
	    $this->validate($request, [
	        'title' => 'required|max:255',
	        'summary' => 'required',
	        'content' => 'required',
	    ]);


		    $update = DB::table('posts')
			            ->where('id', $post)
			            ->update([
			            	'title' => $request->title,
			            	'summary' => $request->summary,
			            	'content' => $request->content,
			            	]);
	    
	    if($update)
	    $request->session()->flash('alert-success', 'Post updation successfull!');
		else
		$request->session()->flash('alert-danger', 'Post updation fail!');
			

	   	return redirect('admin/editpost/'.$post);
	}
}
