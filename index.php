<?php 
define("PROJECT_ROOT_PATH", __DIR__ . "/../");
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri == '/elestio/') {
    include 'app.php';
} elseif ($uri == '/elestio/data') {
    require_once PROJECT_ROOT_PATH . "/elestio/data.php";
}
?>