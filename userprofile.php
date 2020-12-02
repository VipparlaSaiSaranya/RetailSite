<?php
session_start();
$userid=$_SESSION['user'];
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: verdana-large;
}
.login form input[type="text"], input[type="password"] {
            color: black;
            outline: 0;
            width: 50%;
            border: 0;
            padding: 15px;
            border: 2px solid black;
            box-sizing: border-box;
            font-size: 14px;
            margin: 0 0 15px;
            font-weight: bold;

        }
.login form  input[type="submit"]{
    color: black;
            outline: 0;
            width: 10%;
            border: 0;
            padding: 15px;
            border: 2px solid black;
            box-sizing: border-box;
            font-size: 14px;
            margin: 0px 0 10px 2px;
            font-weight: bold;

}
</style>
</head>
<body>
<?
include("database.php");
include("header.php");

$sql="SELECT * from customer where userid='$userid'";
$result = mysqli_query($conn,$sql);

while($result1 = mysqli_fetch_assoc($result))
{
    $name=$result1['name'];
   $address = $result1['address'];
   $email = $result1['email'];
   $username = $result1['username'];
   
}

?>
<?php if(isset($_POST['submit'])){
                 
                  
                  $email=$_POST['email'];
                  $address=$_POST['address'];
                  $password = $_POST['password'];
                  $sql="UPDATE customer SET email='$email',address='$address',password='$password' 
                  where userid='$userid'";
                  $result=mysqli_query($conn,$sql);
                }
               $query="SELECT * from customer where id=$userid";
               $result=mysqli_query($conn,$query);
              
?>
<h2 style="text-align:center"></h2>
<div class="container-fluid login">
<div class="card">
<?
            $imgsrc="Images/img.jpg";
   ?>           
        
        <img src=<?echo $imgsrc?> alt="user" style="width:100%">

</div>

<form action="" method="POST">
<h3><? echo $name ?></h3>
<div class="col-sm-5 col-xs-6 tital " >Address</div><div class="col-sm-7">
    <input type="text" name="address" value="<? echo $address ?>"/></div>
<div class="col-sm-5 col-xs-6 tital " >Email</div><div class="col-sm-7">
    <input type="text" name="email" value="<? echo $email ?>"/></div>
<div class="col-sm-5 col-xs-6 tital " >Password</div><div class="col-sm-7">
    <input type="password" name="password" value="<? echo $password ?>"/></div>

    <input type="submit" class="submit" name="submit" value="UPDATE">
</form>
</div>

<div class="col-sm-5 col-xs-6 tital " >YOUR ORDERS</div>
<div class="container mb-4" >
    <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>PurchaseId</th>
                           
                            <th>Price</th>
                            <th >Date and time</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody >
                    <?  
                        $query="SELECT * from purchases where userid=$userid";
                        $cartresult=mysqli_query($conn,$query);
                        while($row = mysqli_fetch_assoc($cartresult)){
                         
                        
                    ?>
                        <tr>
                            <form method="post" action="">
                            <td><button type="submit" name="purchaseid" value="<? echo $row['purchaseid']; ?>"><? echo $row['purchaseid']; ?></button> </td>
                            </form>
      
                            
                            <td><? echo $row['price']; ?></td>
                            <td><? echo $row['date']; ?></td>
                            <td></td>
                            
                        </tr>
                    <? } ?>
                     
                    </tbody>
</table>


<? if(isset($_POST['purchaseid'])){ 
  
  $purchaseid=  $_POST['purchaseid'];
  
?>

<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">quantity</th>
                           
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                           

                           
                        </tr>
                    </thead>
                    <tbody >
                    <?  
                        $sql3="SELECT * from purchaseditems where purchaseid='$purchaseid'";
                        $result3=mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($result3)){
                    ?>
                      
                        <tr>
                        <td><? printf ("%s",$row["quantity"]);
                              $pid=$row["productid"];?></td>
                               <?
                               $sql4="SELECT * from products where id='$pid'";
                              $result4=mysqli_query($conn,$sql4);
                              while($row = mysqli_fetch_assoc($result4)){
                                
                                ?>
                           
                            <td><? printf ("%s",$row["name"]);?></td>
                            <td><? echo $row['price']; ?></td>
                            <td></td>
                            
                        </tr>
                    <? }} ?>
                     
                    </tbody>
</table>

<? } ?>

            </div>
        </div>

</body>
</html>
