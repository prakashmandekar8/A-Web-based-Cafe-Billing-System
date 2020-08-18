<?php $profpic = "image6.jpg"; ?>

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
require "conn.php";

$que = "SELECT * FROM menu";
$result = mysqli_query($conn,$que);


echo "<meta name=viewport' content='width=device-width, initial-scale=5'><link rel='stylesheet' href='w3.css'>";
echo "<br><br>";
echo "<br><br>".$c_name."<br><br>";
echo "<form action='process_bill.php' method='get' align='center'>";
echo "<table class='w3-table' border='10' font-color='white' style='font-size:150%'>";
echo "<tr class='w3-text-white'><th>Product id</th><th>product name</th><th>product price</th></tr>";
 while($row = mysqli_fetch_assoc($result)){

		echo "<tr class='w3-text-white'>";
		echo "<td>".$row["pro_id"]."</td><td><input type='checkbox' name='product[]' id='product' value='".$row['pro_name']."'>".$row['pro_name']."</td><td>".$row["pro_price"]."</td>";
		echo "</tr>";
 }
 echo "</table><input type='submit' value-'next' align='center' value='Next'/></form>";
?>

