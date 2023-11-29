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
<!doctype html>
<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <title>Time Table</title>
   <style>
   body{
     background-image: url(image3.jpg);
     background-size: cover;
     background-attachment: fixed;
   }
   </style>
 </head>
 <body>
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
     $i=0;
       $alltimetable =$user->timetable_display();

       while($rows = $alltimetable->fetch_assoc()){
       $i++;
     ?>
     <tr>
			 <td><?php echo $rows['Day'];?></td>
       <td><?php echo $rows['tn'];?></td>
       <td><?php echo $rows['sn'];?></td>
       <td><?php echo $rows['cn'];?></td>
       <td><?php echo $rows['st'];?></td>
       <td><?php echo $rows['et'];?></td>
     </tr>
     <?php } ?>
   </table>
   </div>

 </body>
