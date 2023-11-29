<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$fid = $_SESSION['f_id'];
$funame = $_SESSION['f_uname'];
$fname = $_SESSION['f_name'];
if(!$user->get_faculty_session()){
	header('Location: facultylogin.php');
	exit();
}
	$pageTitle = "timetable updload";
	include "php/facultyheader.php";
?>
<style>
	body {
		background-color: #f8f9fa;
	}

	.jumbotron {
		background-color: #fff;
		padding: 30px;
		border-radius: 10px;
		box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
	}

	.display-4 {
		font-weight: bold;
		color: #333;
	}

	.form-group {
		margin-bottom: 20px;
	}

	.form-control {
		border-radius: 5px;
		border: 1px solid #ccc;
		box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
		font-size: 16px;
		color: #333;
		background-color: #f5f5f5;
	}

	.btn-primary {
		background-color: #58A85D;
		color: #fff;
		border: none;
		border-radius: 5px;
		padding: 10px 20px;
		font-size: 16px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		transition: background-color 0.3s ease;
		margin-top: 20px;
	}
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
	.btn-primary:hover {
		background-color: #3F8744;
		color: #fff;
	}

	.table-container {
		margin-top: 20px;
	}

	.table {
		width: 100%;
	}

	.table th,
	.table td {
		padding: 10px;
		text-align: left;
		border-bottom: 1px solid #dee2e6;
	}

	.table th {
		background-color: #f5f5f5;
		font-weight: bold;
	}

	.btn-container {
		margin-top: 20px;
		text-align: center;
	}
</style>
</head>

<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-4">Time Table</h1>
			<p class="lead">Enter Data</p>
			<form action="" method="post">
				<div class="table-container">
					<table class="table">
						<tr>
							<th><label for="formGroupExampleInput">Day</label></th>
							<td><input type="text" class="form-control" name="Day" id="formGroupExampleInput" placeholder="" required></td>
						</tr>
						<tr>
							<th><label for="formGroupExampleInput">Teacher Name</label></th>
							<td><input type="text" class="form-control" name="TeacherName" id="formGroupExampleInput" placeholder="" required></td>
						</tr>
						<tr>
							<th><label for="formGroupExampleInput2">Subject Name</label></th>
							<td><input type="text" class="form-control" name="SubjectName" id="formGroupExampleInput2" placeholder="" required></td>
						</tr>
						<tr>
							<th><label for="formGroupExampleInput3">Class Name</label></th>
							<td><input type="text" class="form-control" name="ClassName" id="formGroupExampleInpu3" placeholder="" required></td>
						</tr>
						<tr>
							<th><label for="formGroupExampleInput4">Starting Time</label></th>
							<td><input type="text" class="form-control" name="StartingTime" id="formGroupExampleInput4" placeholder="24:00" required></td>
						</tr>
						<tr>
							<th><label for="formGroupExampleInput5">Ending Time</label></th>
							<td><input type="text" class="form-control" name="EndingTime" id="formGroupExampleInput5" placeholder="24:00" required></td>
						</tr>
					</table>
				</div>
				<div class="btn-container">
					<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				</div>
				<br>
					<div>
		<a href="javascript:history.back()" class="btn-back">Back</a>
	</div>
			</form>
		</div>
	</div>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$Day = $_POST["Day"];
	$tname = $_POST["TeacherName"];
	$sname = $_POST["SubjectName"];
	$cname = $_POST["ClassName"];
	$st = $_POST["StartingTime"];
	$et = $_POST["EndingTime"];
	if (empty($Day) || empty($tname) || empty($sname) || empty($cname) || empty($st) || empty($et)) {
		echo "<p style='color:red;text-align:center'>**Field must not be empty**</p>";
	} else {
		$timetablereg = $user->adminuploadtimetable($Day, $tname, $sname, $cname, $st, $et);
		if ($timetablereg) {
			echo "<h3 style='color:green;margin:0;padding:0;text-align:center'> Timetable updated successfully!!</h3>";
		} else {
			echo "<p style='color:red;text-align:center'>There was an error in timetable updation</p>";
		}
	}
}
?>
