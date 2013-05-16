<?php
class Router{
  private static $hasRouted = false;

  public static function Route(){
    $route = self::findMatchingRoute();

    if($route != null){
      if(self::routeEndpointExists($route)){
        self::runBeforeFilters($route);
        self::routeTo($route);
        self::runAfterFilters($route);
      }else{
        self::throwRoutePointingToNonExistantFile($route);
      }
    }else{
      self::throwFileNotFound();
    }
  }

  public static function Redirect($name){
    foreach(Routes::All() as $r){
      if($r['name'] == $name && $r['method'] == 'GET'){
        self::routeTo($r);
      }
    }
  }

  private static function throwRoutePointingToNonExistantFile($route){
    exit("Route '{$route['name']}' expected file to be defined at '{$route['path']}'");    
  }

  private static function throwFileNotFound(){
    $notFound = array('path' => 'views/404.php');
    self::routeTo($notFound);
  }

  private static function findMatchingRoute(){
    $name   = self::requestedName();
    $params = self::requestedParams();
    $method = $_SERVER['REQUEST_METHOD'];

    if($name != null)
      foreach(Routes::All() as $r)
        if($method == $r['method'] && $name == $r['name'])
          return $r;

    return null;
  }

  private static function routeEndpointExists($route){
    $file = self::buildAbsolutePath($route['path']); 
    return self::fileExists($file);
  }

  private static function routeTo($route){
    if(!self::$hasRouted){
      require_once self::buildAbsolutePath($route['path']);
      self::$hasRouted = true;
    }
  }

  private static function requestedName(){
    $req = self::getRoutingParams();

    // Exit if root url
    if(count($req) <= 1)
      return '/';

    // Exit if root url
    if(empty($req[1]))
      return '/';

    // return name part 
    return '/' . $req[1];
  }

  private static function requestedParams(){
    $req = self::getRoutingParams();

    if(count($req) > 2){
      $param = $req[2];

      if(!empty($param))
        return $param;
      else
        return null;
    }
  }

  private static function fileExists($path){
    return file_exists($path);
  }

   private static function buildAbsolutePath($relativePath){
    return $_SESSION['ROOT'] . '/' . $relativePath;
  }

  private static function getRoutingParams(){
    return explode('/', $_SERVER['REQUEST_URI']); 
  }


  /*
   *
   * Filter hooks
   *
   */
  private static function runBeforeFilters($route){
    self::runFilters(Routes::GetBeforeFiltersFor($route));
  }

  private static function runAfterFilters($route){
    self::runFilters(Routes::GetAfterFiltersFor($route));
  }  

  private static function runFilters($filters){
    foreach($filters as $f){
      call_user_func_array($f['function'], $f['arguments']);
    }
  }
}
?>
