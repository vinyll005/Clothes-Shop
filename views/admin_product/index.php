<?php require_once(ROOT.'/views/layouts/admin_header.php');?>
<section>
    <div class="container">
        <div class="row">

            <a href="/admin/products/create" class="p-l-40"><i class="fa fa-plus"></i> Add product</a>
            
            <h4 style="padding-left:350px;">Products list</h4>

            <table class="table" style="margin-top:50px;">
                <tr>
                    <th>Id</th>
                    <th>Article</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>  
                        <td><a href="/admin/products/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/products/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
<?php require_once(ROOT.'/views/layouts/admin_footer.php');?>