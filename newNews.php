<?php

include_once 'config.php';
include_once 'application' . DIRECTORY_SEPARATOR . 'DataBase.php';

class newNews {

    public $title;
    public $text;
    public $date_time;

    public function __construct() {
        $this->title = filter_input(INPUT_POST, 'title');
        $this->text = filter_input(INPUT_POST, 'content');
        $this->date_time = filter_input(INPUT_POST, 'date');
        $time = date("Y-m-d");
        $today = date('H:m:s');
        $res_date = $time.' '.$today;
        $this->date_time = $res_date;
    }

    public function validator($title, $text) {
        if (empty($title) || strlen($title) > 150) {
            return false;
        } else if (empty($text)) {
            return false;
        } else {
            return true;
        }
    }

    public function fileValidator() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->error_message = $_SESSION["file_error_message"];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->validator($this->title, $this->text)) {
                $db = new DataBase();
                $db->setNews($this->title, $this->text, $this->date_time);
                $url = $_SERVER['HTTP_ORIGIN'];

                header("Location: " . $url . "/index.php");
            } else {
                header("Location: " . $URL_SITE . "NewNews.php");
            }
        }
    }

}
