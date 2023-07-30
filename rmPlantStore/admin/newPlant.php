<?php
include '../config.php';
$message = "";
?>



<?php


if (isset($_POST['submit'])) {
    

    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

////INSERT INTO `plant_table`( `title`, `category`, `description`, `photo`, `quantity`, `purchase`, `sale`, `purchasing_date`, `status`) 
           $title = $_POST['title'];
           $description=$_POST['description'];
             $category =$_POST['category'];
           $quantity=$_POST['quantity'];
          $purchase=$_POST['purchase'];
          $sale=$_POST['sale'];
          $purchasing_date=$_POST['purchasing_date'];
            $status="ok";
            



            $query = "INSERT INTO `plant_table`( `title`, `category`, `description`, `photo`, `quantity`, `purchase`, `sale`, `purchasing_date`, `status`) VALUES ('$title','$category','$description','$imgContent','$quantity','$purchase','$sale','$purchasing_date','$status')";

            $insert = mysqli_query($con, $query);



          
            header('Location:http://localhost/rmPlantStore/admin/plants.php');
        }
    }
}



include("header.php");
?>


<form method="post" action="newplant.php" enctype="multipart/form-data">
                    <div class="center">
                        <table>

                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="title" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Category </td>
                                <td>
    <select name="category">
    <option disabled selected>-- Select Plant Type--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT title From category_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['title'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
 
                            </td>
                            </tr>

                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Select product photo:</label>
                                </td>
                                <td> <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>Quantity </td>
                                <td><input type="number" name="quantity" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Purchasing Price </td>
                                <td><input type="number" name="purchase" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Salling Price </td>
                                <td><input type="number" name="sale" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Date of purchasing </td>
                                <td><input type="date" name="purchasing_date" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> <button type="submit" name="submit"> Submit </button> </td>
                            </tr>
                        </table>
                        <?php
                        echo $message;
                        ?>
                    </div>
                </form>


</body>
</html>
