<?php
session_start();
$userid=$_SESSION['user'];
?>
<head>
  
 <meta charset="utf-8">
  <title>My Retail Site</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
   
</head>


<? include('header.php'); ?>
<? include('database.php'); ?>


<?
$productid=$_GET['submit'];
if(isset($productid))
{
$sql="DELETE from products where id='$productid'";
$result=mysqli_query($conn,$sql);

header( "Refresh:1; url=editproducts.php", true, 303);
}

?>