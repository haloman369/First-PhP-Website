
<?php include('header.php'); ?>

    <h1>Registration</h1>

    <form action="index.php" method="post">
    <input type="hidden" name="action" value="register_user">

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="first_name" class="form-control" name="first_name" id="first_name">
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="last_name" class="form-control" name="last_name" id="last_name">
    </div>

     <div class="form-group">
        <label for="birthday">Birthday</label>
        <input type="date" class="form-control" name="birthday" id="birthday">
    </div>

    
  	 <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>

     <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


	

<?php //include('abstract-views/footer.php'); ?>