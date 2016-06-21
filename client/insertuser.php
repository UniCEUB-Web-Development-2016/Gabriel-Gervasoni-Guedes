<?php
// Point to where you downloaded the phar
include('httpful.phar');
$fname=urlencode($_POST['first_name']);
$lname=urlencode($_POST['last_name']);
$address=urlencode($_POST['address']);


$url = "http://localhost/trabalho/user/?first_name=".$fname
    ."&last_name=".$lname
    ."&email=".$_POST['email']
    ."&rg=".$_POST['rg']
    ."&cpf=".$_POST['cpf']
    ."&address=".$address
    ."&phone=".$_POST['phone']
    ."&password=".$_POST['pass'];


$response = \Httpful\Request::post($url)->send();

if($response->body == 'false'){
    include('signup2.html');
}
else{
    header('location:index.html');
}


