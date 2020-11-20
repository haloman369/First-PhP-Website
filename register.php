
<nav>
    <ul>     
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="login.php">Login</a>
        </li>
        <li>
            <a href="forums.php">Questions</a>
        </li>
    </ul>
</nav>

<h4>Register</h4>
<form method="POST">
	
	<label for="first_name">First Name
	<input type="text" id="first_name" name="first_name" autocomplete="off" />
	</label>
	
	<label for="last_name">Last Name
	<input type="text" id="last_name" name="last_name" autocomplete="off" />
	</label>

	<label for="birthday">Birthday
	<input type="date" id="birthday" name="birthday" autocomplete="off" />
	</label>

	<label for="email">Email
	<input type="email" id="email" name="email" autocomplete="off" />
	</label>

	<label for="p">Password
	<input type="password" id="p" name="password" autocomplete="off"/>
	</label>
	
	<input type="submit" name="register" value="Register"/>
</form>

<?php


if(isset($_POST["register"])){
	if(isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["birthday"])  ){
		$password = $_POST["password"];
		$email = $_POST["email"];
		$firstName = $_POST["first_name"];
		$lastName = $_POST["last_name"];
		$birthday = $_POST["birthday"];
			
			$errors = [];
			if(!strrpos ($email , '@' ) )
			{

				array_push($errors, "Invalid email");

			}
			
			if(empty($email)){

				array_push($errors, "Must enter email");

			}

			if(empty($firstName)){

				array_push($errors, "Must enter your first name");

			}

				if(empty($lastName)){

				array_push($errors, "Must enter your last name");

			}

				if(empty($birt)){

				array_push($errors, "Must enter your birthday");

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

	$query = 'INSERT INTO accounts
            (email, fname, lname, birthday, password)
          VALUES
            (:email, :fname, :lname, :birthday, :password)';

    // Create PDO Statement
    $statement = $db->prepare($query);

    // Bind Form Values to SQL
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $firstName);
    $statement->bindValue(':lname', $lastName);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':password', $password);

    // Execute the SQL Query
    $statement->execute();

    // Close the database
    $statement->closeCursor();

	echo $firstName . "<br>";
	echo $lastName . "<br>";
	echo $birthday . "<br>";
	echo $email . "<br>";
	echo $password . "<br>";
}
?>