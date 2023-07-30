<?php
 include '../config.php';
session_start();// start the session
$username=   $_SESSION['username'];
$sum=0;
$result;
if(!isset($username))
{
    header('Location:http://localhost/rmPlantStore/logout.php');
}


$customerID=$username;
if(isset($_POST['detail']))
{
    $id=$_POST['id'];
    $_SESSION["productid"]= $id;
    header('Location:http://localhost/rmPlantStore/customer/ProductDetails.php?id='.$id);
}
if(isset($_POST['add']))// add to cart
{
   
    $cusId = $customerID;
    $productid=$_POST['id'];
    
$result = $con->query("SELECT * FROM plant_table where id= '$productid'"); 

if($result->num_rows > 0)
{

$row = $result->fetch_assoc();

$price = $row['sale'];
    
$qty=1;		
$TotalPrice=$price*$qty;


    $q1="INSERT INTO `cart_table`( `customer`, `productId`, `price`, `qty`, `total`) VALUES ('$cusId','$productid','$price','$qty','$TotalPrice')";
$query = mysqli_query($con,$q1);

//refresh the page
header('Location:http://localhost/rmPlantStore/customer/mycart.php');
}







}

if(isset($_POST['checkout']))
{
	header('Location:http://localhost/rmPlantStore/customer/checkout.php');
}

$_SESSION["cartid"]="";
	$cartID="";
 
	$result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM `cart_table`'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
if(empty($sum))
{
$sum=0;
}

 
 
if(isset($_POST['search']))
{
    $title=$_POST['title'];
    $category=$_POST['title'];
    
  $query ="SELECT p.* FROM plant_table p LEFT JOIN cart_table pc ON p.id = pc.productId WHERE pc.productId IS NULL where `title`='$title' or `category`='$category'";
 
    $result =$con->query($query);
    if(!$result)
    {
      echo "No record is found";
    }
   
}
else
{


$query ="SELECT p.* FROM plant_table p LEFT JOIN cart_table pc ON p.id = pc.productId WHERE pc.productId IS NULL"; 
$result = $con->query($query);
 
}





include("header.php");
?>
<h1>Welcome <?php

echo $username;

?>
 </h1>
 <main>
 <div class="search-container">
        <form action="index.php" method="post">
            <input type="text" name="title" placeholder="Search Here..">
            <button type="submit" value="search" name="search">Search</button>
            </form>
        </div>
        <?php 
  
echo "<br> <h2> Total Amount : ".$sum."</h2>";


  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
      {
    ?>
    <center>
        <div style="float:left; background:#dcdcdc; margin:10px; pedding:10px;">
        <form action="index.php" method="post">
           <p><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px; height=50px; /></p>
           <p><?php echo $row['title'] ?></p>
           <p><?php echo $row['description'] ?></p>
           <p><?php echo $row['sale'] ."$"?></p>
          
           
           <p>
           <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">
            <button type="submit" value="add" name="add">Add to Cart</button>
            <button type="submit" value="detail" name="detail">Details</button>
        </p>
            
            </form>
        </div>
      </center>
        <?php 
    }
}
    ?>
</main>