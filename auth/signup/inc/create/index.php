<?php
require_once('../../../../app/initialize.php');

if (is_post_request()) :
  if (is_post_request()) :
    $studentArgs = $_POST['reg'] ?? '';

    $student = new User($studentArgs);
    $studentResult = $student->save();

    if (empty($student->errors)) :
      log_action('User registration', "{$student->full_name()} Logged in.", "registration");

      exit(json_encode(['message' => 'Record saved!']));
    // redirect_to(url_for('auth/login.php'));

    else :
      http_response_code('404');
      exit(json_encode(['error' => 'Failed!']));

    endif;

  else :
    $student = new User();
  endif;
endif;
