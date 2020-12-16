<?php

function get_users_questions ($userId) {
    global $db;

    $query = 'SELECT * FROM questions WHERE ownerid = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

function get_all_questions () {
    global $db;

    $query = 'SELECT * FROM questions';
    $statement = $db->prepare($query);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

function create_question ($title, $body, $skills, $ownerid) {
    global $db;

    $query = 'INSERT INTO questions
                (title, body, skills, ownerid)
              VALUES
                (:title, :body, :skills, :ownerid)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->execute();
    $statement->closeCursor();
}

function update_question ($title, $body, $skills, $questionID) {
    global $db;

    $query = 'UPDATE questions               
              SET title = :title, body = :body, skills = :skills               
              WHERE  id = :questionID';
            /*
            update questions 
SET title = 'sql test', body='new body', skills='new skills'
Where id=3 */
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    $statement->bindValue(':questionID', $questionID);
    $statement->execute();
    $statement->closeCursor();
}

function delete_question ($questionId) {
    global $db;

    $query = 'DELETE FROM questions WHERE id = :questionId';
    $statement = $db->prepare($query);
    $statement->bindValue(':questionId', $questionId);
    $statement->execute();
    $statement->closeCursor();
}


function get_question($questionId){

        global $db;

        $query = "select * from questions where id=:questionId";
        $statement = $db->prepare($query); 
        $statement->bindValue(':questionId', $questionId);
        $statement->execute();
        
        $question = $statement->fetch();
        
        $statement->closeCursor();
        return $question;

    }
