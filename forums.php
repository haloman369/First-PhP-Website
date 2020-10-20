
<nav>
    <ul>     
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="login.php">Login</a>
        </li>
       <li>
            <a href="register.php">Register</a>
        </li>
    </ul>
</nav>

<h4>Forum</h4>
<form method="POST">
	
	<label for="questionName">Question Name
	<input type="questionName" id="questionName" name="questionName" autocomplete="off" />
	</label>
	
	<label for="questionBody">Question Body
	<input type="questionBody" id="questionBody" name="questionBody" autocomplete="off" />
	</label>

	<label for="questionSkills">Question Skills
	<input type="questionSkills" id="questionSkills" name="questionSkills" autocomplete="off" />
	</label>

	
	<input type="submit" name="forum" value="Forum"/>
</form>

<?php


if(isset($_POST["forum"])){
	if(isset($_POST["questionName"]) && isset($_POST["questionBody"]) && isset($_POST["questionSkills"])  ){

		$questionName = $_POST["questionName"];
		$questionBody = $_POST["questionBody"];
		$questionSkills = $_POST["questionSkills"];
			
			$errors = [];
			$skills = explode(',', $questionSkills);


			
			if(!strrpos ($questionSkills , ',' ) )
			{

				array_push($errors, "Needs a comma to seperate entries");

			}
			

			if(count($skills) < 2){

				array_push($errors, "You need to enter 2 or more skills");
			}

			if(empty($questionName)){

				array_push($errors, "Must enter a question name");

			}

			if(strlen($questionName) < 3 ){

				array_push($errors, "Question name must be 3 or more characters");

			}

			if(empty($questionBody)){

				array_push($errors, "Must have text in your question body");

			}

			if(strlen($questionBody) > 500){

				array_push($errors, "Question body must be less than 500 characters, Body is " . strlen($questionBody) . " characters");

			}

			if(empty($questionSkills)){

				array_push($errors, "Must enter skills");

			}
			
			if(count($errors) > 0){

				echo var_export($errors);
				die();

			}
	}

	echo "Question Name: " . $questionName . "<br>";
	echo "Question Body: ". $questionBody . "<br>";
	
	foreach ($skills as $skill) {

		echo $skill . "<br>";

	}

	for($i = 0; $i<count($skills); $i++){


		echo "Skill $i $skills[$i] <br>";
	}

	
}
?>