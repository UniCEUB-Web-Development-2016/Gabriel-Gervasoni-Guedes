<?php
include('httpful.phar');

session_start();

$url = "http://localhost/trabalho/user/id=".$_SESSION['id'];
    $response = \Httpful\Request::delete($url)->send();
header('location:confirm.html');