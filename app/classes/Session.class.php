<?php

class Session
{
  private $user_id;
  public  $client_id;

  public  $email;
  public  $user;

  private $last_login;
  private $client = 'r2b_';

  const MAX_LOGIN_AGE = 60 * 60 * 24; // * 1 day

  public function __construct()
  {
    session_start();
    $this->check_stored_login();
  }

  public function login($user, $client = '')
  {
    if ($user) :
      // ** this first part is general saved session for user and clients
      // ** prevent session fixation attacks
      session_regenerate_id();

      $this->user_id = $_SESSION[$this->client . 'user_id'] = $user->id;
      $this->last_login = $_SESSION[$this->client . 'last_login'] = time();

      if ($client) : // ** this part for the client login saved session
        $this->client_id = $_SESSION[$this->client . 'client_id'] = $user->id;
        $this->email = $_SESSION[$this->client . 'email'] = $user->email;
      else :
        $this->email = $_SESSION[$this->client . 'email'] = $user->email;
      endif;
    endif;
    return true;
  }

  public function is_logged_in()
  {
    return isset($this->user_id) && $this->last_login_is_recent();
  }

  public function logout($client = '')
  {
    unset($_SESSION[$this->client . 'user_id']);
    unset($_SESSION[$this->client . 'last_login']);
    unset($_SESSION['back']);
    unset($this->user_id);
    unset($this->last_login);
    if ($client) :
      unset($_SESSION[$this->client . 'email']);
      unset($_SESSION[$this->client . 'client_id']);
      unset($this->email);
      unset($this->client_id);
    else :
      unset($_SESSION[$this->client . 'email']);
      unset($this->email);
    endif;

    return true;
  }

  private function check_stored_login()
  {
    if (isset($_SESSION[$this->client . 'user_id'])) :

      $this->user_id = $_SESSION[$this->client . 'user_id'];
      $this->last_login = $_SESSION[$this->client . 'last_login'];

      if (isset($_SESSION[$this->client . 'client_id'])) :
        $this->client_id = $_SESSION[$this->client . 'client_id'];
        $this->email = $_SESSION[$this->client . 'email'];
      else :
        $this->email = $_SESSION[$this->client . 'email'];
      endif;
    endif;
  }

  private function last_login_is_recent()
  {
    if (!isset($this->last_login)) :
      return false;
    elseif (($this->last_login + self::MAX_LOGIN_AGE) < time()) :
      return false;
    else :
      return true;
    endif;
  }

  public function message($msg = "")
  {
    if (!empty($msg)) :
      // * Then this is a "set" message
      $_SESSION[$this->client . 'message'] = $msg;
      return true;
    else :
      // * Then this is a "get" message
      return $_SESSION[$this->client . 'message'] ?? '';
    endif;
  }

  public function clear_message()
  {
    unset($_SESSION[$this->client . 'message']);
  }
}
