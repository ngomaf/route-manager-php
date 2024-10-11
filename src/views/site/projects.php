<?php

    $title = 'Projects Page';
    require_once "../src/views/header.php";
?>
    <a href="<?= URL ?>/admin">« back</a>
    <h1><?= $title ?></h1>
    <p>This is a Projects page.</p>

    <p><a href="<?= URL ?>/projecto/tipo">Types of projects</a></p>
    
    <ul>
        <li><a href="<?= URL ?>/project/web-dev">Web dev</a></li>
        <li><a href="<?= URL ?>/project/php-dev">PHP dev</a></li>
        <li><a href="<?= URL ?>/project/python-dev">Python dev</a></li>
        <li><a href="<?= URL ?>/project/js-dev">JS dev</a></li>
        <li><a href="<?= URL ?>/project/Angular-js-dev">Angular JS dev</a></li>
        <li><a href="<?= URL ?>/project/ruby-dev">Ruby dev</a></li>
    </ul>

<?php require_once "../src/views/footer.php"; ?>