<?php
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
?>
<?php
$pageTitle = "Faculty";
include "php/facultyheader.php";
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
			<h3>Panel</h3>
			<ul>
				<li><a href="class_att_fc.php">Take attendance</a></li>
				<li><a href="att_view_fc.php">View attendance</a></li>
				<li><a href="facultytimetableindex.php">Timetable</a></li>
			</ul>
		</div>
