<?php
$serverName = "tcp:pigeon-test.database.windows.net,1433";
$connectionOptions = array("Database"=>"pigeon",
    "Uid"=>"pigeon_admin", "PWD"=>"password_1");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn == false)
    die(FormatErrors(sqlsrv_errors()));