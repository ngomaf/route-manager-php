<?php
    $title = $this->slug;
    require_once "../src/views/header.php";
?>
    <h1><?= $this->slug ?></h1>
    <p>This is a User page, you selected <?= $this->slug ?>.</p>

<?php require_once "../src/views/footer.php"; ?>