<?php 

class Session {

    private $signed_in;
    public $user_id;

    // Auto starts a session each time its run
    function __construct(){
        session_start();
    }





















}

$session = new Session();


?>