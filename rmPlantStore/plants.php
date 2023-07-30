<?php include 'config.php';
// Get image data from database 
$result = $con->query("SELECT * FROM `plant_table` WHERE `category`='Summer Plants' or `category`='Winter Plants' or `category`='Indoor Plants' or `category`='Outdoor Plants'");

?>

<?php
include("header.php");?>
<section >
    <h2 style="text-align:center">Plant List</h2>

  <?php  if ($result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
    ?>


<div class="card">
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=100% />
<h3><?php echo $row['title'] ?></h3>
  <p class="price"><?php echo $row['sale'] ?></p>
 <p> <h4><?php echo $row['description'] ?></h4></p>
  <p><button>Buy Now</button></p>
</div>


<?php
      }
    }
                        ?>
</body>
</html>





   
</div>

      </div>
     </section>