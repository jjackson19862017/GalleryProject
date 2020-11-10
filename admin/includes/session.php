<?php 

class Session {

    private $signed_in = false;
    public $user_id;

    // Auto starts a session each time its run
    function __construct(){
        session_start();
        $this->check_the_login();
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