
<?php
//require('header.php');
require('database.php');
require('accounts_db.php');
require('questions_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login': {
        include('login.php');
        break;
    }

    case 'validate_login': {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ($email == NULL || $password == NULL) {
            $error = 'Email and Password not included';
            include('error.php');
        } else {
            $userId = validate_login($email, $password);
            if ($userId == false) {
                header('Location: index.php?action=display_registration');
            } else {
                header("Location: .?action=display_questions&userId=$userId");
            }
        }

        break;
    }

    case 'display_registration': {
        include('registration.php');
        break;
    }

    case 'profile': {
        $userId = filter_input(INPUT_GET, 'userId');
        $user = get_user($userId);
        include('view_profile.php');
        break;
    }

    case'submit_registration':{
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $birthday = filter_input(INPUT_POST, 'birthday');
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

        if(empty($birthday)){

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
        register_user($email, $password, $firstName, $lastName, $birthday);
        header('Location: .?action=show_login');
        break;



    }

    case 'display_questions': {
        $userId = filter_input(INPUT_GET, 'userId');
        $listType = filter_input(INPUT_GET, 'listType');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=display_login');
        } else {
            $questions = ($listType === 'all') ?
                get_all_questions() : get_users_questions($userId);
            include('display_questions.php');
        }
        break;
    }

    case 'display_question_form': {
        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=display_login');
        } else {
            $actionString = 'submit_question';
            include('questions_form.php');
        }
        break;
    }

    case 'submit_question': {
        $userId = filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');
        if ($userId == NULL || $title == NULL || $body == NULL || $skills == NULL) {
            $error = 'All fields are required';
            include('error.php');
        } else {
            create_question($title, $body, $skills, $userId);
            header("Location: .?action=display_questions&userId=$userId");
        }

        break;
    }

    case 'delete_question': {
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = filter_input(INPUT_POST, 'userId');
        if ($questionId == NULL || $userId == NULL) {
            $error = 'All Fields are required';
            include('error.php');
        } else {
            delete_question($questionId);
            header("Location: .?action=display_questions&userId=$userId");
        }
        break;
    }
    


        case 'edit_question': {
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = filter_input(INPUT_POST, 'userId');
        if ($questionId == NULL || $userId == NULL) {
            $error = 'All Fields are required';
            include('error.php');
        } else {
            $questions= get_question($questionId);
            $actionString = 'update_question';
            include('questions_form.php');
        }
        break;
    }

     case 'update_question': {
        $userId = filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');
        if ($userId == NULL || $title == NULL || $body == NULL || $skills == NULL) {
            $error = 'All fields are required';
            include('error.php');
        } else {
            update_question($title, $body, $skills, $userId);
            header("Location: .?action=display_questions&userId=$userId");
        }

        break;
    }


    default: {
        $error = 'Unknown Action';
        include('error.php');
    }
}

?>

<!--
<html>
	<head>
		<title>Daniel Homepage</title>
	</head>
<body>

<nav>
    <ul>     
        <li>
            <a href="login.php">Login</a>
        </li>
        <li>
            <a href="register.php">Register</a>
        </li>
        <li>
            <a href="forums.php">Questions</a>
        </li>
    </ul>
</nav>


	<h4>Daniels Homepage in Folder IS218</h4>
	You can navigate from here to see the different forms with error checking!



	</body>
</html>
-->