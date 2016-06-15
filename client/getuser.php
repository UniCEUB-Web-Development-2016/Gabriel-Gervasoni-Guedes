<?php
// Point to where you downloaded the phar
include('httpful.phar');


/*$url = "http://localhost/trabalho/user/?first_name=".$_POST['first_name']
    ."&last_name=".$_POST['last_name']
    ."&email=".$_POST['email']
    ."&rg=".$_POST['rg']
    ."&cpf=".$_POST['cpf']
    ."&address=".$_POST['address']
    ."&phone=".$_POST['phone']
    ."&password=".$_POST['pass'];

$response = \Httpful\Request::post($url)->send();
header('location:home.html');
*/
//----------------------------------------------------------------------

//var_dump(json_decode($response));
//if ($response->http_code =='200'){
 //   echo ('http://localhost/client/home.html');}
//else{
 //   echo ('fail');}
//var_dump($response);


//------------------------------------------------------------------------





// And you're ready to go!
$response = \Httpful\Request::get('http://localhost/trabalho/user/?email='.$_POST['email'].'&password='.$_POST['pass'])->send();

if($response->code == 200)
$request_response = json_decode($response->body);
var_dump($request_response);
$request_response['first_name']
die;
foreach($request_response as $value)
{
	echo $value->first_name . '<br>';
	echo '<div class="checkbox">
          <label>
           <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>';
}


