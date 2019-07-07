<?php

include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'config_example.php';

class DataBase {

    public $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    private function connect() {
        if ($this->mysqli->connect_errno) {
            echo "Извините, возникла проблема с базой данных\n";
            echo "Ошибка: " . $this->mysqli->connect_error . "\n";
            exit();
        }
    }

    public function getNews() {
        $this->connect();
        $sql = "SELECT COUNT(comments.news_id), news.id, news.name, news.text, news.dateOfCreate FROM news LEFT JOIN comments ON comments.news_id=news.id GROUP BY news.name order by news.id";
        if (!$result = $this->mysqli->query($sql)) {
            // О нет! запрос не удался. 
            echo "Извините, возникла проблема в работе сайта.";
            echo "Запрос: " . $sql . "\n";
            echo "Номер ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
            exit;
        }
        $news = $result->fetch_all(MYSQLI_ASSOC);
        return $news;
    }

    public function getCommentsById($id) {
        $this->connect();
        $sql = "SELECT * FROM comments WHERE comments.news_id = '" . $id . "';";
        if (!$result = $this->mysqli->query($sql)) {
            // О нет! запрос не удался. 
            echo "Извините, возникла проблема в работе сайта.";
            echo "Запрос: " . $sql . "\n";
            echo "Номер ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
            exit;
        }
        $news = $result->fetch_all(MYSQLI_ASSOC);
        return $news;
    }

    public function getNewsById($id) {
        $this->connect();
        $sql = "SELECT news.* FROM news WHERE news.id = " . $id . ";";
        if (!$result = $this->mysqli->query($sql)) {
            // О нет! запрос не удался. 
            echo "Извините, возникла проблема в работе сайта.";
            echo "Запрос: " . $sql . "\n";
            echo "Номер ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
            exit;
        }
        $news = $result->fetch_assoc();
        return $news;
    }

    public function setNews($name, $text, $dateOfCreate) {
        $this->connect();
        // example of date = 2019-04-03 00:00:00;
        $sql = "INSERT INTO news VALUES (null, '" . $name . "', '" . $text . "', '" . $dateOfCreate . "')";
        if (!$result = $this->mysqli->query($sql)) {
            // О нет! запрос не удался. 
            echo "Извините, возникла проблема в работе сайта.";
            echo "Запрос: " . $sql . "\n";
            echo "Номер ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
            exit;
        }
    }

    public function setComment($name, $text, $dateOfCreate, $news_id) {
        $this->connect();
        // example of date = 2019-04-03 00:00:00;
        $sql = "INSERT INTO comments VALUES (null, '" . $name . "', '" . $text . "', '" . $dateOfCreate . "', '" . $news_id . "')";
        if (!$result = $this->mysqli->query($sql)) {
            // О нет! запрос не удался. 
            echo "Извините, возникла проблема в работе сайта.";
            echo "Запрос: " . $sql . "\n";
            echo "Номер ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
            exit;
        }
    }

    public function deletNews($id) {
        //"DELETE FROM `artickles` WHERE `artickles`.`id` = 3"
        $this->connect();
        $sql = "DELETE FROM `news` WHERE `news`.`id` = " . $id . ";";
        if (!$result = $this->mysqli->query($sql)) {
            // О нет! запрос не удался. 
            echo "Извините, возникла проблема в работе сайта.";
            echo "Запрос: " . $sql . "\n";
            echo "Номер ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
            exit;
        }
    }

    public function getPopularNews() {
        $this->connect();
        $sql = "SELECT news.id, news.name, news.text,news.dateOfCreate,COUNT(comments.news_id) as total FROM comments INNER JOIN news ON comments.news_id = news.id group BY comments.news_id ORDER BY total desc;";
        if (!$result = $this->mysqli->query($sql)) {
            // О нет! запрос не удался. 
            echo "Извините, возникла проблема в работе сайта.";
            echo "Запрос: " . $sql . "\n";
            echo "Номер ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
            exit;
        }
        $news = $result->fetch_all(MYSQLI_ASSOC);
        return $news;
    }

    public function getCountComment() {
        $this->connect();
        $sql = "SELECT news.*, COUNT(comments.news_id) FROM `news`INNER JOIN comments ON news.id=comments.news_id;";
        if (!$result = $this->mysqli->query($sql)) {
            // О нет! запрос не удался. 
            echo "Извините, возникла проблема в работе сайта.";
            echo "Запрос: " . $sql . "\n";
            echo "Номер ошибки: " . $this->mysqli->errno . "\n";
            echo "Ошибка: " . $this->mysqli->error . "\n";
            exit;
        }
        $news = $result->fetch_all(MYSQLI_ASSOC);
        return $news;
    }

}
