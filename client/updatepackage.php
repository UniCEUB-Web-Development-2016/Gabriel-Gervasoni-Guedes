<?php
include('httpful.phar');

session_start();

$url = "http://localhost/trabalho/package/id=".$_POST['id']
    ."&weight=".$_POST['weight']
    ."&dimensions=".$_POST['dimensions']
    ."&destination_address=".$_POST['destination_address']
    ."&status=".$_POST['status'];

$response = \Httpful\Request::put($url)->send();
header('location:package.php');
