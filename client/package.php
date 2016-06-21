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

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100%;
        }
        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        .pac-container {
            font-family: Roboto;
        }

        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
        #target {
            width: 345px;
        }
        </style>

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

<div class="container">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

            <A class="p" href="logout.php";>Logout</A>
            <br>

            <p class="p"> <?php
                $mydate=getdate(date("U"));
                echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                ?> </p>
        </div>
		<div class="jumbotron3">
		<div id="map"></div>
                                        <script>
                                            // This example adds a search box to a map, using the Google Place Autocomplete
                                            // feature. People can enter geographical searches. The search box will return a
                                            // pick list containing a mix of places and predicted search terms.

                                            function initAutocomplete() {
                                                var map = new google.maps.Map(document.getElementById('map'), {
                                                    center: {lat: -33.8688, lng: 151.2195},
                                                    zoom: 13,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                });

                                                // Create the search box and link it to the UI element.
                                                var input = document.getElementById('pac-input');
                                                var searchBox = new google.maps.places.SearchBox(input);
                                                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                                                // Bias the SearchBox results towards current map's viewport.
                                                map.addListener('bounds_changed', function() {
                                                    searchBox.setBounds(map.getBounds());
                                                });

                                                var markers = [];
                                                // [START region_getplaces]
                                                // Listen for the event fired when the user selects a prediction and retrieve
                                                // more details for that place.
                                                searchBox.addListener('places_changed', function() {
                                                    var places = searchBox.getPlaces();

                                                    if (places.length == 0) {
                                                        return;
                                                    }

                                                    // Clear out the old markers.
                                                    markers.forEach(function(marker) {
                                                        marker.setMap(null);
                                                    });
                                                    markers = [];

                                                    // For each place, get the icon, name and location.
                                                    var bounds = new google.maps.LatLngBounds();
                                                    places.forEach(function(place) {
                                                        var icon = {
                                                            url: place.icon,
                                                            size: new google.maps.Size(71, 71),
                                                            origin: new google.maps.Point(0, 0),
                                                            anchor: new google.maps.Point(17, 34),
                                                            scaledSize: new google.maps.Size(25, 25)
                                                        };

                                                        // Create a marker for each place.
                                                        markers.push(new google.maps.Marker({
                                                            map: map,
                                                            icon: icon,
                                                            title: place.name,
                                                            position: place.geometry.location
                                                        }));

                                                        if (place.geometry.viewport) {
                                                            // Only geocodes have viewport.
                                                            bounds.union(place.geometry.viewport);
                                                        } else {
                                                            bounds.extend(place.geometry.location);
                                                        }
                                                    });
                                                    map.fitBounds(bounds);
                                                });
                                                // [END region_getplaces]
                                            }
                                        </script>
							<form action="insertpackage.php" method="post">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>weight:</td>
                                        <td><input type="number" name="weight" placeholder="only numbers" class="form-control" required autofocus></td>
                                    </tr>
                                    <tr>
                                        <td>Dimensions:</td>
                                        <td><input type="text" name="dimensions" placeholder="format:00x00x00" class="form-control" required autofocus></td>
                                    </tr>
                                        <input type="hidden" name="cod_user" class="form-control" value="<?php echo $_SESSION['id'] ?>">
                                        <input type="text" name="destination_address" id="pac-input" placeholder="address" class="form-control" required autofocus>
                                        
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
foreach($request_response as $item)
//{
  //  if($request_response == null) {
   //     include ('error.html');
    //}
   //else{
    //    include ('package.html');
   // }
//}
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
            <td><input onClick="this.select();" type="text" name="destination_address" value="<?php echo $item->destination_address; ?>" class="form-control"></td>
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







<?php
//for($w =1; $w<=count($_SESSION['packages']) ;$w=$w+5){
  //  echo $_SESSION['packages'][$w];

//}




//include('package.html');
/*$_SESSION['idpackage']=$request_response[0]->id;
$_SESSION['weight']=$request_response[0]->weight;
$_SESSION['dimensions']=$request_response[0]->dimensions;
$_SESSION['destination_address']=$request_response[0]->destination_address;
$_SESSION['status']=$request_response[0]->status;*/?>