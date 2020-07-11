<?php require_once(ROOT.'/views/layouts/admin_header.php');?>
<section>
    <div class="container">
        <div class="row">
            <h4>Hello admin!</h4>
        </div>
        <div class="row p-t-40">
            <p>Choose what you want to do:</p>
        </div>
            <ul>
                <li><a href="/admin/products">Products control</a></li>
                <li><a href="/admin/category">Category control</a></li>
                <li><a href="/admin/orders">Orders control</a></li>
            </ul>
            
        </div>
    </div>
    <?php require_once(ROOT.'/views/layouts/admin_footer.php');?>