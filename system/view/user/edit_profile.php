<?php
if (isset($_POST['id']) && isset($_POST['profile'])) {
    $result = $this->user_model->user_edit_info($id, $profile);
    switch ($result) {
      case '200':
        $this->http->respone(200, 'Edit Successfully');
        break;
      case '404':
        $this->http->respone(404, 'User Not Found');
        break;
      default:
        $this->http->respone(404, 'User Not Found');
        break;
    }
}
?>