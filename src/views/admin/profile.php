<?php

    require_once DIR."src/views/header.php";
?>
    <a href="<?= URL ?>/admin">« back</a>

    <p><?php if(isset($this->msg)) echo $this->msg; ?></p>

    <h1>Profile user</h1>
    <p>
        <a href="<?= URL ?>/admin/profile/password">Password</a> | 
        <a href="<?= URL ?>/admin/profile/edit">Edit data user</a> | 
        <a href="<?= URL ?>/admin/profile/photo">Profile photo</a>
    </p>
    <p>In future this will be beautful profile page.</p>

    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque excepturi eveniet cum perspiciatis est accusantium nesciunt mollitia ex natus, ducimus eaque nisi voluptas molestias? Perferendis minima quis quam delectus! Incidunt?
    </p>

<?php require_once DIR."src/views/header.php"; ?>