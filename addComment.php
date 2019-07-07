<?php

include_once 'config.php';
include_once 'application' . DIRECTORY_SEPARATOR . 'DataBase.php';

class addComment {

    public $title;
    public $text;
    public $date_time;
    public $news_id;

    public function __construct() {
        $this->title = filter_input(INPUT_POST, 'author');
        $this->text = filter_input(INPUT_POST, 'coment');
        $this->date_time = filter_input(INPUT_POST, 'date');
        $time = date("Y-m-d");
        $today = date('H:m:s');
        $res_date = $time.' '.$today;
        $this->date_time = $res_date;
        $this->news_id =filter_input(INPUT_POST, 'news_id');
        
    }

    public function validator($title, $text) {
        if (empty($title) || strlen($title) > 150) {
            return false;
        } else if (empty($text)) {
            return false;
        }else{
            return true;
            
        } 
    }
    public function comValidator() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->error_message = $_SESSION["file_error_message"];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->validator($this->title, $this->text) ) {
                $db = new DataBase();
                $db->setComment($this->title, $this->text, $this->date_time, $this->news_id);
		$url = $_SERVER['HTTP_ORIGIN'];

                header("Location: ".$url."/SingleNews.php?newsId=".$this->news_id);
            } else {
                header("Location: ".$URL_SITE."AddComment.php");
            }
        }
    }
}
