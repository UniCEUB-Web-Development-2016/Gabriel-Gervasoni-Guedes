<?php
include('httpful.phar');

session_start();

$response = \Httpful\Request::get('http://localhost/trabalho/package/?cod_user='.$_SESSION['id'])->send();

$request_response = json_decode($response->body);
foreach($request_response as $item)
{
    echo $item->id;
    if($request_response == null) {
        include ('error.html');
    }
   else{
        include ('package.html');
    }
}

//for($w =1; $w<=count($_SESSION['packages']) ;$w=$w+5){
  //  echo $_SESSION['packages'][$w];

//}













//include('package.html');
/*$_SESSION['idpackage']=$request_response[0]->id;
$_SESSION['weight']=$request_response[0]->weight;
$_SESSION['dimensions']=$request_response[0]->dimensions;
$_SESSION['destination_address']=$request_response[0]->destination_address;
$_SESSION['status']=$request_response[0]->status;*/