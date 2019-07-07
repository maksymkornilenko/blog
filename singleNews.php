<?php

include_once 'includes' . DIRECTORY_SEPARATOR . 'Autoload.php';
include_once 'application' . DIRECTORY_SEPARATOR . 'DataBase.php';
if (!empty($_GET["newsId"])) {
    //добавлена след. строка
    $id = $_GET["newsId"];
    $db = new DataBase();
    $news =$db->getNewsById($id);
    $comments = array_reverse($db->getCommentsById($id));
    foreach ($comments as $comment){
            $res.="<tr><td class='table'>".$comment['name'].'</td><td class="table">'.$comment['text']."</td><td class='table'>".$comment['dateOfCreate']."</td></tr>";
        }
        $res='<table><tr><th class="table">Имя пользователя</th><th class="table">Текст комментария</th><th class="table">Дата создания комментария</th></tr>'.$res.'</table>';
    if ($_GET['newsId'] === $news['id']) {
        $view = '<form class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-teal" action="/index.php" >.<h2>' . $news['name'] .
                '</h2>' . '<p class="w3-text-black">' .
                $news['text'] . '</p>' .
                '<input type="submit" value="К списку" class="w3-button w3-teal" onclick="document.getElementById("id01").style.display="block""/></form><form method="GET" action="/Views/AddComment.php"><input type="hidden" value="'.$id.'" name="news_id"/><input type="submit" value="add comment" class="w3-button w3-teal""/></form>'.$res;
    } else {
        $view = '<form action="/index.php" class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-teal">' . '<p class="w3-text-black">'
                . 'Такой новости не существует</br>' . '</p>' .
                '<input type="submit" value="К новостям" class="w3-button w3-blue" onclick="document.getElementById("id01").style.display="block""/> </form>';
    }
} else {
    $view = '<form action="/index.php" class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-teal">' . '<p class="w3-text-black">'
            . 'Извините, возникла проблема в работе сайта.</br>' . '<p>' .
            '<input type="submit" value="К новостям" class="w3-button w3-blue" onclick="document.getElementById("id01").style.display="block""/> </form>';
}
include_once 'Views' . DIRECTORY_SEPARATOR . 'SingleNews.php';



