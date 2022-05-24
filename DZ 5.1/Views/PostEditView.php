<h1>Add new post</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container">
    <form action="posts_update" method="post">
        <input type="hidden" name="pid" value="<?= $data['post']->post_id ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-25">
                <label for="rid">Autor</label>
            </div>
            <div class="col-75">
                <select id="rid" name="rid">
                    <option value="-1" selected disabled>Odaberite autora</option>
                    <?php foreach ($data['authors'] as $author): ?>
                    <option value="<?=$author->rid?>" <?= $author->rid == $data['post']->post_author_id ? 'selected' : '' ?>><?=$author->fullname?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-25">
                <label for="pcontent">Sadržaj</label>
            </div>
            <div class="col-75">
                <textarea id="pcontent" name="pcontent" placeholder="Write something.." style="height:200px"><?= $data['post']->post_content ?></textarea>
            </div>
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>