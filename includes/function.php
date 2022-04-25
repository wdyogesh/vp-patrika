<?php
//echo  __DIR__;
function my_autoloader($class) {
    $class = strtolower($class);
    $the_path = "/home/mpg1lamw0vps/public_html/includes/{$class}.php";
    if (file_exists($the_path)){
         require_once $the_path;
    }
    else{
        echo "this file named {$class}.php was not fount";
    }
}

spl_autoload_register('my_autoloader');

function redirect($location){
    header("Location: {$location}");
}

?>