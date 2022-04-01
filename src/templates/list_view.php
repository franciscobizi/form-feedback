
<div class="fbf-container-list">
    <h3>Feedback list</h3>
    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
            </tr>
            <?php foreach ($res as $list):?>
            <tr>
                <td><?php echo $list->id;?></td>
                <td><?php echo $list->name;?></td>
                <td><?php echo $list->email;?></td>
                <td><?php echo $list->phone;?></td>
                <td><?php echo $list->created_at;?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>