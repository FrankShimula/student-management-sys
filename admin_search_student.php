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

<style>
  .search_result {
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

  .back {
    margin-top: 20px;
  }

  .back p {
    margin: 0;
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

<div class="search_result">
  <table class="tab_one">
    <?php
    $key = $_GET['src_student'];
    $min_length = 1;
    if(strlen($key) >= $min_length){
      $key = htmlspecialchars($key);
      $src_result = $user->search($key);
      $count = $src_result->num_rows;
      if($count>0){
    ?>
    <tr>
      <th>Name</th>
      <th>ID</th>
      <th>Show Profile</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Photo</th>
    </tr>
    <?php
      while($rows = $src_result->fetch_assoc()){
    ?>
    <tr>
      <td><?php echo $rows['name'];?></td>
      <td><?php echo $rows['st_id'];?></td>
      <td><a href="admin_single_student.php?id=<?php echo $rows['st_id'];?>">View Details</a></td>
      <td><a href="admin_single_student_update.php?id=<?php echo $rows['st_id'];?>">Edit</a></td>
      <td><a href="admin_delete_student.php?id=<?php echo $rows['st_id'];?>">Delete</a></td>
      <td><img src="img/student/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['name'];?>" /></td>
    </tr>
    <?php } ?>
  </table>
  <?php
  } else {
    echo "<h2 style='font-size: 45px; text-align: center; color: #ddd;'>Opps....No result found!</h2>";
  }
  } else {
    echo "<h2 style='font-size: 45px; text-align: center; color: #ddd;'>Opps....No result found!</h2>";
  }
  ?>
  <div class="back fix">
    <p style="text-align: center">
      <a href="admin_all_student.php"><button class="editbtn">Back to student list</button></a>
    </p>
  </div>
</div>
