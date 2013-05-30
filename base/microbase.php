<?php
class MicroBase{
  public static function Run(){
    require_once 'bootstrap.php';
  }
}

function render($filename){
  Renderer::Render($filename);
}

function redirect($routename){
  Router::Redirect($route);
}

function route($name, $func, $method = 'GET'){
  Routes::Add($name, $func, $method);
}

function setvar($name, $value){
  global $VIEWBAG;

  if(!isset($VIEWBAG))
    $VIEWBAG = array();
  
  $VIEWBAG["$name"] = $value;
}

function getvar($name){
  global $VIEWBAG;
  return $VIEWBAG[$name];
}
?>
