<?php
include '../config.php';
$message = "";

 
?>



<?php


if (isset($_POST['submit'])) 
{
    $username= $_POST['username'];
    $oldpassword= $_POST['oldpassword'];
    $newpassword1= $_POST['newpassword1'];
    $newpassword2= $_POST['newpassword2'];
    
    $result = $con->query("SELECT * FROM  `admin_table` where `username`='$username' and `password`='$oldpassword' ");
   
    if ($result->num_rows > 0) 
    {// old password is correct
          
            //update new password

            $query = "UPDATE `admin_table` SET `password`='$newpassword1' WHERE `username`='$username'";

            $update = mysqli_query($con, $query);
        
            $message = "Password has been changed successfully!";
    }
    else{
        echo "Please enter correct username and password";
    }
}
 


include("header.php");
?>

<h1>Change Password</h1>
<form method="post" action="changePassword.php" enctype="multipart/form-data">
                    <div class="center">
                        <table>

                            <tr>
                                <td>Enter Username </td>
                                <td><input type="text" name="username" required> <span class="error">*</span> </td>
                            </tr>
                           

                            <tr>
                                <td>Enter old password </td>
                                <td><input type="password" name="oldpassword" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Enter new password </td>
                                <td><input type="password" name="newpassword1" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Enter new password again </td>
                                <td><input type="password" name="newpassword2" required> <span class="error">*</span> </td>
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
