<?php include ROOT . '/views/layouts/admin_header.php'; ?>

<section>
    <div class="container">
        <div class="row">


            <h4 style="padding-left:520px;">Order #<?php echo $order['id']; ?></h4>

            <table class="table" style="margin-top:50px;">
                <tr>
                    <td>Order id</td>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Client id</td>
                    <td><?php echo $order['user_id']; ?></td>
                </tr>
                <tr>
                    <td>Client name</td>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Client email</td>
                    <td><?php echo $order['user_email']; ?></td>
                </tr>
                <tr>
                    <td><b>Order status</b></td>
                    <?php if($order['status'] == 1): ?>
                        <td>New order</td>  
                        <?php elseif($order['status'] == 2): ?>
                            <td>Order in progress</td>
                        <?php else: ?>
                        <td>Order complete</td>
                        <?php endif; ?>
                </tr>
                <tr>
                    <td><b>Order date</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>

            <table class="table"style="margin-top:50px;" >
                <tr>
                    <th>Product id</th>
                    <th>Product article</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td><?php echo $productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>


</section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>