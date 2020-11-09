<?php

namespace App\Lib;

class Session{
    private $signed_in=false;
    public $user_id;
    public $fullname;

    public function __construct(){
        session_start();
        $this->check_the_login();
    }

    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->fullname=$_SESSION['fullname'];
            $this->signed_in=true;
        }else{
            unset($this->user_id);
            $this->signed_in=false;
        }
    }
   
    public function login($user){
        if($user){
            $this->user_id=$_SESSION['user_id']=$user['id'];
            $this->fullname=$_SESSION['fullname']=$user['first_name'] . " " . $user['last_name'];
            $this->signed_in=true;
        }
    }

    public function logout(){
        unset($this->user_id);
        unset($_SESSION['user_id']);
        unset($_SESSION['fullname']);
        $this->signed_in=false;
    }

}