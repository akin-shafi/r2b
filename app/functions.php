<?php

function url_for($script_path)
{
  if ($script_path[0] != '/') :
    $script_path = "/" . $script_path;
  endif;
  return WWW_ROOT . $script_path;
}

function u($string = "")
{
  return urlencode($string);
}

function raw_u($string = "")
{
  return rawurlencode($string);
}

function h($string = "")
{
  return htmlspecialchars($string);
}

function error_404()
{
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500()
{
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

function redirect_to($location)
{
  header("Location: " . $location);
  exit;
}

function is_post_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

// PHP on Windows does not have a money_format() function.
// This is a super-simple replacement.
if (!function_exists('money_format')) {
  function money_format($format, $number)
  {
    return '$' . number_format($number, 2);
  }
}

//this function is used format the track number to this format EAGLE/LAG/2018/0023
function createTrackNo($val1, $val2)
{
  $trackNo = "EKO/" . strtoupper(substr($val1, 0, 3)) . "/" . date('Y') . "/" . str_pad($val2, 4, "0", STR_PAD_LEFT);
  return $trackNo;
}

// this is used to get the id from 
function getIdFromTrackNo($value)
{
  $return_value = explode("/", $value);
  $totalArray = count($return_value);
  $return_id = $return_value[$totalArray - 1];
  settype($return_id, 'integer');

  return $return_id;
}

function display_message($msg = '')
{
  if (isset($msg) && $msg != '') :
    return "<div id='message'> $msg </div>";
  else :
    $msg = "";
    return "<div id='message'> $msg </div>";
  endif;
}

function get_duration_span($value)
{
  $today = date('Y-m-d');
  switch ($value):
    case 'year':
      $value = [date('Y-01-01'), $today];
      break;

    case 'week':
      $todayD = date('Y-m-d-w');
      $diff = explode('-', $todayD);
      if ($diff[3] === 0) :
        $startWk = $today;
      else :
        $startWk = date('Y-m-d', strtotime($today) - 60 * 60 * 24 * $diff[3]);
      endif;
      $value = [$startWk, $today];
      break;

    case 'month':
      $value = [date('Y-m-01'), $today];
      break;

    default:
      $value = [$today, $today];
      break;
  endswitch;
  return $value;
}

// This part is for the text messages

//Function to connect to SMS sending server using HTTP GET
function useHTTPGet($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients)
{
  $query_str = http_build_query(['username' => $username, 'apikey' => $apikey, 'sender' => $sendername, 'messagetext' => $messagetext, 'flash' => $flash, 'recipients' => $recipients]);
  return file_get_contents("{$url}?{$query_str}");
}

//For logging of actions on the App
function log_action($action, $message = "", $logType = "")
{
  switch ($logType):
    case 'login':
      $logFile = PUBLIC_PATH . '/auth/log/logins.txt';
      break;

    case 'registration':
      $logFile = PUBLIC_PATH . '/auth/log/registration.txt';
      break;

    default:
      $logFile = PUBLIC_PATH . '/log/trans.txt';
      break;
  endswitch;

  $new = file_exists($logFile) ? false : true;

  if ($handle = fopen($logFile, 'a')) : // append

    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
    $content = "{$timestamp} | {$action}: {$message}\n";
    fwrite($handle, $content);
    fclose($handle);

    if ($new) :
      chmod($logFile, 0755);
    endif;
  else :
    echo "Could not open log file for writing.";
  endif;
}

function updateClientPWD($category, $id, $newPWD)
{
  $hashedPWD = password_hash($newPWD, PASSWORD_BCRYPT);
  switch ($category):
    case 'credit':
      $result = DB::query('UPDATE credit_client SET hashed_password = :hashed_password WHERE id = :id', [':id' => $id, ':hashed_password' => $hashedPWD]);
      break;
    case 'prepaid':
      $result = DB::query('UPDATE prepaid_client SET hashed_password = :hashed_password WHERE id = :id', [':id' => $id, ':hashed_password' => $hashedPWD]);
      break;
    default:
      $result = DB::query('UPDATE walk_in_client SET hashed_password = :hashed_password WHERE id = :id', [':id' => $id, ':hashed_password' => $hashedPWD]);
      break;
  endswitch;

  return $result;
}

function calcPercentage($a, $b)
{
  if ($b == 0) :
    $result = 0;
    return $result;
  else :
    $result = ($a / $b) * 100;
    return ceil($result);
  endif;
}

function split_date_for_manifest_no($manifestNo)
{
  $arr = str_split($manifestNo);

  $manifest_date = h($arr[0] . $arr[1] . $arr[2] . $arr[3] . '-' . $arr[4] . $arr[5] . '-' . $arr[6] . $arr[7] . ' ' . $arr[8] . $arr[9] . ':' . $arr[10] . $arr[11] . ':' . $arr[12] . $arr[13]);

  return $manifest_date;
}

function pre_r($array)
{
  echo '<pre class="text-info">';
  $printer = print_r($array);
  echo '</pre>';
  return $printer;
}

function is_unique_array($array, $keep_key_assoc = false)
{
  $duplicate_keys = [];
  $tmp = [];

  foreach ($array as $key => $value) {
    if (is_object($value))
      $value = (array)$value;

    if (!in_array($value, $tmp))
      $tmp[] = $value;
    else
      $duplicate_keys[] = $key;
  }

  foreach ($duplicate_keys as $key)
    unset($array[$key]);

  return $keep_key_assoc ? $array : array_values($array);
}

function str_merger($string)
{
  $exp = explode(' ', $string);
  $imp = '';
  if (count($exp) > 1)
    return $imp = implode('', $exp);
}

function generateRandomString($length = 10)
{
  $characters = 'abcdefghijklmnopqrstuvwxyz';
  $characterLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $characterLength - 1)];
  }
  return $randomString;
}







/**
 * Register our sidebars and widgetized areas.
 */
// function mdb_widgets_init() {

//   register_sidebar( array(
//     'name'          => 'Sidebar',
//     'id'            => 'sidebar',
//     'before_widget' => '',
//     'after_widget'  => '',
//     'before_title'  => '',
//     'after_title'   => '',
//   ) );

// }
// add_action( 'widgets_init', 'mdb_widgets_init' );
