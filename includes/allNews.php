<?php

$db = new DataBase();

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {

    $deleteNewsId = $_POST['deleteNewsId'];
//    var_dump($_POST);

    if (!empty($deleteNewsId)) {

        $db->deletNews($deleteNewsId);
        header('Location: ' . $URL_SITE . '/index.php');
    }
} else if ($method === 'GET') {
    $news = $db->getNews();
    include_once 'Views' . DIRECTORY_SEPARATOR . 'AllNews.php';
}

