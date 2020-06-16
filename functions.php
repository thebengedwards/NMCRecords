<?php
function getConnection() {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=unn_w17004394",
            "unn_w17004394", "PASSWORDHERE");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (Exception $e) {
        /* We should log the error to a file so the developer can look at any logs. However, for now we won't */
        throw new Exception("Connection error ". $e->getMessage(), 0, $e);
    }
}
?>