<div class="p-4" style="position:absolute; z-index: 2;right: 0%;">

	<div class="p-2 card" style="width: 100%; height: 100%;">
		<p>
			<div>
				<?php echo "<h5>".$_SESSION['username_Kairos']."</h5>"; ?>
				<?php echo "<h5>".$_SESSION['email_Kairos']."</h5>"; ?>
				<?php echo "<h5>".$_SERVER['REMOTE_ADDR']."</h5>"; ?>
			</div>
			<form action="index.php" method="POST">
				<input hidden="true" value="true" name="destroy">
				<input type="submit" class="btn btn-danger btn-sm">
			</form>			
		</p>
<!-- 
		$_SESSION['username'] = $login_user_db;
		$_SESSION['Email'] = $login_email_db; -->
	</div>
	
</div>