<?php include('header.php'); ?>



<table>
    <tr>
        <th>Email</th>
        <th>Password</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birthday</th>
    </tr>
        <tr>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td><?php echo $user['fname']; ?></td>
            <td><?php echo $user['lname']; ?></td>
            <td><?php echo $user['birthday']; ?></td>
</table>

<?php //include('footer.php'); ?>