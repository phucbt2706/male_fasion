<?php
    get_header();
?>
<?php
    // show_array($_SESSION);
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="#">Home</a>
                        <a href="#">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <?php 
    if (!empty($lists_pro_cart)) {
        ?>
        <div class="row">
            <div class="col-xl-8">
                <!-- <form action="?mod=cart&act=update" method="post"> -->
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Thông tin</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lists_pro_cart as $item) {
                                    extract($item);
                                    ?>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img class="img_product" src="content/images/<?= $images ?>" alt="">
                                        </div>

                                    </td>
                                    <td>
                                        <div class="product__cart__item__text">
                                            <h6><?= $product_name ?></h6>
                                            <h5 ><?= currency_format($price) ?></h5>
                                        </div>
                                    </td>
                                    <input id="price" hidden value="<?= $price ?>" >
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <!--class= "pro-qty-2" -->
                                            <div>
                                                <input type="number" data-id="<?= $product_id ?>" class="qty" name="qty[<?= $product_id ?>]" min="1" max="20" value="<?= $qty ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td id="sub-total-<?= $product_id ?>"  class="cart__price"><?= currency_format($sub_total) ?></td>
                                    <td class="cart__close"><button class="delete" data-id="<?= $product_id ?>"><i class="fa fa-close"></i></button></td>
                                </tr>
                                <?php   
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                <!-- </form> -->
            </div>
            <div class="col-xl-4">
                <div class="cart__discount">
                    <h6>Mã giảm giá</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Áp dụng</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Giỏ hàng</h6>
                    <ul>

                        <!-- <li>Subtotal <span>$ 169.50</span></li> -->
                        <!-- <li>Tổng <span><aa?= currency_format( get_total_cart()) ?></span></li> -->
                        <li>Tổng <span id="total"><?= currency_format( get_total_cart())?></span></li>
                    </ul>
                    <a href="?mod=cart&act=delete" class="primary-btn">Check Out</a>
                </div>
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="row">
            <div class="col-12">
                <h2>Giỏ hàng trống</h2>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
</section>
<!-- Shopping Cart Section End -->
<?php
    get_footer();
?>