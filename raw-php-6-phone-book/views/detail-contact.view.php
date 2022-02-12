<div class="data-table">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Name: </th>
            <td><?= $model['title'] ?></td>
        </tr>
        <tr>
            <th>Designation: </th>
            <td><?= $model['designation'] ?></td>
        </tr>
        <tr>
            <th>Mobile: </th>
            <td><?= $model['mobile'] ?></td>
        </tr>
        <tr>
            <th>Telephone: </th>
            <td><?= $model['telephone'] ?></td>
        </tr>
        <tr>
            <th>Email: </th>
            <td><?= $model['email'] ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <a class="btn btn-secondary" href="edit-contact.php?contact_id=<?= $model['id'] ?>">Edit</a>
                <a class="btn btn-danger" href="delete-contact.php?contact_id=<?= $model['id'] ?>">Delete</a>
            </td>
        </tr>
    </table>
</div>