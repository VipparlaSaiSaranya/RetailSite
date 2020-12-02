
<?php
session_start();
$userid=$_SESSION['user'];
?>
<html lang="en">
    <head>
        <title>My Retail Site</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
    </head>
    <?php
    include("header.php");
    ?>
    <style>
        
        form p a {
            color: blue;
            text-decoration: underline;
        }
        .login {
            background-color: white;
            color: #000000;
            border: 10px solid white;
        }
        .login h3 {
            font-size: 1.8em;
        }
        .login form input[type="text"], input[type="password"], input[type="submit"] {
            color: black;
            outline: 0;
            width: 85%;
            border: 0;
            padding: 15px;
            border: 2px solid black;
            box-sizing: border-box;
            font-size: 14px;
            margin: 0 0 15px;
            font-weight: bold;
        }
        .center {
            width: 400px;
            padding: 10% 0 0 0;
            margin: auto;
            font-weight: bold;
        }
        .submit {
            color: black;
            background-color: lightgray;
        }
        .submit:hover {
            color: #ffffff;
            background-color: dimgray;
        }
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            
        }
    </style>

    <body>
        
        <center class="center">
            <div class = "card">
            <div class="container-fluid login">
                <h3>Add New Item</h3><br>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Name" id="name"/>
                    <input type="text" name="description" placeholder="Description" id="description"/>
                    <input type="text" name="price" placeholder="Price (don't include $ symbol)" id="price"/>
                    <input type="text" name="quantity" placeholder="Quantity" id="quantity"/>
                    <h4>Upload Image</h4>
                    <input type="file" name="file" placeholder=" choose Image "/>
                    
                    <br><br>
                    <input type="submit" class="submit" name="submit" value="ADD ITEM">
                    <p> <a href="editproducts.php">Head to edit or delete data?</a></p>
                </form><br>
            </div>
        </div>
        </center>
    </body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retail";

include("imageupload.php");

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
echo $password;
// Check connection

if($conn === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check="DESCRIBE products";

if(mysqli_query($conn,$check))
{

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
    $productname = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    //storind the data in your database
    $sql="INSERT into products(
        name,description,price,image,quantity) 
        values ('$productname','$description','$price','$name','$quantity')";
    $query = mysqli_query($conn,$sql);
    echo "Your add has been submited";
    echo "<br/><br/><span>Data Inserted successfully</span>";
    header( "Refresh:5; url=products.php", true, 303);
    }
    
}
else{
    $sql = "CREATE TABLE products(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL UNIQUE,
    description VARCHAR(120),
    price INT NOT NULL,
    image VARCHAR(150),
    quantity varchar(50)
)";
if(mysqli_query($conn, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

if(isset($_GET['submit'])){ 
    $productname = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    //storind the data in your database
    $sql="INSERT into products(
        name,description,price,image,quantity) 
        values ('$productname','$description','$price','$name','$quantity')";
    $query = mysqli_query($conn,$sql);
   
    echo "Your add has been submitted";
    echo "<br/><br/><span>Data Inserted successfully...!!</span>";
    }
    else{
    echo "<p>Insertion Failed <br/> Some Fields are Blank</p>";
    }
    
    
}




$conn->close();
?>