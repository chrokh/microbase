<?php
class Authenticator{
  public static function Authenticate(){
    if(SessionHelper::CurrentUser() == null){
      Router::Redirect('/login');
    }
  }
}
?>
