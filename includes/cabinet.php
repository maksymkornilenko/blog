<?php

$db = new DataBase();

$method = $_SERVER['REQUEST_METHOD'];


if ($method === 'POST') {
    
    $deleteNewsId = $_POST['deleteNewsId'];
//    var_dump($_POST);
    
    if (!empty($deleteNewsId)) {
        
        $db->deletNews($deleteNewsId);
	header('Location: '.$URL_SITE.'/index.php');
    } 
	
    if(!empty($_POST['cabinet_logOut'])){
        $user = new User();
        $user->logout();
        header('Location: '.$URL_SITE.'/index.php');
    }
} else if ($method === 'GET') {
    $news = $db->getNewsByLogin($loginUser);
    include_once 'Views' . DIRECTORY_SEPARATOR . 'Cabinet.php';
}