<?php
ini_set("session.save_path", "/home/unn_w17004394/sessionData");
session_start();

$_SESSION = array();

session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Logout Form</title>
</head>
<body>

  <p>You have been logged out Succesfully</p>
  <p>please wait</p>

<?php

header('Location: admin.php')

 ?>

</body>
</html>
