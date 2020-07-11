<?php require_once(ROOT.'/views/layouts/admin_header.php');?>
<section>
    <div class="container">
        <div class="row">
            <div class="card card-4">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update order</h2>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-2" type="text" name="user_id" value="<?php echo $order['user_id'];?>" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-2" type="text" name="user_name" value="<?php echo $order['user_name'];?>" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-2" type="text" name="user_email" value="<?php echo $order['user_email'];?>" required>
                        </div>

                        <p class="p-t-20">Status</p>
                        <div class="input-group">
                            <select name="status" class="custom-select mr-sm-2">
                                <option value="1" <?php if($order['status'] == 1) echo 'selected="selected"';?>>New order</option>
                                <option value="2" <?php if($order['status'] == 2) echo 'selected="selected"';?>>Order in progress</option>
                                <option value="3" <?php if($order['status'] == 3) echo 'selected="selected"';?>>Order complete</option>
                            </select>
                        </div>
                        <div class="w-size1 trans-0-4">
                            <input type="submit" name="submit" class="btn btn-default flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" value="Save">
                        </div>
                    </form>
                </div>
            </div>

            </div>
            </div>
        </div>
    </div>
</section>
<?php require_once(ROOT.'/views/layouts/admin_footer.php');?>