<?php

function require_login()
{
  global $session;
  if (!$session->is_logged_in()) redirect_to(url_for('auth/login.php'));
}

// if (!$session->is_logged_in()) { API
//   http_response_code(404);
//   exit(json_encode(['error' => 'Login is required!']));
// }

function is_admin($role)
{
  if ($role != 'admin') :
    http_response_code(403);
    exit(json_encode(['message' => 'Access denied!']));
  endif;
}


function display_errors($errors = [])
{
  $output = '';
  if (!empty($errors)) :

    $output .= "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";

    $output .= "<ul class=\"menu-inner flex-column\">";
    foreach ($errors as $error) :
      if (is_array($error)) :
        foreach ($error as $err) :
          $output .= "<li class=\"menu-item\">" . h($err) . "</li>";
        endforeach;
      else :
        $output .= "<li class=\"menu-item\">" . h($error) . "</li>";
      endif;
    endforeach;

    $output .= "</ul>";

    $output .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
    $output .= "</div>";
  endif;
  return $output;
}

function display_session_message($type = 'success')
{
  global $session;
  $msg = $session->message();
  if (isset($msg) && $msg != '') :
    $session->clear_message();

    return '<div class="bs-toast toast toast-placement-ex m-2 fade bg-' . $type . ' top-0 end-0 show" role="alert" aria-live="polite" aria-atomic="true" data-delay="2000"><div class="toast-header"><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body"><i class="bx bx-check me-2"></i>' . h($msg) . '</div></div>';

  endif;
}
