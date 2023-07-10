<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
</head>

<body style="background-image: url(shopping\ [MConverter.eu].png);background-size: cover;">
<a style="font-size:40px;" href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "<div style='text-align:center;'>Either username or password field is empty.</div>";
        echo "<br/>";
        echo "<div style='text-align:center;'><a href='login.php'>Go back</a> </div>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
		
        $row = mysqli_fetch_assoc($result);
		
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: index.php');			
        }
    }
} else {
?>
    <p style="text-align:center;color:red;"><font size="+4">Login</font></p>
    <form name="form1" method="post" action="">
        <table style="display:block;margin-left:auto;margin-right:auto; font-size:26px;" width="23%" border="0">
            <tr> 
                <td  width="5%">Username</td>
                <td><input style="width:200px;height:40px;" type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input style="width:200px;height:40px;" type="password" name="password"></td>
            </tr>
            <tr> 
                <td> </td>
                <td ><input style="width:100px;height:40px;" type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
<?php
}
?>
</body>
</html>