<?php include '../config.php';
//get data 
$id= $_GET['id'];
$title="";
$description="";
$result = $con->query("SELECT * FROM `category_table`  where  `id`='$id'"); 
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
			
     
     
		
	    $title= $row['title'];
        $description= $row['description'];
		
		
		
}
}


 
if(isset($_POST["submit"]))
{

$id= $_GET['id'];
		
$title= $_POST['title'];
$description= $_POST['description'];	
		
	echo $sql="UPDATE `category_table` SET `title`='$title', `description`='$description' where  `id`='$id'";
		
		
		
		
		
	
	$insert = $con->query($sql); 
             if($insert){ 
                $status = 'success'; 
                echo $statusMsg = "Record is updates successfully."; 
                header('Location:http://localhost/rmPlantStore/admin/category.php');
            }else{ 
               echo $statusMsg = "Failed, please try again."; 
            }  
	
	
	
	
}





?>
<?php
include("header.php");?>
<form action="editCategory.php?id=<?php echo $id; ?>" method="post">
<table>


<tr><td>Category ID</td><td><?php echo $id; ?></td></tr>
<tr><td>Title</td><td><input type="Text" name="title" value="<?php echo $title; ?>"></td></tr>
<tr><td>Description</td><td><input type="Text" name="description" value="<?php echo $description; ?>"></td></tr>


</td></tr>
<tr><td></td><td><input class="btn-success" type="submit" name="submit" value="Save Changes"></td></tr>


</table>
</form>