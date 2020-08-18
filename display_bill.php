<?php $profpic = "image9.jpg"; ?>

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

echo "
<script>
  function printDiv(divName){
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>
";


echo "";
$get = $_GET;
$prices = unserialize($_GET['prices']);
$ids = unserialize($_GET['ids']);
$quantity = $_GET['quantity'];
$product = unserialize($_GET['product']);

$que = "SELECT * FROM bills";
$result = mysqli_query($conn,$que);
$row2 = mysqli_fetch_assoc($result);
$serar = serialize($row2);
if ($serar =="N;") {
  $bill_no=1;
}else {
  $que = "SELECT bill_no FROM bills
ORDER BY bill_no DESC
LIMIT 1";
$result = mysqli_query($conn,$que);

$row2 = mysqli_fetch_assoc($result);
$bill_no=1+$row2['bill_no'];
}

$total = 0;
$i=0;
$my_date = date("Y-m-d H:i:s");
echo "<br><br><br><br>";
echo "<div align='center'>";
echo "<div id='bill_tab' align='center'>";
echo "<table class='w3-table' border='8' align='center' >";
echo "<tr><th colspan='5'><h1 align='center'>Your Bill</h1></th></tr>";
echo "<tr><th colspan='4'>".$c_name."</th><td><h5>Bill no.: ".$bill_no."<br>Bill date and time</h5>".$my_date."</td></tr>";
echo "<tr><th colspan='5'><h1 align='center'></h1></th></tr>";
echo "<tr><th>Product id</th><th>product name</th><th>product price</th><th>Quantity</th><th>Product total</th></tr>";
foreach ($product as $pro) {
  $pro_total = $prices[$i]*$quantity[$i];
  $total = $total +$pro_total;
  echo "<tr><td>".$ids[$i]."</td><td>".$pro."</td><td>".$prices[$i]."</td><td>".$quantity[$i]."</td><td>".$pro_total."</td></tr>";
  $i++;
}
echo "<tr><td colspan='4'>Total</td><td>".$total."</td></tr>";
echo "</table>";
echo "</div>";
echo "<br>";echo "<br>";
echo "<button onclick=\"printDiv('bill_tab')\" align='center'>Print bill</button>";
echo "</div>";
echo "<br>";echo "<br>";

echo"<h3 align = 'center'><br><a href='/mini_project'>Create a new bill here</a></h3>";

$getsr = serialize($get);

if ($serar =="N;") {
  $que = "INSERT INTO bills (bill_no, bill_data, bill_date, bill_total) VALUE(1,'$getsr','$my_date','$total')";
  $result = mysqli_query($conn,$que);

}else {
  $que = "INSERT INTO bills (bill_no,bill_data, bill_date, bill_total) VALUE('$bill_no','$getsr','$my_date','$total')";
  $result = mysqli_query($conn,$que);

}
?>
