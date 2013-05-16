<?php

session_start();

$root = $_SESSION['ROOT'] = realpath($_SERVER['DOCUMENT_ROOT']);

// Autoloader
require_once "$root/base/autoloader.php";

require_once "$root/config/routes.php";

?>
