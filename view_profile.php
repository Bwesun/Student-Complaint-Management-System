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
	<title>View Profile</title>
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
$id=$_GET['id'];

$sql="SELECT * FROM users WHERE id='$id' ";
$result=mysql_query($sql);

$i=1;
$rows=mysql_fetch_assoc($result)

?>
			<fieldset>
				<legend><font color="white"><h3><i class="fas fa-address-card"></i> <?php echo $rows['name']."'s Profile"; ?></font></h3> </legend>

				<table class="tab table table-condensed table-striped navbar-justify">
					

					<tr id="tr">
						<td><?php echo "<b>S/N:</b> ".$i++;?></td>
						<td><?php echo "<b>Name:</b> ".$rows['name'];  ?></td>
					</tr>
					<tr>
						<td><?php echo "<b>Staff ID:</b> ".$rows['staff_id'];  ?></td>
						<td><?php echo "<b>Phone Number:</b> ".$rows['phone'];  ?></td>
					</tr>
					<tr>
						<td><?php echo "<b>Email:</b> ".$rows['email'];  ?></td>
						<td><?php echo "<b>Address:</b> ".$rows['address'];  ?></td>
					</tr>
					<tr>
						<td><?php echo "<b>Date of Birth:</b> ".$rows['dob'];  ?></td>
						<td><?php echo "<b>Leave Month:</b> ".$rows['leave_month'];  ?></td>
						
					</tr>
					<tr>
						<td><?php echo "<b>Retirement Month:</b> ".$rows['retirement_month'];  ?></td>
						<td><?php echo "<b>Retirement Year:</b> ".$rows['retirement_year'];  ?></td>
					</tr>
					<tr>
						<form method="post">
							<input type="hidden" name="id" value="<?php echo $rows['id'];  ?>">
						
						<?php
							$status=$rows['status'];

							if($status=='retired'){
								echo '<td><b>Status:</b> <button class="btn btn-danger" disabled>Retired</button> <input type="submit" class="btn" name="r_tog" value="Toggle Status"></td>';
							}else{
								echo '<td><b>Status:</b> <button class="btn btn-success" disabled>Working</button> <input type="submit" class="btn" name="tog" value="Toggle Status"></td>';
							}

							if(isset($_POST['r_tog'])){
								$idd=$_POST['id'];

								$sql2="UPDATE users SET status='working' WHERE id='$idd' ";
								$result2=mysql_query($sql2);

								if($result2){
									echo "<script>alert('Toggle Successful to Working!');</script>";
									echo "<script>window.open('view_profile.php?id=".$idd."','_self');</script>";
								}else{
									echo "<script>alert('ERROR: Operation Unsuccessful!');</script>";
								}
							}

							if(isset($_POST['tog'])){
								$idd=$_POST['id'];

								$sql2="UPDATE users SET status='retired' WHERE id='$idd' ";
								$result2=mysql_query($sql2);

								if($result2){
									echo "<script>alert('Toggle Successful to Retired!');</script>";
									echo "<script>window.open('view_profile.php?id=".$idd."','_self');</script>";
								}else{
									echo "<script>alert('ERROR: Operation Unsuccessful!');</script>";
								}
							}
						?>
						</form>
					</tr>
				</table>
			</fieldset>

		</div>
	</div>
</div>
<?php 
/*<a href="view_profile.php?id=<?php echo $rows['id'];  ?>" class="btn btn-warning">View Profile</a>
*/
?>

</body>