<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$sid = $_SESSION['sid'];
$sname = $_SESSION['sname'];
if (!$user->getsession()) {
    header('Location: st_login.php');
    exit();
}
?>
<?php
$pageTitle = "Student Profile";
include "studentheader.php";
?>
<style>
    .profile {
        text-align: center;
        margin-top: 50px;
    }

    .profile img {
        height: 180px;
        width: 180px;
        border: 1px solid #1ABC9C;
        border-radius: 90px;
    }

    .profile table {
        margin: 0 auto;
        width: 80%;
        max-width: 600px;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile th,
    .profile td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .profile th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .profile tr:last-child td {
        border-bottom: none;
    }

    .editbtn {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        background-color: #1ABC9C;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .editbtn:hover {
        background-color: #16A085;
    }
</style>

<div class="profile">
    <p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Welcome: <?php $user->getusername($sid); ?>
        <i class="fa fa-check-circle" aria-hidden="true"></i></p>
    <table>
        <?php
        $getuser = $user->getuserbyid($sid);
        while ($row = $getuser->fetch_assoc()) {
        ?>
            <tr>
                <td colspan="2">
                    <?php if (empty($row['img'])) { ?>
                        <img src="img/default.png" alt="" />
                    <?php } else { ?>
                        <img src="img/student/<?php echo $row['img']; ?>" alt="" />
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td><b>Student ID:</b></td>
                <td><?php echo $row['st_id']; ?></td>
            </tr>
            <tr>
                <td><b>Name:</b></td>
                <td><?php echo $row['name']; ?></td>
            </tr>
            <tr>
                <td><b>E-mail:</b></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td><b>Birthday:</b></td>
                <td><?php echo $row['bday']; ?></td>
            </tr>
            <tr>
                <td><b>Program:</b></td>
                <td><?php echo $row['program']; ?></td>
            </tr>
            <tr>
                <td><b>Contact:</b></td>
                <td><?php echo $row['contact']; ?></td>
            </tr>
            <tr>
                <td><b>Gender:</b></td>
                <td><?php echo $row['gender']; ?></td>
            </tr>
            <tr>
                <td><b>Address:</b></td>
                <td><?php echo $row['address']; ?></td>
            </tr>
            <?php if ($row['st_id'] == $sid) { ?>
                <tr>
                    <td><b>Update Profile:</b></td>
                    <td><a href="st_update.php?id=<?php echo $row['st_id']; ?>"><button class="editbtn">Edit Profile</button></a></td>
                </tr>
            <?php }
        } ?>
    </table>
</div>
