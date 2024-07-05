<?php

    $title = 'Projects types';
    require_once DIR."src/views/header.php";
?>
    <a href="<?= URL ?>/projecto">« back</a>
    <h1><?= $title ?></h1>
    <p>This is a projects types page.</p>
    
    <ul>
        <li><a href="<?= URL ?>/projecto/tipo/tic">TIC</a></li>
        <li><a href="<?= URL ?>/projecto/tipo/agrario">Agrario</a></li>
        <li><a href="<?= URL ?>/projecto/tipo/artistico">Artistico</a></li>
    </ul>

<?php require_once DIR."src/views/footer.php"; ?>