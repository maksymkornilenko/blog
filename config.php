<?php
const DB_HOST='localhost';
const DB_USER='root';
const DB_PASS='';
const DB_NAME='smallblog';

const AVAILABLE_TYPES = array(
    'image/png',
    'image/jpeg',
    'image/bmp',
    'image/webp',
);

const MAX_UPLOAD_DOC_SIZE = 10*1024*1024;
const UPLOAD_DOC_DIR = '..'.DIRECTORY_SEPARATOR.'images';

$host = $_SERVER['HTTP_HOST'];
$URL_SITE = 'http://'.$host;
