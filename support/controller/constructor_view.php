<?php
//Head
//require ('../../db/connect_codes.php');

//$options =  array( "Scrollable" => SQLSRV_CURSOR_STATIC );

//Dashboard function extrac data and make a two dimension array with information
//i am not sure if dashboard functio work into a admin session and user session aviliable for review
function dashboard($accountId, $authority){
  //is a private function need import the connection in all of the functios
  require ('../../db/connect_codes.php');
  //Is a simple sql select for all of rows in the tickets table but i make a filter by AccountId PD: i need chage this for administrator panel but its works now
  //60 90 100 110 Is a support Authority for manage
  if (($authority == 60) OR ($authority == 90) OR ($authority == 100) OR ($authority == 110)) {
    $sql = "SELECT * FROM tickets";
  }else {
    $sql = "SELECT * FROM tickets where AccountId = $accountId ";
  }

  //execute a sql query with sql access
  $stmt = sqlsrv_query( $conn, $sql);
  //verify if the sql query is okey else return error
  if( $stmt === false) {
      return print_r( sqlsrv_errors(), true);
  }
  //Data estructure fist i make a string for a <thead></thead>
  $thead = '
  <table class="table">
    <thead>
      <tr>
        <th scope="row">#</th>
        <th scope="row">id TICKET</th>
        <td>Description</td>
        <td>State</td>
        <td>Date</td>
        <td>Admin Name</td>
      </tr>
    </thead>
    <tbody>
  ';
  //data structure second i make a "footer" of the table but you know is only the end of </talbe> and </body>
  $tfooter = "
    </tbody>
  </table>
  ";
  //initialice a counter i dont know if i can initialice the counter into a while function
  $i = 0;
  //Start a $tbody Variable fot next merge all of <tr></tr>
  $tbody = "";
  //Start a cicle while with the data
  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
    //convert data objet to array fot print in window
    $date = (array)$row['date'];
    $tbody .= '
    <tr>
      <td>'.$i.'</td>
      <td>'.$row['_id'].'</td>
      <td>'.$row['description'].'</td>
      <td>'.$row['state'].'</td>
      <td>'.$date['date'].'</td>
      <td>'.$row['AdminName'].'</td>
    </tr>';
    //$tbody = $tbody.$tbodycache;  this is a other way for make a table
    $i = $i + 1;

    }

    //put the data rows into a structure
    $dashboard = $thead . $tbody . $tfooter;

    //return a data
    return $dashboard;
}


function send_ticket(){
  if (($_SESSION['log_error']['name'] == true) and ($_SESSION['log_error']['email'] == true) and ($_SESSION['log_error']['subjet'] == true) ) {
    echo '<p class="p-1 mb-1 bg-success text-white text-center">TICKET SEND CONGRATULATIONS</p>';
  }
}



 ?>
