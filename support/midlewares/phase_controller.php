<?php

function phase_dashboard(){
  if ($_GET['dashboard'] == true) {
    return true;
  }else {
    return false;
  }
}

function phase_newticket(){
  if ($_GET['new_ticket'] == true) {
    return true;
  }else {
    return false;
  }
}

function phase_ticket(){

  if ($_GET['new_ticket'] == "true") {
    return "True";
  }

  if ($_GET['new_ticket'] == "false") {
    return "False";
  }

}

function phase_verify_ticket(){
  if (isset($_POST['name']) AND !empty($_POST['name'])) {
    $_SESSION['log_error']['name'] = True;
    $_SESSION['log_error']['release'] = 1;
  }else {
    $_SESSION['log_error']['name'] = False;
  }

  if (isset($_POST['email']) AND !empty($_POST['email'])) {
    $_SESSION['log_error']['email'] = True;
    $_SESSION['log_error']['release'] = $_SESSION['log_error']['release'] + 1;
  }else {
    $_SESSION['log_error']['email'] = False;
  }


  if (isset($_POST['subjet']) AND !empty($_POST['subjet'])) {
    $_SESSION['log_error']['subjet'] = True;
    $_SESSION['log_error']['release'] = $_SESSION['log_error']['release'] + 1;

  }else {
    $_SESSION['log_error']['subjet'] = False;
  }


}












 ?>
