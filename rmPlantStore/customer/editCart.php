<?php include '../config.php';
//get data 
$id= $_GET['id'];
$customer="";
 
$productId =""; 
$price="";
  $qty="";
 $total="";

$result = $con->query("SELECT * FROM `cart_table`  where  `id`='$id'"); 

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
			
    //  $row['id'] 
     $customer=    $row['customer']; 
      $productId=   $row['productId']; 
      $price=         $row['price'] ;
        $qty= $row['qty'] ;
       $total=  $row['total'] ;
		
	   
		
		
		
}
}


 
if(isset($_POST["submit"]))
{
   // update cart
////`customer`, `productId`, `price`, `qty`, `total`
$id= $_GET['id'];
		
$qty= $_POST['qty'];
	
		

$result = $con->query("SELECT * FROM `cart_table`  where  `id`='$id'"); 

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
			
    //  $row['id'] 
     $customer=    $row['customer']; 
      $productId=   $row['productId']; 
      $price=         $row['price'] ;
       
       $total=  $row['total'] ;
		
	   
		
		
		
}
}
$total=$price*$qty;







	echo $sql="UPDATE `cart_table` SET `qty`='$qty', `total`='$total' where  `id`='$id'";
		
		
		
		
		
	
	$insert = $con->query($sql); 
             if($insert){ 
                $status = 'success'; 
                echo $statusMsg = "Record is updates successfully."; 
                header('Location:http://localhost/rmPlantStore/customer/mycart.php');
            }else{ 
               echo $statusMsg = "Failed, please try again."; 
            }  
	
	
	
	
}





?>
<?php
include("header.php");?>
<form action="editCart.php?id=<?php echo $id; ?>" method="post">
<table>


<tr><td> ID</td><td><?php echo $id; ?></td></tr>
<tr><td>customer</td><td><?php echo $customer; ?></td></tr>
<tr><td>Product </td><td><?php echo $productId; ?></td></tr>
<tr><td>Price</td><td><?php echo $price; ?></td></tr>
<tr><td>Old Quantity</td><td><?php echo $qty; ?></td></tr>
<tr><td>Update Quantity</td><td><input type="number" name="qty" value="<?php echo $qty; ?>"></td></tr>
<tr><td>Total</td><td><?php echo $total; ?></td></tr>


</td></tr>
<tr><td></td><td><input class="btn-success" type="submit" name="submit" value="Save Changes"></td></tr>


</table>
</form>