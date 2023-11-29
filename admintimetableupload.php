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
  </head>
  <body>

  <br><br><br>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Time Table</h1>
      <p class="lead">Enter Data</p>
      <form action="" method="post">
				<div class="form-group">
          <label for="formGroupExampleInput">Day</label>
          <input type="text" class="form-control" name="Day" id="formGroupExampleInput" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Teacher Name</label>
          <input type="text" class="form-control" name="TeacherName" id="formGroupExampleInput" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Subject Name</label>
          <input type="text" class="form-control" name="SubjectName" id="formGroupExampleInput2" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput3">Class Name</label>
          <input type="text" class="form-control" name="ClassName" id="formGroupExampleInpu3" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput4">Starting Time</label>
          <input type="text" class="form-control" name="StartingTime" id="formGroupExampleInput4" placeholder="24:00" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput5">Ending Time</label>
          <input type="text" class="form-control" name="EndingTime" id="formGroupExampleInput5" placeholder="24:00" required>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary" />

      </form>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$Day = $_POST["Day"];
  $tname = $_POST["TeacherName"];
  $sname = $_POST["SubjectName"];
  $cname = $_POST["ClassName"];
  $st = $_POST["StartingTime"];
  $et = $_POST["EndingTime"];
  //echo $tname." ".$sname." ".$cname." ".$st." ".$et;
  //echo "asdasdasdaasd";
  if(empty($Day) or empty($tname) or empty($sname) or empty($cname ) or empty($st) or empty($et)){
    echo "<p style='color:red;text-align:center'>**Field must not be empty**</p>";
  }else{
    $timetablereg = $user->BSM_submit($Day,$tname,$sname,$cname,$st,$et);
    if($timetablereg){
      echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>BSM Timetable updated successfully!!</h3>";
    }else{
      echo "<p style='color:red;text-align:center'>There was an error in timetable updation</p>";
    }
  }
}
