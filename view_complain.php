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
	<legend>My Complaints</legend>

	<table style="background-color: white;" class="table table-striped table-condensed">
		<tr>
			<th>Subject</th>
			<th>Complain</th>
			<th>Suggestions</th>
		</tr>
<?php
$user_id=$_SESSION['user_id'];

$sql2="SELECT * FROM complain WHERE user_id='$user_id' ";
$result2=mysql_query($sql2);

$count=mysql_num_rows($result2);

while($rows=mysql_fetch_assoc($result2)){

?>
		<tr>
			<td><?php echo $rows['subject'] ?></td>
			<td><?php echo $rows['complain'] ?></td>
			<td><?php echo $rows['suggestion'] ?></td>
			<td>
				<form method="post">
					<input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
					<input type="submit" name="sub" value="Cancel" class="btn btn-danger">
				</form>
			</td>
		</tr>
		<tr>
                        <td colspan="3">
                            <b>Replies:</b>
                            <div>
                                <?php
                                    $use=$rows['user_id'];
                                    $id=$rows['id'];
                                    $sql3="SELECT * FROM reply WHERE user_id='$use' AND complain_id='$id' ";
                                    $result3=mysql_query($sql3);

                                    while($row=mysql_fetch_assoc($result3)){
                                        echo 'Admin: '.$row['reply'].'<br>';
                                    }
                                ?>
                            </div>
                            
                        </td>
                    </tr>
		<?php
}
		?>
		<tr>
			<td colspan="3"><b>Total No. of Complains: <?php echo $count;  ?></b></td>
		</tr>
	</table>
</fieldset>

<?php
if(isset($_POST['sub'])){
	$id=$_POST['id'];

	$sql3="DELETE FROM complain WHERE id='$id' ";
	$result3=mysql_query($sql3);

	if($result3){
		echo "<script>alert('Complaint Cancelled successfully!')</script>";
		echo "<script>window.open('view_complain.php','_self')</script>";
}else{
	echo "<script>alert('ERROR: Your Complaint was not Cancelled!')</script>";
	echo "<script>window.open('view_complain.php','_self')</script>";
}
	}



?>

			
<!-- 

<tr>
                        <td colspan="2">
                            <b>Replies:</b>
                            <div>
                                <?php
                                    $use=$rows['user_id'];
                                    $complain=$rows['id'];
                                    $sql2="SELECT * FROM reply WHERE user_id='$use' AND complain_id='$id' ";
                                    $result2=mysql_query($sql2);

                                    while($row=mysql_fetch_assoc($result2)){
                                        echo 'Admin: '.$row['reply'];
                                    }
                                ?>
                            </div>
                            
                        </td>
                    </tr>
	-->