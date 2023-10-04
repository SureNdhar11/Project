


<!DOCTYPE html>
<html>
<head>
	<title> YOUR RESULT</title>
	<link rel="stylesheet" a href="style.css">
	
</head>
<script language="javascript">
function check(form)/*function to check userid & password*/
{
 /*the following code checkes whether the entered userid and password are matching*/
 if(form.regno.value == "admin" && form.pass.value == "1234")
  {
    window.open('adminhome.php')/*opens the target page while Id & password matches*/
  }
 else
 {
   alert("Error Password or Register Number")/*displays error message*/
  }
}
</script>
<body>
    <center>
        
        

		<div class="container">		
<form name ="login"  method="POST" class="center">
<h2 >Admin Login</h2>	
            <div class="form-input">
				<input type="text" name="regno" placeholder=" ID Number " />	
			</div>
			<div class="form-input">
				<input type="password" name="pass" placeholder="password" />
			</div>
			<button type="submit" onclick="check(this.form)" class="btn-login">LOGIN</button>
			</form>


		</div>
</center>
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
