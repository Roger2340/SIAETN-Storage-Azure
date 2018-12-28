<?php

/* PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:databasesiaetn.database.windows.net,1433; Database = sql_SIAETN", "ra805847", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}*/

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "ra805847@databasesiaetn", "pwd" => "ra3025@7610", "Database" => "sql_SIAETN", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:databasesiaetn.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>