<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="style.css">
</head>

<body>


<div class="container">
	
	
		<form action="login.php" method="POST" class="center">
		<?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
		<h2 >User Login</h2>
			<div class="form-input">
				<input type="text" name="regno" placeholder=" Register Number " />	
			</div>
			<div class="form-input">
				<input type="password" name="pass" placeholder="password" />
			</div>
			<input type="submit" name="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
	<?php
		session_start();
		function session_register($regno){
			global $$regno;
			$_SESSION[$regno] = $$regno;
			$$regno = &$_SESSION[$regno]; 
		}

	?>

</body>
</html>