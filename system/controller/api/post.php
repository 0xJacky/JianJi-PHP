<?php
/**
* API Controller
*/
if (!defined("IN_JIANJI")) {
  die();
}

class post extends Controller
{
  function __construct() {
    parent::__construct();
  }

  function list() {
    if ($this->is_ok('list'))
      $this->load('post/list', 'api');
  }

  function post() {
    if ($this->is_ok('post'))
      $this->load('post/post', 'api');
  }

  function edit() {
    if ($this->is_ok('edit'))
      $this->load('post/edit', 'api');
  }

  function delete() {
    if ($this->is_ok('delete'))
      $this->load('post/delete', 'api');
  }

  function favour() {
    if ($this->is_ok('favour'))
      $this->load('post/favour', 'api');
  }

  function self_list() {
    if ($this->is_ok('self_list'))
      $this->load('post/self_list', 'api');
  }

  function is_ok($action) {
    switch ($action) {
      case 'post':
        if (isset($_POST['title'], $_POST['content'], $_POST['img'], $_POST['type'])) {
          $_POST['user_id'] = (int)$_POST['user_id'];// It has been check in security.php
          $_POST['title'] = xss_clean($_POST['title']);
          $_POST['content'] = xss_clean($_POST['content']);
          $_POST['img'] = xss_clean($_POST['img']);
          $_POST['type'] = (int)$_POST['type'];
          return true;
        }
        die($this->http->info(400));
      break;
      case 'edit':
        if (isset($_POST['post_id'], $_POST['title'], $_POST['content'], $_POST['img'], $_POST['type'])) {
          $_POST['user_id'] = (int)$_POST['user_id'];// It has been check in security.php
          $_POST['post_id'] = (int)$_POST['post_id'];
          $_POST['title'] = xss_clean($_POST['title']);
          $_POST['content'] = xss_clean($_POST['content']);
          $_POST['img'] = xss_clean($_POST['img']);
          $_POST['type'] = (int)$_POST['type'];
          return true;
        }
        die($this->http->info(400));
      break;
      case 'delete':
      case 'favour':
        if (isset($_POST['post_id'])) {
          $_POST['user_id'] = (int)$_POST['user_id']; // It has been check in security.php
          $_POST['post_id'] = (int)$_POST['post_id'];
          return true;
        }
        die($this->http->info(400));
      break;
      case 'self_list':
        $_POST['user_id'] = (int)$_POST['user_id'];// It has been check in security.php
        return true;
      break;

      default:
        die($this->http->info(400));
      break;
    }
  }
}


?>
