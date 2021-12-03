<?php


function console_log($data)
{
    if (is_array($data) || is_object($data)) {
        echo ("<script>console.log('php_array: " . json_encode($data) . "');</script>");
    } elseif ($data === true) {
        echo ("<script>console.log('true');</script>");
    } elseif ($data === false) {
        echo ("<script>console.log('false');</script>");
    } else {
        echo ("<script>console.log('php_string: " . $data . "');</script>");
    }
}

add_shortcode('latest_sales_products', 'latest_sales_products');

function latest_sales_products()
{
    $products_ids = wc_get_product_ids_on_sale();

    if (count($products_ids) < 2) {
        return;
    }

    $output = "<div class='";
    $output .= count($products_ids) > 2 ? 'offers-slider' : 'offers-products';
    $output .= "'>";

    foreach ($products_ids as $id) {
        $add_to_cart_link = do_shortcode('[add_to_cart_url id=' . $id . ']');
        $pf = new WC_Product_Factory();
        $product = $pf->get_product($id);
        $output .= "<div class='product-wrapper'>";
        $output .= "<div class='product-item'>";
        $output .= "<a href='/product/" . $product->get_slug() . "'>";
        $output .= "<div class='product-item-img'>";
        $output .= $product->get_image();
        $output .= "<a class='product-item-add-to-cart' href='" . $add_to_cart_link . "' style='background-image: url(/wp-content/uploads/2021/12/cart-icon.png)'></a>";
        $output .= "</div>";
        $output .= "<div class='product-info'>";
        $output .= "<h3 class='product-title'>" . $product->get_name() . "</h3>";
        $output .= "<p class='product-description'>" . $product->get_description() . "</p>";
        $output .= "<div class='product-price-wrapper'>";
        $output .= "<span class='product-price-sale'>$" . $product->get_sale_price() . " / </span>";
        $output .= "<span class='product-price'><s>$" . $product->get_regular_price() . "</s></span>";
        $output .= "</div>";
        $output .= "</div>";
        $output .= "</a>";
        $output .= "</div>";
        $output .= "</div>";
    }

    $output .= "</div>";
    echo $output;
}

