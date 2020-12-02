<?php
session_start();

?>
<html>
<head>
  <meta charset="utf-8">
  <title>My Retail Site</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  </head>
<body>

<?php
        include("header.php");
        ?>
    
    
        <style>
           
          
       
        .checked {
            color: orange;
        }
        
        </style>
       
      
         
       <div class="container ">
        <div class="row" style="width:100%">
          <?php
          
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "retail";
        
          $conn = mysqli_connect($servername, $username, $password,$dbname);
        if(!isset($_GET['search'])){
          $query = "SELECT * FROM products";
          $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
            $imgsrc="Images/".$row["image"];
        ?>
        
        <div class="col-md-3">
                        
        <div class="card mb-2 shadow-sm">
            <img src="<?echo $imgsrc;?>" style="width: 100%;height: 220px;object-fit: contain;">
              <figcaption class="info-wrap">
              <h4 class="title"><? printf ("%s",$row["name"]);?></h4>
              <div class="rating-wrap">
                
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <p>4.1 average based on 254 reviews.</p>
              </div> 
          </figcaption>
          <div class="bottom-wrap">
          <div class="price-wrap h5">
                <span class="price-new"><? printf ("$%s",$row["price"]);?></span>
            </div>
            <form action="productsinfo.php" method="GET">
            <button type="submit" name="submit" id="submit"  class="btn btn-success btn-block" value="<?= $row["id"] ?>">
                              order now
            </button></div> </form>
           
        </div>
            <br>
            <br>
            </div>
        
            <?}?>
           
           
            <?}
            
  
        else{

           $search=$_GET['search'];
           $query = "SELECT * FROM products WHERE name like '%$search%' or description like '%$search%'";
           $result = mysqli_query($conn,$query);
           
           while($row = mysqli_fetch_assoc($result)){
            $imgsrc="Images/".$row["image"];
        ?>
           
        <div class="col-md-6">
                        
        <div class="card mb-2 shadow-sm">
            <img src="<?echo $imgsrc;?>" style="width: 100%;height: 220px;object-fit: contain;">
              <figcaption class="info-wrap">
              <h4 class="title"><? printf ("%s",$row["name"]);?></h4>
              <div class="rating-wrap">
                
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <p>4.1 average based on 254 reviews.</p>
              </div> 
          </figcaption>
          <div class="bottom-wrap">
          <div class="price-wrap h5">
                <span class="price-new"><? printf ("$%s",$row["price"]);?></span>
            </div>
            <form action="productsinfo.php" method="GET">
            <button type="submit" name="submit" id="submit"  class="btn btn-success btn-block" value="<?= $row["id"] ?>">
                              order now
                            </button></div></form>
            </div>
            <br>
            <br>
            </div>
       
            <?}?>

            <?}?>
        
      </div>
  </div>


</body>
</html>