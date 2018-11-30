<?php
require ('../../db/connect.php');

require ('../controller/pillory_controller.php');




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kairos Pillory</title>
    <?php require ('../../index-view/head-modular.php'); ?>
<!--     <link rel="stylesheet" href="style.css"> -->
  </head>
  <body style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmKHoMPS7hroIDbXjk1HSNr00LTYJbvDyNzGqfqGQppK53JgdG');">
    <div class="container-fluid p-5">
      <h1 class="name-server text-center" style="text-align: center;font-family: 'Cinzel', serif;font-size: 150px;color: white;background-color: #212529;">PILLORY</h1>
      <div class="p-5">
        <div class="row p-5">
          <table class="table table-dark col-10">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Admin</th>
                <th scope="col">Inicio</th>
                <th scope="col">Terminacion</th>
                <th scope="col">Nivel</th>
                <th scope="col">Razon</th>
              </tr>
            </thead>
            <tbody>        
            <?php 
            if ($_POST['name_pillory']) {
              $name = filter_var(htmlspecialchars($_POST['name_pillory']), FILTER_SANITIZE_STRING);

              $params = array($name);
              //creacion consulta sql para verificar Email
              $sql = "DELETE FROM CodesLog WHERE Codes = ?";
              //Ejecucion de la consulta sql
              $delete_code_donator = sqlsrv_query( $conn, $sql, $params_code_donate_delete, $options );
              //Revision de errores de la consulta al servidor a nivel de parametros o sql query si hay error lo imprimo en pantalla
              if( $delete_code_donator === false) {
                  die( print_r( sqlsrv_errors(), true) );
              }else{
                echo("COMPLETE");
              }

            }else {
              $sql = "SELECT * FROM PenaltyLog";
              $result = sqlsrv_query( $conn, $sql);
              $id = 0;
              while ($row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC )) {
                $AccountId = $row['AccountId'];
                $AdminName = $row['AdminName'];
                $DateEnd = (array) $row['DateEnd'];            
                $DateStart = (array) $row['DateStart'];
                $Penalty = $row['Penalty'];
                $Reason = $row['Reason'];

                $sqlname = "SELECT Name FROM Account WHERE AccountId = $AccountId";
                $stmt = sqlsrv_query( $conn, $sqlname);
                if( $stmt === false ) {
                  die( print_r( sqlsrv_errors(), true));
                }
                if( sqlsrv_fetch( $stmt ) === false) {
                  die( print_r( sqlsrv_errors(), true));
                }
                $name = sqlsrv_get_field( $stmt, 0);
                echo "<tr><td>$id</td><td>$name</td><td>$AdminName</td><td>".$DateEnd['date']."</td><td>".$DateStart['date']."</td><td>$Penalty</td><td>$Reason</td></tr>";
               
                $id = $id + 1;

              }
            }
             ?>
            </tbody>
          </table>
        </div>
      </div>
    </div> 
  </body>
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script>
    particlesJS.load('particles-js', 'particles.json', function(){
      console.log('particles.json loaded...');
    });
  </script>
</html>
