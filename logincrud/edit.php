<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
    $id = $_POST['id'];
	
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];	
	
    // checking empty fields
    if(empty($name) || empty($qty) || empty($price)) {				
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
		
        if(empty($qty)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
		
        if(empty($price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }		
    } else {	
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");
		
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $qty = $res['qty'];
    $price = $res['price'];
}
?>
<html>
<head>	
    <title>Edit Data</title>
</head>

<body style="background-image: url(shopping\ [MConverter.eu].png);background-size: cover;">
    <a style="font-size:30px;" href="index.php">Home</a> | <a style="font-size:30px;" href="view.php">View Products</a> | <a style="font-size:30px;" href="logout.php">Logout</a>
    <br/><br/>
	
    <form name="form1" method="post" action="edit.php">
        <table style="text-align: center;font-size: 33px;margin-left: 464px;" border="0">
            <tr> 
                <td>Name</td>
                <td><input style="width:200px;height:40px;" type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input style="width:200px;height:40px;" type="text" name="qty" value="<?php echo $qty;?>"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input style="width:200px;height:40px;" type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input style="width:100px;height:40px;font-size:x-large;" type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>