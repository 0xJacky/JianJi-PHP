<?php
if (!defined("IN_JIANJI")) {
  die();
}

$result = $this->model->user->logout($_POST['user_id']);
switch ($result) {
  case '200':
  $this->http->response(200, 'Logout Success');
  break;
  case '503':
  $this->http->response(503, 'DataBase Error');
  break;
  default:
  $this->http->response(503, 'DataBase Error');
  break;
}
?>
