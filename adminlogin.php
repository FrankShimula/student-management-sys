<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if ($user->get_admin_session()) {
    header('Location: admin.php');
    exit();
}
?>

<?php
$pageTitle = "Admin Login";
include "header.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="University Management system">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body>
  <div class="container">
    <div class="loginform">
      <div class="msg">
        <h3><i class="fa fa-user" aria-hidden="true"></i> Admin login</h3>
      </div>
      <div class="access">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) or empty($password)) {
                echo "<p>Field must not be empty.</p>";
            } else {
                $password = md5($password);
                $login = $user->admin_userlogin($username, $password);
                if ($login) {
                    header('Location: admin.php');
                } else {
                    echo "<p>Incorrect username or password</p>";
                }
            }
        }
        ?>
        <form action="" method="post">
          <input type="text" name="username" placeholder="Username" />
          <input type="password" name="password" placeholder="Password" />
          <input type="submit" value="Login" class="btnsubmit" />

        </form>
      </div>
    </div>
  </div>
</body>
</html>
