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
$pageTitle = "All student details";
include "php/headertop_admin.php";
?>
<head>
	<style>
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
    .tab_one td a {
      color: #000;
      text-decoration: none;
    }
  .attendance-link {
    display: inline-block;
    padding: 5px 10px;
    background-color: #58A85D;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
  }

  .attendance-link:hover {
    background-color: #3F8744;
  }
    .tab_one td a:hover {
      text-decoration: underline;
    }
</style>
</head>
<div class="all_student fix">
	<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Students Attendance</h3>
		<!--<div  class="fix" style="background:#ddd;padding:20px;">
			<!--<span style="float:left;"><button style="background:#58A85D;border:none;color:#fff;padding:10px;"><a style="color:#fff;" href="att_add.php">Add student</a></button></span>
		</div>-->

		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;"> Attendance Date</th>
				<th style="text-align:center;">Action</th>


			</tr>
			<?php
			$i=0;
				$get_date = $user->get_attn_date();

				while($rows = $get_date->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['at_date'];?></td>
				<td>
  <a class="attendance-link" href="att_single_view.php?dt=<?php echo $rows['at_date']; ?>">View Attendance</a>
</td>


			</tr>
			<?php } ?>

		</table>
</div>
<div>
		<a href="javascript:history.back()" class="btn-back">Back</a>
	</div>
<?php ob_end_flush() ; ?>
