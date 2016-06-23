<?php
include('httpful.phar');
session_start();
$response = \Httpful\Request::get('http://localhost/trabalho/user/?email='.$_SESSION['email'])->send();

if($response->code == 200){
$request_response = json_decode($response->body);
		include 'teste.html';
}
else{
	header('location:error.html');
}
