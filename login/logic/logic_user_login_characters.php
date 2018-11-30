<?php 

	$options =  array( "Scrollable" => SQLSRV_CURSOR_STATIC );
	//Genero parametros de la consulta Nombre y usario (Evita sql injection)
	$params_character_data = array($_SESSION['AccountId_Kairos']);
    //creacion consulta sql para verificar Email
    $sql_character_data = "SELECT AccountId, Name, CharacterId, level, PrestigeLevel, class FROM Character WHERE  AccountId = ? AND State = 1";
    //Ejecucion de la consulta sql
    $select_character_data = sqlsrv_query( $conn, $sql_character_data, $params_character_data, $options );
    //Revision de errores de la consulta al servidor a nivel de parametros o sql query si hay error lo imprimo en pantalla
    if( $select_character_data === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    $counter = 0;
    while ($row = sqlsrv_fetch_array( $select_character_data, SQLSRV_FETCH_ASSOC)) {
    	$_SESSION['character_'.$counter] = $row;
    	$counter = $counter + 1;
    	}

/*    while( $row = sqlsrv_fetch_array( $select_user, SQLSRV_FETCH_ASSOC) ) {
		$login_user_db = $row['Name'];
		$login_password_db = $row['Password'];
		$login_email_db = $row['Email'];
		$login_AccountId_db = $row['AccountId'];
		//var_dump($row);
	}*/


 ?>