<?php


session_start();
session_re();



function session_re(){
  if (isset($_SESSION) and !empty($_SESSION)) {
    $entry_log['SESSION'] = true;
    require ('../controller/constructor_view.php');
    require ('phase_controller.php');
    require ('../view/support_system_view.php');

  }else {

    $entry_log['SESSION'] = false;
    require ('../view/support_login_view.php');

  }
}




 ?>
