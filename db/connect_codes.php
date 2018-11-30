<?php
$serverName = "localhost"; //serverName\instanceName
$connectionInfo = array( "Database"=>"kairos_web", "UID"=>"weblog", "PWD"=>"031522031522xdxd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}else {
	//echo "Conexión establecida.<br />";
}


?>
