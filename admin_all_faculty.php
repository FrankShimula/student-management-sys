<?php
	ob_start();
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if (!$user->get_admin_session()) {
		header('Location: index.php');
		exit();
	}
?>

<?php
	$pageTitle = "All Faculty Details";
	include "php/headertop_admin.php";
?>

<style>
	.all_student {
		margin-top: 20px;
	}

	.search_st {
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-bottom: 20px;
	}

	.hdinfo {
		flex: 1;
	}

	.search {
		margin-left: 20px;
	}

	.search input[type="text"] {
		padding: 8px;
		border: none;
		border-radius: 4px;
	}

	.search input[type="submit"] {
		padding: 8px 16px;
		border: none;
		border-radius: 4px;
		background-color: #007bff;
		color: #fff;
		cursor: pointer;
	}

	.search input[type="submit"]:hover {
		background-color: #0062cc;
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
</style>

<div class="all_student">
	<div class="search_st">
		<div class="hdinfo">
			<h3>All Registered Faculty List</h3>
		</div>
		<div class="search">
			<form action="adminsearchfaculty.php" method="GET">
				<input type="text" name="src_faculty" placeholder="Search faculty" />
				<input type="submit" value="Search" />
			</form>
		</div>
	</div>
	<table class="tab_one">
		<thead>
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Education</th>
				<th>Address</th>
				<th>Birthday</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 0;
			$alluser = $user->get_faculty();

			while ($rows = $alluser->fetch_assoc()) {
				$i++;
			?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $rows['name']; ?></td>
					<td><?php echo $rows['email']; ?></td>
					<td><?php echo $rows['contact']; ?></td>
					<td><?php echo $rows['education']; ?></td>
					<td><?php echo $rows['address']; ?></td>
					<td><?php echo $rows['birthday']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php ob_end_flush(); ?>
