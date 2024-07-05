<?php

    $title = 'Single notice Page';
    require_once DIR."src/views/header.php";
?>
    <h1><?= $title ?></h1>
    <p>This is a Single notice page.</p>
    <p>The called Slug is: <?= $this->slug ?>.</p>

<?php require_once DIR."src/views/footer.php"; ?>