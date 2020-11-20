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



?>
<h4>Profile</h4>
<h1>Questions for User with ID: <?php echo $userId; ?></h1>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Body</th>
    </tr>
    <?php foreach ($questions as $question) : ?>
        <tr>
            <td><?php echo $question['id']; ?></td>
            <td><?php echo $question['title']; ?></td>
            <td><?php echo $question['body']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>



<a href="forums.php?userId=<?php echo $userId; ?>">Add Question</a>

