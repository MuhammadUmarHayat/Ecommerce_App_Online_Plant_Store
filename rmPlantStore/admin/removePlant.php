<?php include '../config.php';
 
$id= $_GET['id'];


$insert = $con->query("DELETE FROM `plant_table` WHERE `id`='$id'"); 
             if($insert)
             { 
               
                header('Location:http://localhost/rmPlantStore/admin/plants.php');

            }else{ 
                header('Location:http://localhost/rmPlantStore/admin/plants.php');
            }  

?>