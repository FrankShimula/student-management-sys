<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="University Management system">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

    .maincontent {
      background-color: #f8f9fa;
      padding: 20px;
    }

    .sidebar ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .sidebar li {
      margin-right: 10px;
    }

    .dropdown {
      position: relative;
    }

    .dropdown .spcl {
      display: block;
      padding: 10px;
      font-size: 16px;
      font-weight: bold;
      color: #333;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
      cursor: pointer;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-content a {
      display: block;
      padding: 12px 16px;
      font-size: 14px;
      color: #333;
      text-decoration: none;
    }

    .dropdown-content a:hover {
      background-color: #e9e9e9;
    }
  </style>
</head>

<body>
  <header class="header_area">
    <div class="container">
      <div class="row">
        <div class="col-2 logo">
          <!--<img src="img/logo.png" alt="" /> -->
        </div>
        <div class="col-10 uniname">
          <h2>My College</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-12 dateshow">
          <p><?php echo "Date: " . date("d M Y"); ?></p>
        </div>
      </div>
    </div>
  </header>

  <div class="maincontent">
    <div class="container">
      <div class="row">
        <div class="col-12 sidebar">
          <ul>
            <li class="dropdown">
              <span class="spcl"><i class="" aria-hidden="true"></i> Administrator</span>
              <div class="dropdown-content">
                <a href="adminlogin.php"><i class="" aria-hidden="true"></i> Login</a>
              </div>
            </li>
            <li class="dropdown">
              <span class="spcl"><i class="" aria-hidden="true"></i> Faculty</span>
              <div class="dropdown-content">
                <a href="facultylogin.php"><i class="" aria-hidden="true"></i> Login</a>
                <a href="fct_reg.php"><i class="" aria-hidden="true"></i> Register</a>
              </div>
            </li>
            <li class="dropdown">
              <span class="spcl"><i class="" aria-hidden="true"></i> Student</span>
              <div class="dropdown-content">
                <a href="st_login.php"><i class="" aria-hidden="true"></i> Login</a>
                <a href="st_reg.php"><i class="" aria-hidden="true"></i> Register</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
