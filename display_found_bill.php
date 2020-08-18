<?php $profpic = "display.jpg"; ?>

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
$bill_no = $_POST['bill_no'];
$que = "SELECT bill_no FROM bills
ORDER BY bill_no DESC
LIMIT 1";
$result = mysqli_query($conn,$que);

$row2 = mysqli_fetch_assoc($result);
echo "<br>";
if ($row2['bill_no']<$bill_no) {
  echo "<h4 align='center'>Sorry! Bill not found</h4>";
  echo"<h3 align = 'center'><br class='w3-text-white><a href='/mini_project'>Create a new bill here</a></h3>";
} else {
  $que = "SELECT * FROM bills WHERE bill_no='$bill_no'";
  $result = mysqli_query($conn,$que);
  $rows = mysqli_fetch_assoc($result);
  $bill_data = $rows['bill_data'];
  $bill_date = $rows['bill_date'];
  $total = $rows['bill_total'];
  $bill_data = unserialize($bill_data);
  $prices = unserialize($bill_data['prices']);
  $ids = unserialize($bill_data['ids']);
  $quantity = $bill_data['quantity'];
  $product = unserialize($bill_data['product']);

  $total = 0;
  $i=0;
  echo "<table class='w3-table' border='8' align='center'>";
  echo "<tr class='w3-text-white'><th colspan='5'><h2 align='center'>Your Bill</h2></th></tr>";
  echo "<tr class='w3-text-white'><th colspan='4'>".$c_name."</th><td><h5>Bill no.: ".$bill_no."<br>Bill date and time</h5>".$bill_date."</td></tr>";
  echo "<tr class='w3-text-white'><th colspan='5'><h2 align='center'></h2></th></tr>";
  echo "<tr class='w3-text-white'><th>Product id</th><th>product name</th><th>ptoduct price</th><th>Quantity</th><th>Product total</th></tr>";
  foreach ($product as $pro) {
    $pro_total = $prices[$i]*$quantity[$i];
    $total = $total +$pro_total;
    echo "<tr class='w3-text-white'><td>".$ids[$i]."</td><td>".$pro."</td><td>".$prices[$i]."</td><td>".$quantity[$i]."</td><td>".$pro_total."</td></tr>";
    $i++;
  }
  echo "<tr class='w3-text-white'><td colspan='4'>Total</td><td>".$total."</td></tr>";

  echo "<br>";echo "<br>";echo "<br>";echo "<br>";
  echo"<h3 align = 'center'><br><a href='/mini_project'>Create a new bill here</a></h3>";
}
?>
