<html>
<head>
    <title>Register</title>
</head>

<body style="background-image: url(shopping\ [MConverter.eu].png);background-size: cover;">
    <a style="font-size:40px;" href="index.php">Home</a> <br />
    <?php
    include("connection.php");

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if($user == "" || $pass == "" || $name == "" || $email == "") {
            echo "<div style='text-align:center;'> All fields should be filled. Either one or many fields are empty.</div>";
            echo "<br/>";
            echo "<a style='text-align:center;' href='register.php'>Go back</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
            or die("Could not execute the insert query.");
			
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
        }
    } else {
?>
        <p style="text-align:center;color:red;"><font size="+4">Register</font></p>
        <form name="form1" method="post" action="">
            <table style="display:block;margin-left:auto;margin-right:auto; font-size:26px;" width="27%" border="0">
                <tr> 
                    <td>Full Name</td>
                    <td><input style="width:200px;height:40px;" type="text" name="name"></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input style="width:200px;height:40px;" type="text" name="email"></td>
                </tr>			
                <tr> 
                    <td>Username</td>
                    <td><input style="width:200px;height:40px;" type="text" name="username"></td>
                </tr>
                <tr> 
                    <td>Password</td>
                    <td><input style="width:200px;height:40px;" type="password" name="password"></td>
                </tr>
                <tr> 
                    <td> </td>
                    <td><input style="width:100px;height:40px;font-size:x-large;" type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>
</html>