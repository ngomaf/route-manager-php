<?php

    require_once DIR."src/views/header.php";
?>
    <a href="<?= URL ?>/projecto/tipo">« back</a>
    <h1>Projects about <?= $this->slug ?></h1>
    <p>This is a projects aboute <?= $this->slug ?> page.</p>

    <ul>
        <li><a href="<?= URL ?>/project/web-dev">Web dev</a></li>
        <li><a href="<?= URL ?>/project/php-dev">PHP dev</a></li>
        <li><a href="<?= URL ?>/project/python-dev">Python dev</a></li>
        <li><a href="<?= URL ?>/project/js-dev">JS dev</a></li>
        <li><a href="<?= URL ?>/project/Angular-js-dev">Angular JS dev</a></li>
        <li><a href="<?= URL ?>/project/ruby-dev">Ruby dev</a></li>
    </ul>

<?php require_once DIR."src/views/header.php"; ?>