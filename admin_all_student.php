<?php
	ob_start ();
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
<?php
$pageTitle = "All student details";
include "php/headertop_admin.php";
?>
<head>
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

    .all_student {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    }

    .search_st {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .hdinfo h3 {
      margin: 0;
      font-size: 24px;
      font-weight: bold;
    }

    .search {
      display: flex;
      align-items: center;
    }

    .search input[type="text"] {
      padding: 8px;
      border-radius: 4px 0 0 4px;
      border: 1px solid #ccc;
    }

    .search input[type="submit"] {
      padding: 8px 12px;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 0 4px 4px 0;
      cursor: pointer;
    }

    .search input[type="submit"]:hover {
      background-color: #555;
    }

    .tab_one {
      width: 100%;
      border-collapse: collapse;
    }

    .tab_one th,
    .tab_one td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    .tab_one th {
      background-color: #f8f9fa;
      font-weight: bold;
      text-align: left;
    }

    .tab_one td a {
      color: #333;
      text-decoration: none;
    }

    .tab_one td a:hover {
      color: #555;
    }

    .btn-back {
      display: inline-block;
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
    }

    .btn-back:hover {
      background-color: #555;
    }
  </style>
</head>

<body>
  <div class="all_student">
    <div class="search_st">
      <div class="hdinfo">
        <h3>All Registered Student</h3>
      </div>
      <div class="search">
        <form action="admin_search_student.php" method="GET">
          <input type="text" name="src_student" placeholder="Search student" />
          <input type="submit" value="Search" />
        </form>
      </div>
    </div>

    <?php
    if(isset($_REQUEST['res'])){
      if($_REQUEST['res']==1){
        echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Data deleted successfully</h3>";
      }
    }
    ?>

    <table class="tab_one">
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th>ID</th>
        <th>Show Profile</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Photo</th>
      </tr>
      <?php
      $i=0;
      $alluser = $user->get_all_student();
      while($rows = $alluser->fetch_assoc()){
        $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $rows['name'];?></td>
        <td><?php echo $rows['st_id'];?></td>
        <td><a href="admin_single_student.php?id=<?php echo $rows['st_id'];?>">View Details</a></td>
        <td><a href="admin_single_student_update.php?id=<?php echo $rows['st_id'];?>">Edit</a></td>
        <td><a href="admin_delete_student.php?id=<?php echo $rows['st_id'];?>">Delete</a></td>
        <td><img src="img/student/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['name'];?>" /></td>
      </tr>
      <?php } ?>
    </table>
    <div>
      <a href="javascript:history.back()" class="btn-back">Back</a>
    </div>
  </div>
</body>

<?php ob_end_flush() ; ?>
