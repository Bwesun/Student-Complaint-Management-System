<?php
//index.php
include('connect.php');

session_start();

if(!isset($_SESSION['admin_user']))
{
	header("location:../alogin.php");
}



?>
<head>
	<title>Profile</title>
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
		.tab{
			background-color: white;
		}
		#tr td, #tr th{
			border-left: 1px solid gray;
		}
	/* The Image Box */
div.img {
    border: 1px solid #ccc;
}

div.img:hover {
    border: 1px solid #777;
}

/* The Image */
div.img img {
    width: 100%;
    height: auto;
    cursor: pointer;
}

/* Description of Image */
div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

/* Add Responsiveness */
.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0.1)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* Responsive Columns */
@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
    .modal-content {
        width: 100%;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

/* Clear Floats */
.clearfix:after {
    content: "";
    display: table;
    clear: both;
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

$sql="SELECT * FROM complain WHERE id='$id' ";
$result=mysql_query($sql);

$i=1;
$rows=mysql_fetch_assoc($result)

?>
			<fieldset>
				<legend><font color=""><h3><i class="fas fa-address-card"></i>  Complain by <a href="view_profile.php?id=<?php echo $rows['user_id']; ?>"><?php echo $rows['name']; ?></a> </font></h3> </legend>

				<table class="tab table table-condensed table-striped navbar-justify">
					

					<tr id="tr">
						<td><?php echo "<b>Complain ID:</b> ".$rows['id'];?></td>
						<td><?php echo "<b>Name:</b> ".$rows['name'];  ?></td>
					</tr>
                    <tr id="tr">
                        <td colspan="2"><?php echo "<b>Reg. Number:</b> ".$rows['regnum'];?></td>
                    </tr>
					<tr>
						<td colspan="2"><?php echo "<b>Complain:</b><br> ".$rows['complain'];  ?></td>
					</tr>
                    <tr>
                        <td colspan="2"><?php echo "<b>Suggestions:</b><br> ".$rows['suggestion'];  ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>Replies:</b>
                            <div>
                                <?php
                                    $use=$rows['user_id'];
                                    $complain=$rows['id'];
                                    $sql2="SELECT * FROM reply WHERE user_id='$use' AND complain_id='$id' ";
                                    $result2=mysql_query($sql2);

                                    while($row=mysql_fetch_assoc($result2)){
                                        echo 'Admin: '.$row['reply'].'<br>';
                                    }
                                ?>
                            </div>
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div>
                            <form method="post">
                                <textarea name="reply" class="form-control" placeholder="Reply"></textarea>
                                <input type="hidden" value="<?php echo $rows['user_id']; ?>" name="user_id">
                                <input type="hidden" value="<?php echo $rows['id']; ?>" name="complain_id">
                                <input type="submit" name="sub" value="Reply" class="btn btn-info">
                            </form></div>
                            <div align="center"> <a href="" class="btn btn-info" onclick="window.print()" >Print</a></div>
                        </td>
                    </tr>
				</table>
			</fieldset>
<?php

if(isset($_POST['sub'])){
$complain_id=$_POST['complain_id'];
$user_id=$_POST['user_id'];
$reply=$_POST['reply'];

$sql="INSERT INTO reply(user_id, complain_id, reply)VALUES('$user_id', '$complain_id', '$reply') ";
$result=mysql_query($sql);

if($result){
    echo "<script>alert('Reply has been sent!')</script>";
    echo "<script>window.open('view.php?id=".$id."')</script>";
}else{
    echo "<script>alert('Reply was not sent!')</script>";
}





}

?>
		</div>
		
	</div>
	</div>
</div>


</body>