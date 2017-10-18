<?php

use Illuminate\Database\Seeder;
use App\User, App\Post, App\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Model::unguard();
		
		User::create([
			'name' => 'Ravi Kumar',
			'email' => 'ravi@gmail.com',
			'password' => bcrypt('ravi'),
			'avatar' => 'default.jpg',
			'usertype_id' => 2,
		]);

		User::create([
			'name' => 'Soron Jones',
			'email' => 'soron@gmail.com',
			'password' => bcrypt('soron'),
			'avatar' => '1508157828.jpg',
			'usertype_id' => 2,
		]);

		User::create([
			'name' => 'Sandeep',
			'email' => 'sandeep.pandey@galaxyweblinks.in',
			'password' => bcrypt('sandeep'),
			'avatar' => '1508156395.png',
			'usertype_id' => 1,
		]);

		DB::table('usertypes')
	            ->insert([
	            	'utypes' => 'admin',
	            	'created_at' => Carbon::now(),
	            	'updated_at' => Carbon::now(),
	            	]);

	    DB::table('usertypes')

	    		->insert([
	            	'utypes' => 'user',
	            	'created_at' => Carbon::now(),
	            	'updated_at' => Carbon::now(),
	            	]);

	    Task::create([
			'name' => 'Demo Task',
			'user_id' => 1,
		]);

		Task::create([
			'name' => 'New Task',
			'user_id' => 1,
		]);

		Task::create([
			'name' => 'Sample Work',
			'user_id' => 1,
		]);

		Task::create([
			'name' => 'Retro Task',
			'user_id' => 1,
		]);

		Task::create([
			'name' => 'Dummy Task',
			'user_id' => 1,
		]);

		Task::create([
			'name' => 'New Task',
			'user_id' => 2,
		]);

		Task::create([
			'name' => 'Talcum Task',
			'user_id' => 1,
		]);

		Task::create([
			'name' => 'Logical Task',
			'user_id' => 2,
		]);

		Task::create([
			'name' => 'Training Task',
			'user_id' => 2,
		]);

		Task::create([
			'name' => 'Demo Task',
			'user_id' => 1,
		]);

		Post::create([
			'title' => 'New Post',
			'user_id' => 3,
			'slug'	=> 'newp',
			'summary' => '<p>Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum</p>',
			'content'	=> '<p>Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum</p>',
			'active'	=> 1
		]);

		Post::create([
			'title' => 'Test Post',
			'user_id' => 3,
			'slug'	=> 'test',
			'summary' => '<p>Test Post Test PostTest PostTest Post Test Post Test Post</p>',
			'content'	=> '<p>Test Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test Post</p>

<p>Test Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test Post</p>

<p>Test Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test PostTest Post Test PostTest PostTest Post Test Post Test Post</p>',
			'active'	=> 0
		]);

		Post::create([
			'title' => 'Why do we use it?',
			'user_id' => 3,
			'slug'	=> 'why',
			'summary' => '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>',
			'content'	=> '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',
			'active'	=> 1
		]);

		Post::create([
			'title' => 'Where can I get some?',
			'user_id' => 3,
			'slug'	=> 'where',
			'summary' => '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>',
			'content'	=> '<p><img alt="" src="http://onesixsixonedesign.com/wp-content/uploads/2011/01/LoremIpsum.png" style="height:545px; width:801px" /></p>

<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>',
			'active'	=> 1
		]);

		Post::create([
			'title' => 'Polar Bear',
			'user_id' => 3,
			'slug'	=> 'where',
			'summary' => '<p>Polar Bear Polar Bear</p>

<p>&nbsp;</p>',
			'content'	=> '<p>Polar Bear Polar Bear Polar Bear Polar BearPolar Bear Polar Bear Polar Bear Polar BearPolar Bear Polar Bear Polar Bear Polar BearPolar Bear Polar Bear Polar Bear Polar BearPolar Bear Polar Bear Polar Bear Polar BearPolar Bear Polar Bear Polar Bear Polar Bear</p>',
			'active'	=> 1
		]);


		
    }
}
