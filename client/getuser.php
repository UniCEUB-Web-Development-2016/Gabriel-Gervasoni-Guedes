<?php
include('httpful.phar');

$response = \Httpful\Request::get('http://localhost/trabalho/user/?email='.$_POST['email'])->send();

if($response->code == 200){
$request_response = json_decode($response->body);
	if($request_response[0]->email == $_POST['email'] && $request_response[0]->password == $_POST['pass']){
		session_start();
		$_SESSION['id']=$request_response[0]->id;
		$_SESSION['email']=$request_response[0]->email;
		$_SESSION['first_name']=urldecode($request_response[0]->first_name);
		$_SESSION['last_name']=urldecode($request_response[0]->last_name);
		$_SESSION['rg']=$request_response[0]->rg;
		$_SESSION['cpf']=$request_response[0]->cpf;
		$_SESSION['address']=urldecode($request_response[0]->address);
		$_SESSION['phone']=$request_response[0]->phone;
		include 'teste.html';

	}
	else{
		header('location:signin2.html');
	}
}
else{
	header('location:error.html');
}
