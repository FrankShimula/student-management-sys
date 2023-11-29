<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}else{
		header('Location: admin.php');
		exit();
	}

	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
?>
<?php
$pageTitle = "Student Details";
include "php/headertop_admin.php";
?>

<style>
  .profile {
    text-align: center;
    margin-top: 20px;
  }

  .tab_one {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
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

  .editbtn {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .editbtn:hover {
    background-color: #45a049;
  }
</style>

<div class="profile">
  <p style="font-size: 18px; text-align: center; background: #45B8AC; color: #fff; padding: 10px; margin: 0">
    <?php $user->getusername($st_id); ?> <i class="fa fa-check-circle" aria-hidden="true"></i>
  </p>
  <table class="tab_one">
    <?php
    $getuser = $user->getuserbyid($st_id);
    while($row = $getuser->fetch_assoc()){
    ?>
    <tr>
      <td></td>
      <?php if(empty($row['img'])){?>
      <td><img src="img/default.png" style="height: 180px; width: 180px; border: 1px #1ABC9C solid; border-radius: 90px" alt="" /></td>
      <?php }else{ ?>
      <td><img src="img/student/<?php echo $row['img']; ?>" style="height: 180px; width: 180px; border: 1px #1ABC9C solid; border-radius: 90px" alt="" /></td>
      <?php }?>
    </tr>
    <tr>
      <td>Student ID: </td>
      <td><?php echo $row['st_id']; ?></td>
    </tr>
    <tr>
      <td>Name: </td>
      <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
      <td>E-mail: </td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
      <td>Birthday: </td>
      <td><?php echo $row['bday']; ?></td>
    </tr>
    <tr>
      <td>Program: </td>
      <td><?php echo $row['program']; ?></td>
    </tr>
    <tr>
      <td>Contact: </td>
      <td><?php echo $row['contact']; ?></td>
    </tr>
    <tr>
      <td>Gender: </td>
      <td><?php echo $row['gender']; ?></td>
    </tr>
    <tr>
      <td>Address: </td>
      <td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
      <td>Update Profile: </td>
      <td><a href="admin_single_student_update.php?id=<?php echo $row['st_id'];?>"><button class="editbtn">Edit Profile</button></a></td>
    </tr>
    <?php  } ?>
  </table>
  <div class="back fix">
    <p style="text-align:center"><a href="admin_all_student.php"><button class="editbtn">Back to student list</button></a></p>
  </div>
</div>
