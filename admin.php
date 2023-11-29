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
$pageTitle = "Admin";
include "php/headertop_admin.php";
?>
<div class="admin_profile">

	<head>
	  <style>
	    .section {
	      margin-bottom: 20px;
	    }

	    .section h3 {
	      margin: 0;
	      padding-bottom: 10px;
	      font-size: 18px;
	      font-weight: bold;
	    }

	    .section ul {
	      list-style-type: none;
	      padding: 0;
	      margin: 0;
	    }

	    .section ul li {
	      margin-bottom: 10px;
	    }

	    .section ul li a {
	      display: block;
	      padding: 10px;
	      background-color: #f8f9fa;
	      border-radius: 4px;
	      color: #333;
	      text-decoration: none;
	      transition: background-color 0.3s ease;
	    }

	    .section ul li a:hover {
	      background-color: #e9ecef;
	    }
	  </style>
	</head>

	<div class="section">
	  <h3>Student</h3>
	  <ul>
	    <li><a href="admin_all_student.php">View All Students</a></li>
	    <li><a href="st_result.php">Student Results</a></li>
	    <li><a href="adminattview.php">Attendance</a></li>
	    <li><a href="admintimetableindex.php">Timetable</a></li>
	  </ul>
	</div>
	<div class="section">
	  <h3>Faculty</h3>
	  <ul>
	    <li><a href="admin_all_faculty.php">Faculty Details</a></li>
	  </ul>
	</div>
