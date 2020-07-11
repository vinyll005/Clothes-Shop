<?php require_once(ROOT.'/views/layouts/admin_header.php');?>

<section>
    <div class="container">
         <div class="row p-t-40">
            <h4>Delete product #<?php echo $id; ?></h4>
        </div>
        <div class="row p-t-40">
            <p>Are you sure you want to delete product?</p>
        </div>
        <div class="row">
            <form method="post">
                <input type="submit" class="btn btn-default p-t-40" style="background-color:red;" name="submit" value="Delete" />
            </form>
        </div>
    </div>
</section>

<?php require_once(ROOT.'/views/layouts/admin_footer.php');?>