<?php
/**
 * JianJi HTTP Library
 */
 if (!defined("IN_JIANJI")) {
   exit();
 }
class http
{
  function info($type) {
    switch ($type) {
      case 200:
        $info = "200 OK";
        break;
  		case 304:
  			$info = "304 Not Modified";
  			break;
  		case 400:
  			$info = "400 Bad Request";
  			break;
  		case 404:
  			$info = "404 Not Found";
  			break;
  		case 403:
  			$info = "403 Forbidden";
  			break;
  		case 405:
  			$info = "405 Method Not Allowed";
  			break;
  		case 500:
  			$info = "500 Internal Server Error";
  			break;
  		default:
        $type = "501";
  			$info = "501 Not Implemented";
  			break;
  	}
  	header("HTTP/1.1 ".$info);
  	header("Status: ".$info);
  	header("Content-type: application/json; charset=UTF-8");
    $this->response($type, $info);
  }

  function response($type = '200', $info, $generate_token = false) {
    $message = array(
      'status' => $type,
      'info' => $info
    );
    if ( $generate_token == ture ) {
      $message['token'] = $this->auth->generate_token();
    } else {
      $message['timestamp'] = time();
      $message['version'] = API_VERSION;
    }
    echo json_encode($message);
  }
}

?>