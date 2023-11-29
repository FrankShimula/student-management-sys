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
$pageTitle = "Faculty Details";
include "php/headertop_admin.php";
?>
<div class="profile">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0"><?php $user->getusername($name); ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>
		<table class="tab_one">
			<?php
				$getuser = $user->getuserbyid($name);
				while($row = $getuser->fetch_assoc()){
			?>
			<tr>
				<td></td>
				<?php if(empty($row['img'])){?>
				<td><img src="img/default.png" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }else{ ?>
				<td><img src="img/student/<?php echo $row['img']; ?>" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }?>
			</tr>
			<tr>
				<td>ID: </td>
				<td><?php echo $row['id']; ?></td>
			</tr>
			<tr>
				<td>Username: </td>
				<td><?php echo $row['username']; ?></td>
			</tr>
			<tr>
				<td>name: </td>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<td>email: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>birthday: </td>
				<td><?php echo $row['birthday']; ?></td>
			</tr>
			<tr>
				<td>Education: </td>
				<td><?php echo $row['education']; ?></td>
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
				<td>Contact: </td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
			<?php  } ?>
		</table>
		<div class="back fix">
			<p style="text-align:center"><a href="admin_all_faculty.php"><button class="editbtn">Back to faculty list</button></a></p>
		</div>

</div>

<?php include "php/footerbottom.php";?>
