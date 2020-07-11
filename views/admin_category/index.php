<?php require_once(ROOT.'/views/layouts/admin_header.php');?>
<section>
    <div class="container">
        <div class="row">

            <a href="/admin/category/create" class="p-l-40"><i class="fa fa-plus"></i> Add category</a>
            
            <h4 style="padding-left:350px;">Categories list</h4>

            <table class="table" style="margin-top:50px;">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Order list</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($categoriesList as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['sort_order']; ?></td>  
                        <td><?php if($category['status'] == 1): echo 'Showing'; ?></td> 
                        <td><?php else: echo 'Disabled'; ?></td> 
                        <?php endif; ?>
                        <td><a href="/admin/category/update/<?php echo $category['id'];?>"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/category/delete/<?php echo $category['id'];?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
<?php require_once(ROOT.'/views/layouts/admin_footer.php');?>