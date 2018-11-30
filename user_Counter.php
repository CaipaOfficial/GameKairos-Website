<?php 

$sql = "SELECT count(*) FROM account";
$N_users = sqlsrv_query( $conn, $sql );
if( $N_users === false) {
    die( print_r( sqlsrv_errors(), true) );
}


while( $row = sqlsrv_fetch_array($N_users, SQLSRV_FETCH_ASSOC) ) {
     $users = $row[''];  
}

 ?>

