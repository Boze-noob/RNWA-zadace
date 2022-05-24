<h1>Groups</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div style="overflow-x:auto;">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Vlasnik</th>
            <th>Ime</th>
            <th>Info</th>
            <th>Tip</th>
            <th>Članovi</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['groups'] as $row): ?>
            <tr>
                <td><?php echo $row->group_id ?></td>
                <td><?php echo $row->group_creator ?></td>
                <td><?php echo $row->group_name ?></td>
                <td><?php echo $row->group_info ?></td>
                <td><?php echo $row->group_type ?></td>
                <td>
                    <?php foreach ($row->group_members as $member): ?>
                    <?= $member->fullname.','?>
                    <?php endforeach; ?>
                </td>
                <td><a href="groups_edit?gid=<?php echo $row->group_id ?>" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="groups_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="gid" value="<?= $row->group_id ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>



