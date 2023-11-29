<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->get_admin_session()){
	header('Location: admin.php');
	exit();
}
?>

<?php
	$pageTitle = "Home";
?>
<?php include "header.php"; ?>
