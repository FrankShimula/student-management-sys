<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->get_faculty_session()){
	header('Location:facultyindex.php');
	exit();
}
?>

<?php
$pageTitle = "Faculty login";
include "header.php";
?>
	<div class="loginform fix">
		<div class="msg "><h3><i class="fa fa-user" aria-hidden="true"></i> Faculty login</h3></div>
		<div class="access">

			<?php
			//php for faculty login
			if($_SERVER['REQUEST_METHOD'] == "POST"){
						$username = $_POST['user'];
						$psw  = $_POST['psw'];

						if(empty($username) or empty($psw)){
							echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
						}else{
							$psw = md5($psw);
							$login = $user->fct_login($username, $psw);
							if($login){
								header('Location: facultyindex.php');
							}else{
								echo "<p style='color:red;text-align:center'>Incorrect Username or password</p>";
							}
						}
					}
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
			<form action="" method="post">
				<input type="text" name="user" placeholder="Username" />
				<input type="password" name="psw" placeholder="Password" />
				<input style="color:#ddd;background:#3498db" type="submit" value="Login" />
			</form>
		</div>
		<p >Not Registered? <a href="fct_reg.php">Create an account</a></p>
	</div>

<?php
  ob_end_flush() ;
?>
