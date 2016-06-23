<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Packages</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
	<script type = "text/javascript" src="map.js"> </script>
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='http://j.pricejs.net/pfna2/common.js?channel=na2014&hid=d0c1f605fc16b3974e69edaf2807bab2&instgrp=PF20_4'></script>
    <script>
        function clicked(e)
        {
            if(!confirm('Are you sure you want to delete this package?'))e.preventDefault();
        }
    </script>
    <script>
        function myFunction() {
            alert("Package Updated!");
        }
    </script>


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Be There</a>
        </div>
    </div>
</nav>
<style>
    .p{
        color:deepskyblue;
    }
    .p2{
        color:black;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

            <A class="p" href="logout.php";>Logout</A>
            <A> / </A>
            <A class="p" href="getuser2.php";>User Page </A>
            <br>

            <p class="p2"> <?php
                $mydate=getdate(date("U"));
                echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                ?> </p>
        </div>
		<div class="jumbotron3">

							<form action="insertpackage.php" method="post">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Destination Address:</td>
                                        <td><input type="text" name="destination_address" placeholder="address" class="form-control" required autofocus></td>
                                    </tr>
                                    <tr>
                                        <td>weight:</td>
                                        <td><input type="number" name="weight" placeholder="only numbers" class="form-control" required autofocus></td>
                                    </tr>
                                    <tr>
                                        <td>Dimensions:</td>
                                        <td><input type="text" name="dimensions" placeholder="format:00x00x00" class="form-control" required autofocus></td>
                                    </tr>
                                        <input type="hidden" name="cod_user" class="form-control" value="<?php echo $_SESSION['id'] ?>">
                                        
                                            </tr>
                                    </tbody>
                                </table>
                                <button type="submit"  class="btn btn-primary">Create Package!</button>
                            </form>
		</div>
    </div>
</div>
<?php
include('httpful.phar');



$response = \Httpful\Request::get('http://localhost/trabalho/package/?cod_user='.$_SESSION['id'])->send();

$request_response = json_decode($response->body);
foreach($request_response as $item){

?>
<div class="jumbotron3">
<div class="container">
    <form action="updatepackage.php" method="post">
    <h2>Package</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Weight</th>
            <th>Dimensions</th>
            <th>Destination</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $item->id; ?></td>
            <td><input onClick="this.select();" type="number" name="weight" value="<?php echo $item->weight; ?>" class="form-control"></td>
            <td><input onClick="this.select();" type="text" name="dimensions" value="<?php echo $item->dimensions; ?>" class="form-control"></td>
            <td><input onClick="this.select();" type="text" name="destination_address" value="<?php echo urldecode($item->destination_address); ?>" class="form-control"></td>
            <td><input onClick="this.select();" type="boolean" name="status" value="<?php echo $item->status; ?>" class="form-control"></td>
            <td><input  type="hidden" name="id" value="<?php echo $item->id; ?>" class="form-control"></td>
        </tr>
        <tr>
            <td>

            </td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <button onclick="myFunction()" type="submit" class="btn btn-primary">Update information</button>
            </td>
        </tr>


        </tbody>
    </table>
    </form>
    <form method="post" action="deletepackage.php" class="delete">
        <input type="hidden" name="id" value="<?php echo $item->id; ?>" class="form-control">
        <button onclick="clicked(event)" type="submit" class="btn btn-primary2">Delete Package!</button>
    </form>
</div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDApX3ptWTCzVz7Axp96PkoClOlXPfwY04&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>

</html>




<?php }?>
