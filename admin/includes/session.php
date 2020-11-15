<?php 

class Session {

    private $signed_in = false;
    public $user_id;
    public $message;
    public $count;


    // Auto starts a session each time its run
    function __construct(){
        session_start();
        $this->visitor_count();
        $this->check_the_login();
        $this->check_message();
    }

    //Visitor Counter
    public function visitor_count() {
        if(isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }

    // Enables to give the user feedback on what has happened
    public function message($msg="") {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    // Checks to see if the message is set
    private function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']); // Stops the message from repeating if we refresh the page
        } else {
            $this->message = ""; // Sets it to empty to prevent errors
        }
    }

    // Returns a True or False value depending on if the user is logged in or not
    public function is_signed_in() {
        return $this->signed_in;
    }

    public function login($user) {
        if($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id; //Assigns 2 values to the variable.
            $this->signed_in = true;
        }
    }

    public function logout() {
            unset($_SESSION['user_id']);
            unset($this->user_id);
            $this->signed_in = false;
    }

    // If True Sets the user_id property
    private function check_the_login() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }



















}

$session = new Session();


?>