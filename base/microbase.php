<?php
require_once 'bootstrap.php';

/*
 *
 * Framework interface functions
 *
 */
function microbase(){
  Router::Route();
}


function render($filename){
  Renderer::Render($filename);
}

function redirect($routename){
  Router::Redirect($routename);
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
