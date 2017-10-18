<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class BlogController extends Controller
{
    //
    public function __construct(Post $post){
    	$this->model = $post;
    	$this->middleware('guest');
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Redirection
	 */
	public function index()
	{
		return view('blog.index', [
		 	'posts' => DB::table('posts')->select('id', 'created_at', 'updated_at', 'title', 'slug', 'user_id', 'summary')
                        ->whereActive(true)
                        //->with('user')
                        ->paginate(5),
		 ]);
	}

	/**
	 * Display a post.
	 *
	 * @return Redirection
	 */
	public function post(Request $request, $post)
	{
		return view('blog.show', [
		 	'post' => DB::table('posts')->select('id', 'created_at', 'updated_at', 'title', 'slug', 'user_id', 'summary', 'content')
                        ->whereActive(true)
                        //->with('user')
                        ->where('id', '=', $post)
                        ->get(),
		 ]);
	}
}
