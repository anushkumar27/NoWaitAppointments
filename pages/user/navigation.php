<?php
    session_start();
    if(!$_SESSION['uid']){
        header('Location: /NWA');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- common to all the pages -->
    <link rel="icon" href="../img/favicon.png" type="image/png" sizes="16x16">
    <title>Navigation | NoWaitAppointments</title>
    <!-- common to all the pages -->

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        #map {
            height: 500px;
            width: 1000px;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="../img/favicon.png"
                               style="float:left; width: 20px; padding: 0px;margin-right: 5px; " />NoWaitAppointments</a>
                </div>
                <!-- /.navbar-header -->
    
                <ul class="nav navbar-top-links navbar-right">
    
                   
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
    
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
    
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="appointments.php"><i class="fa fa-calendar fa-fw"></i> My Appointments</a>
                            </li>
                            <li>
                                <a href="navigation.php" class="active"><i class="fa fa-map-marker fa-fw"></i> Navigation</a>
                            </li>
                            <li>
                                <a href="userProfile.php" ><i class="fa fa-user fa-fw"></i> Profile</a>
                            </li>
    
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Navigation</h1>
                        <div class="form-group">
                            <label>Select a service</label>
                            <select class="form-control" id="serviceDropdown" onchange="serviceChange(this)">
                                <option></option>
                            </select>
                        </div>
                        <h4> ETA to Service Provider: <b id="time">-</b></h4>

                        <div id="map">

                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
    <!--Maps for Navigation-->
    <script>
        var uid= '<?php echo $_SESSION['uid']; ?>';
        

        var xhttp2 = new XMLHttpRequest();
        xhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                res = JSON.parse(xhttp2.responseText);
                //console.log(res);
                var select = document.getElementById("serviceDropdown");
                for(var i = 0; i < res.services.length; i++) {
                    var option = document.createElement('option');
                    option.text = res.services[i].name;
                    option.value = res.services[i].uid;
                    select.add(option);
                }
            }
        };
        xhttp2.open("GET", "getServiceList", false);
        xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp2.send();

        function mapInit(){
            var xhttp1 = new XMLHttpRequest();
            xhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    userProfile = JSON.parse(xhttp1.responseText);
                }
            };
            xhttp1.open("GET", "getProfile?uid="+uid, false);
            xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp1.send();
            var origin= new google.maps.LatLng(parseFloat(userProfile.currentLat), parseFloat(userProfile.currentLong))
            var map = new google.maps.Map(document.getElementById('map'), {
                center: origin,
                zoom: 11
            });

            var contentString = "<p>User's current location<p><p>Name:<b>"+userProfile.name+"</b></p>";
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var userLoc= new google.maps.Marker({
                position: origin,
                map: map
            });

            userLoc.addListener('mouseover', function() {
             infowindow.open(map, userLoc);
            });
        }

        
        function serviceChange(ev) {
            if(ev.value.length > 0){
                var xhttp1 = new XMLHttpRequest();
                xhttp1.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        serviceLoc = JSON.parse(xhttp1.responseText);
                        //console.log(serviceLoc);
                    }
                };
                xhttp1.open("GET", "getProfile?uid="+ev.value, false);
                xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp1.send();
                
                directionMap(userProfile.currentLat, userProfile.currentLong, serviceLoc.currentLat, serviceLoc.currentLong);
                distanceMap(userProfile.currentLat, userProfile.currentLong, serviceLoc.currentLat, serviceLoc.currentLong);
            
            }else{
                mapInit();  
                var time = document.getElementById("time");
                time.innerHTML= "-";
            }
        }



        function directionMap(originlat, originlng, destinationlat, destinationlng) {
            var origin= new google.maps.LatLng(parseFloat(originlat), parseFloat(originlng));
            var destination= new google.maps.LatLng(parseFloat(destinationlat), parseFloat(destinationlng));

            var map = new google.maps.Map(document.getElementById('map'), {
                center: origin,
                zoom: 10
            });

            var directionsDisplay = new google.maps.DirectionsRenderer({
                map: map
            });

            // Set destination, origin and travel mode.
            var request = {
                destination: destination,
                origin: origin,
                travelMode: 'DRIVING'
            };

            // Pass the directions request to the directions service.
            var directionsService = new google.maps.DirectionsService();
            directionsService.route(request, function(response, status) {
                if (status == 'OK') {
                    // Display the route on the map.
                    directionsDisplay.setDirections(response);
                }
            });
        }

        function distanceMap(originlat, originlng, destinationlat, destinationlng) {
            var origin1 = new google.maps.LatLng(originlat, originlng);
            var destinationA = new google.maps.LatLng(destinationlat, destinationlng);

            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin1],
                    destinations: [destinationA],
                    travelMode: 'DRIVING',
                }, callback);
        }

        function callback(response, status) {
            if (status == 'OK') {
                var origins = response.originAddresses;
                var destinations = response.destinationAddresses;

                for (var i = 0; i < origins.length; i++) {
                    var results = response.rows[i].elements;
                    for (var j = 0; j < results.length; j++) {
                        var element = results[j];
                        var distance = element.distance.text;
                        var duration = element.duration.text;
                        var from = origins[i];
                        var to = destinations[j];
                        var time = document.getElementById("time");
                        time.innerHTML=duration;
                    }
                }
            }
        }
//        function addAppointments(){
//            var select = document.getElementById("appointments");
//            Request appointments here and store in an array
//            parse through the array list
//            var option = document.createElement('option');
//            option.text= arrayname[];
//            option.value= lat long to directionMap;
//            select.add(option,0);
//        }

        window.onload= function(){
            //directionMap(12.5526,77.336,12.54,77.32);
            //distanceMap(12.5526,77.336,12.54,77.32)

            
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiF4cNZ9TlPSPoylkeeZRZ_9fGEHAIBwE&callback=mapInit"
            async defer>

    </script>
</body>

</html>
