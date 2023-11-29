<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="University Management system">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload.css">
  <link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload-ui.css">
  <script src="js/vendor/jquery-1.12.0.min.js"></script>
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .header_area {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    }

    .logo img {
      width: 100px;
      height: auto;
    }

    .uniname h2 {
      margin: 0;
      padding: 0;
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .dateshow p {
      margin: 0;
      padding: 0;
      font-size: 14px;
      color: #555;
    }

    .menu {
      background-color: #fff; /* Set white background color */
      padding-top: 10px; /* Add some top padding */
    }

    .menu ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: flex-end; /* Align items to the right */
    }

    .menu li {
      margin-left: 10px; /* Use margin-left instead of margin-right */
    }

    .menu a {
      text-decoration: none;
      color: #333;
      display: flex;
      align-items: center;
    }

    .menu i {
      margin-right: 5px;
    }
  </style>
</head>

<body>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header class="container header_area">
    <div id="sticker">
      <div class="head">
        <div class="uniname fix">
          <h2>My college</h2>
        </div>
      </div>
      <div class="menu">
        <div class="dateshow fix"><p><?php echo "Date: " . date("d M Y"); ?></p></div>
        <ul>
          <?php if($user->get_admin_session()){ ?>
            <li><a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
            <li><a href="adminannouncement.php"><i class="fa fa-bell" aria-hidden="true"></i>Announcement</a></li>
          <li><a href="admin_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          <!--<li><a href="admin.php"><i class="fa fa-cog" aria-hidden="true"></i> Options</a></li>-->


          <!--<?php echo $admin_name; ?>
          </a></li>-->

          <?php } ?>
        </ul>
      </div>
    </div>
  </header>
  <div class="info container fix">
    <!-- Content here -->
  </div>
</body>
</html>
