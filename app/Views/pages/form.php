<?= \Config\Services::validation()->listErrors(); ?>

<form action='Create\submitted' method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <label for='myfile'>Select a file:</label>
    <br/>
    <input type='file' id='myfile' name='myfile'>
    <br/>
    <input type='submit' value="submit file">
</form>