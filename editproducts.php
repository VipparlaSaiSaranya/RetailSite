<?php
session_start();
$userid=$_SESSION['user'];
?>
<html>
<head>
  <meta charset="utf-8">
  <title>My Retail Site</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<?php
         include("header.php");
         include("database.php");
         ?>
    
        <style>
           
          
        .checked {
            color: orange;
        }
       
        </style>
        
        <div class="container ">
        <div class="row" style="width:100%">
        <?
         $query = "SELECT * FROM products";
         $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
            $imgsrc="Images/".$row["image"];
        ?>
            <div class="col-md-3">
                        
        <div class="card mb-2 shadow-sm">
            <img src="<?echo $imgsrc;?>" style="width: 100%;height: 220px;object-fit: cover;">
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
                            </button>
            
                            </form>
            <form action="editproinfo.php" method="GET">
            <input type="text" name="name" id="name" placeholder="Quantity"/></br></br>
            <button type="submit" name="submit" id="submit"  class="btn btn-success btn-block" value="<?= $row["id"] ?>">
                              Edit
                            </button>
            </form>
            <form action="deleteproduct.php" method="GET">
            <button type="submit" name="submit" id="submit"  class="btn btn-success btn-block" value="<?= $row["id"] ?>">
                              Delete
                            </button>
            </form>
           
       
          </div> 
        </div>
            <br>
            <br>
            </div>
            <?}?>
        </div>
        </div>
      </div>
  </div>
</div>

</body>
</html>