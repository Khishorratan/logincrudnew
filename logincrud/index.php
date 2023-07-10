<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="header">
        Welcome to my page!
    </div>
    <?php
    if(isset($_SESSION['valid'])) {			
        include("connection.php");					
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>				
     <div style="text-align:center; font-size:26px;"> Welcome  <?php echo $_SESSION['name'] ?> ! <a style="text-align:center;" href='logout.php'>Logout</a><br/>
        <br/>
        <a style="text-align:center;" href='view.php'>View and Add Products</a>
        <br/><br/>
    <?php	
    } else {
        echo "<div style='text-align:center; font-size:26px;'>You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
    }
    ?>
    </div>
    <div style="text-align:center;font-size:26px;" id="footer">
        Created by <a href="https://www.stumbleguys.com/" title="Mkhishorratan">Khishorratan</a>
    </div>
</body>
</html>