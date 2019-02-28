<?php
ob_start();
// session_start();

$url = 'https://localhost/jaydeespen';

define('DIR', __DIR__);
define('URL', $url);

date_default_timezone_set('Africa/Lagos');


// require __DIR__ . '/vendor/autoload.php';

// spl_autoload_register(function ($class_name) {
//     include 'controllers/'.$class_name . '.php';
// });

ob_end_flush();

?>