<?php include('header.php'); ?>
<a href=".?action=display_questions&userId=<?php echo $userId; ?>&listType=mine">Display Questions</a>
<table>
<tr>	
<th>Name</th>
<th>Body</th>
<th>Skills</th>
</tr>

<td><?php echo $questions['title']; ?><br></td>
<td><?php echo $questions['body']; ?></td>
<td><?php echo $questions['skills']; ?></td>

</table>