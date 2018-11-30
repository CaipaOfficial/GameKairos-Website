<?php
require ('../../db/connect_codes.php');

var_dump($_GET);
echo("<br>");

if (isset($_GET['Email']) and isset($_GET['PIN']) and isset($_GET['AccountId_Kairos']) and isset($_GET['state'])) {
	//var_dump($_GET);
	if ($_GET['state'] == 0) {
		switch ($_GET['value']) {
			case 10:
				$value = 10;
				$sql = "SELECT TOP 1 Codes FROM Codes_10";
				$querydel = "DELETE TOP 1 Codes from Codes_10";
				//break;
			case 25:
				$value = 25;
				$sql = "SELECT TOP 1 Codes FROM Code_25";
				$querydel = "DELETE TOP 1 Codes from Code_25";
				//break;
			case 50:
				$value = 50;
				$sql = "SELECT TOP 1 Codes FROM Codes_50";
				$querydel = "DELETE TOP 1 Codes from Codes_50";
				//break;
			case 100:
				$value = 100;
				$sql = "SELECT TOP 1 Codes FROM Codes_100";
				$querydel = "DELETE TOP 1 Codes from Codes_100";
				//break;

				$Email = $_GET['Email'];
				$Name = $_GET['AccountId_Kairos'];
				$Date = getdate();
				$Date = $Date['month'].$Date['mday'].$Date['year'];
				$PIN = $_GET['PIN'];
				$params_insert_sql = array($Name, $Email, $value, $PIN);
				$insert_sql = "INSERT INTO Donator_log (Name, Email, Amount, PIN, Date) VALUES (?, ?, ?, ?, GETDATE())";
				$Done = sqlsrv_query( $conn, $insert_sql, $params_insert_sql);
				if( $Done === false) {
						die( print_r( sqlsrv_errors(), true) );
				}
				var_dump($Done);

				$options =  array( "Scrollable" => SQLSRV_CURSOR_STATIC );
				//Genero parametros de la consulta Nombre y usario (Evita sql injection)
				$params = array($login_user, $login_user);
				//creacion consulta sql para verificar Email
				//$sql = "SELECT TOP 1 Codes FROM CodesLog";
				//Ejecucion de la consulta sql
				$select = sqlsrv_query( $conn, $sql, $params, $options );
				//Revision de errores de la consulta al servidor a nivel de parametros o sql query si hay error lo imprimo en pantalla
				if( $select === false) {
						die( print_r( sqlsrv_errors(), true) );
				}
				if( sqlsrv_fetch( $select ) === false) {
					die( print_r( sqlsrv_errors(), true));
				}
				$code = sqlsrv_get_field( $select, 0);

//$querydel = "DELETE TOP 1 Codes from CodesLog";
sqlsrv_query( $conn, $querydel, $params, $options );

	$PIN = $_GET['PIN'];
	$header = 'From: ' . "No-Reply@gamekairos.org" . " \r\n";
				$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
				$header .= "Mime-Version: 1.0 \r\n";
				$header .= "Content-Type: text/html; charset=utf-8";

				$to = $_GET['Email'];
				$PIN = $_GET['PIN'];
				$Email_user = $_GET['Email'];
				$AccountId_Kairos = $_GET['AccountId_Kairos'];
				$subject = "Paysafecard Kairos $AccountId_Kairos";
				$message = ("<html>
											<body>
												<h1>THANKS YOU</h1><br><br>
												<p>You transaction has been accepted with the pin number $PIN and your code to redeem is : $code </p><br><br>
												<p>For redeem this code, plese enter to the game and into de chat push this command "."$"."claimcode code</p>
												<a href='https://imgur.com/maNl368'>Example</a>
											</body>
										</html>");
				if (mail($to, $subject, utf8_decode($message), $header)) {
								echo("okey mail");
								}

				$params_code_donate_delete = array($Code);
				//creacion consulta sql para verificar Email
				$sql_code_data_delete = "DELETE FROM CodesLog WHERE Codes = ?"; //la consulta equivocada xd
				$sql_noseque = "DELETE TOP (1) FROM CodesLog";
				//Ejecucion de la consulta sql
				$delete_code_donator = sqlsrv_query( $conn, $sql_noseque, $params_code_donate_delete, $options );
				//Revision de errores de la consulta al servidor a nivel de parametros o sql query si hay error lo imprimo en pantalla
				if( $delete_code_donator === false) {
					echo("algo no sirvio bro");
						die( print_r( sqlsrv_errors(), true));
				}else{
					echo("COMPLETE");
				}
		}
	}

	if ($_GET['state'] == 1) {
                $PIN = $_GET['PIN'];
                $header = 'From: ' . "admin@gamekairos.org" . " \r\n";
                $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
                $header .= "Mime-Version: 1.0 \r\n";
                $header .= "Content-Type: text/plain";


                $to = $_GET['Email'];
                $PIN = $_POST['PIN'];
                $Email_user = $_GET['Email'];
                $AccountId_Kairos = $_GET['AccountId_Kairos'];
                $subject = "Paysafecard Kairos $AccountId_Kairos";
                $message = "Your transaction has been Declined with the pin number $PIN Your accound ID is $AccountId_Kairos";
                if (mail($to, $subject, utf8_decode($message), $header)) {
                        echo("okey mail deneid");
                        }
	}
}
 ?>
