<?php

$page = empty($_GET['page']) ? 'index' : $_GET['page'];
$status = '';
if (!file_exists('pages/' . $page . '.php') ) {
    $page = 'error';
    $status = '404';
}

include('includes/wrapper.php');
