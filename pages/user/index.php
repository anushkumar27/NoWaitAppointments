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
    <title>Dashboard | NoWaitAppointments</title>
    <!-- common to all the pages -->

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Date picker -->
    <link href="../../vendor/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

</head>

<body onload="init()">

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
                            <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="tables.html" ><i class="fa fa-calendar fa-fw"></i> My Appointments</a>
                            </li>
                            <li>
                                <a href="forms.html" ><i class="fa fa-map-marker fa-fw"></i> Navigation</a>
                            </li>
                            <li>
                                <a href="userProfile.html" ><i class="fa fa-user fa-fw"></i> Profile</a>
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
                    <div class="col-lg-12" id="myServices">
                        <h1 class="page-header">Services</h1>
                        <!-- Button trigger modal -->
                        <!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#schedule">
                        Launch Demo Modal
                    </button> -->
                    <span id="currId" style="display: none"/>
                    <!-- Modal -->
                    <div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Schedule Appointment</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="dtp_input1" class="col-md-2 control-label">Select Date&Time</label>
                                        <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="form-control" size="16" type="text" value="" readonly id="choosenDate">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" /><br/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success" onClick="checkAvailability()">Check Availability</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                        <br>

                        <!-- /.col-lg-4
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h5>Service A (Category)</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8" id="myServices">
                                        <b>Address:</b><p> Bangalore</p>
                                        <br>
                                        <b>Description: </b><p>I am a plumber</p>
                                    </div>
                                    <div class="col-md-4" id="myServices">
                                        <b>Price:</b> <p> Rs.350</p>
                                        <br>
                                        <button type="button" class="btn btn-info">Navigate</button>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-success" style="margin-left:15px;">Schedule Appointment</button>             
                                </div>
                            </div>
                        </div> -->
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

    <!-- Datepicker JavaScript -->
    <script src="../../vendor/datepicker/js/bootstrap-datetimepicker.js"></script>
    
    
    <script>
        $('.form_datetime').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        var d = new Date();
        var todayDate = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
        //console.log(todayDate);
        $('.form_datetime').datetimepicker('setStartDate', todayDate);
        function init(){

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(xhttp.responseText);
                    services = json.services;
                }
            };
            xhttp.open("GET", "getServiceList", false);
            xhttp.send();
            for(i = 0; i <= services.length; i++){

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        profile = JSON.parse(xhttp.responseText);
                    }
                };
                
                xhttp.open("GET", "getProfile?uid="+services[i].uid, false);
                xhttp.send();

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        category = JSON.parse(xhttp.responseText);
                    }
                };
                xhttp.open("GET", "getCategory?catId="+profile.categoryId, false);
                xhttp.send();

                createTile( services[i].uid,
                            profile.name, 
                            category.name, 
                            profile.rating, 
                            profile.address, 
                            profile.price, 
                            category.description,
                            profile.durationStart,
                            profile.durationStop);

            }
        }

        function createTile(uid, pName, cName, rating, address, price, description, start , end){
            // <!-- /.col-lg-4 -->
            // <div class="col-lg-4"> div1
            //     <div class="panel panel-primary"> div2
            //         <div class="panel-heading"> div3
            //             <h5>Service A (Category)</h5>
            //         </div>
            //         <div class="panel-body"> div4
            //             <div class="col-md-8"> div5
            //                 <b>Address:</b><p> Bangalore</p>
            //                 <br>
            //                 <b>Description: </b><p>I am a plumber</p>
            //             </div>
            //             <div class="col-md-4" > div6
            //                 <b>Price:</b> <p> Rs.350</p>
            //                 <br>
            //                 <button type="button" class="btn btn-info">Navigate</button>
            //             </div>
            //         </div>
            //         <div class="panel-footer"> div7
            //             <button type="button" class="btn btn-success" style="margin-left:15px;">Schedule Appointment</button>             
            //         </div>
            //     </div>
            // </div>

            var div1 = document.createElement('div');
            div1.className = "col-lg-4";

            var div2 = document.createElement("div");
            div2.className = "panel panel-primary";

            var div3 = document.createElement("div");
            div3.className = "panel-heading";
            var h5 = document.createElement("h5");
            h5.innerHTML = pName+" ("+cName+") (Rating: "+rating+")";

            var div4 = document.createElement("div");
            div4.className = "panel-body";
                var div5 = document.createElement("div");
                div5.className = "col-md-7";
                //div5.innerHTML = "Bla";
                var b1 = document.createElement("b");
                b1.innerHTML = "Address:";
                var p1 = document.createElement("p");
                p1.innerHTML = address;
                var br1 = document.createElement("br");
                var b2 = document.createElement("b");
                b2.innerHTML = "Description:";
                var p2 = document.createElement("p");
                p2.innerHTML = description;

                div5.appendChild(b1);
                div5.appendChild(p1);
                div5.appendChild(br1);
                div5.appendChild(b2);
                div5.appendChild(p2); 

            var div6 = document.createElement("div");
            div6.className = "col-md-5";
                var b3 = document.createElement("b");
                b3.innerHTML = "Price:";
                var p3 = document.createElement("p");
                p3.innerHTML = "Rs."+price;
                var br2 = document.createElement("br");


                div6.appendChild(b3);
                div6.appendChild(p3);
                div6.appendChild(br2);

                var b3 = document.createElement("b");
                b3.innerHTML = "Time:";
                var p3 = document.createElement("p");
                p3.innerHTML = start.slice(0, 5)+" - "+end.slice(0, 5);
                var br2 = document.createElement("br");
                

                div6.appendChild(b3);
                div6.appendChild(p3);
                div6.appendChild(br2);
                
                

            var div7 = document.createElement("div");
            div7.className = "panel-footer";
            var button2 = document.createElement("button");
            button2.className = "btn btn-info";
            button2.style = "margin-left:15px;";
            button2.innerHTML = "Navigate";
            div7.appendChild(button2);
            var button1 = document.createElement("button");
            button1.className = "btn btn-success";
            button1.style = "margin-left:5px;";
            button1.id = uid;
            button1.onclick = function(){
                $('#schedule').modal('toggle');
                var a = $(this).attr('id');
                // storing suid in the hidden span
                document.getElementById("currId").innerHTML = a;
            }
            button1.innerHTML = "Schedule Appointment";
            div7.appendChild(button1);

            div1.appendChild(div2);
            div2.appendChild(div3);
            div3.appendChild(h5)
            div2.appendChild(div4);
            div4.appendChild(div5);
            div4.appendChild(div6);
            div2.appendChild(div7);
            document.getElementById("myServices").appendChild(div1);
        }

        function checkAvailability(){
            var uid= '<?php echo $_SESSION['uid']; ?>';
            var suid = document.getElementById("currId").innerHTML;
            var myDateTime = document.getElementById("choosenDate").value;
            //console.log(myDateTime);
            if(myDateTime.length > 0){
                var myDate = myDateTime.slice(0,10)
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        json = JSON.parse(xhttp.responseText);
                        var limit = json.currLimit;
                        if(limit == 0){
                            alert("Date not available, Try again with a different date");
                        }else{
                            var xhttp1 = new XMLHttpRequest();
                            xhttp1.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    var res = JSON.parse(xhttp1.responseText);
                                    if(res.status == "ERROR"){
                                        alert(res.message);
                                    }else{
                                        alert("Success");
                                    }
                                }
                            };
                            xhttp1.open("POST", "scheduleAppointment", false);
                            xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp1.send("suid="+suid+"&appTime="+myDateTime+"&uid="+uid);
                        }
                    }
                };
                xhttp.open("POST", "getCurrLimit", false);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("suid="+suid+"&aDate="+myDate);
            }else{
                alert("Error, please choose a date and time");
            }
        }

    </script>

</body>

</html>
