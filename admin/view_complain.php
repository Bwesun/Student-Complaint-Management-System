<?php
//index.php
include('connect.php');

session_start();

if(!isset($_SESSION['admin_user']))
{
	header("location:login.php");
}



?>
<head>
	<title>Home</title>
<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="../jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../bootstrap.min.js"></script>
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
			<div align="right" style="font-family: serif; font-style: italic; font-size: 18px; font-weight: bold;">Welcome: <i class="fas fa-user-circle"></i> <b><?php echo $_SESSION['username'];   ?></b></div>

<fieldset>
	<legend>Individual Complaints</legend>

	<table style="background-color: white;" class="table table-striped table-condensed">
		<tr>
			<th>Names</th>
			<th>Reg. No.</th>
			<th>Subject</th>
			<th>Complain</th>
		</tr>
<?php


$user_id=$_SESSION['user_id'];

$sql2="SELECT * FROM complain ORDER BY id DESC";
$result2=mysql_query($sql2);

$count=mysql_num_rows($result2);

while($rows=mysql_fetch_assoc($result2)){

?>
		<tr>
			<td><a href="view_profile.php?id=<?php echo $rows['user_id']; ?>"><?php echo $rows['name'] ?></a></td>
			<td><?php echo $rows['regnum'] ?></td>
			<td><?php echo $rows['subject'] ?></td>
			<td><?php echo $rows['complain'] ?></td>
			<td><a href="view.php?id=<?php echo $rows['id']; ?>" class="btn btn-success">View</a>
				<form method="post">
					<input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
					<input type="submit" name="sub" value="Delete" class="btn btn-danger">
				</form>

			</td>
		</tr>
		<?php
}
		?>
		<tr>
			<td colspan="5"><b>Total No. of Complains: <?php echo $count;  ?></b> <?php echo mysql_error();  ?></td>
		</tr>
	</table>
</fieldset>

<?php
if(isset($_POST['sub'])){
	$id=$_POST['id'];

	$sql3="DELETE FROM complain WHERE id='$id' ";
	$result3=mysql_query($sql3);

	if($result3){
		echo "<script>alert('Complaint Deleted successfully!')</script>";
		echo "<script>window.open('view_complain.php','_self')</script>";
}else{
	echo "<script>alert('ERROR: Your Complaint was not Deleted!')</script>";
	echo "<script>window.open('view_complain.php','_self')</script>";
}
	}



?>

			