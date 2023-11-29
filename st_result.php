<?php
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
$pageTitle = "Student Result";
include "php/headertop_admin.php";
?>
<style>
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

  .tab_one td a {
    display: inline-block;
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border-radius: 4px;
    text-decoration: none;
  }

  .tab_one td a:hover {
    background-color: #45a049;
  }
</style>

<div class="all_student fix">
  <table class="tab_one">
    <tr>
      <th>SL</th>
      <th>Name</th>
      <th>ID</th>
      <th>Add Result</th>
      <th>View Result</th>
    </tr>
    <?php
    $i = 0;
    $alluser = $user->get_all_student();

    while ($rows = $alluser->fetch_assoc()) {
      $i++;
    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $rows['name']; ?></td>
        <td><?php echo $rows['st_id']; ?></td>
        <td><a href="add_result.php?ar=<?php echo $rows['st_id']; ?>&vn=<?php echo $rows['name']; ?>">Add Result</a></td>
        <td><a href="view_result.php?vr=<?php echo $rows['st_id']; ?>&vn=<?php echo $rows['name']; ?>">View Result</a></td>
      </tr>
    <?php } ?>
  </table>
</div>
<?php ob_end_flush(); ?>
