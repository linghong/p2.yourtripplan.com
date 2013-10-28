<?php
class users_controller extends base_controller{

    public function __construct() {
        parent::__construct();
        echo"user_controller called";
    }

  public function index(){
        echo"This is the index page";
    }

    public function signup(){

        #Setup view
           $this->template->content = View::instance('v_users_signup');
           $this->template->title   = "Sign Up";

           echo $this->template;
    }

    #see what the form submitted
    public function p_signup(){
    $user_id = DB::instance(DB_NAME) ->insert('users', $_POST);
    echo 'You\'re signed up';
    //echo '<prep>';
    //print_r($_POST);
    //echo '</prep>';
    }

 

    public function login(){
        echo "This is the loginin page";
    }

    public function logout(){
        echo "This is the logout page";
    }

    public function profile($user_name = NULL){

        #Create a new View instance
        $this->template->content = View::instance('v_users_profile');
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
        echo $this-template;

        }
}
 #end of User_controller class

