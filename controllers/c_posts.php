<?php
Class posts_controller extends base_controller{		
		public function __construct(){
			parent::__construct();

	/*
		#Make sure user is logged in
			if(!$this->user){
				die("Members only. <a href='users/login'>Login</a>");
*/	
		}
			
		
		public function add() {

		# Setup view
		$this->template->content = View::instance('v_posts_add');
		//$this->template->title = "New Post";

		# Render template
		echo $this->template;
		}

		public function p_add(){

		#Associate this post with this user
		$_POST['user_id'] = $this->user->user_id;

		#Add Unix time stamp for the post
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();

		#Insert
		DB::instance(DB_NAME)->insert('posts', $_POST);

		echo "Your post has been added.";

		}
		
		public function index(){
			$this->template->content = View::instance('v_posts_index');
			$q = 'SELECT
				posts .*,
				users.first_name,
				users.last_name
				FROM posts
				INNER JOIN users
				ON posts.user_id = users.user_id';

			$posts = DB::instance(DB_NAME)->select_rows($q);
			$this->template->content->posts = $posts;
			echo $this->template;


		}

		public function users(){

		$this->template->content = View::instance('v_posts_users');
		$this->template->title 		="Users";

		#Build the query to get all the users
			$q = 'SELECT *
				FROM users';

		#Store the result array in the variable $users
			$users = DB::instance(DB_NAME)->select_rows($q);

		#Built the query to figure out who are the user following
			$q = 'SELECT *
				FROM users_users
				WHERE user_id = '.$this->user->user_id;

		#Store the result array in the variable $connections
			$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

		# Pass data (users and connections) to the view
			$this->template->content->users = $users;
			$this->template->content->connections = $connections;

		#Render the view
			echo $this->template;
		}

		public function follow($user_id_followed){

		#Prepare the array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);

		# Do the insert
			DB::instance(DB_NAME)->insert('users_users', $data);

		#Send them back
			Router::redirect('/posts/users');

		}


		public function unfollow($user_id_followed){

			#Delete this connection
			$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
			DB::instance(DB_NAME)->delete('users_users', $where_condition);

			#Send them back
			Router::redirect('posts/users');

		}

}