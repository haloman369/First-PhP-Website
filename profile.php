<?php

require('header.php');
$userId=$_GET["userId"];
?>


<nav>
    <ul>     
        <li>
            <a href="index.php">Home</a>
        </li>
    </ul>
</nav>


<?php
$query = "select * from questions where ownerid=:userId";

$statement = $db->prepare($query); 

// Bind Form Values to SQL
$statement->bindValue(':userId', $userId);


// Execute the SQL Query
$statement->execute();

$questions=$statement->fetchAll();

$statement->closeCursor();
//print_r($questions);


$query = "select fname, lname from accounts where id=:userId";
$statement = $db->prepare($query); 
$statement->bindValue(':userId', $userId);
$statement->execute();
$user=$statement->fetch();
$statement->closeCursor();
//print_r($user);


$f_name=$user['fname'];
$l_name=$user['lname'];
/*
echo $user['fname'];
echo $user['lname'];
echo $f_name;
echo $l_name;
*/

?>
<h4>Profile</h4>
<h1>Questions for User with ID and Name: <?php echo $userId . ', ' . $f_name . ' ' . $l_name; ?></h1>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Body</th>
        <th>Skills</th>
    </tr>
    <?php foreach ($questions as $question) : ?>
        <tr>
            <td><?php echo $question['id']; ?></td>
            <td><?php echo $question['title']; ?></td>
            <td><?php echo $question['body']; ?></td>
            <td><?php echo $question['skills']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>



<a href="forums.php?userId=<?php echo $userId; ?>">Add Question</a>

