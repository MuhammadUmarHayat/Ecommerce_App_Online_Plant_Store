<?php include '../config.php';?>
<?php
	session_start();
    $customerID="";

$customerID=$_SESSION["username"] ;
echo "<h3> Thank you : ".$customerID."</h3>";

if(isset($_POST['done']))
{
	
	header('Location:http://localhost/rmPlantStore/customer/customer_review.php');

}


?>


<?php
$result = $con->query("SELECT * FROM `order_table` where `customer` ='$customerID' limit 1"); 

include("header.php");
?>


	<script>
    function doPrint() {
        var prtContent = document.getElementById('div1');
        prtContent.border = 0; //set no border here
        var WinPrint = window.open('', '', 'left=100,top=100,width=1000,height=1000,toolbar=0,scrollbars=1,status=0,resizable=1');
        WinPrint.document.write(prtContent.outerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>


   <form method="POST" action="generate_receipet.php">
<div id="div1">

<h2>Product Receipet</h2>
<table border=1>
<tr>
<th>Order Date</th>
<th>Order No</th>
 <th>Customer ID </th>
    <th>Product ID</th>
    <th>Unit Price</th>
    <th>Quantity</th>
    <th>Total</th>
    
    
</tr>
<?php
if($result->num_rows > 0)
 {
	while($row = $result->fetch_assoc())
	{	
        ///SELECT `id`, `customer`, `productid`, `qty`, `price`, `total`, `order_date`, `status` FROM `order_table	
	
?>
<tr>
<td><?php  echo $row['order_date'];?></td>
 <td><?php echo $row['customer']; ?></td>
 <td><?php  echo $row['id'];?></td>
    <td><?php echo  $row['productid']; ?></td>
    <td><?php echo $row['price'];?></td>
    <td><?php echo $row['qty'];?></td>
    <td><?php echo $row['total'];?> </td>

    </tr>


<?php
 }
 }
 ?>
 </table>
 
 
        



	
</div>
<button type="submit" name="print" onclick="doPrint()" >Print Receipet</button>
<br>
<button type="submit" name="done">Send Feedback /product review </button>	 

                </form>
            
        
    </main>
</div>
</body>
</html>