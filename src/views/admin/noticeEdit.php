<?php

    require_once DIR."src/views/header.php";
?>
    <a href="<?= URL ?>/admin/noticia">« back</a>
    <h1>Edit notice</h1>
    <p>This page is to edit notice.</p>

    <form action="<?= URL ?>/admin/noticia/actualizar/rosa-fortuna-life" method="post">
        <label for="title">Title</label><br>
        <input type="text" name="title" id="title" placeholder="Rosa Fortuna life"><br>

        <label for="sub-title">Sub-title</label><br>
        <input type="text" name="sub-title" id="sub-title" placeholder="Rosa Fortuna life"><br>

        <label for="content">Content</label><br>
        <textarea name="content" id="content" cols="30" rows="10">
            Write here...
        </textarea>
        <br>
        
        <button type="submit">Update</button>
    </form>

<?php require_once DIR."src/views/header.php"; ?>