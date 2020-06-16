<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Records Form</title>
</head>
<body>

  <?php

  $recordTitle = filter_has_var(INPUT_GET, 'recordTitle') ? $_GET['recordTitle'] : null;
  $recordYear = filter_has_var(INPUT_GET, 'recordYear') ? $_GET['recordYear'] : null;
  $pubID = filter_has_var(INPUT_GET, 'pubID') ? $_GET['pubID'] : null;
  $catID = filter_has_var(INPUT_GET, 'catID') ? $_GET['catID'] : null;
  $recordPrice = filter_has_var(INPUT_GET, 'recordPrice') ? $_GET['recordPrice'] : null;
  $recordID = filter_has_var(INPUT_GET, 'recordID') ? $_GET['recordID'] : null;

  $recordTitle = trim($recordTitle);
  $recordYear = trim($recordYear);
  $pubID = trim($pubID);
  $catID = trim($catID);
  $recordPrice = trim($recordPrice);
  $recordID = trim($recordID);

  $errors = false;

  // Check for required variables
  if (empty($recordTitle)) {
    echo "<p>You have not entered a record name</p>\n";
    $errors = true;
  }
  if (empty($recordYear)) {
    echo "<p>You have not entered a record Year</p>\n";
    $errors = true;
  }
  if (empty($pubID)) {
    echo "<p>You have not entered a Publisher</p>\n";
    $errors = true;
  }
  if (empty($catID)) {
    echo "<p>You have not entered a Category</p>\n";
    $errors = true;
  }
  if (empty($recordPrice)) {
    echo "<p>You have not entered a record Price</p>\n";
    $errors = true;
  }
  if (empty($recordID)) {
    echo "<p>You have not entered a Record ID</p>\n";
    $errors = true;
  }


  // Check length
  else if(strlen($recordTitle) > 50) {
    echo "<p>The record name must be no more than 50 characters</p>\n";
    $errors = true;
  }
  else if(strlen($recordYear) > 4) {
    echo "<p>The record year must be no more than 4 characters</p>\n";
    $errors = true;
  }
  else if(strlen($recordPrice) > 5) {
    echo "<p>The record price must be no more than 5 characters</p>\n";
    $errors = true;
  }

  // other checks
  else if(!filter_var($recordYear, FILTER_VALIDATE_INT)) {
    echo "<p>The Year should be a number</p>\n";
    $errors = true;
    }

  // Insert into DB
  if ($errors) {
    echo "<p>Please try again</p>\n";
    }

  else {
    try {
      require_once("functions.php");
      $dbConn = getConnection();

      $updateSQL = "UPDATE nmc_records
                    SET recordTitle = '$recordTitle', recordYear = $recordYear, pubID = '$pubID', catID = $catID, recordPrice = '$recordPrice'
                    WHERE recordID = $recordID";
                    $dbConn->exec($updateSQL);


      echo "<h1>Product details</h1>\n";
      echo "<p>Name: $recordTitle</p>\n";
      echo "<p>Year: $recordYear</p>\n";
      echo "<p>Publisher ID: $pubID</p>\n";
      echo "<p>Category ID: $catID</p>\n";
      echo "<p>Price: £$recordPrice</p>\n";

      echo "<p>Record Updated</p></n>";

    }
    catch (Exception $e) {
      echo "Query Failed: " . $e->getMessage();
    }
  }
  ?>

  <div class="return">
    <p>Return to Admin Page: <a href='admin.php'>Admin Page</a></p>
  </div>

  <div class="footer">
    <p>W17004394</p>
  </div>

</body>
</html>
