<div class="p-4" style="position:fixed; z-index: 4;right: 0%;top: 0;width: 18%;">
	<div class="p-2 card bg-dark text-white scale-up-hor-right" style="width: 100%; height: 100%;">
		<form action="index.php" method="POST">
			<input hidden="true" value="true" name="destroy">
			<input type="submit" class="btn btn-sm btn-danger" value="Logout">
		</form>
		<div class="" >
			<?php echo "<p>".$_SESSION['username_Kairos']."</p>"; ?>
			<?php echo "<p>".$_SESSION['email_Kairos']."</p>"; ?>
			<?php
				//<a href="support/midlewares/entry.php?dashboard=true"><h4 class="bg-warning rounded" style="font-family: 'Cinzel', serif;">SUPPORT</h4></a>
			 ?>
			<a href="https://ntkairos.com/support/"><h4 class="bg-warning rounded" style="font-family: 'Cinzel', serif;">SUPPORT</h4></a>
			<h4 class="bg-success rounded" style="font-family: 'Cinzel', serif;">DONATIONS</h4>
			<div class="row pb-2">
				<div class=" col-6"><a href="../../api_rest/controller/api_payment_controller.php" class="pf pf-paysafecard" style="font-size: 40px"></a></div>
				<div class=" col-6"><a href="https://selly.gg/@Delynith" class="pf pf-paypal" style="font-size: 40px" disabled></a></div>
			</div>
		</div>
	</div>
	<div class="pt-4">
	<?php
		echo("<div class='row'>");
		if ($_SESSION['character_0']['class'] !== null) {
			switch ($_SESSION['character_0']['class']) {
			    case 0:
			        echo("<div class='col-6'><img src='../../img_class/0.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_0']['Name']."</p></div>");
			        break;
			    case 1:
			        echo("<div class='col-6'><img src='../../img_class/1.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_0']['Name']."</p></div>");
			        break;
			    case 2:
			        echo("<div class='col-6'><img src='../../img_class/2.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_0']['Name']."</p></div>");
			        break;
			    case 3:
			        echo("<div class='col-6'><img src='../../img_class/3.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_0']['Name']."</p></div>");
			        break;
				}
		}
		if ($_SESSION['character_1']['class'] !== null) {
			switch ($_SESSION['character_1']['class']) {
			    case 0:
			        echo("<div class='col-6'><img src='../../img_class/0.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_1']['Name']."</p></div>");
			        break;
			    case 1:
			        echo("<div class='col-6'><img src='../../img_class/1.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_1']['Name']."</p></div>");
			        break;
			    case 2:
			        echo("<div class='col-6'><img src='../../img_class/2.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_1']['Name']."</p></div>");
			        break;
			    case 3:
			        echo("<div class='col-6'><img src='../../img_class/3.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_1']['Name']."</p></div>");
			        break;
				}
			}
		echo("</div>");

		echo("<div class='row'>");
		if ($_SESSION['character_2']['class'] !== null) {
			switch ($_SESSION['character_2']['class']) {
			    case 0:
			        echo("<div class='col-6'><img src='../../img_class/0.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_2']['Name']."</p></div>");
			        break;
			    case 1:
			        echo("<div class='col-6'><img src='../../img_class/1.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_2']['Name']."</p></div>");
			        break;
			    case 2:
			        echo("<div class='col-6'><img src='../../img_class/2.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_2']['Name']."</p></div>");
			        break;
			    case 3:
			        echo("<div class='col-6'><img src='../../img_class/3.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_2']['Name']."</p></div>");
			        break;
			}
		}
		if ($_SESSION['character_3']['class'] !== null) {
			switch ($_SESSION['character_3']['class']) {
				    case 0:
				        echo("<div class='col-6'><img src='../../img_class/0.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_3']['Name']."</p></div>");
				        break;
				    case 1:
				        echo("<div class='col-6'><img src='../../img_class/1.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_3']['Name']."</p></div>");
				        break;
				    case 2:
				        echo("<div class='col-6'><img src='../../img_class/2.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_3']['Name']."</p></div>");
				        break;
				    case 3:
				        echo("<div class='col-6'><img src='../../img_class/3.png' width='100%' height='70%' alt='...' class='card bg-dark rounded-circle'><p>".$_SESSION['character_3']['Name']."</p></div>");
				        break;
					}
			}
		echo("</div>");
	 ?>
	</div>
</div>
