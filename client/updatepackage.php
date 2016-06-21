<?php
include('httpful.phar');

session_start();
$dest_address=urlencode($_POST['destination_address']);
$url = "http://localhost/trabalho/package/id=".$_POST['id']
    ."&weight=".$_POST['weight']
    ."&dimensions=".$_POST['dimensions']
    ."&destination_address=".$dest_address
    ."&status=".$_POST['status'];

$response = \Httpful\Request::put($url)->send();
header('location:package.php');
