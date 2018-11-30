<?php
$serverName = "213.136.67.9"; //serverName\instanceName
$connectionInfo = array( "Database"=>"opennos", "UID"=>"weblog", "PWD"=>"031522031522xdxd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {

    //echo "Conexión establecida.<br />";
}else{
	
	echo "Conexión no se pudo establecer.<br />";
    die( print_r( sqlsrv_errors(), true));

}
?>




