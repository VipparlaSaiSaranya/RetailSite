<?php
session_start();
if($_SESSION['user'])
{
$userid=$_SESSION['user'];
?>
<body>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div>
<?php include('header.php'); ?>
<?php include('database.php'); ?>

</div>
<?php

if(isset($_GET['cart'])){ 
$productid=$_GET['cart'];

// $userid = 3;

$sql="SELECT * from cart where userid='$userid' and productid ='$productid'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    
    while($row = mysqli_fetch_assoc($result)){                               
        $increasequantity=$row["quantity"];
    }
    $quantity=$increasequantity+1;
$query="UPDATE cart SET 
    productid = '$productid',userid= '$userid',quantity= '$quantity'
    where userid='$userid' and productid ='$productid' ";
}
else{
    $quantity=1;
    $query="INSERT into cart(
        productid,userid,quantity) 
        values ('$productid','$userid','$quantity')"; 
}


$addresult=mysqli_query($conn,$query);

$query="SELECT * from cart where userid=$userid";
$result1=mysqli_query($conn,$query);
?>
<?
                             $totalprice=0;
                             ?>
<div class="container mb-4" >
<div class="row" style="width:100%">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th class="text-left">Quantity</th>
                            <th class="text-right">Price</th>
                            
                        </tr>
                    </thead>
                    <tbody >
                    <? 
                        while($row = mysqli_fetch_assoc($result1)){
                         $productid=$row['productid'];
                         $quantity1 = $row['quantity'];

                        $sql="SELECT * from products where id='$productid'";
                       
                        $result4 = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result4)){
                            $imgsrc="Images/".$row["image"];
                        
                    ?>
                        <tr>
                            
                        <td><img src="<?echo $imgsrc;?>" width="400px" height="400px"/> </td>
                            <td><? printf ("%s",$row["name"]);?></td>
                            
                           <td><?echo $quantity1?></td>
                            <td class="text-right"><? $totalprice=$totalprice+ ($row["price"]*$quantity1);
                            printf ("%s",$row["price"]);?></td> 
                            
                              
                                
                        </tr>
                        
                       
                        
                        <? } }?>
                        <?
                       
                        $shipping=3;
                        $tax = 3.5;
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><? echo $totalprice; ?></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right"><? echo $shipping; ?></td>
                        </tr>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                            <td></td>
                            <td>Tax</td>
                            <td class="text-right"><? echo $tax; ?></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><? echo $totalprice+$shipping+$tax; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="col mb-2">
        <div class="row" style="width:100%">
                <div class="col-sm-12  col-md-6">
                    <a href="products.php" class="btn btn-lg btn-block btn-primary text-uppercase">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                <form action="checkout.php" method="POST">
            <button type="submit" name="submit" id="submit"  class="btn btn-success btn-block" value="<?=$totalprice+$shipping+$tax;  ?>">
                              CHECK OUT
                            </button>
            </form>
                </div>
            </div>
        </div>
    
</div>
<div>

<?}
else{
    $userid=1;
        $query="SELECT * from cart where userid=$userid";
        $cartresult=mysqli_query($conn,$query);
        
?>
<?
                             $totalprice=0;
                             ?>
<div class="container mb-4" >
    <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Price</th>
                            
                        </tr>
                    </thead>
                    <tbody >
                    <? 
                        while($row = mysqli_fetch_assoc($cartresult)){
                         $productid=$row['productid'];
                        $sql="SELECT * from products where id='$productid'";
                       
                        $result4 = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result4)){
                            $imgsrc="Images/".$row["image"];
                        
                    ?>
                        <tr>
                            
                        <td><img src="<?echo $imgsrc;?>" width="400px" height="400px"/> </td>
                            <td><? printf ("%s",$row["name"]);?></td>
                           
                        
                            
                            
                            <? $sql1="SELECT quantity from cart where productid='$productid' and userid ='$userid' ";
                           
                           $result2=mysqli_query($conn,$sql1);
                           while($row1 = mysqli_fetch_assoc($result2)){
                           ?>

                            <td><? $quantity=$row1['quantity'];
                            printf ("%s",$row1['quantity']);
                            }
                            ?></td>   
                            <td class="text-right"><? $totalprice= $totalprice+($row["price"]*$quantity);
                            printf ("%s",$row["price"]);?></td> 
                        </tr>
                    
                        <? } }?>
                        <?
                       
                        $shipping=3;
                        $tax = 3.5;
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><? echo $totalprice; ?></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right"><? echo $shipping; ?></td>
                        </tr>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                            <td></td>
                            <td>Tax</td>
                            <td class="text-right"><? echo $tax; ?></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><? echo $totalprice+$shipping+$tax; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="products.php" class="btn btn-lg btn-block btn-primary text-uppercase">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                <form action="checkout.php" method="POST">
            <button type="submit" name="submit" id="submit"  class="btn btn-success btn-block" value="<?=$totalprice+$shipping+$tax;  ?>">
                              CHECK OUT
                            </button>
            </form>
                </div>
            </div>
        </div>
    
</div>
<div>

<?}?>

</body> 
<?
}


else{
    header("Refresh:1; url=login.php", true, 303);
}
?>