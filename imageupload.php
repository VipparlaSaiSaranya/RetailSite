
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retail";



// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

if(isset($_POST['submit'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "Images/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
 
}
?>

