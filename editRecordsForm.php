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
  <title>Edit Records Form</title>
</head>
<body>

  <?php

  $recordID = $_GET['recordID'];

  if (empty($recordID)) {
	echo "<p>Please <a href='admin.php'>choose</a> a record.</p>\n";
  }

  else {
	try {
    require_once("functions.php");
		$dbConn = getConnection();

    $sqlQuery = "SELECT recordID, recordtitle, recordYear, recordPrice, pubName, catDesc
                 FROM nmc_records
                 INNER JOIN nmc_publisher
                 ON nmc_records.pubID = nmc_publisher.pubID
                 INNER JOIN nmc_category
                 ON nmc_records.catID = nmc_category.catID
                 WHERE recordID = $recordID";

    $queryResult = $dbConn->query($sqlQuery);
    $rowObj = $queryResult->fetchObject();

    echo "
		<h1>Update '{$rowObj->recordtitle}'</h1>
		<form id='Update Record' action='recordProcess.php' method='get'>
			<p><input type=\"hidden\" name=\"recordID\" value=\"$recordID\"/></p>
			<p>Record Title <input type='text' name='recordTitle' size='50' value='{$rowObj->recordtitle}' /></p>
			<p>Record Year <input type='text' name='recordYear' size='4' value='{$rowObj->recordYear}' /></p>
      ";

      $sqlPublisher = "SELECT DISTINCT pubID, pubName from nmc_publisher ORDER BY pubName";
      $rsPublishers = $dbConn->query($sqlPublisher);
      echo "Publisher <select name='pubID'>";
      while ($nmc_publisher = $rsPublishers->fetchObject()) {
        echo "<option value='{$nmc_publisher->pubID}'>{$nmc_publisher->pubName}</option>";
      }
      echo "</select><p></p>";

      $sqlCategory = "SELECT DISTINCT catID, catDesc from nmc_category ORDER BY catDesc";
      $rsCategories = $dbConn->query($sqlCategory);
      echo "Category <select name='catID'>";
      while ($nmc_category = $rsCategories->fetchObject()) {
        echo "<option value='{$nmc_category->catID}'>{$nmc_category->catDesc}</option>";
      }
      echo "</select><p></p>";

      echo "
			<p>Price £<input type='text' name='recordPrice' size='5' value='{$rowObj->recordPrice}' /></p>
			<p><input type='submit' name='submit' value='Update Record'></p>
		</form>
		";
	}
	catch (Exception $e){
		echo "<p>Record details not found: ".$e->getMessage()."</p>\n";
	}
}

  ?>

<div class="footer">
<p>W17004394</p>
</div>

</body>
</html>
