<?php
include 'config.php';

if(isset($_POST['submit']))
{
   
$username=$_POST['username'];
$password=$_POST['password'];
$userType=$_POST['userType'];

if($userType=="admin")
{
//`username`, `password
    $result = $con->query("SELECT * FROM `admin_table` WHERE `username`='$username' and `password`='$password'");

    if ($result->num_rows > 0)
    {
        //id password is correct
        session_start();// start the session
        $_SESSION['username'] = $username;
        header('Location:http://localhost/rmPlantStore/admin/index.php');
    }
    else
    {
        echo "Please enter correct userid and password";
    }

}
else if ($userType=="customer")
{
    $result = $con->query("SELECT * FROM `user_table` WHERE `user_name`='$username' and `password`='$password'");

    if ($result->num_rows > 0)
    {
        //id password is correct
        session_start();// start the session
        $_SESSION['username'] = $username;
        header('Location:http://localhost/rmPlantStore/customer/index.php');

    }
    else
    {
        echo "Please enter correct userid and password";
    }
}
else
{
echo "Please enter correct userid and password";
}
}
?>
<?php
include("header.php");?>
<h1>Login </h1>
<form action="login.php" method="post">
    <div class="center">
<table>
    <tr><td>Choose User Type</td>
    <td>
    <select name="userType" id="userType">
  <option value="admin">Admin</option>
  <option value="customer">Customer</option>
  
</select>
</td>
    <td>*</td>
</tr>
    <tr><td>Enter User name</td>
    <td><input type="text" name="username" Required/></td><td></td>
</tr>
    <tr><td>Enter user password</td>
    <td><input type="password" name="password" Required/></td><td>*</td></tr>
    <tr><td></td>
    <td><input type="submit" name="submit"  value="Login"/></td><td></td>
</tr>
<tr><td></td>
    <td><a style="color:blue;" href="signup.php"> New User register now!</a></td><td></td></tr>
</table>
</form>
</div>
</body>
</html>