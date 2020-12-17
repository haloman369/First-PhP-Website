<?php


class AccountsDB{

    public static function validate_login($email $password){

        global $db;
        $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';

        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();

        $user = $statement->fetch();
        $statement->closeCursor();


        if(count($user)>0){
            $user = new Account($user['id'], $user['email'], $user['fname'], $user['lname'], $user['phoneNumber'], $user['birthday'], $user['password'])
            return $user;
        }
        else{
            return false;
        }

    }




}

/*function validate_login($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';

    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();

    $user = $statement->fetch();


    echo strcmp($user['email'],$email);
    if(strcmp($user['email'],$email)==0){
        echo "strings are equal";
        $userId = $user['id'];
        $statement->closeCursor();
        return $userId;
        //header("Location: profile.php?userId=$userId");
    }
    else{
        
        //echo "login name is not found in the database";
        $statement->closeCursor();
        return false;
        //die();
    }



    $isValidLogin = count($user) > 0;
    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    } else {
        $userId = $user['id'];
        $statement->closeCursor();
        return $userId;
    }
}
*/

function register_user($email, $password, $firstName, $lastName, $birthday) {

    global $db;

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



    }

    function get_user($userId){

        global $db;

        $query = "select * from accounts where id=:userId";
        $statement = $db->prepare($query); 
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        
        $user = $statement->fetch();
        
        $statement->closeCursor();
        return $user;

    }