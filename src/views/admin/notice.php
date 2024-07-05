<?php

    $title = 'Single notice page';
    require_once DIR."src/views/header.php";
?>
    <a href="<?= URL ?>/admin/noticia">« back</a>
    <h1><?= $title ?></h1>
    <p>This is a Single notice manage page.</p>
    <p>The called Slug is: <?= $this->slug ?>.</p>
    <br>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt illo et, iusto labore vitae, perspiciatis quam, corrupti cupiditate modi at quaerat eum libero voluptate ratione reprehenderit officiis dolores. Enim, quaerat.
    </p>

<?php require_once DIR."src/views/footer.php"; ?>