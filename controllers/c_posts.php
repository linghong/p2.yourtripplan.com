<?php
Class posts_controller extends base_controller{
	/*			
		public function__construct(){
			parent::__construct();

	
		#Make sure user is logged in
			if(!$this->user){
				die("Members only. <a href='users/login'>Login</a>");
	
		}
	*/		
		
		public function add() {

		# Setup view
		$this->template = View::instance('v_posts_add');
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
			$this->template->content = View::instance('v_posts_index')
;
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

/*
		public function users(){

		$this->template->content = View::instance('v_posts_users');
	
			$q = 'SELECT *
				FROM users';

			$users = DB::instance(DB_NAME)->select_row($q);
			$this->template->content->users = $users;
			echo $this-> template;
		}
*/

}