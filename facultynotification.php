<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$fid = $_SESSION['f_id'];
$funame = $_SESSION['f_uname'];
$fname = $_SESSION['f_name'];
if (!$user->get_faculty_session()) {
    header('Location: facultylogin.php');
    exit();
}
if (isset($_REQUEST['dt'])) {
    $date = $_REQUEST['dt'];
}
$pageTitle = "Announcements";
include "php/facultyheader.php"
?>
<head>
  <style>
  /* Table styles */
  .table {
      width: 100%;
      border-collapse: collapse;
  }

  .table th,
  .table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
  }

  /* Table header styles */
  .table th {
      background-color: #f2f2f2;
      color: #333;
  }

  /* Table row styles */
  .table tr:nth-child(even) {
      background-color: #f9f9f9;
  }

  /* Table row hover effect */
  .table tr:hover {
      background-color: #e9e9e9;
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
</style>

</head>
<body>
    <div class="container">
        <h2 class="header">Announcements</h2>
				<br><br>
        <div class="table-container">
            <table class="table">
                <tr>
                    <th>SL</th>
                    <th>Announcement</th>
                    <th>Date</th>
                </tr>
                <?php
                $i = 0;
                $viewannouncement = $user->public_announcement();
                if ($viewannouncement) {
                    while ($rows = $viewannouncement->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rows['msg']; ?></td>
                            <td><?php echo $rows['date']; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='3'>No announcements found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
<div>
				<a href="javascript:history.back()" class="btn-back">Back</a>
			</div>
