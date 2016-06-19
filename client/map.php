<?php
include('httpful.phar');

session_start();

$response = \Httpful\Request::get('http://localhost/trabalho/package/?cod_user='.$_SESSION['id'])->send();

$request_response = json_decode($response->body);
include ('packagecreate.html');