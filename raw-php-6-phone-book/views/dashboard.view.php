<?php if(if_flash_msg()) : ?>

    <p class="text-success">
        <strong><?php echo get_flash_msg(); ?></strong>
    </p>

<?php endif; delete_flash_msg(); ?>

<div class="tab-area">
    <a class="btn btn-primary" href="add-contact.php">Add New Contact</a>
    <br><br>
    <?php if( count($model) < 1 ) : ?>
        <div class="text-danger">
            <p>No contacts were found.</p>
        </div>
    <?php else : ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Name </th>
                <th>Designation </th>
                <th>Mobile </th>
                <th>Actions </th>
            </tr>
            <?php foreach($model as $contact) : ?>
            <tr>
                <td><?php echo $contact['title']; ?></td>
                <td><?php echo $contact['designation']; ?></td>
                <td><?php echo $contact['mobile']; ?></td>
                <td>
                    <a class="btn btn-primary" href="detail-contact.php?contact_id=<?= $contact['id'] ?>">Details</a>
                    <a class="btn btn-secondary" href="edit-contact.php?contact_id=<?= $contact['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="delete-contact.php?contact_id=<?= $contact['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>