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
 
    /*       
    #insert this user into the database
    $user_id = DB::instance(DB_NAME) ->insert('users', $_POST);
 

    #Send them to the login page
    Router::redirect('users/login');
    */
     

    #Store data
    $_POST['created'] = Time::now();
    $_POST['modified'] = Time::now();

    #Encrypt the password
    $_POST['password'] =sha1(PASSWORD_SALT.$_POST['password']);
    $_POST['token']  = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

    /*
    echo '<prep>';
    print_r($_POST);
    echo '</prep>';
    */
    DB::instance(DB_NAME)->insert_row('users', $_POST);
    
   /*
    #Send them to the login page
    Router::redirect('users/login');
   */ 
    }

    public function login(){
        #set up view
        $this->template->content = view::instance ('v_users_login');
        $this->template->title   ="Login";

        #render template
        echo $this->template;
    }

public function p_login(){
       #Sanitize the user entered data
    /*
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

*/
    #compare password against one in the db
    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
     
     /*
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    */

     #retrive the token
    $q = 'SELECT token
          FROM users
          WHERE email= "'.$_POST['email'].'"
          AND password ="'.$_POST[password].'"';
    
    $token = DB::instance(DB_NAME)->select_field($q);
   //echo $token;

   #login or not login
    if($token){
           setcookie('token', $token, strtotime('+1year'),'/');
           echo "You are logged in!";
    }else {
           echo  "Login failed!";
        }
       
    }

    public function logout(){
  
      #Generate and save a new token for next login
      $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

      #Create the data array
      $data = Array("token" => $new_token);

      #Do the update
      DB::instance(DB_NAME)->update('users', $data, 'WHERE user_id ='.$this->user->user_id);

      #Delete their token cookie
      setcookie('token', '', strtotime('-1 year'), '/');

      #Send them back to the main index.
      Router::redirect("/");
    }

    public function profile($user_name = NULL){

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

