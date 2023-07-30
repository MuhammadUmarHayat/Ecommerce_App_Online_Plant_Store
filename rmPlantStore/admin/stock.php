<?php include '../config.php';
// Get the remaining quantity of each item after sale 
$query="SELECT p.id, p.title, p.quantity - COALESCE(s.total_sale, 0) AS remaining_quantity FROM plant_table p LEFT JOIN ( SELECT product, SUM(qty) AS total_sale FROM sale_table GROUP BY product ) s ON p.id = s.product";

$result = $con->query($query);

?>

<?php
include("header.php");?>
<section >


    <h2 style="text-align:center">Remaining Stock</h2>
<table border=1>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Remaining Quantity</th>
        
    </tr>
  <?php  if ($result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
    ?>

<tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['remaining_quantity'] ?></td>
        
    </tr>

<?php
      }
    }
                        ?>
                        </table>
</body>
</html>





   
</div>

      </div>
     </section>