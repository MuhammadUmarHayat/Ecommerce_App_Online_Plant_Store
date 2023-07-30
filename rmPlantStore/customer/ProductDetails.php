<?php include '../config.php';?>

<?php
session_start();
$username=   $_SESSION['username'];

if(isset($_POST['checkout']))
{
	header('Location:http://localhost/rmPlantStore/customer/checkout.php');
}

$customerID=$username;
echo "<h1> Welcome : ".$customerID."</h1>";

 $productid=$_GET['id'];

$_SESSION["productid"] =$productid;
$productid=$_SESSION["productid"];

if(isset($_POST['add']))//add to cart
{
	
	$cusId = $customerID;
            $productid=$_POST['id'];
			
 $result = $con->query("SELECT * FROM plant_table where id= '$productid'"); 

 if($result->num_rows > 0)
 {
	 
	$row = $result->fetch_assoc();
	
$price = $row['sale'];
			
$qty=	$_POST['qty'];		
	$TotalPrice=$price*$qty;

	
			$q1="INSERT INTO `cart_table`( `customer`, `productId`, `price`, `qty`, `total`) VALUES ('$cusId','$productid','$price','$qty','$TotalPrice')";
        $query = mysqli_query($con,$q1);
 	
	
	header('Location:http://localhost/rmPlantStore/customer/index.php');
 }
	
	
	
	
	
	
}



$result = $con->query("SELECT * FROM plant_table where id= '$productid'"); 

 if($result->num_rows > 0)
 {
	$row = $result->fetch_assoc();
	
	
	
    include("header.php");
?>

<h1> View Product Information</h1>
   <form method="POST" action="ProductDetails.php">
   <?php 
   
   $unitPrice=$row['sale'];
	 $title=$row['title'];
	 $category=$row['category'];

   
   ?>
<table border=1>

<tr><td><a href="index.php">Home</a></td>
<td></td><td></td><td></td><td></td>
</tr>
<tr><th>Product NO</th><th>Name</th><th>category</th><th>price</th><th>Choose Quantity</th></tr>
<tr><td><?php echo $productid;  ?></td>
<td><?php echo $title;  ?></td>
<td><?php echo $category;  ?></td><td>
<?php echo $unitPrice;  ?></td><td> Quantity:
	   <select name ="qty" id="qty">  
  <option value="Select" >--Select--</option> 
  <option value="1">1</option>  
  <option value="2">2</option>  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>  
  <option value="6">6</option>  
  <option value="7">7</option>  
  <option value="8">8</option>  
  <option value="9">9</option>  
  <option value="10">10</option>
  <option value="9">11</option>  
  <option value="10">12</option>
</select>
<input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">
</td></tr>
<tr><td></td><td><button type="submit" name="add" >Add to Cart </button></td><td><button type="submit" name="checkout"> check out </button> </td><td></td></tr>

</table>

 	 
<?php		
 }

?>

                    
                </form>
            </div>
        </div>


        <div>
            <h3>Customer Reviews</h3>
            <?php

$query11="SELECT *  FROM feedback_table  WHERE product = '$productid'";
            
            
            
        
 $result11 = $con->query($query11); 

if($result11->num_rows > 0)
{
    while ($row = $result11->fetch_assoc())
    {
 echo  $row['customer'];
  echo  $row['message'];
  echo  $row['msg_date'];
  
   // `customer`, `product`, `message` `msg_date`
    }

}


echo   '<br>';


            $query1="SELECT product,SUM(likes) AS total_likes, SUM(rank) AS total_rank,AVG(stars) AS average_stars FROM feedback_table  WHERE product = '$productid'  GROUP BY product;";
            
            
            
        
            $result = $con->query($query1); 

            if($result->num_rows > 0)
            {
              
            $row = $result->fetch_assoc();
    
 echo" Total Likes ". $row["total_likes"];
echo " Product Rank ". $row['total_rank'].' Average Stars '. $row['average_stars'];
        
        }
            ?>
</div>
    </main>
</div>
</body>
</html>