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
$response = \Httpful\Request::get('http://localhost/trabalho/user/?email='.$_POST['email'])->send();

if($response->code == 200){
$request_response = json_decode($response->body);
	if($request_response[0]->email == $_POST['email'] && $request_response[0]->password == $_POST['pass']){
		session_start();
		$_SESSION['id']=$request_response[0]->id;
		$_SESSION['email']=$request_response[0]->email;
		$_SESSION['first_name']=$request_response[0]->first_name;
		$_SESSION['last_name']=$request_response[0]->last_name;
		$_SESSION['rg']=$request_response[0]->rg;
		$_SESSION['cpf']=$request_response[0]->cpf;
		$_SESSION['address']=$request_response[0]->address;
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





//$request_response['first_name'];

/*foreach($request_response as $value)
{
	echo $value->first_name . '<br>';
	echo '<div class="checkbox">
          <label>
           <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>';
}

*/
