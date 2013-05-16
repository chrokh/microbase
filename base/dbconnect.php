<?php
class DBConnect{
  private static $mysqli;
  private static $connection = null;

  public static function GetConnection(){
    if(self::$connection == null)
      self::connect();

    return self::$connection; 
  }

  private static function connect(){
    self::$connection = new mysqli('localhost', 'eservices', null, 'eservices');
  }
}
?>

