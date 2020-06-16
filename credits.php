<?php
ini_set("session.save_path", "/home/unn_w17004394/sessionData");
session_start();
if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  echo "<p>Username: $username </p>\n";

}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Credits</title>
</head>
<body>

<h1>Credits</h1>
<p><a href='admin.php'>Main</a></p>

<p>Benjamin Edwards</p>
<p>W17004394</p>
<p>When doing this assignements I used resources on the Northumbria Blackboard Page for Help, but also resorted to <a href ="https://www.w3schools.com/">W3schools</a> and also <a href ="https://stackoverflow.com/" > Stack Overflow </a> for extra help.</p>
<p>This Assignement was fun to do, an really hope to do more like this in the future!</p>
<p>Ben Edwards</p>

</body>
</html>
