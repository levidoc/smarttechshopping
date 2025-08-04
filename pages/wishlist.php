<?php
include_once "function.php";

$html_structure = '
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="p-b-45">
            <p class="cl5 txt-center">See the record of what you like.</p>
            <h3 class="ltext-106 cl5 txt-center">
                Your Wishlist
            </h3>
        </div>
        <div class="row">
            <div style="max-width:60rem; width:100%;" class="m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                </tr>

                                [WISHLIST_DATA]

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
        <div class="p-b-45">
            <p class="cl5 txt-center">Totals and Maths of Wishlist.</p>
            <h3 class="ltext-106 cl5 txt-center">
                Wishlist Summary
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <td class="column-1">Gross Total </td>
                                    <td class="column-2"></td>
                                    <td class="column-3">[SUB_TOTAL]</td>
                                </tr>

                                <tr class="table_head">
                                    <td class="column-1">Save </td>
                                    <td class="column-2"></td>
                                    <td class="column-3">[DEDUCTION]</td>
                                </tr>

                                <tr class="table_head">
                                    <td class="column-1"><br></td>
                                    <td class="column-2"></td>
                                    <td class="column-3"></td>
                                </tr>
                                <br>

                                <tr class="table_head">
                                    <td class="column-1"><strong>Total</strong></td>
                                    <td class="column-2"></td>
                                    <td class="column-3"><strong>[TOTAL]</strong></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>
<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-45">
            <p class="cl5 txt-center">Now see what we think you might like</p>
            <h3 class="ltext-106 cl5 txt-center">
                Similar Taste
            </h3>
        </div>
        <br>
        <div class="row isotope-grid" id="featured_products" style="position: relative; height: 1338.7px;">
            [EXCLUDED_PRODUCTS]
        </div>
    </div>
</section>';

$exclude_build = "";
$wishlist_build = "";
$subtotal = 0.00;
$total = 0.00;
$deductions = 0.00;

$wishlist_file = get_parent_directory() . '/DATA_SETS/wishlist_pack.json';
if (file_exists($wishlist_file)) {
    $wishlist_data_pack = json_decode(file_get_contents($wishlist_file), TRUE);
    $products = array();
    foreach ($wishlist_data_pack as $row) {
        $user_code = account_code();
        $tracking_code = tracking_code();

        if (($tracking_code == $row['TRACKING_CODE']) && ($user_code == $row['USER_CODE'])) {
            if (!in_array($row["PRODUCT"], $products)) {
                $products[] = $row["PRODUCT"];
            }
        }
    }

    $product_file = get_parent_directory() . '/DATA_SETS/product_pack.json';
    if (file_exists($product_file)) {

        $x_count = 0;
        $json_data = json_decode(file_get_contents($product_file), JSON_PRETTY_PRINT);

        if ($json_data !== false) {

            foreach ($json_data as $row) {
                $product_html_structure = '
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div onclick="remove_wishlist_item(`' . simple_encryption($row['INDEX']) . '`)" class="how-itemcart1">
                                            <img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]" >
                                        </div>
                                    </td>
                                    <td class="column-2"><a style="color:black;" href="[PRODUCT_LINK_]">[PRODUCT_NAME_]</a></td>
                                    <td class="column-3">[PRODUCT_PRICE_]</td>
                                </tr>';

                $exclude_html_structure = '
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item [PRODUCT_CATEGORY]">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="[PRODUCT_IMAGE_]" alt="[PRODUCT_NAME_]" style="aspect-ratio: 7/9; object-fit: contain; ">

                        <a href="[PRODUCT_LINK_]" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                            View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="[PRODUCT_LINK_]" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                [PRODUCT_NAME_]
                            </a>

                            <span>[STORE_NAME]</span>

                            <span class="stext-105 cl3">
                                [PRODUCT_PRICE_]
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a onclick="add_to_wishlist(`' . simple_encryption($row['INDEX']) . '`)" href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>';

                $product_index = $row['INDEX'];
                $product_title = strtoupper($row['TITLE']);
                $product_image = file_path('product_image') . $row['COVER_IMG'];

                $product_currency = $row['CURRENCY']['CODE'];
                $product_amount = currency_convert($row['PRICE'], $product_currency);
                $actual_price = currency_convert(retrieve_product_amount($product_index), $product_currency);

                $product_link = 'product.php?reference=' . encrypt_url($product_index) . '&safe_search=on';

                if ($product_amount == $actual_price) {
                    $price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($actual_price);
                } else {
                    $price = retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($actual_price) . '<br><span style="font-size:12px; padding:0px 10px;"><s> ' . retrieve_currency_code("CURRENCY_SIGN") . ' ' . string_to_currency($product_amount) . '</s></span>';
                }

                $info = str_ireplace(
                    ['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]'],
                    [$product_title, $price, $product_image, $product_link],
                    $product_html_structure
                );


                $exclude_info = str_ireplace(
                    ['[PRODUCT_NAME_]', '[PRODUCT_PRICE_]', '[PRODUCT_IMAGE_]', '[PRODUCT_LINK_]'],
                    [$product_title, $price, $product_image, $product_link],
                    $exclude_html_structure
                );

                if (in_array($product_index, $products)) {
                    $wishlist_build .= $info;

                    $total += $actual_price;
                    $subtotal += $product_amount;

                    $deductions = $subtotal - $total;
                } else {

                    $x_count++;
                    if ($x_count < 9) {
                        $exclude_build .= $exclude_info;
                    }
                }
            }
        }
    }
}

$output = str_ireplace(['[WISHLIST_DATA]', '[SUB_TOTAL]', '[DEDUCTION]', '[TOTAL]', '[EXCLUDED_PRODUCTS]'], [$wishlist_build, retrieve_currency_code("CURRENCY_SIGN") . " " . string_to_currency($subtotal), ' - ' . retrieve_currency_code("CURRENCY_SIGN") . " " . string_to_currency($deductions), retrieve_currency_code("CURRENCY_SIGN") . " " . string_to_currency($total), $exclude_build], $html_structure);

include_once "top.php";
echo (create_seo_signature('Wishlist', '', 'Varsity Market', ''));

?>
<?php include_once "header.php" ?>

<?php echo ($output); ?>

<?php include_once "footer.php"; ?>