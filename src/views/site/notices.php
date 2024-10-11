<?php

    $title = 'Nitices Page';
    require_once "../src/views/header.php";
?>
    <h1><?= $title ?></h1>
    <p>This is a Nitices page.</p>

    <p>
        <a href="<?= URL ?>/noticia/categoria/jogo">Game</a> | 
        <a href="<?= URL ?>/noticia/categoria/ciencia">Science</a> | 
        <a href="<?= URL ?>/noticia/categoria/arte">Art</a>
    </p>
    
    <ul>
        <li><a href="<?= URL ?>/rose-fortuna-life">Rose Fortuna life</a></li>
        <li><a href="<?= URL ?>/rose-fortuna-life">Rose Fortuna life</a></li>
        <li><a href="<?= URL ?>/rose-fortuna-life">Rose Fortuna life</a></li>
        <li><a href="<?= URL ?>/rose-fortuna-life">Rose Fortuna life</a></li>
        <li><a href="<?= URL ?>/rose-fortuna-life">Rose Fortuna life</a></li>
    </ul>

<?php require_once "../src/views/footer.php"; ?>