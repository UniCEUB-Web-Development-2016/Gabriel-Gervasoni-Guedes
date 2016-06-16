<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/trabalho/user/?first_name=".$_POST['first_name']
    ."&last_name=".$_POST['last_name']
    ."&email=".$_POST['email']
    ."&rg=".$_POST['rg']
    ."&cpf=".$_POST['cpf']
    ."&address=".$_POST['address']
    ."&phone=".$_POST['phone']
    ."&password=".$_POST['pass'];

$response = \Httpful\Request::post($url)->send();

if($response->body == 'false'){
    include('signup2.html');
}
else{
    header('location:home.html');
}




//----------------------------------------------------------------------

//var_dump(json_decode($response));
//if ($response->http_code =='200'){
 //   echo ('http://localhost/client/home.html');}
//else{
 //   echo ('fail');}
//var_dump($response);


//------------------------------------------------------------------------





// And you're ready to go!
//$response = \Httpful\Request::get('http://localhost/request/user/?first_name=sorte')->send();

//$request_response = json_decode($response->body);

//foreach($request_response as $value)
//{
//	echo $value->first_name . '<br>';
//	echo '<div class="checkbox">
 //         <label>
//            <input type="checkbox" value="remember-me"> Remember me
 //         </label>
//        </div>';
//}


