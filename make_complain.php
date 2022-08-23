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
	<title>Home</title>
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
				<legend>Make Complain</legend>
<?php
$user_id=$_SESSION['user_id'];
$username=$_SESSION['username'];

?>
				<form method="POST">
					<input type="text" name="subject" placeholder="Subject" class="form-control"><br>
					<input type="hidden" name="user_id" value="<?php echo $user_id;   ?>">
					<input type="hidden" name="username" value="<?php echo $username;   ?>">
					<textarea name="complain" placeholder="Enter Complaint(s)" class="form-control"></textarea><br>
					<textarea name="suggestion" placeholder="Make Suggestion" class="form-control"></textarea><br>
					<div>
						<input type="submit" name="sub" value="Submit" class="btn btn-primary">  <input type="reset" name="" value="Reset" class="btn btn-warning">
					</div>
				</form>
			</fieldset>
		</div>
	</div>
</div>


</body>

<?php
include('connect.php');

if(isset($_POST['sub'])){
$subject=$_POST['subject'];
$user_id=$_POST['user_id'];
$username=$_POST['username'];
$complain=$_POST['complain'];
$suggestion=$_POST['suggestion'];

$sql2="SELECT * FROM users WHERE id='$user_id' ";
$result2=mysql_query($sql2);
$rows=mysql_fetch_assoc($result2);

$regnum=$rows['regnum'];
$name=$rows['name'];

$sql="INSERT INTO complain(subject, user_id, username, complain, suggestion, regnum, name)VALUES('$subject', '$user_id', '$username', '$complain', '$suggestion', '$regnum', '$name') ";
$result=mysql_query($sql);

if($result){
	
	echo "<script>alert('Your Complaint has been sent successfully')</script>";
	echo "<script>window.open('make_complain.php','_self')</script>";
}else{
	echo "<script>alert('ERROR: Your Complaint was not sent!')</script>";
	echo "<script>window.open('make_complain.php','_self')</script>";
}
}



?>