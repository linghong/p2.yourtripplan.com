<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    }

  public function index() {
        echo"This is the index page";
    }

    public function signup() {

        #Set up the view and title
           $this->template->content = View::instance('v_users_signup');
           $this->template->title   = "Sign Up";
 
        # Render the view
           echo $this->template;

    }

    #see what the form submitted
    public function p_signup() {
    #Store data
    $_POST['created'] = Time::now();
    $_POST['modified']= Time::now();

    #Encrypt the password
    $_POST['password'] =sha1(PASSWORD_SALT.$_POST['password']);
    $_POST['token']  = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

    #insert this user into the database
    $user_id = DB::instance(DB_NAME) ->insert('users', $_POST);
 
    /*
    #Send them to the login page
    Router::redirect('users/login');
    */
 
    echo 'You\'re signed up';
    echo '<prep>';
    print_r($_POST);
    echo '</prep>';
    }

    public function login(){
        #set up view
        $this->template->content = view::instance ('v_users_login');
        $this->template->title   ="Login";

        #render template
        echo $this->template;
    }

public function p_login(){
    
    /*
    echo "prev";
    print_r($_POST);
    echo "</prev>";
    */
    #Sanitize the user entered data
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    #compare password against one in the db
    $_POST['password'] =  sha1(PASSWORD_SALT.$_POST['password']);

    #retrive the token
    $q = "SELECT token
          FROM users
          WHERE email='".$_POST['email']."''
          AND password ='".$_POST[password]."'";

    $token = DB::instance(DB_NAME)->select_field($q);

    if($token){
           setcookie('token',$token,strtotime('+1year'),'/');
           echo "You are logged in!";
    }else {
           echo  "Login failed!";
        }
    }

    public function logout(){
        echo "This is the logout page";
    }

    public function profile($user_name = NULL){
    //$view = View::instance('v_users_profile');
   // $view->user_name = $user_name;
    //echo $view;

        #Create a new View instance     
       //set up the view
       $this->template->content = View::instance('v_users_profile');
      
       #Display the view 
        echo $this->template;
         /*
       $this->template->title = "profile";

        #create an array of client files to be included in the head
        $client_files_head = Array(
             '/css/widgets.css',
             '/css/profile.css'
             );
        $this->template->client_files_head = Utils::load_client_files($client_files_head);
 
        #create an array of client files to be included in the head
        $client_files_body = Array(
            '/js/widgets.min.js',
            'js/profile.min.js'
            );
        $this->template->client_files_body = Utils::load_client_files($client_files_body);

        $this ->template->content->user_name = $user_name;

        echo $this->template;
         */

        }
}
 #end of User_controller class

