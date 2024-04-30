<?php 
function require_login() {
  global $session;
  if(!$session->is_logged_in()) {
    redirect_to(url_for('/members/login.php'));
  } else {
  }
}

function require_level($level) {
  global $session;
  if(!($session->user_level() >= $level) ) {
    redirect_to(url_for('/members/index.php'));
  }
}

function require_vendor_id_match($id, $vendor_id) {
  if ($id != $vendor_id) {
    redirect_to(url_for('/members/index.php'));
  }
}

function require_id_match($id) {
  global $session;
  if($id != $session->get_user_id()) {
    redirect_to(url_for('/members/index.php'));
  }
}

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}

?>
