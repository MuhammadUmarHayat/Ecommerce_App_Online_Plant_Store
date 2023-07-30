<?php include '../config.php';
 
$id= $_GET['id'];


$insert = $con->query("DELETE FROM `cart_table` WHERE `id`='$id'"); 
             if($insert)
             { 
               
                header('Location:http://localhost/rmPlantStore/customer/mycart.php');

            }else{ 
                header('Location:http://localhost/rmPlantStore/customer/mycart.php');
            }  

?>