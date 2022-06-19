<?php
require_once('../../../app/initialize.php');

$errors = [];
$email = '';
$password = '';

if (is_post_request()) :
  $login = $_POST['login'] ?? '';

  $email = $login['email'] ?? '';
  $password = $login['password'] ?? '';

  if (is_blank($email)) :
    $errors[] = "Email cannot be blank.";
  endif;
  if (is_blank($password)) :
    $errors[] = "Password cannot be blank.";
  endif;

  // pre_r($login);
  if (empty($errors)) :
    $user = User::find_by_email($email);

    if ($user != false && $user->verify_password($password)) :
      $session->logout(true);
      $session->logout('', true);

      $session->login($user);

      log_action('User Login', "{$user->full_name()} Logged in.", "login");
      exit(json_encode(['message' => 'Success']));
    else :
      $errors[] = "Log in not successful.";
      http_response_code('404');
      exit(json_encode(['error' => $errors]));
    endif;
  endif;
else :
  $user = new User();
endif;
