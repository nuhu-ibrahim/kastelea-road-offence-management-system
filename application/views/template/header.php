<!DOCTYPE html<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KASTELEA - Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/ui/'); ?>css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/ui/'); ?>css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assets/ui/'); ?>css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/ui/'); ?>css/jquery.datetimepicker.css"/>
</head>
<body>
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('/reports'); ?>">
                        <img src="<?php echo base_url('assets/ui/'); ?>img/logo1.jpg" />
                    </a>
                </div>
              
                <span class="logout-spn" >
                    <a href="logout" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="<?php echo base_url('/add-citizen'); ?>"><i class="fa fa-table "></i>Add Citizen Info.</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('/view-citizen'); ?>"><i class="fa fa-edit "></i>Edit Citizen Info.</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('/add-offence'); ?>"><i class="fa fa-bar-chart-o"></i>Add Offence Info.</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('/view-offence'); ?>"><i class="fa fa-edit "></i>Edit Offence Info.</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('/validate-offender'); ?>"><i class="fa fa-table "></i>Profile Citizen Offence</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('/clear-offender'); ?>"><i class="fa fa-edit "></i>Clear Citizen Offence</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('/search-citizen'); ?>"><i class="fa fa-table "></i>Search for Citizen</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('/reports'); ?>"><i class="fa fa-edit "></i>View Reports</a>
                    </li>

                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >