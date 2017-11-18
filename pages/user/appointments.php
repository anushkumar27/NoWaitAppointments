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
    <title>My Appointments | NoWaitAppointments</title>
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
                                <a href="appointments.php" class="active"><i class="fa fa-calendar fa-fw"></i> My Appointments</a>
                            </li>
                            <li>
                                <a href="navigation.php" ><i class="fa fa-map-marker fa-fw"></i> Navigation</a>
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
                    <div class="col-lg-12" id="myAppointments">
                        <h1 class="page-header">My Appointments</h1>               
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

    <script>
        var uid= '<?php echo $_SESSION['uid']; ?>';
        var xhttp1 = new XMLHttpRequest();
        xhttp1.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                res = JSON.parse(xhttp1.responseText);
                console.log(res);
            }
        };
        xhttp1.open("GET", "pendingApp?uid="+uid, false);
        xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp1.send();

        for(i = 0; i < res.pending.length; i++){
            var xhttp1 = new XMLHttpRequest();
            xhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    service = JSON.parse(xhttp1.responseText);
                    console.log(service);
                }
            };
            xhttp1.open("GET", "getProfile?uid="+res.pending[i].serviceId, false);
            xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp1.send();

            createTile(
                service.name,
                res.pending[i].aid,
                service.address,
                service.price,
                res.pending[i].appTime,
                res.pending[i].status,
            );
        }
        //createTile();


        function createTile(name, aid, address, price, aTime, status){
            // <div class="col-lg-12">
            //     <div class="panel panel-danger">

            //         <div class="panel-heading">
            //             <h5>Service A (Category)</h5>
            //         </div>

            //         <div class="panel-body">
            //             <div class="col-md-3" id="myServices">
            //                 <b>Address:</b><p> Bangalore</p>
            //             </div>
            //             <div class="col-md-3" id="myServices">
            //                 <b>Description: </b><p>I am a plumber</p>
            //             </div>
            //             <div class="col-md-3" id="myServices">
            //                 <b>Price:</b> <p> Rs.350</p>
            //             </div>

            //             <div class="col-md-3" id="myServices">
            //                 <b>Time</b> <p>19:00</p>
            //             </div>
            //         </div>
            //         <div class="panel-footer">
            //             <button type="button" class="btn btn-info btn-block">Navigate</button>             
            //         </div>
            //     </div>
            // </div>

            var div1 = document.createElement('div');
            div1.className = "col-lg-12";

            var div2 = document.createElement("div");
            if(status == 0){
                div2.className = "panel panel-danger";
            }else{
                div2.className = "panel panel-success";
            }
            

            var div3 = document.createElement("div");
            div3.className = "panel-heading";
            var h5 = document.createElement("h5");
            h5.innerHTML = name+" (AID: "+aid+")";

            var div4 = document.createElement("div");
            div4.className = "panel-body";
                var div5 = document.createElement("div");
                div5.className = "col-md-3";
                var b1 = document.createElement("b");
                b1.innerHTML = "Address:";
                var p1 = document.createElement("p");
                p1.innerHTML = address;

                div5.appendChild(b1);
                div5.appendChild(p1);


                var div6 = document.createElement("div");
                div6.className = "col-md-3";
                var b6 = document.createElement("b");
                b6.innerHTML = "Price:";
                var p6 = document.createElement("p");
                p6.innerHTML = "Rs."+price;

                div6.appendChild(b6);
                div6.appendChild(p6);

                var div8 = document.createElement("div");
                div8.className = "col-md-6";
                var b8 = document.createElement("b");
                b8.innerHTML = "Time:";
                var p8 = document.createElement("p");
                p8.innerHTML = aTime.slice(0,16);

                div8.appendChild(b8);
                div8.appendChild(p8);

                // var div9 = document.createElement("div");
                // div9.className = "col-md-3";
                // var b9 = document.createElement("b");
                // b9.innerHTML = "Address:";
                // var p9 = document.createElement("p");
                // p9.innerHTML = "Bangalore";

                // div9.appendChild(b9);
                // div9.appendChild(p9);
               

            var div7 = document.createElement("div");
            div7.className = "panel-footer";
            var button2 = document.createElement("button");
            button2.className = "btn btn-info btn-block";
            button2.innerHTML = "Navigate";
            button2.onclick = function(){
                window.location = "/NWA/pages/user/navigation.php";
            }
            div7.appendChild(button2);

            div1.appendChild(div2);
            div2.appendChild(div3);
            div3.appendChild(h5)
            div2.appendChild(div4);
            div4.appendChild(div5);
            div4.appendChild(div6);
            div4.appendChild(div8);
            //div4.appendChild(div9);
            div2.appendChild(div7);
            document.getElementById("myAppointments").appendChild(div1);
        }
    </script>

</body>

</html>
