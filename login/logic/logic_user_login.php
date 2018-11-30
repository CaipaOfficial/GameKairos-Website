<?php

	//Inicio el log de erroes para el desarrollo
	$debug_log['fase1'] = true;
	//Aplico filtros de saneo a las strigs para bloquear sql injection
	$login_user = filter_var($_POST['userlogin'], FILTER_SANITIZE_STRING);
	$login_password = filter_var($_POST['Passwordlogin'], FILTER_SANITIZE_STRING);

	//FASE 2

	$debug_log['fase2'] = true;
	//Genero el cursor para la consulta sql
	$options =  array( "Scrollable" => SQLSRV_CURSOR_STATIC );
	//Genero parametros de la consulta Nombre y usario (Evita sql injection)
	$params_login_name = array($login_user, $login_user);
    //creacion consulta sql para verificar Email
    $sql_login = "SELECT AccountId, Name, Email, Password, Authority FROM account where Name = ? or Email = ?";
    //Ejecucion de la consulta sql
    $select_user = sqlsrv_query( $conn, $sql_login, $params_login_name, $options );
    //Revision de errores de la consulta al servidor a nivel de parametros o sql query si hay error lo imprimo en pantalla
    if( $select_user === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    $debug_log['fase3'] = true;
    //Revision si tenemos resultados (Gracias al cursor)
    if (sqlsrv_num_rows( $select_user) > 0) {
      	$error_login_log['Name'] = false; // Se a encontrado el nombre
      	$debug_log['fase4'] = true;
    }else {
    	$error_login_log['Name'] = true; // No se a encontrado la cuenta de usuario
    	$debug_log['fase4else'] = true;
    }

    //FASE 5

    //Extraigo las variables con un ciclo while verificando, esto gracias a la query de insert del register.php line: 72
    $debug_log['fase5'] = true;
    while( $row = sqlsrv_fetch_array( $select_user, SQLSRV_FETCH_ASSOC) ) {
		$login_user_db = $row['Name'];
		$login_password_db = $row['Password'];
		$login_email_db = $row['Email'];
		$login_AccountId_db = $row['AccountId'];
		$login_Authority_db = $row['Authority'];
		//var_dump($row);
		}



	//var_dump($login_password);
	//var_dump($_POST['Passwordlogin']);
	$verify = strtoupper(hash('sha512', $login_password));
	//$verify = password_verify(hash('sha512', $login_password), $login_password_db);
	//$nalgas = hash('sha512', $login_password);
	//var_dump($nalgas);
	//$verify = password_verify($login_password, $login_password_db);
	//var_dump($verify);


	$debug_log['fase6'] = true;
	if ($verify == strtoupper($login_password_db)) {
		$_SESSION['username_Kairos'] = $login_user_db;
		$_SESSION['email_Kairos'] = $login_email_db;
		$_SESSION['password_hash'] = $login_password_db;
		$_SESSION['AccountId_Kairos'] = $login_AccountId_db;
		$_SESSION['Authority'] = $login_Authority_db;
		$debug_log['fase7'] = true;
		//var_dump($_SESSION);
	}

	if ($_POST['support'] == true) {
			echo '<meta http-equiv="refresh" content="0; url="https://gamekairos.org/support/midlewares/entry.php">';
	}
 ?>
