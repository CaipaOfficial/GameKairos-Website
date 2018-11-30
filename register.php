<?php 

//REVISAR SI NO HAY UNA SESION INICIAD PD: SERA PARA EL b

//ERROR LOG
$error_log['Email'] = false;
$error_log['Name'] = false;
$error_log['Password'] = false;

if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
  echo("<h2>Bienvenido $name</h2>");

//Dentro del elseif Reviso si las variables Name-Email-Password-Password1(password rewrite) Fueron enviadas

  } elseif (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['Password']) and isset($_POST['Password1'])) {

    
  //Si se confirma que se enviaron las variables La saneo para evitar codigo injectado

  $Name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);    // Username
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);  // Email
  $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);   // Password
  $Password1 = filter_var($_POST['Password1'], FILTER_SANITIZE_STRING); // Password1
  $ip = $_SERVER['REMOTE_ADDR'];

  //PRUEBA
  //$link_confirmation = 'http://localhost/Shards-Version-2.0.2/index.php?name=asdasd&email=jfernandorojasc%40gmail.com&Password=asdasd&Password1=1234948&';
  //PRUEBA
  
  if ($Password == $Password1){
  }else{
    $error_log['Password'] = true;
  }
  //Revision si los dos password ingresados coiciden
  if (true) {
    //Si son identicos inicializo el punto del array error_log['Password'] en false
    
    $PasswordHash = hash('sha512', $Password);
    $options =  array( "Scrollable" => SQLSRV_CURSOR_STATIC );
    //Creo los parametros de la consulta sql (evitar inyeccion de codigo)
    $paramsToSelectname = array($Name);
    //creacion consulta sql para verificar Nombre
    $sqlname = "SELECT Name FROM account where Name = ? ";
    $selectname = sqlsrv_query( $conn, $sqlname, $paramsToSelectname, $options );
    if( $selectname === false) {
        die( print_r( sqlsrv_errors(), true) );
    } 

    //Creo los parametros de la consulta sql (evitar inyeccion de codigo)
    $paramsToSelectemail = array($email);
    //creacion consulta sql para verificar Email
    $sqlemail = "SELECT Email FROM account where Email = ? ";
    $selectemail = sqlsrv_query( $conn, $sqlemail, $paramsToSelectemail, $options );
    if( $selectemail === false) {
        die( print_r( sqlsrv_errors(), true) );
    }

    //Reviso si no estan registrados

    if (sqlsrv_num_rows( $selectemail ) > 0) {
      $error_log['email'] = true; // Conicidencia encontrada en nombre     
    }
   
    if (sqlsrv_num_rows( $selectname ) > 0) {
      $error_log['Name'] = true; // Conicidencia encontrada en email     
    }

    //echo var_dump($error_log); 


    if (($error_log['Email'] == false) and ($error_log['Name'] == false) and ($error_log['Password'] == false)) {
      $sqlInsert = "INSERT INTO Account (Authority, Email, Name, Password, RegistrationIP, VerificationToken) VALUES ( 0 , ? , ? , ? , ?, 'yes')";
      $paramsToInsert = array($email, $Name, $PasswordHash, $ip);
      $insert = sqlsrv_query ( $conn, $sqlInsert, $paramsToInsert);
      if( $insert === false) {
        die( print_r( sqlsrv_errors(), true) );
      }else {
        $_SESSION['username_Kairos'] = $Name;
        $_SESSION['email_Kairos'] = $email;
        $_SESSION['ip_client_Kairos'] = $ip;
      }
    } else{?>

          <div class="row mb-2 card">
            <br>
            <div class="col-12">
              <form action="index.php" method="POST" class="was-validated">
                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-user"></i>
                        </span>
                      </span>
                      <input type="text" class="form-control" id="form2-username" placeholder="Username" name="name" required>                      
                    </div>
                    <?php if($error_log['Name'] == true){ echo "<p class='p-1 mb-1 bg-danger text-white'>Este Usuario ya se encuentra registrado</p>";}?>
                    <br>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-user"></i>
                        </span>
                      </span>
                      <input type="email" class="form-control" id="form2-username" placeholder="Email" name="email" required>                      
                    </div>
                    <?php if($error_log['Email'] == true){ echo "<p class='p-1 mb-1 bg-danger text-white'>Este correo ya se encuentra registrado</p>";}?>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group">
                      <input type="Password" class="form-control" id="form3-password" placeholder="Password" required name="Password">
                      <span class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-lock"></i>
                        </span>
                      </span>
                    </div>
                    <?php if($error_log['Password'] == true){ echo "<p class='p-1 mb-1 bg-danger text-white'>Las contraseñas no coinciden</p>";}?>
                    <br>
                     <div class="input-group">
                      <input type="Password" class="form-control" id="form3-password" placeholder=" Confirm Password" required name="Password1">
                      <span class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-lock"></i>
                        </span>
                      </span>
                    </div>
                    <?php if($error_log['Password'] == true){ echo "<p class='p-1 mb-1 bg-danger text-white'>Las contraseñas no coinciden</p>";}?>
                  </div>
                </div>
                <?php echo "$RegInfo"; ?>
                <div class="g-recaptcha" data-sitekey="6Levj2oUAAAAAFcLb8CmiL10yL2jxAe2P8evXrjR"></div><br>
                <button class="btn btn-success center-block p-2">Registro</button>
              </form>
            </div>
            <br>
          </div>
  <?php
     }
  } 
  ?>
  <div class="row mb-2 card">
    <br>
    <div class="col-12">      
    </div>    
  </div>
  <?php
}else{
  //echo var_dump($error_log);
 ?>   

          <div class="row mb-2 card">
            <br>
            <div class="col-12">
              <form action="index.php" method="POST" class="was-validated">
                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-user"></i>
                        </span>
                      </span>
                      <input type="text" class="form-control" id="form2-username" placeholder="Username" name="name" required>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-user"></i>
                        </span>
                      </span>
                      <input type="email" class="form-control" id="form2-username" placeholder="Email" name="email" required>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group">
                      <input type="Password" class="form-control" id="form3-password" placeholder="Password" required name="Password">
                      <span class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-lock"></i>
                        </span>
                      </span>
                    </div>
                    <br>
                     <div class="input-group">
                      <input type="Password" class="form-control" id="form3-password" placeholder=" Confirm Password" required name="Password1">
                      <span class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-lock"></i>
                        </span>
                      </span>
                    </div>
                  </div>
                </div>
                <?php echo "$RegInfo"; ?>
                <div class="g-recaptcha" data-sitekey="6Levj2oUAAAAAFcLb8CmiL10yL2jxAe2P8evXrjR"></div><br>
                <button class="btn btn-success center-block p-2">Registro</button>
              </form>
            </div>
            <br>
          </div>

          
<?php 
}
 ?>
          



          