

<?php
include 'config.php';
$res="";
if(isset($_POST['submit']))
{
//address,phone,email,username,password,Retypepassword
$fullname=$_POST['fullname'];
$username=$_POST['username'];
$password=$_POST['password'];
$Retypepassword=$_POST['Retypepassword'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];

 $date=date("y/m/d");
$query="INSERT INTO `user_table`(`full_name`, `user_name`, `password`, `email`, `phone`, `address`, `created_at`) VALUES ('$fullname','$username','$password','$email','$phone','$address','$date')";
$query = mysqli_query($con,$query);

$res="You are registered successfully";

}

include("header.php");

?>

<h1>Customer Registration Form</h1>
<form method="post" action="signup.php">

<table>
    <tr>
        <td> Enter your Full name  </td>
        <td><input type="text" name="fullname" Required/> </td>
        <td>*</td>
         </tr>
         
         <tr>
        <td> Enter username  </td>
        <td><input type="text" name="username" Required/> </td>
        <td>*</td>
         </tr>
         <tr>
        <td> Enter Password </td>
        <td><input type="password" name="password" Required/> </td>
        <td>*</td>
         </tr>
         <tr>
        <td> Enter Password Again </td>
        <td><input type="password" name="Retypepassword" Required/> </td>
        <td>*</td>
         </tr>
         <tr>
        <td> Enter Email </td>
        <td><input type="text" name="email" Required/> </td>
        <td>*</td>
         </tr>
         <tr>
        <td> Enter Phone Number </td>
        <td><input type="number" name="phone" Required/> </td>
        <td>*</td>
         </tr>
         <tr>
        <td> Enter your complete address </td>
        <td><input type="text" name="address" Required/> </td>
        <td>*</td>
         </tr>
         <tr>
        <td> </td>
        <td><input type="submit" name="submit" value="SignUp"/> </td>
        <td><?php echo $res;?></td>
         </tr>
</table>


</form>

    
</body>
</html>