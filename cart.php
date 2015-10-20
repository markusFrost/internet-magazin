<?php
    include( '/include/include_php.php');
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
           case "oneclick":
           {
               echo'
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

               echo '
               <div id="header-list-cart">
                    <div id="head1">Изображение</div>
                    <div id="head2">Наименование товара</div>
                    <div id="head3">Кол-во</div>
                    <div id="head4">Цена</div>
                </div>
               ';
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