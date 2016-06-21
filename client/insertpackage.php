<?php
// Point to where you downloaded the phar
include('httpful.phar');

$url = "http://localhost/trabalho/package/?weight=".$_POST['weight']
    ."&dimensions=".$_POST['dimensions']
    ."&destination_address=".$_POST['destination_address']
    ."&status=0"
    ."&cod_user=".$_POST['cod_user'];
var_dump($url);
die;
$response = \Httpful\Request::post($url)->send();

    header('location:package.php');





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


