<?php 

class Session {

    private $signed_in;
    public $user_id;

    // Auto starts a session each time its run
    function __construct(){
        session_start();
    }

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