<?php include('header.php'); ?>

    <h1>Add a new Question</h1>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="<?php echo $actionString; ?>">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <input type="hidden" name="id" value="<?php echo $questions['id']; ?>">

        <div class="form-group">
            <label for="title">Question Title</label>
            <input type="text" value="<?php echo $questions['title']; ?>" name="title">
        </div>

        <div class="form-group">
            <label for="body">Question Body</label>
            <input type="text" value="<?php echo $questions['body']; ?>" name="body">
        </div>


        <div class="form-group">
            <label for="skills">Question Skills</label>
            <input type="text" value="<?php echo $questions['skills']; ?>"name="skills">
        </div>

        <input type="submit" class="btn btn-primary" value="Add Question">


    </form>

<?php //include('abstract-views/footer.php'); ?>