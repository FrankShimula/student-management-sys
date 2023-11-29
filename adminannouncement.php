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
$pageTitle = "Post announcement";
include "php/headertop_admin.php";
?>
<style>

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

body {
  background-color: #f8f9fa;
}
.display-4 {
  font-weight: bold;
  color: #333;
}

.form-group {
  margin-bottom: 20px;
}

.form-control {
  border-radius: 5px;
  border: none;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
  font-size: 16px;
  color: #333;
}
.lead {
  background-color: #ccc;
  color: white;
  padding: 10px;
  margin-bottom: 20px;
}


}

.btn-primary {
	background-color: #58A85D;
	color: #fff;
	border: none;
	border-radius: 5px;
	padding: 10px 20px;
	font-size: 16px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	transition: background-color 0.3s ease;
	margin-top: 20px;
}
.btn-primary:hover {
	background-color: #3F8744;
	color: #fff;
}
.input-box {
  width: 300px;
  height: 100px;
  font-size: 17px;
}
.datebox {
	width 70px;
	height;40px;
	font-size:17px;
}

</style>
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<p class="lead">Post Announcement</p>
		<form action="" method="post">
			<div class="form-group">
  <a> Announcement</a>
	<form action="/form/submit" method="GET">
		 <textarea rows="5" cols="60" name="announcement" placeholder=""></textarea>
</div>
 <br>
</div>
<div>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
		</div>
	</div>
	<div>
    <a href="javascript:history.back()" class="btn-back">Back</a>
  </div>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$msg = $_POST["announcement"];
	#$date = $_POST["Date"];

	if(empty($msg)){
    echo "<p style='color:red;text-align:center'>**Field must not be empty**</p>";
  }else{
    $announcementpost = $user->post_announcement($msg);
    if($announcementpost){
      echo "<h3 style='color:green;margin:0;padding:0;text-align:center'> Announcement posted successfully!!</h3>";
    }else{
      echo "<p style='color:red;text-align:center'>An error occured</p>";
    }
  }
}
