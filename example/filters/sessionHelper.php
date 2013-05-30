<?php
class SessionHelper{
  public static function CurrentUser(){
    return isset($_SESSION['user_id']);
  }
}
?>
