<?php
class Autoloader{
  public static function Load($class){
    $appPath = $_SESSION['APP_PATH'];
    $frameworkPath = $_SESSION['FRAMEWORK_PATH'];

    self::tryRequire($frameworkPath, $class);
    self::tryRequire("$appPath/models", $class);
    self::tryRequire("$appPath/filters", $class);
  }

  private static function tryRequire($dir, $class){
    $absolutePath = $dir . '/' . $class;
    if(self::checkExistance($dir))
      if(self::checkExistance($absolutePath . '.php'))
        require_once $absolutePath . '.php';
  }

  private static function checkExistance($file){
    return file_exists($file);
  }
}

// Register the autoloader
spl_autoload_register(array('Autoloader', 'Load'));
?>
