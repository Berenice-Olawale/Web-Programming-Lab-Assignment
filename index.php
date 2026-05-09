<?php
include('./includes/config.inc.php');

$query = $_SERVER['QUERY_STRING'];
$firstPart = explode('&', $query)[0];
$page = explode('=', $firstPart)[0];

if ($page != "") {
    if (isset($pages[$page]) && file_exists("./templates/pages/{$pages[$page]['file']}.tpl.php")) {
        $find = $pages[$page];
    }
    else { 
        $find = $error_page;
        header("HTTP/1.0 404 Not Found");
    }
}
else {
    $find = $pages['/'];
}

include('./templates/index.tpl.php'); 
?>