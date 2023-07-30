<?php
 include 'config.php';
if(isset($_POST['search']))
{
    $title=$_POST['title'];
    $category=$_POST['title'];
    
  $query ="SELECT p.`id`, p.`title`, p.`category`, p.`description`, p.`photo`, p.`quantity`, p.`purchase`, p.`sale`, p.`purchasing_date`, p.`status`, IFNULL(f.total_likes, 0) AS total_likes, IFNULL(f.total_rank, 0) AS total_rank, IFNULL(f.average_stars, 0) AS average_stars FROM `plant_table` p LEFT JOIN ( SELECT product, SUM(likes) AS total_likes, SUM(rank) AS total_rank, AVG(stars) AS average_stars FROM `feedback_table` GROUP BY product ) f ON p.`id` = f.`product` ORDER BY p.`id`and `title`='$title' or `category`='$category'";
 
    $result =$con->query($query);
    if(!$result)
    {
      echo "No record is found";
    }
   
}
else
{


$query ="SELECT p.`id`, p.`title`, p.`category`, p.`description`, p.`photo`, p.`quantity`, p.`purchase`, p.`sale`, p.`purchasing_date`, p.`status`, IFNULL(f.total_likes, 0) AS total_likes, IFNULL(f.total_rank, 0) AS total_rank, IFNULL(f.average_stars, 0) AS average_stars FROM `plant_table` p LEFT JOIN ( SELECT product, SUM(likes) AS total_likes, SUM(rank) AS total_rank, AVG(stars) AS average_stars FROM `feedback_table` GROUP BY product ) f ON p.`id` = f.`product` ORDER BY p.`id`"; 
$result = $con->query($query);
 
}





include("header.php");
?>

 
 <main>
 <div class="search-container">
        <form action="index.php" method="post">
            <input type="text" name="title" placeholder="Search Here..">
            <button type="submit" value="search" name="search">Search</button>
            </form>
        </div>
        <?php 
  


  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
      {
    ?>
    <center>
        <div style="float:left; background:#dcdcdc; margin:10px; pedding:10px;">
        <form action="index.php" method="post">
           <p><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px; height=50px; /></p>
           <p><?php echo $row['title'] ?></p>
           <p><?php echo $row['description'] ?></p>
           <p><?php echo $row['sale'] ?></p>
           <p><?php echo " Likes". $row['total_likes'] ?></p>
           <p><?php echo " Rank".$row['total_rank'] ?></p>
           <p><?php echo " Stars".$row['average_stars'] ?></p>
           
           
           <p>
           <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">
            
        </p>
            
            </form>
        </div>
      </center>
        <?php 
    }
}
    ?>
</main>