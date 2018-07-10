<?php
function isValidJson($strJson) { 
    json_decode($strJson); 
    return (json_last_error() === JSON_ERROR_NONE); 
} 
// Requires Core composer's autoload
if (file_exists('vendor/autoload.php')) {
    require('vendor/autoload.php');
}

// Requires Function composer's autoload
require('function/vendor/autoload.php');

//$stdin = (string)fgets(STDIN);
$stdin = file_get_contents("php://stdin");

if(isValidJson(($stdin))){
    $json=json_decode($stdin);    
    $h = (new App\Handler())->handle($json);
    return;
}

$h = (new App\Handler())->handle($stdin);

