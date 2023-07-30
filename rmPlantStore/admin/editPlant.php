<?php include '../config.php';
//get data 
$id= $_GET['id'];
$title="";
$description="";


 $category= "";
 
  $quantity="";
  $purchase="";
  $sale="";
$result = $con->query("SELECT * FROM `plant_table`  where  `id`='$id'"); 
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
			
     
     
		
	    $title= $row['title'];
        $description= $row['description'];
		//category,quantity,purchase,sale
		 $category= $row['category'];
         
          $quantity=$row['quantity'];
          $purchase=$row['purchase'];
          $sale=$row['sale'];

		
}
}


 
if(isset($_POST["submit"]))
{

$id= $_GET['id'];
		
$title= $_POST['title'];
$description= $_POST['description'];	
		
//category,quantity,purchase,sale
	echo $sql="UPDATE `plant_table` SET `title`='$title',`category`='$category', `description`='$description',`quantity`='$quantity', `purchase`='$purchase', `sale`='$sale' where  `id`='$id'";
		
		
		
		
		
	
	$insert = $con->query($sql); 
             if($insert){ 
                $status = 'success'; 
                echo $statusMsg = "Record is updates successfully."; 
                header('Location:http://localhost/rmPlantStore/admin/plants.php');
            }else{ 
               echo $statusMsg = "Failed, please try again."; 
            }  
	
	
	
	
}





?>
<?php
include("header.php");?>
<form action="editPlant.php?id=<?php echo $id; ?>" method="post">
<table>


<tr><td>Plant ID</td><td><?php echo $id; ?></td></tr>
<tr><td>Title</td><td><input type="Text" name="title" value="<?php echo $title; ?>"></td></tr>
<tr><td>Description</td><td><input type="Text" name="description" value="<?php echo $description; ?>"></td></tr>
<tr><td>Category</td><td><input type="Text" name="category" value="<?php echo $category; ?>"></td></tr>
<tr><td>Quantity</td><td><input type="number" name="quantity" value="<?php echo $quantity; ?>"></td></tr>
<td>Purchasing Price</td><td><input type="number" name="purchase" value="<?php echo $purchase; ?>"></td></tr>
<td>Sale Price</td><td><input type="number" name="sale" value="<?php echo $sale; ?>"></td></tr>

<tr><td></td><td><input class="btn-success" type="submit" name="submit" value="Save Changes"></td></tr>


</table>
</form>