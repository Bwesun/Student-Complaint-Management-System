<?php
//index.php
include('connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}



?>
<head>
	<title>Staff Profiles</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<style type="text/css">
		body{
background: rgba(210,231,239,1);
background: -moz-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(210,231,239,1)), color-stop(50%, rgba(78,185,212,1)), color-stop(100%, rgba(218,235,241,1)));
background: -webkit-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -o-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -ms-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: linear-gradient(to right, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d2e7ef', endColorstr='#daebf1', GradientType=1 );

		}
		.col-md-9{
			-webkit-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
-moz-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
border-radius: 10px;
padding-bottom: 20px;
		}
		.tab{
			background-color: white;
		}
		#tr td, #tr th{
			border-left: 1px solid gray;
		}
	</style>
</head>

<body>

<div class="container">
	<div class="col-md-1"></div>
	<div class="col-md-9">
		<?php
		include('head.php');
		?>
		<div>
			<?php
$id=$_SESSION['user_id'];

$sql="SELECT * FROM users WHERE id='$id' ";
$result=mysql_query($sql);

$i=1;
$rows=mysql_fetch_assoc($result)

?>
			<fieldset>
				<legend><font color="white"><h3><i class="fas fa-address-card"></i> <?php echo $_SESSION['name']."'s Profile"; ?></font></h3> </legend>

				<table class="tab table table-condensed table-striped navbar-justify">
					

					<tr id="tr">
						<td><?php echo "<b>S/N:</b> ".$i++;?></td>
						<td><?php echo "<b>Name:</b> ".$rows['name'];  ?></td>
					</tr>
					<tr>
						<td><?php echo "<b>Email:</b> ".$rows['email'];  ?></td>
						<td><?php echo "<b>Phone Number:</b> ".$rows['phone'];  ?></td>
					</tr>
					<tr>
						<td colspan="2"><?php echo "<b>Address:</b> ".$rows['address'];  ?></td>
					</tr>
					
					<tr>
						<td><a href="View_credentials.php?id=<?php echo $rows['id'];  ?>" class="btn btn-success">View Credentials</a></td>
					</tr>
				</table>
			</fieldset>

		</div>
	</div>
	</div>
</div>


</body>