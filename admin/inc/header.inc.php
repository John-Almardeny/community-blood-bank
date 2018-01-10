<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Admininstration Area</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet" >
</head>
<body style="background-color: black">
<div class = "container">
<div class="row">
<header class="col-md-12" >
<h1>Community Blood Bank Database Access</h1>
</header>
</div>
<div class="row">
 <nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
   </button>
  </div>
  <div class="collapse navbar-collapse">
  <ul class="nav navbar-nav" >
   <li><a href="bloodUnits.php">Blood Units</a></li>
   <li><a href="Donors.php">Donors</a></li>
   <li><a href="healthChecks.php">Health Checks</a></li>
   <li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration<b class="caret"></b></a>
     <ul class="dropdown-menu">
      <li><a href="edituser.php">Edit Administration Password</a></li>
      <li><a href="<?php echo 'index.php'?>?logout=1">Log Out</a></li>
     </ul>
   </li>

  </ul></div>
 </nav>
</div>
<div class="row">
<section class="col-md-12">