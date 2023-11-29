<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: st_profile.php');
	exit();
}
?>
<?php
$pageTitle = "Student login";
include "header.php";
?>
<head>
	<style>
	.loginform {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.loginform .msg {
    text-align: center;
    margin-bottom: 20px;
}

.loginform .msg h3 {
    font-size: 18px;
    margin: 0;
}

.loginform .access {
    margin-bottom: 20px;
}

.loginform form input[type="text"],
.loginform form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.loginform form input[type="submit"] {
    width: 100%;
    padding: 10px;
    color: #fff;
    background-color: #3498db;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-weight: bold;
}

.loginform p {
    text-align: center;
}

.loginform p a {
    color: #3498db;
    text-decoration: none;
}

.loginform p a:hover {
    text-decoration: underline;
}
</style>
</head>
	<div class="loginform fix">
		<div class="msg"><h3><i class="fa fa-graduation-cap" aria-hidden="true"></i>Student login</h3></div>
		<div class="access">

		<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id	  = $_POST['st_id'];
						$st_pass = $_POST['st_pass'];

						if(empty($st_id) or empty($st_pass)){
							echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
						}else{
							$st_pass = md5($st_pass);
							$login = $user->st_userlogin($st_id, $st_pass);
							if($login){
								header('Location: student.php');
							}else{
								echo "<p style='color:red;text-align:center'>Incorrect Student ID or password</p>";
							}
						}
					}
				?>

			<form action="" method="post">
				<input type="text" name="st_id" placeholder="Student ID" />
				<input type="password" name="st_pass" placeholder="password" />
				<input type="submit" value="Login" />
			</form>
		</div>
		<p>Not Registered? <a href="st_reg.php">Create an account</a></p>
	</div>
<?php ob_end_flush() ; ?>
