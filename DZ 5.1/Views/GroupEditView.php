
<h1>Edit group</h1>

<?php
/** @var $data */
print_r($data);
?>

<div class="container">
    <form action="groups_update" method="post">
        <input type="hidden" name="gid" value="<?= $data['group']->group_id ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-25">
                <label for="rid">Vlasnik</label>
            </div>
            <div class="col-75">
                <select id="rid" name="rid">
                    <option value="-1" selected disabled>Odaberite vlasnika</option>
                    <?php foreach ($data['authors'] as $author): ?>
                        <option value="<?=$author->rid?>" <?= $author->rid == $data['group']->group_creator_id ? 'selected' : '' ?> ><?=$author->fullname?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <label for="grpname">Naziv</label>
            <input type="text" class="form-control" name="grpname" value="<?= $data['group']->group_name ?>">
        </div>
        <br><br>
        <div class="row">
            <div class="col-25">
                <label for="grpinfo">Info</label>
            </div>
            <div class="col-75">
                <textarea id="grpinfo" name="grpinfo" placeholder="Write something.." style="height:200px"><?= $data['group']->group_info ?></textarea>
            </div>
        </div>
        <br><br>
        <div class="row">
            <label for="grptype">Tip</label>
            <input type="text" class="form-control" name="grptype" id="grptype" value="<?= $data['group']->group_type ?>">
        </div>
        <br><br>

        <div class="row">
            <div class="col-25">
                <label for="rid">Članovi</label>
            </div>
            <div class="col-75">
                <select multiple id="members[]" name="members[]">
                    <option selected disabled>Odaberite članove</option>
                    <?php foreach ($data['authors'] as $author): ?>
                        <option value="<?=$author->rid?>" <?= in_array($author, $data['group']->group_members) ? 'selected' : '' ?> ><?=$author->fullname?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>