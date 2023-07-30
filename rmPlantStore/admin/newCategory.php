<?php
include '../config.php';
$message = "";
?>



<?php


if (isset($_POST['submit'])) 
{
    

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

//description
         echo   $title = $_POST['title'];
echo $description=$_POST['description'];
            $date1 ="" ;      
           $query = "INSERT INTO `category_table`(`title`, `description`, `photo`) VALUES ('$title','$description','$imgContent')";

            $insert = mysqli_query($con, $query);



          
            header('Location:http://localhost/rmPlantStore/admin/category.php');
        }
    }
}



include("header.php");
?>


<form method="post" action="newCategory.php" enctype="multipart/form-data">
                    <div class="center">
                        <table>

                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="title" required> <span class="error">*</span> </td>
                            </tr>
                            

                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Select Image File:</label>
                                </td>
                                <td> <input type="file" name="image">
                                </td>
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
