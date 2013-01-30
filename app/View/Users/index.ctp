<h3>Users</h3>
<!-- Here's where we loop through our $posts array -->
<table style="width: 100%;" class="table-striped table-bordered">
<th>id</th>
<th>Username</th>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</ul>