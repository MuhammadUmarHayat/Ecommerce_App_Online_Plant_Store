<?php
include 'config.php';
$message = "";

if (isset($_POST['submit'])) 
{
   
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $msgdate = date("y-m-d");

 $query="INSERT INTO `query_table`( `customer`, `message`, `email`, `msg_date`) VALUES ('$name','$message','$email','$msgdate')";
$insert = mysqli_query($con, $query);



            $message = "Your message has been sent successfully";
}
?>

<?php
include("header.php");?>
<main>
        <p>If you have any questions , feel free to get in touch with us using the form below:</p>

        <form action="ContactUs.php" method="post">
            <table>
           <tr>    
            <td> <label for="name">Name:</label></td>
            <td> <input type="text" id="name" name="name" required></td></tr>
            <tr> 
            <td>  <label for="email">Email:</label></td>
            <td>  <input type="email" id="email" name="email" required></td></tr>
            <tr> 
            <td> <label for="message">Message:</label></td>
            <td> <textarea id="message" name="message" rows="4" required></textarea></td></tr>
            <tr> 
            <td> </td>  <td><input type="submit" name ="submit" value="Submit"> </td></tr> 
         </table>
        </form>
    </main>
    <?php
        echo $message;
                        ?>
</body>
</html>