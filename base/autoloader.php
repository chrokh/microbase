<?php
class Autoloader{
  public static function Load($class){
    self::tryRequire('base', $class);
    self::tryRequire('models', $class);
    self::tryRequire('helpers', $class);
  }

  private static function tryRequire($dir, $class){
    $absolutePath = $dir . '/' . $class;
    if(self::checkExistance($dir))
      if(self::checkExistance($absolutePath . '.php'))
        require_once $absolutePath . '.php';
  }

  private static function checkExistance($file){
    $absolutePath = $_SESSION['ROOT'] . '/' . $file;
    return file_exists($absolutePath);
  }
}

// Register the autoloader
spl_autoload_register(array('Autoloader', 'Load'));
?>
