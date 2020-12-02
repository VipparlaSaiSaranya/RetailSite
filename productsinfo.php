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

<?php
$productid=$_GET['submit'];

if(isset($productid)){
$sql="SELECT * from products where id='$productid'";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $imgsrc="Images/".$row["image"];

?>

<div class="container">
					<div class="product col-md-6">
							<img  src="<?echo $imgsrc;?>" style="width: 70%;height: 520px;object-fit: cover;"/>
						
					</div>
					
				<div class="col-md-6">
				<form action="cart.php" method="get">
					<div class="product-title"><? printf ("%s",$row["name"]);?></div>
					<div class="product-rating">
                    <i class="fa fa-star gold"></i> 
                    <i class="fa fa-star gold"></i> 
                    <i class="fa fa-star gold"></i>
                     <i class="fa fa-star gold"></i>
                      <i class="fa fa-star-o"></i> 
                      </div>
					<hr>
					<div class="product-price"><? printf ("%s",$row["price"]);?></div>
					<div class="product-stock">In Stock</div>
					<hr>
					<div class="product-desc"><? printf ("%s",$row["description"]);?></div>
					
					
					<div class="btn-group wishlist">
						<button type="submit" name="cart" id="cart" value="<?= $row["id"] ?>" class="btn btn-danger">
							Add to cart
						</button>
					</div>
                
				</form>
				</div>
				</div>
<? }}

?>