<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
?>

<?php
	$pageTitle = "All faculty details";
	include "php/headertop_admin.php";
?>

<style>
	.search_result {
		margin-top: 20px;
	}

	.tab_one {
		width: 100%;
		border-collapse: collapse;
	}

	.tab_one th,
	.tab_one td {
		padding: 10px;
		border: 1px solid #ddd;
	}

	.tab_one th {
		background-color: #f5f5f5;
		font-weight: bold;
	}

	.tab_one tr:nth-child(even) {
		background-color: #f9f9f9;
	}

	.tab_one tr:hover {
		background-color: #f1f1f1;
	}

	.editbtn {
		display: inline-block;
		padding: 10px 20px;
		border: none;
		border-radius: 5px;
		background-color: #2A2B3C;
		color: #fff;
		font-size: 16px;
		text-decoration: none;
		transition: background-color 0.3s ease;
	}

	.editbtn:hover {
		background-color: #3E3F50;
	}

	.back {
		margin-top: 20px;
		text-align: center;
	}
</style>

<div class="search_result">
	<table class="tab_one">
		<?php
				$key = $_GET['src_faculty'];
				$min_length = 1;
				if(strlen($key) >= $min_length){
					$key = htmlspecialchars($key);
					$src_result = $user->facultysearch($key);
					$count = $src_result->num_rows;
					if($count>0){
		?>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Contact</th>
			<th>Education</th>
			<th>Address</th>
			<th>Birthday</th>
		</tr>
		<?php
				while($rows = $src_result->fetch_assoc()){
		?>

		<tr>
			<td><?php echo $rows['name'];?></td>
			<td><?php echo $rows['email'];?></td>
			<td><?php echo $rows['contact'];?></td>
			<td><?php echo $rows['education'];?></td>
			<td><?php echo $rows['address'];?></td>
			<td><?php echo $rows['birthday'];?></td>
		</tr>

		<?php } ?>
		</table>
	<?php
		}else{
				echo "<h2 style='font-size:45px;text-align:center;color:#ddd;'>Opps....No result found !</h2>";
			}

		}else{
			  echo "<h2 style='font-size:45px;text-align:center;color:#ddd;'>Opps....No result found !</h2>";
		}
		?>
		<div class="back fix">
			<p style="text-align:center"><a href="admin_all_faculty.php"><button class="editbtn">Back to faculty list</button></a></p>
		</div>
	</div>
