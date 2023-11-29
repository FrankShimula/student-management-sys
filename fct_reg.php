<!DOCTYPE html>
<html>
<head>
    <title>Faculty Registration</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .fix {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #ddd;
            background-color: #3498db;
            padding: 10px;
            margin: 0;
            text-align: center;
        }

        .msg {
            text-align: center;
        }

        .msg p {
            color: red;
            text-align: center;
        }

        form table {
            width: 100%;
        }

        th {
            text-align: right;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            color: #ddd;
            background-color: #3498db;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2181c4;
        }

        .select-style {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        .birthday {
            width: 45px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        .birthyear {
            width: 80px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    require "php/config.php";
    require_once "php/functions.php";
    $user = new login_registration_class();
    if ($user->getsession()) {
        header('Location: fct_profile.php');
    }
    ?>
    <?php
    $pageTitle = "Faculty Registration";
    include "header.php";
    ?>
    <div class="st_reg fix">
        <h2>Faculty Registration</h2>
        <p class="msg">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $st_name = $_POST['st_name'];
                $uname = $_POST['uname'];
                $st_pass = $_POST['st_pass'];
                $st_email = $_POST['st_email'];

                $BirthMonth = $_POST['BirthMonth'];
                $BirthDay	 = $_POST['BirthDay'];
                $BirthYear	 = $_POST['BirthYear'];
                $bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
                $st_gender  = $_POST['gender'];

                $degree = $_POST['degree'];
                $subject = $_POST['subject'];
                $inst = $_POST['inst'];
                $edu = "{$degree} in {$subject} from {$inst}";
                $st_contact  = $_POST['st_contact'];
                $st_add  = $_POST['st_add'];

                if (empty($st_name) or empty($uname) or empty($st_pass) or empty($st_email) or empty($BirthMonth) or empty($BirthDay) or empty($BirthYear) or empty($degree) or empty($subject) or empty($inst) or empty($st_contact) or empty($st_gender) or empty($st_add)) {
                    echo "<p>**Field must not be empty**</p>";
                } else {
                    $st_pass = md5($st_pass);
                    $fct_register = $user->fct_registration($st_name,$uname,$st_pass,$st_email,$bday,$st_gender,$edu,$st_contact,$st_add);
                    if ($fct_register) {
                        echo "<h3>Registration Complete !! <a href='facultylogin.php'>Login</a></h3>";
                    } else {
                        echo "<p>Error..username Already exists</p>";
                    }
                }
            }
            ?>
        </p>
        <form action="" method="post" id="st_form">
            <table>
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="st_name" placeholder="Full Name" required /></td>
                </tr>
                <tr>
                    <th>Username:</th>
                    <td><input type="text" name="uname" placeholder="Username" required /></td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><input type="password" name="st_pass" placeholder="Password" required /></td>
                </tr>
                <tr>
                    <th>E-mail:</th>
                    <td><input type="email" name="st_email" placeholder="example@email.com" required /></td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td>
                        <fieldset>
                            <select class="select-style" name="BirthMonth">
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            <label><input class="birthday" maxlength="2" name="BirthDay" placeholder="Day" required=""></label>
                            <label><input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>
                        <label><input type="radio" name="gender" value="Male" checked/> Male</label>
                        <label><input type="radio" name="gender" value="Female"/> Female</label>
                    </td>
                </tr>
                <tr>
                    <th>Education:</th>
                    <td>
                        <fieldset>
                            <select class="select-style" name="degree">
                                <option value="BSc">BSc</option>
                                <option value="MSc">MSc</option>
                                <option value="Phd">Phd</option>
                            </select>
                            <label><input class="birthyear" name="subject" placeholder="Subject" required=""></label>
                            <label><input class="birthyear" name="inst" placeholder="Institute" required=""></label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Contact:</th>
                    <td><input type="text" name="st_contact" placeholder="Phone" required /></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><input type="text" name="st_add" placeholder="Address" required /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="sub" value="Register" /></td>
                </tr>
            </table>
        </form>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>
