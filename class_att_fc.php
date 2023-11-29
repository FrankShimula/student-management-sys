<?php
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
?>
<?php
$pageTitle = "All student details";
include "php/facultyheader.php";
?>
<style>
body {
  background-color: #f8f9fa;
}

.all_student {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h3 {
  text-align: center;
  color: #fff;
  margin: 0;
  padding: 5px;
  background-color: #1abc9c;
}

.success-msg {
  color: green;
  margin: 0;
  padding: 0;
  text-align: center;
}

.error-msg {
  color: red;
  text-align: center;
}

form {
  text-align: center;
  color: #34495e;
}

mark {
  background-color: #ffff99;
  padding: 5px;
}

table {
  width: 100%;
  margin-top: 20px;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: center;
}

th {
  background-color: #f2f2f2;
}

td {
  border-bottom: 1px solid #ddd;
}

input[type="date"] {
  padding: 5px;
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

</style>
</head>
<body>
<div class="all_student fix">
	<h3>Take Attendance</h3>
	<?php if(isset($_REQUEST['res'])): ?>
		<h3 class="success-msg">Data deleted successfully!</h3>
	<?php endif; ?>

	<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
		<?php
			$cur_date = $_POST['attndate'];
			$atten = $_POST['attn'];
			$res = $user->insertattn($cur_date,$atten);
			if($res):
		?>
			<h3 class="success-msg">Attendance data successfully inserted!</h3>
		<?php else: ?>
			<p class="error-msg">Failed to insert data</p>
		<?php endif; ?>
	<?php endif; ?>

	<form action="" method="post">
		<p>
			<mark>Select date: <input type="date" name="attndate" required></mark>
		</p>
		<table>
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>ID</th>
				<th>Attendance</th>
			</tr>
			<?php
			$i = 0;
			$alluser = $user->attn_student();
			while($rows = $alluser->fetch_assoc()):
			$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['name']; ?></td>
				<td><?php echo $rows['st_id']; ?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id']; ?>]" value="absent" checked/>Absent</label>
					<label style="color:green;font-size:20px"> <input type="radio" name="attn[<?php echo $rows['st_id']; ?>]" value="present" />Present</label>
				</td>
			</tr>
			<?php endwhile; ?>
		</table>
		<div class="btn-container">
			<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
		</div>
		<br>
			<div>
<a href="javascript:history.back()" class="btn-back">Back</a>
</div>
	</form>
</div>
<?php ob_end_flush(); ?>
