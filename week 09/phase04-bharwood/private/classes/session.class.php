<?php

class Session {

  private $user_id_usr;
  public $username_usr;
  private $last_login;
  private $user_level;

  public const MAX_LOGIN_AGE = 60*60*24; // 1 day

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  public function login($user) {
    if($user) {
      session_regenerate_id();
      $this->user_id_usr = $_SESSION['user_id'] = $user->id_usr;
      $this->user_level = $_SESSION['user_level'] = $user->user_level_usr;
      $this->username_usr = $_SESSION['username'] = $user->username_usr;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  public function is_logged_in() {
    return isset($this->user_id_usr) && $this->last_login_is_recent();
  }

  public function user_level() {
    return $this->user_level;
  }

  public function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['last_login']);
    unset($this->user_id_usr);
    unset($this->username_usr);
    unset($this->last_login);
    return true;
  }

  private function check_stored_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id_usr = $_SESSION['user_id'];
      $this->user_level = $_SESSION['user_level'];
      $this->username_usr = $_SESSION['username'];
      $this->last_login = $_SESSION['last_login'];
    }
  }


  private function last_login_is_recent() {
    if(!isset($this->last_login)) {
      return false;
    } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  public function message($msg="") {
    if(!empty($msg)) {
      $_SESSION['message'] = $msg;
      return true;
    } else {
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message() {
    unset($_SESSION['message']);
  }
  
  public function get_user_id() {
   return $this->user_id_usr;
  }
}


?>
