<?php require_once(ROOT.'/views/layouts/admin_header.php');?>
<section>
    <div class="container">
        <div class="row">
            <div class="card card-4">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Add product</h2>
                    <form action="#" method="POST" enctype="multipart/form-data">

                        <div class="input-group">
                            <input class="input--style-2" type="text" name="name" placeholder="Name" value="" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-2" type="text" name="code" placeholder="Code" value="" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-2" type="text" name="price" placeholder="Price" value="" required>
                        </div>

                        <div class="input-group">
                        <select name="category_id" value="" class="custom-select mr-sm-2">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        </div>

                        <div class="input-group">
                            <input class="input--style-2" type="text" name="brand" placeholder="Brand" value="" required>
                        </div>

                        <div class="p-t-20">
                            <input type="file" name="image" placeholder="" value="">
                        </div>

                        <p class="p-t-20">Description</p>
                        <div class="input-group">
                            <textarea rows="12" cols="50" name="description" value="Description" required></textarea>
                        </div>

                        <p class="p-t-20">Availability</p>
                        <div class="input-group">
                            <select name="availability" class="custom-select mr-sm-2">
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <p class="p-t-20">New</p>
                        <div class="input-group">
                            <select name="is_new" class="custom-select mr-sm-2">
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <p class="p-t-20">Recommended</p>
                        <div class="input-group">
                            <select name="is_recommended" class="custom-select mr-sm-2">
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <p class="p-t-20">Status</p>
                        <div class="input-group">
                            <select name="status" class="custom-select mr-sm-2">
                                <option value="1" selected="selected">Showing</option>
                                <option value="0">Hidden</option>
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