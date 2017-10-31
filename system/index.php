<?php
/*
Basic login system.
This will incorpirate the login system.
*/
$error					= "";												// Variable to contain any error messages to display to the user
$errors					= 0;												// Variable to contain the amount of errors encountered

/*
Handle the form data submission
*/

if($_SERVER['REQUEST_METHOD'] == "POST"){// A form has been submitted to this page with method "post"
	if(isset($_POST['name'])){
		$name			= $_POST['name'];			// Save the posted name inside a variable
		$password	= $_POST['password'];	// Save the posted password inside a variable
	}
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/default.css" >
</head>
<body>
	<form method="POST" class="login">
		<span class="error"><?php echo $error; ?></span>
		<input type="text" name="name" value="" placeholder="Login Name" autofocus="autofocus">
		<input type="password" name="password" value="" placeholder="Password">
		<button type="submit">Login</button>
	</form>
</body>
</html>
