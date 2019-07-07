<?php
spl_autoload_register(function($app){
    $path = 'application'.DIRECTORY_SEPARATOR.$app.'.php';
    if(file_exists($path)){
	include_once $path;
	return true;
    }
    return false;
});