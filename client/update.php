<?php
include('httpful.phar');

session_start();
$address=urlencode($_POST['address']);
$url = "http://localhost/trabalho/user/email=".$_SESSION['email']
    ."&rg=".$_POST['rg']
    ."&cpf=".$_POST['cpf']
    ."&address=".$address
    ."&phone=".$_POST['phone'];

$response = \Httpful\Request::put($url)->send();

$response = \Httpful\Request::get('http://localhost/trabalho/user/?id='.$_SESSION['id'])->send();
$request_response = json_decode($response->body);
$_SESSION['rg']=$request_response[0]->rg;
$_SESSION['cpf']=$request_response[0]->cpf;
$_SESSION['address']=urldecode($request_response[0]->address);
$_SESSION['phone']=$request_response[0]->phone;

include('teste.html');
