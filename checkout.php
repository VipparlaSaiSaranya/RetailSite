<?php
session_start();
$userid=$_SESSION['user'];
?>
<?php
include("database.php");
include("header.php");
if(isset($_POST['submit']))
{
  
  $price = $_POST['submit'];
  $sql1 = "INSERT into purchases(
    userid,price) 
    values ('$userid','$price')"; 
    $result1=mysqli_query($conn,$sql1);
    $sql2 ="SELECT * from purchases where userid = '$userid'ORDER BY purchaseid DESC limit 1";
  $result=mysqli_query($conn,$sql2);
  while($row = mysqli_fetch_assoc($result)){
    $purchaseid= $row['purchaseid'];
  }
  
  $query="SELECT * from cart where userid = '$userid'";
  $result=mysqli_query($conn,$query);
  while($row = mysqli_fetch_assoc($result)){
    $productid=$row['productid'];
    $quantity=$row['quantity'];
    $sql="INSERT INTO purchaseditems(purchaseid,productid,quantity) VALUES('$purchaseid','$productid','$quantity')";
    $result=mysqli_query($conn,$sql);
  }

  $query="DELETE FROM cart WHERE userid='$userid'";
  $result=mysqli_query($conn,$query);

  $sql2 ="SELECT * from purchaseditems  ORDER BY purchaseid DESC";
  $result=mysqli_query($conn,$sql2);
  while($row = mysqli_fetch_assoc($result)){
    $quantity=$row['quantity'];
    $productid=$row['productid'];

    $sql="SELECT * from products where id='$productid'";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $remaining=$row['quantity'];
    }
   
        $currentquantity=$remaining-$quantity;
        $sql="UPDATE products SET quantity='$currentquantity' where id='$productid'";
        $result=mysqli_query($conn,$sql);

  }

}



?>

<html>
<head>

<style>



.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<?


$sql="SELECT * from customer where userid='$userid'";
$result = mysqli_query($conn,$sql);

while($result1 = mysqli_fetch_assoc($result))
{
    $name=$result1['name'];
   $address = $result1['address'];
   $email = $result1['email'];
}

?>


  
    <div class="container">
      <form>
      
        <div class="row">
          <div class="col-50">
            <h3>Shipping Address</h3>
            
            <div class="col-sm-5 col-xs-6 tital " >Customer name :  <? echo $name; ?></div>
            <div class="col-sm-5 col-xs-6 tital " >Address :  <? echo $address; ?></div>
            <div class="col-sm-5 col-xs-6 tital " >Email :  <? echo $email; ?></div>
                 
           
            

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" >
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" >
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" >
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" >
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" >
              </div>
            </div>
          </div>
          
        
        
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  
</div>

</body>
</html>
