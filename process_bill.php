<?php $profpic = "image7.jpg"; ?>


<html>
<head>
<style type="text/css">

body {
background-image: url('<?php echo $profpic;?>');
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="w3.css">
</head>
</html>


<?php
require 'conn.php';
$profpic = "image7.jpg";
$product = $_GET['product'];
$i = 0;
$prices = array();
$ids = array();
echo "<br><br>".$c_name."<br><br>";
echo "<form action='display_bill.php' method='get' align = 'center'>";
echo "<table class='w3-table' border='10' font-color='white' style='font-size:150%'>";
echo "<tr class='w3-text-white'><th>product id</th><th>product name</th><th> product price</th><th>Quantity</th></tr>";
foreach ($product as $pro){
    $que = "SELECT pro_price FROM menu WHERE pro_name = '$pro'";

    $result = mysqli_query($conn,$que);
    while($row = mysqli_fetch_assoc($result)){

   		$prices[] = $row['pro_price'];

      $que = "SELECT pro_id FROM menu WHERE pro_name = '$pro'";

      $result = mysqli_query($conn,$que);
      while($row1 = mysqli_fetch_assoc($result)){

     		$ids[] = $row1['pro_id'];
        echo "<tr class='w3-text-white'><td>".$row1['pro_id']."</td><td>".$pro."</td><td>".$row['pro_price']."</td><td><input type='text' name='quantity[]' id='quantity' placeholder='Enter the Quantity'/></td></tr>";

    }

  }}
    echo "</table>";
    echo "<input type ='hidden' name='prices' id='prices' value='".htmlentities(serialize($prices))."'/>";
    echo "<input type ='hidden' name='ids' id='ids' value='".htmlentities(serialize($ids))."'/>";
    echo "<input type ='hidden' name='product' id='product' value='".htmlentities(serialize($product))."'/>";
    echo "<input type = 'submit'/>";
    echo "</form>";
?>
