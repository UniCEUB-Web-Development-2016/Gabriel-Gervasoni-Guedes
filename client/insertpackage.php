<?php
// Point to where you downloaded the phar
include('httpful.phar');

$dest_address=urlencode($_POST['destination_address']);

$url = "http://localhost/trabalho/package/?weight=".$_POST['weight']
    ."&dimensions=".$_POST['dimensions']
    ."&destination_address=".$dest_address
    ."&status=0"
    ."&cod_user=".$_POST['cod_user'];

$response = \Httpful\Request::post($url)->send();

    header('location:package.php');


