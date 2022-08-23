<?php
include('connect.php');

session_start();

if(isset($_SESSION['admin_user'])){
	header("location:index.php");
}elseif(isset($_SESSION['user_id'])){
	header("location:index.php");
}



?>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<style type="text/css">
		body{
			margin-top: 10%;

background: rgba(210,231,239,1);
background: -moz-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(210,231,239,1)), color-stop(50%, rgba(78,185,212,1)), color-stop(100%, rgba(218,235,241,1)));
background: -webkit-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -o-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -ms-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: linear-gradient(to right, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d2e7ef', endColorstr='#daebf1', GradientType=1 );

		}
		.col-md-6{
			-webkit-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
-moz-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
border-radius: 10px;
		}
		input:hover{
			box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.2);
		}
	</style>
	<title>Sign Up</title>
</head>

<body>

<div class="container">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<h3 align="center"><br>Sign Up/Register</h3>

		<form class="form-group" method="post">
			<div>
		<input type="text" class="form-control" name="name" placeholder="Name" required><br>
		<input type="email" class="form-control" name="email" placeholder="Enter E-mail" required><br>
		<input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required><br>
		<input type="text" class="form-control" name="regnum" placeholder="Enter Reg. Number" required><br>
		<input type="text" class="form-control" name="user" placeholder="Choose Username" required><br>
		<input type="text" class="form-control" name="pass" placeholder="Choose Password" required><br>
			</div>
			<div align="center">
				<input type="submit" class="btn btn-primary" name="sub_reg" value="Sign Up">
			</div><br>
			<div>
				Already Registered? <a href="login.php" class="btn btn-warning" style="color: white;">Login</a>
			</div>
					
			
		</form>
	</div>
</div>
<?php
if(isset($_POST['sub_reg'])){
	session_start();

	include('connect.php');

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$regnum=$_POST['regnum'];
$user=$_POST['user'];
$pass=$_POST['pass'];
	
// Insert data into mysql 
$sql="INSERT INTO users(name, email, phone, regnum, username, password)VALUES('$name', '$email', '$phone', '$regnum', '$user', '$pass')";
//echo $sql;
$result=mysql_query($sql);

//Check whether successful
if($result){
echo "<script>alert('Registration Successful! You can now login!')</script>";
echo "<script>window.open('login.php','_self')</script>";
}
else{
echo "<script>alert('Error: Registration Unsuccessful. Try agin!')</script>";
echo "<script>window.open('register.php','_self')</script>";
}

//close connection
mysql_close();
}
?>

</body>