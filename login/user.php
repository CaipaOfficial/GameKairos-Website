  <?php  
//var_dump($_POST);


//Reviso si las variables esta iniciadas y si estas mismas no estan vacias
if ((isset($_POST["userlogin"]) && !empty($_POST["userlogin"])) and (isset($_POST["Passwordlogin"]) && !empty($_POST["Passwordlogin"]))) {
	require ('login/logic/logic_user_login.php');	
}
//Si ya hay una session iniciada llamo Llamo la vista de user
if (isset($_SESSION['username_Kairos'])) {

	//Scripts
	require ('login/logic/logic_user_login_characters.php');
	//Scripts
  	require ('view/view_card_user.php');

	//Si no la vista de login otra vez
  
}else{
  require ('view/user_login_form_view.php');
}
//var_dump($debug_log);

   ?>



