<?php include '../config.php';
// Get image data from database 
$result = $con->query("SELECT * FROM `plant_table`");

?>

<?php
include("header.php");?>
<section >
<h3><a style="color:blue;" href="newPlant.php"> Create a new Plant</a></h3>

    <h2 style="text-align:center">Plant List</h2>
<table border=1>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>category</th>
        <th>Description</th>
        <th>Photo</th>
        <th>Price</th>
        <th></th>
        <th></th>
    </tr>
  <?php  if ($result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
    ?>

<tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['category'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=50px; height=50px; /></td>
        <td><?php echo $row['sale'] ?></td>
        <td><?php echo '<a  text-decoration: none;"  href="editPlant.php?id=' . $row['id'] . '">Edit Details</a>';?></td>
         <td><?php echo '<a text-decoration: none;"  href="removePlant.php?id=' . $row['id'] . '">Remove Details</a>';?></td>
         
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