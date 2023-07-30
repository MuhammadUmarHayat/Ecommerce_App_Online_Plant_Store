

<?php
include '../config.php';
$res="";
session_start();
$customerID=$_SESSION["username"] ;
if(isset($_POST['submit']))
{
   // INSERT INTO `feedback_table`(`customer`, `product`, `message`, `stars`, `rank`, `likes`, `msg_date`) VALUES ('','','','','','','')
$customer=$_POST['customer'];
$product=$_POST['product'];
$message=$_POST['message'];
$stars=$_POST['stars'];
$rank=1;
$like=$_POST['likes'];


 $date=date("y/m/d");
$query="INSERT INTO `feedback_table`(`customer`, `product`, `message`, `stars`, `rank`, `likes`, `msg_date`) VALUES ('$customer','$product','$message','$stars','$rank','$like','$date')";
$query = mysqli_query($con,$query);

$res="Thank you for your precious response";

}

include("header.php");

?>

<h1>Customer Review/ Feedback  Form</h1>
<form method="post" action="customer_review.php">

<table>
    <tr>
        <td> Enter your Full name  </td>
        <td><input type="text" name="customer" value="<?php echo$customerID;?>"/> </td>
        <td>*</td>
         </tr>
         
         <tr>
        <td> Choose product  </td>
        <td>
        <select name="product">
    <option disabled selected>-- Select Plant --</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT * From plant_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>
        <td>*</td>
         </tr>
         <tr>
        <td> Enter your message </td>
        <td><input type="text" name="message" Required/> </td>
        <td>*</td>
         </tr>
         <tr>
        <td> Stars</td>
        <td>
            
        <select name ="stars" id="stars">  
  <option value="Select" >--Select--</option> 
  <option value="1">1</option>  
  <option value="2">2</option>  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>  
 
</select>
    </td>
        <td>*</td>
         </tr>
         <tr>
        <td> Do you like this application </td>
        <td>
        <select name ="likes" id="likes">  
  <option value="Select" >--Select--</option> 
  <option value="1">Yes</option>  
  <option value="0">No</option>  
   
</select>     
        
    </td>
        <td>*</td>
         </tr>
        
         <tr>
        <td> </td>
        <td><input type="submit" name="submit" value="Send"/> </td>
        <td><?php echo $res;?></td>
         </tr>
</table>


</form>

    
</body>
</html>