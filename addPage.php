<?php 
include('shared/auth.php');
$title = 'Add Page';
include('adminShared/header.php'); ?>

<h2>Add a New Page</h2>
<form method="post" action="insert-page.php">
    <fieldset>
        <label for="pageName">Title: *</label>
        <input name="pageName" id="pageName" required />
    </fieldset>
    <fieldset>
        <label for="content">Content: *</label>
        <textarea name="content" id="content" required></textarea>
    </fieldset>
   <button>Submit</button>
</form>
</main>
</body>
</html>