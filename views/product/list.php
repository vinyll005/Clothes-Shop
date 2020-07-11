<?php require_once(ROOT.'/views/layouts/header.php');?>
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
    style="background-image: url(/template/images/main2.jpg);">
    <h2 class="l-text2 t-center">
    <?php  echo $category['name'];?>
    </h2>
    <p class="m-text13 t-center">
        New Arrivals <?php  echo $category['name'];?> Collection 2020
    </p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Categories
                    </h4>

                    <ul class="p-b-54">

                        <li class="p-t-4">
                            <a href="/products" class="s-text13 active1">
                                All
                            </a>
                        </li>

                        <?php foreach($categoriesList as $category): ?>
                        <li class="p-t-4">
                            <a id="category<?php echo $category['id'];?>" value="<?php echo $category['id'];?>" href="/products/category/<?php echo $category['id'];?>" class="s-text13 active1 categoryChange">
                                <?php echo $category['name']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <!--  -->
                    <h4 class="m-text14 p-b-32">
                        Filters
                    </h4>

                    <div class="filter-price p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-17">
                            Price
                        </div>

                        <div class="wra-filter-bar">
                            <div id="filter-bar"></div>
                        </div>

                        <div class="flex-sb-m flex-w p-t-16">
                            <div class="w-size11">
                                <!-- Button -->
                                <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                    Filter
                                </button>
                            </div>

                            <div class="s-text3 p-t-10 p-b-10">
                                Range: $<span id="value-lower"></span> - $<span id="value-upper"></span>
                            </div>
                        </div>
                    </div>

                    <div class="filter-color p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-12">
                            Color
                        </div>

                        <ul class="flex-w" id="color">

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter2" type="radio"
                                    name="colors" value="blue">
                                <label class="color-filter color-filter2" for="color-filter2"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter3" type="radio"
                                    name="colors" value="orange">
                                <label class="color-filter color-filter3" for="color-filter3"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter4" type="radio"
                                    name="colors" value="red">
                                <label class="color-filter color-filter4" for="color-filter4"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter5" type="radio"
                                    name="colors" value="brown">
                                <label class="color-filter color-filter5" for="color-filter5"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter6" type="radio"
                                    name="colors" value="black">
                                <label class="color-filter color-filter6" for="color-filter6"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter7" type="radio"
                                    name="colors" value="grey">
                                <label class="color-filter color-filter7" for="color-filter7"></label>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!--  -->
                <div class="flex-sb-m flex-w p-b-35">
                    <div class="flex-w">
                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select id="sort" class="selection-2 form-control" name="sort">
                                <option value="id-desc">Default Sorting</option>
                                <option value="price-asc">Price: low to high</option>
                                <option value="price-desc">Price: high to low</option>
                            </select>
                        </div>

                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select class="selection-2" name="sorting">
                                <option>Price</option>
                                <option>$0.00 - $50.00</option>
                                <option>$50.00 - $100.00</option>
                                <option>$100.00 - $150.00</option>
                                <option>$150.00 - $200.00</option>
                                <option>$200.00+</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Product -->
                <div class="row">
                    <!-- Block2 -->
                    <?php foreach($latestProducts as $product): ?>
                        
                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50 gallery">
                        <div class="block2">
                            <div class="sameImg block2-img wrap-pic-w of-hidden pos-relative 
                        <?php if($product['is_new'] == 1):?>block2-labelnew<?php endif;?>">
                                <img src="/template/images/products/<?php echo $product['id'];?>.jpg" alt="IMG-PRODUCT">
                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button data-id="<?php echo $product['id'];?>" class="add-to-cart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block2-txt p-t-20">
                                <a href="/products/<?php echo $product['id'];?>" class="block2-name dis-block s-text3 p-b-5">
                                    <?php echo $product['brand'];?>
                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    $<?php echo $product['price'];?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>

                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-t-26">
                    <!-- <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                    <a href="#" class="item-pagination flex-c-m trans-0-4">2</a> -->
                    <?php echo $pagination->get();?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once(ROOT.'/views/layouts/footer.php');?>