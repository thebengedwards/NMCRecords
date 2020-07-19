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
  <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
  <title>Main</title>
</head>
<body>

  <?php
  if(isset($_SESSION['logged-in'])&& $_SESSION['logged-in']==true){
    echo "<p><a href='logoutProcess.php'>Logout</a></p>";
  }
  else{
    echo "<p><a href='loginForm.php'>Login</a></p>";
  }

  echo "<h1>Main Page</h1>";
  echo "<p><a href='orderRecordsForm.php'>Order</a></p><p><a href='credits.php'>Credits</a></p><p><a href='index.php'>Home</a></p>";
  echo "<p>Choose a Record</p>";


  try {
    require_once("functions.php");
    $dbConn = getConnection();

    $sqlQuery = "SELECT recordID, recordTitle, recordYear, catDesc, recordPrice
                 FROM nmc_records
                 INNER JOIN nmc_category
                 ON nmc_records.catID = nmc_category.catID
                 ORDER BY recordTitle";

	$queryResult = $dbConn->query($sqlQuery);

  while ($rowObj = $queryResult->fetchObject()) {
    echo "<div class='records'>\n";
    if(isset($_SESSION['logged-in'])&& $_SESSION['logged-in']==true){
      echo "<a class='recordTitle'><a href='editRecordsForm.php?recordID={$rowObj->recordID}'>{$rowObj->recordTitle}</a>";
    }
    else{
      echo "<p class='recordTitle'>{$rowObj->recordTitle}</p>";
    }
      echo "
      <p class='recordYear'>{$rowObj->recordYear}</p>
      <p class='catDesc'>{$rowObj->catDesc}</p>
      <p class='recordPrice'>£{$rowObj->recordPrice}</p>
      </div><br>";
	}
}
catch (Exception $e) {
  echo "<p>Query Failed: ".$e->getMessage()."</p>";
}

?>

<div class="footer">
  <p>W17004394</p>
</div>

</body>
</html>
