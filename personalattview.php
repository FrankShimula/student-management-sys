<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];
	#if(!$user->get_faculty_session()){
	#	header('Location: facultylogin.php');
	#	exit();
	#}
	if(isset($_REQUEST['dt'])){
		$date = $_REQUEST['dt'];
	}
?>
<?php
$pageTitle = "Attendance details";
include "studentheader.php";
?>
<style>
.btn-back {
	display: block;
	margin: 0 auto;
	text-align: center;
	padding: 10px 20px;
	font-size: 16px;
	color: #fff;
	background-color: #2A2B3C;
	border: none;
	border-radius: 5px;
	text-decoration: none;
	transition: background-color 0.3s ease;
}


.btn-back:hover {
	background-color: #555;
	color: #fff;
}
.tab_one {
width: 100%;
border-collapse: collapse;
}

.tab_one th,
.tab_one td {
padding: 10px;
border: 1px solid #ccc;
}

.tab_one th {
background-color: #1abc9c;
color: #fff;
text-align: center;
}

.tab_one td {
text-align: center;
}

.tab_one tr:nth-child(even) {
background-color: #f2f2f2;
}

.tab_one tr:hover {
background-color: #ddd;
}

.btn-group {
margin-top: 20px;
text-align: center;
}

.btn-group button {
background: #58A85D;
border: none;
color: #fff;
padding: 10px;
margin-left: 10px;
cursor: pointer;
}
</style>
<div class="all_student fix">
		<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Attendance Details</h3>
		<!--<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="float:left;"><a style="color:#fff;" href="class_att_fc.php"><button style="background:#58A85D;border:none;color:#fff;padding:10px;">Take Attendance</button></a></span>
			<span style="float:right;"><a style="color:#fff;" href="att_view_fc.php"> <button style="background:#58A85D;border:none;color:#fff;padding:10px;">View Attendance</button></a></span>
		</div>!-->
		<p style="text-align:center;color:#34495e;margin:0;padding-top:8px;color:red;font-size:22px;">
			<?php echo "Attendance of: ".$date;?>
		</p>

	<form action="" method="post">

		<table class="tab_one" style="text-align:center;">
			<tr>

				<th style="text-align:center;">Name</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Attendance</th>

			</tr>
			<?php
			$i=0;
				$std = $user->personalattview($date);
				//var_dump($std);
				if($std){


			while($rows = $std->fetch_assoc()){
				$i++;
		?>
			<tr>
				
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="absent" <?php if($rows['atten'] == "absent") echo "checked";?> disabled />Absent</label>
					<label style="color:green;font-size:20px"> <input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="present" <?php if($rows['atten'] == "present") echo "checked";?> disabled />Present</label>
				</td>
			</tr>
			<?php

			} }else echo "failed";
				?>

		</table>
		<!--<span style="margin-left:360px;"><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Update" /></span>!-->

		<div>
			<a href="javascript:history.back()" class="btn-back">Back</a>
		</div>
	</form>



</div>
<?php ob_end_flush() ; ?>
