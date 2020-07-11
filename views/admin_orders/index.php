<?php require_once(ROOT.'/views/layouts/admin_header.php');?>
<section>
    <div class="container">
        <div class="row">
            
            <h4 style="padding-left:500px;">Orders list</h4>

            <table class="table" style="margin-top:50px;">
                <tr>
                    <th>Product id</th>
                    <th>Date</th>
                    <th>User id</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php if($order['status'] == 1): echo 'New order'; ?></td>  
                        <td><?php elseif($order['status'] == 2): echo 'Order in progress'; ?></td>
                        <td><?php else: echo 'Order complete'; ?></td>
                        <?php endif; ?>
                        <td><a href="/admin/orders/view/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/admin/orders/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/orders/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
<?php require_once(ROOT.'/views/layouts/admin_footer.php');?>