<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body style="background-image: url(shopping\ [MConverter.eu].png);background-size: cover;">
<a style="font-size:25px" href="index.php">Home</a> | <a style="t-size:25px;font-size:25px" href="add.html">Add New Data</a> | <a style="font-size:25px" href="logout.php">Logout</a>
<br/><br/>
	
<table style="margin-left:auto;margin-right:auto;margin-top:70px;font-size:25px;background-color:#a3a3a3;" width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Nama Buah</td>
        <td>Quantity</td>
        <td>Price</td>
        <td>Update</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {		
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['qty']."</td>";
        echo "<td>RM ".$res['price']."</td>";	
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
    }
    ?>
</table>	
</body>
</html>