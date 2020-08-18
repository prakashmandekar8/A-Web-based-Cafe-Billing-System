<?php $profpic = "create3.jpg"; ?>

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
echo "<br><br>".$c_name."<br><br>";
$que = "SELECT * FROM bills";
$result = mysqli_query($conn,$que);
$row2 = mysqli_fetch_assoc($result);
$serar = serialize($row2);
if ($serar =="N;") {
  echo"<h3 align = 'center'>You have not created any bills yet.<br><a href='/mini_project'>Click here</a> to create a new one.</h3>";
}else {
  echo "<h3><form action='display_found_bill.php' method='post'><br><br>
    Enter the bill no. you want to search:<br>
    <input type = 'text' name = 'bill_no' id='bill_no' maxlength='4' placeholder='bill no.'/>
    <input type = 'submit' value='Search'/>
    </form></h3>";
}
?>
