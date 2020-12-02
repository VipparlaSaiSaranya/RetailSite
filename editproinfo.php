<?php
session_start();
$userid=$_SESSION['user'];
?>
<?php
include("database.php");
$productid=$_GET['submit'];
if(isset($_GET['submit'])){ // Fetching variables of the form which travels in URL
    $quantity = $_GET['name'];
}
if(isset($productid))
{
$sql="UPDATE products SET 
quantity = '$quantity'
where id ='$productid' ";
$result=mysqli_query($conn,$sql);

header( "Refresh:1; url=editproducts.php", true, 303);
}
?>