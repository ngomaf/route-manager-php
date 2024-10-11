<?php
    $title = 'Profile edit password';
    require_once "../src/views/header.php";
?>
    <a href="<?= URL ?>/admin/profile">« back</a>
    <h1><?= $title ?></h1>
    <p>This page is to edit password to logued user.</p>

    <form action="<?= URL ?>/admin/profile/password/update/rosa-fortuna" method="post">
        <label for="user">User name</label><br>
        <input type="text" name="user" id="user" placeholder="your.user"><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" placeholder="*****"><br><br>

        <button type="submit">Update</button>
    </form>

<?php require_once "../src/views/footer.php"; ?>