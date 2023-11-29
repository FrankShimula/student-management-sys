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
$pageTitle = "Faculty timetable index";
include "php/facultyheader.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Time Table</title>
		<style>
	    body {
	      background-image: url(image.jpg);
	      background-size: cover;
	      background-attachment: fixed;
	      padding-top: 100px;
	    }

	    .btn-primary {
	      background-color: #8bc34a;
	      color: #fff;
	      border: none;
	      border-radius: 5px;
	      padding: 10px 20px;
	      font-size: 16px;
	      text-align: center;
	      text-decoration: none;
	      display: block;
	      margin-bottom: 10px;
	      transition: background-color 0.3s ease;
	    }

	    .btn-primary:hover {
	      background-color: #3F8744;
	      color: #fff;
	    }

	    .btn-back {
	      display: block;
	      margin: 0 auto;
	      padding: 10px 20px;
	      font-size: 16px;
	      color: #fff;
	      background-color: #2A2B3C;
	      border: none;
	      border-radius: 5px;
	      text-decoration: none;
	      transition: background-color 0.3s ease;
	      width: fit-content;
	    }

	    .btn-back:hover {
	      background-color: #555;
	    }
	  </style>
  </head>
  <body>
  <div class="container">
  <div class="row justify-content-between">
    <div class="col-md-5">
      <a class="btn btn-primary btn-lg btn-block" href="facultytimetableupload.php" role="button">Upload Timetable</a>
    </div>
    <div class="col-md-5">
      <a class="btn btn-primary btn-lg btn-block" href="facultytimetabledisplay.php" role="button">Display Timetable</a>
    </div>
  </div>
  <div>
    <a href="javascript:history.back()" class="btn-back">Back</a>
  </div>
  </body>
</html>
