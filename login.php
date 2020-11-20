<?php

require('pdo.php');

?>


<nav>
    <ul>     
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="register.php">Register</a>
        </li>
        <li>
            <a href="forums.php">Questions</a>
        </li>
    </ul>
</nav>

<h4>Login</h4>
<form method="POST">
	
	<label for="email">Email
	<input type="email" id="email" name="email" autocomplete="off" />
	</label>
	
	<label for="p">Password
	<input type="password" id="p" name="password" autocomplete="off"/>
	</label>
	
	<input type="submit" name="login" value="Login"/>
</form>

<?php


if(isset($_POST["login"])){
	if(isset($_POST["password"]) && isset($_POST["email"])){
		$password = $_POST["password"];
		$email = $_POST["email"];
			
			$errors = [];
			if(!strrpos ($email , '@' ) )
			{

				array_push($errors, "Invalid email");

			}
			
			if(empty($email)){

				array_push($errors, "Must enter email");

			}

			if(empty($password)){
	
				array_push($errors, "Must enter Password");
			}

			if(strlen($password) <= 8){

				array_push($errors, "Password must be 8 or more characters");
			}
			
			if(count($errors) > 0){

				echo var_export($errors);
				die();

			}
	}

	echo $email . "<br>";

	echo $password;
}
?>