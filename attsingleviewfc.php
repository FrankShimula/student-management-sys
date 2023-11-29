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
if (isset($_REQUEST['dt'])) {
  $date = $_REQUEST['dt'];
}
?>
<?php
$pageTitle = "Attendance of: $date";
include "php/facultyheader.php";
?>
<div class="all_student fix">
  <h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Attendance</h3>
  <p style="text-align:center;color:#34495e;margin:0;padding-top:8px;color:red;font-size:22px;">
    <?php echo "Attendance of: " . $date; ?>
  </p>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $atten = $_POST['attn'];
    $res = $user->update_attn($date, $atten);
    if ($res) {
      echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Attendance Updated successfully!</h3>";
    } else {
      echo  "<p style='color:red;text-align:center'>Failed to update data</p>";
    }
  }
  ?>
	<head>
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
</head>

  <form action="" method="post">

    <table class="tab_one" style="text-align:center;">
      <tr>
        <th style="text-align:center;">SL</th>
        <th style="text-align:center;">Name</th>
        <th style="text-align:center;">ID</th>
        <th style="text-align:center;">Attendance</th>
      </tr>
      <?php
      $i = 0;
      $std = $user->attn_all_student($date);
      if ($std) {
        while ($rows = $std->fetch_assoc()) {
          $i++;
      ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $rows['name']; ?></td>
            <td><?php echo $rows['st_id']; ?></td>
            <td>
              <label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id']; ?>]" value="absent" <?php if ($rows['atten'] == "absent") echo "checked"; ?>/>Absent</label>
              <label style="color:green;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id']; ?>]" value="present" <?php if ($rows['atten'] == "present") echo "checked"; ?>/>Present</label>
            </td>
          </tr>
      <?php
        }
      } else {
        echo "Failed";
      }
      ?>
    </table>

    <center>
      <div style="margin-top: 20px;">
        <input style="background:#58A85D;border:none;color:#fff;padding:8px 80px;" type="submit" name="submit" value="Update" />
        <a style="color:#fff;margin-left:10px;" href="class_att.php"><button style="background:#58A85D;border:none;color:#fff;padding:10px;">Take Attendance</button></a>
      </div>
			<br><br>
			<div>
				<a href="javascript:history.back()" class="btn-back">Back</a>
			</div>
    </center>
  </form>
</div>
<?php ob_end_flush(); ?>
