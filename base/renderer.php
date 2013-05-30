<?php
class Renderer{
  private static $hasRouted = false;

  public static function Render($template, $code = 200){
    if(self::templateExists($template)){
      http_response_code($code);
      self::renderTemplate($template);
    }else{
      http_response_code(400);
      self::throwTemplateNotFound($template);
    }
  }

  private static function throwTemplateNotFound($template){
    $absPath = self::getAbsolutePathToTemplate($template);
    exit("Expected template to be defined at '$absPath'");
  }

  private static function templateExists($route){
    return file_exists(self::getAbsolutePathToTemplate($route));
  }

  private static function renderTemplate($template){
    require_once self::getAbsolutePathToTemplate($template);
  }

  private static function getAbsolutePathToTemplate($template){
    $base = $_SESSION['APP_PATH'];
    return "$base/views/$template.php";
  }  
}
?>
