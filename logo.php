<?php 
include('shared/auth.php');
$title = 'Add Page';
include('adminShared/header.php'); ?>
<section>
<form method="post" action="processimg.php" enctype="multipart/form-data">
<fieldset>
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" />
</fieldset>
<button type="submit">Submit</button>
</section>
</body>
</html>