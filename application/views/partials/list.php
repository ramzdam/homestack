<table class="table bootstrap-datatable countries">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>URL</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['link']; ?></td>
            <td>
                <button type="button" user-id="<?php echo $item['id']; ?>" class="btn edit btn-warning">Edit</button>
                <a href="/dashboard/delete/<?php echo $item['id']; ?>" class="btn btn-danger delete">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>