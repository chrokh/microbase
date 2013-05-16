<?php
class Routes{
  private static $routes = array();
  private static $before_filters = array();
  private static $after_filters = array();

  public static function Add($name, $path, $method = 'GET'){
    $route = array(
      'method' => $method,
      'path'   => $path,
      'name'   => $name
    );
    array_push(self::$routes, $route);
  }

  public static function All(){
    return self::$routes;
  }



  /*
   *
   * Add Filters
   *
   */
  public static function AddBeforeFilter($route, $function, $arguments = array()){
    self::addFilter(self::$before_filters, $route, $function, $arguments);
  }

  public static function AddAfterFilter($route, $function, $arguments = array()){
    self::addFilter(self::$after_filters, $route, $function, $arguments);
  }

  private static function addFilter(&$target, $route, $function, $arguments){
    $filter = array(
      'route'        => $route,
      'function'     => $function,
      'arguments'    => $arguments
    );
    array_push($target, $filter);    
  }


  /*
   *
   * Get Filters
   *
   */
  public static function GetBeforeFiltersFor($route){
    return self::getFiltersForFrom($route, self::$before_filters);
  }

  public static function GetAfterFiltersFor($route){
    return self::getFiltersForFrom($route, self::$after_filters);
  }

  private static function getFiltersForFrom($route, &$target){
    $filters = array();

    foreach($target as $f){
      $route_name  = $route['name'];
      $filter_name = $f['route'];
      if($route_name == $filter_name)
        array_push($filters, $f);
    }

    return $filters;
  }
  
}
?>
