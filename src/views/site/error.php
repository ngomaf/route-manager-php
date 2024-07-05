<?php
    $title = '404';
    require_once DIR."src/views/header.php";
?>
    <div class="error">
        <h1><?= $title ?></h1>
        <p>Error 404. Page not found.</p>
    </div>

<?php require_once DIR."src/views/footer.php"; ?>