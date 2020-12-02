
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>


body {
 
  font-family: Arial, Helvetica, sans-serif;
}


li{
  display:inline-block;
}

.start{
  
}
.middle{


}
a{
  color:white;
}

.end{

  float:right;

}

</style>
</head>
<body>

<div  style="width:available;padding:10px;height:60px;background-color: rgb(12, 8, 240);font-weight: bold;">
  <ul>
  <li class="col-md-6 start"><ul><li><a  href="products.php">RETAIL SITE</a></li>
  <li><a href="login.php"><i class="fa fa-user icon"></i></a></li>
  <li><a href="logout.php"><i class="fa fa-power-off "></i></a></li>
  <li><a href="userprofile.php">User Info</a></li></ul></li>
  
  <li class="col-md-1 middle"><form action="cart.php" method="GET">
  <button type="submit"  ><i class="fa fa-shopping-cart"></i></button>
  </form></li>
  <li class="col-md-4 end ">
    <form action="products.php" method="GET">
      <ul>
      <li style="width:80%"><input type="text" class="form-control" placeholder="Search.." name="search"/></li>
      <li><button type="submit"  class="form-control" value="search"><i class="fa fa-search"></i></button></li>
    </ul>
    </form>
  </li>
</ul>
</div>

</body>
</html>
