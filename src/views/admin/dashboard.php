<?php

    $title = 'Dashboard Page';
    require_once "../src/views/header.php";
?>
    <h1><?= $title ?></h1>
    <p>This is a dashboard page. Wellcome!</p>

    <p><a href="<?= URL ?>/admin/perfil">Profile user</a></p>
    <p><a href="<?= URL ?>/admin/utilizador">Se users</a></p>
    <p><a href="<?= URL ?>/admin/noticia">Notice</a></p>
    <p><a href="<?= URL ?>/admin/">Project</a></p>

<?php require_once "../src/views/footer.php"; ?>