<?php

require('header.php');

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

	$query = "select * from accounts where email=:email and password=:password";

	$statement = $db->prepare($query); 

	// Bind Form Values to SQL
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);

    // Execute the SQL Query
    $statement->execute();

    $user = $statement->fetch();
    
    echo $user['email'];
    echo strcmp($user['email'],$email);
    if(strcmp($user['email'],$email)==0){
    	echo "strings are equal";
    	$userId = $user['id'];
        $statement->closeCursor();
        header("Location: profile.php?userId=$userId");
    }
    else{
    	echo "login name is not found in the database";
    	$statement->closeCursor();
        die();
    }

    $isValidLogin = count($user) > 0;
    if (!$isValidLogin) {
        $statement->closeCursor();
        die();
    } else {
        $userId = $user['id'];
        $statement->closeCursor();
        //header("Location: profile.php?userId=$userId");
    } 


}
?>