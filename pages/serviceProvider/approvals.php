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
    <title>Approvals | NoWaitAppointments</title>
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
                            <a href="index.php" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="approvals.php" class="active"><i class="fa fa-calendar fa-fw"></i> Approvals</a>
                            </li>
                            <li>
                                <a href="serviceProfile.php" ><i class="fa fa-user fa-fw"></i> Profile</a>
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
                        <h1 class="page-header">My Appointments</h1>
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Appointment 1 <b>(AID: 1XXX1)</b>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Home</a>
                                    </li>
                                    <li><a href="#timing" data-toggle="tab">Timing</a>
                                    </li>
                                    <li><a href="#navigation" data-toggle="tab">Navigation</a>
                                    </li>
                                </ul>
    
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <h3>Service Name</h3>
                                        <p> Address: <br>234, 1st Cross, BSK 3rd Stage, Bangalore - 5667007</p>
                                    </div>
                                    <div class="tab-pane fade" id="timing">
                                        <h4><b>Open:</b> 3:00 PM</h4>
                                        <h4> <b>Close:</b> 6:00 PM</h4>
                                    </div>
                                    <div class="tab-pane fade" id="navigation">
                                        <h4><b>ETA:</b> 4 mins</h4>
                                        <h4> <b>Traffic:</b> Heavy</h4>
                                        <h4><b>Weather:</b> 24 C, Cloudy</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Appointment 1 <b>(AID: 1XXX1)</b>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Home</a>
                                    </li>
                                    <li><a href="#timing" data-toggle="tab">Timing</a>
                                    </li>
                                    <li><a href="#navigation" data-toggle="tab">Navigation</a>
                                    </li>
                                </ul>
    
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <h3>Service Name</h3>
                                        <p> Address: <br>234, 1st Cross, BSK 3rd Stage, Bangalore - 5667007</p>
                                    </div>
                                    <div class="tab-pane fade" id="timing">
                                        <h4><b>Open:</b> 3:00 PM</h4>
                                        <h4> <b>Close:</b> 6:00 PM</h4>
                                    </div>
                                    <div class="tab-pane fade" id="navigation">
                                        <h4><b>ETA:</b> 4 mins</h4>
                                        <h4> <b>Traffic:</b> Heavy</h4>
                                        <h4><b>Weather:</b> 24 C, Cloudy</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Appointment 1 <b>(AID: 1XXX1)</b>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Home</a>
                                    </li>
                                    <li><a href="#timing" data-toggle="tab">Timing</a>
                                    </li>
                                    <li><a href="#navigation" data-toggle="tab">Navigation</a>
                                    </li>
                                </ul>
    
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <h3>Service Name</h3>
                                        <p> Address: <br>234, 1st Cross, BSK 3rd Stage, Bangalore - 5667007</p>
                                    </div>
                                    <div class="tab-pane fade" id="timing">
                                        <h4><b>Open:</b> 3:00 PM</h4>
                                        <h4> <b>Close:</b> 6:00 PM</h4>
                                    </div>
                                    <div class="tab-pane fade" id="navigation">
                                        <h4><b>ETA:</b> 4 mins</h4>
                                        <h4> <b>Traffic:</b> Heavy</h4>
                                        <h4><b>Weather:</b> 24 C, Cloudy</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
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

</body>

</html>
