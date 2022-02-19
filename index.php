<?php
require 'includes/header.php';
include 'includes/class/Model.php';
$model = new Model();
$insert = $model->insert();
?>
    <h1>Hello world</h1>
    <form action="" method="post">
        <input type="text">
        <input type="submit" name="submit">
    </form>
<?php require 'includes/footer.php'; ?>