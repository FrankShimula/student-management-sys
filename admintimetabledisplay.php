<?php
	ob_start();
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if (!$user->get_admin_session()) {
		header('Location: adminlogin.php');
		exit();
	}
	$pageTitle = "admintimetable view";
	include "php/headertop_admin.php";
?>
<!doctype html>
<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Time Table</title>
   <style>
   body{
     background-image: url(image3.jpg);
     background-size: cover;
     background-attachment: fixed;
   }

   .tab_one {
     width: 100%;
     margin-bottom: 20px;
     border-collapse: collapse;
   }

   .tab_one th,
   .tab_one td {
     padding: 10px;
     text-align: left;
     border-bottom: 1px solid #dee2e6;
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
     background-color: #3E3F50;
     cursor: pointer;
   }
   </style>
 </head>
 <body>
   <div class="table-container">
     <table class="tab_one">
       <tr>
         <th>Day</th>
         <th>Lecturer name</th>
         <th>Subject name</th>
         <th>Venue</th>
         <th>Starting time</th>
         <th>Ending time</th>
       </tr>
       <?php
       $i = 0;
       $alltimetable = $user->timetable_display();

       while($rows = $alltimetable->fetch_assoc()){
         $i++;
       ?>
       <tr>
         <td><?php echo $rows['Day']; ?></td>
         <td><?php echo $rows['tn']; ?></td>
         <td><?php echo $rows['sn']; ?></td>
         <td><?php echo $rows['cn']; ?></td>
         <td><?php echo $rows['st']; ?></td>
         <td><?php echo $rows['et']; ?></td>
       </tr>
       <?php } ?>
     </table>
   </div>
   <div>
     <a href="javascript:history.back()" class="btn-back">Back</a>
   </div>
 </body>
</html>
