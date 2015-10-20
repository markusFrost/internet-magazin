<?php
    include( '/include/include_php.php');

    $id = clear_string( $_GET["id"] );
    $action = clear_string( $_GET["action"] );

    switch ( $action )
    {
        case "clear":
        {
            $query = "delete from cart WHERE  cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
            $clear = mysql_query( $query, $link );
            $_GET["action"] = "oneclick";
        }break;
        case "delete":
        {
            $query = "delete from cart WHERE cart_id = '$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
            $delete = mysql_query( $query, $link );
            $_GET["action"] = "oneclick";
        }break;
        default:{}break;

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="windows-1251">
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="/js/shop-script.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>
    <link rel="stylesheet" type="text/css" href="trackbar/trackbar.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Корзина заказов</title>
</head>
<body>
<!--
http://localhost/tools/phpmyadmin/
  -->

<div id="block-body">
    <?php
    include('/include/block-header.php');
    ?>

    <div id="block-right">
        <?php
        include('/include/block-category.php');
        include('/include/block-parameter.php');
        include('/include/block-news.php');
        ?>
    </div>
    <div id="block-content">

       <?php

            $action = clear_string( $_GET["action"] );

       switch ( $action )
       {
           case "oneclick": {
               //1 begin
               echo '
        <div id="block-step">
            <div id="name-step">
                <ul>
                    <li><a class="active" href="">1. Корзина товаров</a></li>
                    <li><span>&rarr;</span></li>
                    <li><a class="" href="">2. Контактная информация</a></li>
                    <li><span>&rarr;</span></li>
                    <li><a class="" href="">3. Завершение</a></li>
                </ul>
            </div>
            <p>шаг 1 из 3</p>
            <a href="cart.php?action=clear">Очистить</a>
        </div>
	';
               //1 end

               //--------------------------------------------------------
               $query = "select * from cart, table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}'
                          AND table_products.products_id = cart.cart_id_product";

               $result = mysql_query($query, $link);

               if (mysql_num_rows($result) > 0)
               {
                   $row = mysql_fetch_array($result);
                   //2 start
                   echo '
               <div id="header-list-cart">
                    <div id="head1">Изображение</div>
                    <div id="head2">Наименование товара</div>
                    <div id="head3">Кол-во</div>
                    <div id="head4">Цена</div>
                </div>
               ';
                   //2 end
                   do
                   {
                       $int = $row["cart_price"] * $row["cart_count"];
                       $all_price = $all_price + $int;

                       if (strlen($row["image"]) > 0 && file_exists("./uploads_images/" . $row["image"])) {
                           $img_path = './uploads_images/' . $row["image"];
                           $max_width = 100;
                           $max_height = 100;
                           list($width, $height) = getimagesize($img_path);
                           $ratioh = $max_height / $height;
                           $ratiow = $max_width / $width;
                           $ratio = min($ratioh, $ratiow);
                           $width = intval($ratio * $width);
                           $height = intval($ratio * $height);
                       } else {
                           $img_path = "/images/no-image.png";
                           $width = 120;
                           $height = 105;
                       }
                       //3 start
                       echo '
                <div class="block-list-cart">
            <div class="img-cart">
                <p style="margin-top:10px;" align="center"><img width="' . $width . '" height="' . $height . '" src="' . $img_path . '" alt=""></p>
            </div>
            <div class="title-cart">
                <p><a href="">' . $row["title"] . '</a></p>
                <p class="cart-mini-features">
                    ' . $row["mini_features"] . '
                </p>
            </div>
            <div class="count-cart">
                <ul class="input-count-style">
                    <li><p align="center" class="count-minus">-</p></li>
                    <li><p align="center"><input type="text" maxlength="3" value="' . $cart_count . '" class="count-input"></p></li>
                    <li><p align="center" class="count-plus">+</p></li>
                </ul>
            </div>
            <div class="price-product">
                <h5>
                    <span class="span-count">'.$row["cart_count"].'</span>&nbsp;x&nbsp;<span>' . $row["price"] . '</span>
                </h5>
                <p>' . $row["cart_price"] . '</p>
            </div>
            <div class="delete-cart">
                <a href="cart.php?id='.$row["cart_id"].'&action=delete"><img src="/images/bsk_item_del.png" alt=""></a>
            </div>
            <div id="bottom-catd-line"></div>
        </div>
               ';
                       //3 end
                   } while ($row = mysql_fetch_array($result));
               }
               else
               {
                   echo'
                        <h3 id="clear-cart" align="center">Корзина пуста!</h3>
                   ';
               }
               echo '
                <h2 align="right" class="itog-price">Итого: <strong>' . $all_price . '</strong>руб</h2>
                <p align="right" class="button-next"><a href="cart.php?action=confirm">Далее</a></p>
               ';

               //--------------------------------------------------------

           }break;
           case "confirm":
           {

           }break;
           case "completion":
           {

           }break;
           default:
           {

           }break;

       }



       ?>

<!-- 30:53-->



    </div>
    <?php
    include('/include/block-footer.php');
    ?>
</div>




</body>
</html>