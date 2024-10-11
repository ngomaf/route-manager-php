<?php

    $title = 'Profile user';
    require_once "../src/views/header.php";
?>
    <a href="<?= URL ?>/admin">« back</a>

    <p class='msg'><?php if(isset($this->msg)) echo $this->msg; ?></p>

    <h1><?= $title ?></h1>
    <p>
        <a href="<?= URL ?>/admin/perfil/senha">Password</a> | 
        <a href="<?= URL ?>/admin/perfil/editar">Edit data user</a> | 
        <a href="<?= URL ?>/admin/perfil/foto">Profile photo</a>
    </p>
    <p>In future this will be beautful profile page.</p>

    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque excepturi eveniet cum perspiciatis est accusantium nesciunt mollitia ex natus, ducimus eaque nisi voluptas molestias? Perferendis minima quis quam delectus! Incidunt?
    </p>

<?php require_once "../src/views/footer.php"; ?>