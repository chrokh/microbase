<?php

session_start();

$framework_path = $_SESSION['FRAMEWORK_PATH'] = realpath(dirname(__FILE__));
$root_path = $_SESSION['APP_PATH'] = getcwd();

// Autoloader
require_once "$framework_path/autoloader.php";

require_once "$root_path/config/routes.php";

Router::Route();

?>