function show_banners()
{
    $args = array(
        'post_type' => 'banners',
        'numberposts' => '-1',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $banners = get_posts($args);
    $count = count($banners);

    if ($count > 0) {
        $output = "<div class='";
        $output .= ($count > 2 ? "banners-slider" : "banners") . "'>";
        foreach($banners as $b) {
            $id = $b->ID;
            $slogan = get_field('banner_slogan', $id);
            $title = get_field('banner_title', $id);
            $url = get_field('banner_url', $id);
            $image = get_field('banner_image', $id);
            $color = get_field('banner_color', $id);

            $output .= "<div>";
            $output .= "<div class='banner' style='background: " . $color . "'>";
            $output .= "<div class='banner-info'>";
            $output .= "<span class='banner-slogan'>" . $slogan . "</span>";
            $output .= "<h3 class='banner-title'>" . $title . "</h3>";
            $output .= "<a class='banner-link' href='" . $url . "'>SHOP NOW</a>";
            $output .= "</div>";
            $output .= "<div class='banner-image'>";
            $output .= "<img src='" . $image . "'>";
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</div>";
        }
    } else {
        return;
    }
    $output .= "<div>";
    echo $output;
}

add_shortcode('show_banners', 'show_banners');

function products_tabs()
{

    function view_all_box($url)
    {
        return "
            <div class='content-item-view-all'>
                <a href='" . $url . "'>
                    View all
                    <svg width='28' height='12' viewBox='0 0 28 12' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <g opacity='0.6'>
                            <path d='M1 6.08826L26.4145 6.08825' stroke='#030D15' stroke-linecap='round' stroke-linejoin='round'/>
                            <path d='M21.9171 1L27 6.0829L21.9171 11.1658' stroke='#030D15' stroke-linecap='round' stroke-linejoin='round'/>
                        </g>
                    </svg>
                </a>
            </div>
            ";
    };

    $args_recent = array(
        'post_type' => 'product',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $onsale_ids = wc_get_product_ids_on_sale();
    $recent_products = wc_get_products($args_recent);
    $featured_products_ids = wc_get_featured_product_ids();

    $output = "<div class='tabs'>";
    $output .= "<div class='tab active'>RECENT ARRIVAL</div>";
    $output .= "<div class='tab'>SPECIAL OFFERS</div>";
    $output .= "<div class='tab'>FEATURED IN</div>";
    $output .= "</div>";
    $output .= "<div class='content'>";
    $output .= "<div class='content-item active'>";
    $output .= "<div class='content-item__inner'>";

    if (count($recent_products) > 0) {
        foreach ($recent_products as $r) {
            $output .= "<div class='content-item-card'>";
            $output .= "<a href=" . get_permalink($r->get_id()) . "'>";
            $output .= $r->get_image();
            $output .= "<div class='content-item-card-info'>";
            $output .= "<h3 class='item-card-title'>" . $r->get_name() . "</h3>";
            $output .= "<div class='product-price-wrapper'>";
            if ($r->is_on_sale()) {
                $output .= "<span class='product-price-sale'>$" . $r->get_sale_price() . " / </span>";
                $output .= "<span class='product-price'><s>$" . $r->get_regular_price() . "</s></span>";
            } else {
                $output .= "<span class='product-price'>$" . $r->get_regular_price() . "</span>";
            }
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</a>";
            $output .= "</div>";
        }
    } else {
        echo "<p class='custom-notification'>No products found!!!</p>";
    }

    $output .= "</div>";
    $output .= view_all_box('/shop');
    $output .= "</div>";
    $output .= "<div class='content-item'>";
    $output .= "<div class='content-item__inner'>";


    if (count($onsale_ids) > 0) {
        foreach ($onsale_ids as $id) {
            $pf = new WC_Product_Factory();
            $product = $pf->get_product($id);
            $output .= "<div class='content-item-card'>";
            $output .= "<a href=" . get_permalink($id) . "'>";

            $output .= $product->get_image();
            $output .= "<div class='content-item-card-info'>";
            $output .= "<h3 class='item-card-title'>" . $product->get_name() . "</h3>";
            $output .= "<div class='product-price-wrapper'>";
            $output .= "<span class='product-price-sale'>$" . $product->get_sale_price() . " / </span>";
            $output .= "<span class='product-price'><s>$" . $product->get_regular_price() . "</s></span>";
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</a>";
            $output .= "</div>";
        }
    } else {
        echo "<p class='custom-notification'>No products are currently on sale!!!</p>";
    }

    $output .= "</div>";
    $output .= view_all_box('/shop');
    $output .= "</div>";

    $output .= "<div class='content-item'>";
    $output .= "<div class='content-item__inner'>";

    if (count($featured_products_ids) > 0) {
        foreach ($featured_products_ids as $id) {
            $pf = new WC_Product_Factory();
            $product = $pf->get_product($id);
            $output .= "<div class='content-item-card'>";
            $output .= "<a href=" . get_permalink($id) . "'>";

            $output .= $product->get_image();
            $output .= "<div class='content-item-card-info'>";
            $output .= "<h3 class='item-card-title'>" . $product->get_name() . "</h3>";
            $output .= "<div class='product-price-wrapper'>";
            if ($product->is_on_sale()) {
                $output .= "<span class='product-price-sale'>$" . $product->get_sale_price() . " / </span>";
                $output .= "<span class='product-price'><s>$" . $product->get_regular_price() . "</s></span>";
            } else {
                $output .= "<span class='product-price'>$" . $product->get_regular_price() . "</span>";
            }
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</a>";
            $output .= "</div>";
        }
    } else {
        $output .= "<p class='custom-notification'>No featured products found!!!</p>";
    }

    $output .= "</div>";
    $output .= view_all_box('/shop');
    $output .= "</div>";
    $output .= "</div>";

    echo $output;
}

add_shortcode('products_tabs', 'products_tabs');
