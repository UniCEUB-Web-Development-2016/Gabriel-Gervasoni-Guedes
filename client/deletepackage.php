<?php
include('httpful.phar');

session_start();

$url = "http://localhost/trabalho/package/id=".$_POST['id'];
    $response = \Httpful\Request::delete($url)->send();
header('location:package.php');