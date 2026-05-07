<?php
$pagetitle = array('title' => 'ReNew Notebook Store');
$header = array(
    'imagesource' => 'logo.png',
    'imagealt' => 'ReNew Notebook logo',
    'title' => 'ReNew Notebook Store',
    'motto' => 'Company-refurbished notebooks at favourable prices'
);
$footer = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'firm' => 'ReNew Ltd. | Project by Berenice Olawale and Meriem Ben Zouitine'
);
$database = array(
    'dsn' => 'mysql:host=localhost;dbname=renew_notebook;charset=utf8mb4',
    'user' => 'root',
    'password' => ''
);
function dbConnect() {
    global $database;
    return new PDO($database['dsn'], $database['user'], $database['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
$pages = array(
    '/' => array('file' => 'home', 'text' => 'Mainpage', 'menun' => array(1,1)),
    'gallery' => array('file' => 'images', 'text' => 'Images', 'menun' => array(1,1)),
    'contact' => array('file' => 'contact', 'text' => 'Contact', 'menun' => array(1,1)),
    'messages' => array('file' => 'messages', 'text' => 'Messages', 'menun' => array(0,1)),
    'crud' => array('file' => 'crud', 'text' => 'CRUD', 'menun' => array(1,1)),
    'login' => array('file' => 'login', 'text' => 'Login', 'menun' => array(1,0)),
    'login2' => array('file' => 'login2', 'text' => '', 'menun' => array(0,0)),
    'logout' => array('file' => 'logout', 'text' => 'Logout', 'menun' => array(0,1)),
    'register' => array('file' => 'register', 'text' => '', 'menun' => array(0,0))
);
$error_page = array('file' => '404', 'text' => 'Page not found!');
?>