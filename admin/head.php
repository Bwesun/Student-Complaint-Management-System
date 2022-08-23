<?php
include('connect.php');

session_start();




?>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="tooltip.js"></script>
	<script type="text/javascript" language="javascript" src="popover.js"></script>
	<script type="text/javascript" language="javascript" src="alert.js"></script>
	<script type="text/javascript" language="javascript" src="collapse.js"></script>
	<script type="text/javascript" language="javascript" src="carousel.js"></script>
	<style type="text/css">
		body{
		}
		.nav-tabs{
			background-color: #FFFF99;
			margin-top: 1%;
			border: 1px solid #FFFF66;
		}
		#content{
			border-radius: 6px;
		}
		#profile{
			position: fixed;
			top: 20px;
			left: 82%;
			width: 60%
		}
		#wrapper{
			background-color: #FFFFCC;
		}
		#nav:hover{
			background-color: green;
			color: white;
		}
	</style>
</head>

<body>
<div id="wrapper">
	<div style="padding: 10px 0px 0px 10px;">
		<h2 class=""><a href="index.php"><div align=""><img src="../log.jpg" width="100" class="img-circle img-thumbnail"></div></a><font color="grey">NILEST Student Complaint System </font></h2>
	</div>
		<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
		data-target="#example-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home  <i class="fas fa-home"></i></a></li>
			<li><a href="logout.php">Log Out  <span class="glyphicon glyphicon-log-out"></span></a></li>
			
		</ul>
	</div>
</nav>
				
				
				
		</div>

		

		