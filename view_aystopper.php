<?php
include( '/include/include_php.php');

$go = clear_string( $_GET["go"] );

switch ( $go )
{
    case "news":
    {
        $query_aystopper = " where visible='1' and new='1' ";
        $name_aystopper = "������� �������";
    }break;
    case "leaders":
    {
        $query_aystopper = " where visible='1' and leader='1' ";
        $name_aystopper = "������ ������";
    }break;
    case "sale":
    {
        $query_aystopper = " where visible='1' and sale='1' ";
        $name_aystopper = "���������� �������";
    }break;
    default:
    {
        $query_aystopper = "";
        $name_aystopper = "";
    }break;
}

$sorting = $_GET['sort'];
switch ( $sorting )
{
    case 'price-asc':
    {
        $sorting = 'price asc';
        $sort_name = '�� ������� � �������';
    } break;
    case 'price-desc':
    {
        $sorting = 'price desc';
        $sort_name = '�� ������� � �������';
    } break;
    case 'popular':
    {
        $sorting = 'count desc';
        $sort_name = '����������';
    } break;
    case 'news':
    {
        $sorting = 'datetime desc';
        $sort_name = '�������';
    } break;
    case 'brand':
    {
        $sorting = 'brand';
        $sort_name = '�� � �� �';
    } break;

    default:
    {
        $sorting = 'products_id desc';
        $sort_name = '��� ����������';
    } break;
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
    <title>��������-������� �������� �������</title>
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
            if ( $query_aystopper != "" )
            {
        ?>
            <?php
            $num = 6;
            $page = ( int )$_GET["page"];

            $count = mysql_query( "select count(*) from table_products $query_aystopper", $link );
            $temp = mysql_fetch_array( $count );

            if ( $temp[0] > 0 )
            {
                $tempcount = $temp[0];

                //������� ����� ����� �������
                $total = ( ( $tempcount - 1) / $num ) + 1;
                $total = intval( $total );

                $page = intval( $page );

                if ( empty( $page ) or $page < 0)
                {
                    $page = 1;
                }
                if ( $page > $total )
                {
                    $page = $total;
                }

                $start = $page * $num - $num;

                $qury_start = " limit ".$start." , ".$num;
            }

            if ( $temp[0] > 0 )
            {

            echo
                '
             <div id="block-sorting">
            <p id="nav-breadcrumbs">
                <a href="index.php">������� ��������</a> \ <span>' . $name_aystopper . '</span>
            </p>
            <ul id="option-list">
                <li>���</li>
                <li><img id="style-grid" src="/images/icon-grid.png" alt=""></li>
                <li><img id="style-list" src="/images/icon-list.png" alt=""></li>
                <li>�����������:</li>
                <li><a id="select-sort">' . $sort_name . '</a>
                    <ul id="sorting-list">
                        <li><a href="view_aystopper.php?go=' . $go . '&sort=price-asc">�� ������� � �������</a></li>
                        <li><a href="view_aystopper.php?go=' . $go . '&sort=price-desc">�� ������� � �������</a></li>
                        <li><a href="view_aystopper.php?go=' . $go . '&sort=popular">����������</a></li>
                        <li><a href="view_aystopper.php?go=' . $go . '&sort=news">�������</a></li>
                        <li><a href="view_aystopper.php?go=' . $go . '&sort=brand">�� � �� �</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <ul id="block-tovar-grid">
            ';

            $result = mysql_query("select * from table_products  $query_aystopper order by " . $sorting . " " . $qury_start, $link);
            if (mysql_num_rows($result) > 0) {
                $row = mysql_fetch_array($result);

                do {
                    if ($row["image"] != "" && file_exists("./uploads_images/" . $row["image"])) {
                        $img_path = './uploads_images/' . $row["image"];
                        $max_width = 200;
                        $max_height = 200;
                        list($width, $height) = getimagesize($img_path);
                        $ratioh = $max_height / $height;
                        $ratiow = $max_width / $width;
                        $ratio = min($ratioh, $ratiow);
                        $width = intval($ratio * $width);
                        $height = intval($ratio * $height);
                    } else {
                        $img_path = "/images/no-image.png";
                        $width = 110;
                        $height = 200;
                    }
                    echo '
	 						<li>
	 							<div class="block-images-grid">
									<img src="' . $img_path . '" width="' . $width . '" height="' . $height . '" alt="">
	 							</div>
	 							<p class="style-title-grid"><a href="" >' . $row["title"] . '</a></p>
	 							<ul class="reviews-and-counts-grid">
	 							<li><img src="/images/eye-icon.png" alt=""><p>0</p></li>
	 								<li><img src="/images/comment-icon.png" alt=""><p>0</p></li>
	 							</ul>
	 							<a class="add-cart-style-grid" href="" ></a>
	 							<p class="style-price-grid"><strong>' . $row["price"] . '</strong> ��� </p>
	 							<div class="mini-features">
									' . $row["mini_features"] . '
	 							</div>
	 						</li>
	 						';
                } while ($row = mysql_fetch_array($result));
            }
            ?>
        </ul>
        <!--  -->
        <ul id="block-tovar-list">
            <?php
            $result = mysql_query("select * from table_products $query_aystopper order by " . $sorting . " " . $qury_start, $link);
            if (mysql_num_rows($result) > 0) {
                $row = mysql_fetch_array($result);

                do {
                    if ($row["image"] != "" && file_exists("./uploads_images/" . $row["image"])) {
                        $img_path = './uploads_images/' . $row["image"];
                        $max_width = 150;
                        $max_height = 150;
                        list($width, $height) = getimagesize($img_path);
                        $ratioh = $max_height / $height;
                        $ratiow = $max_width / $width;
                        $ratio = min($ratioh, $ratiow);
                        $width = intval($ratio * $width);
                        $height = intval($ratio * $height);
                    } else {
                        $img_path = "/images/noimages80x70.png";
                        $width = 80;
                        $height = 70;
                    }
                    echo '
	 						<li>
	 							<div class="block-images-list">
									<img src="' . $img_path . '" width="' . $width . '" height="' . $height . '" alt="">
	 							</div>
	 							
	 							<ul class="reviews-and-counts-list">
	 							<li><img src="/images/eye-icon.png" alt=""><p>0</p></li>
	 								<li><img src="/images/comment-icon.png" alt=""><p>0</p></li>
	 							</ul>
	 							<p class="style-title-list"><a href="" >' . $row["title"] . '</a></p>
	 							<a class="add-cart-style-list" href="" ></a>
	 							<p class="style-price-list"><strong>' . $row["price"] . '</strong> ��� </p>
	 							<div class="style-text-list">
									' . $row["mini_description"] . '
	 							</div>
	 						</li>
	 						';
                } while ($row = mysql_fetch_array($result));
            }
            echo '</ul>';
            //���� � ����������
            if ($page != 1) {
                $pstr_prev = '<li><a class="pstr-prev" href="view_aystopper.php?go=' . $go . '&page=' . ($page - 1) . '">&lt</a></li>';
            }

            if ($page != $total) {
                $pstr_next = '<li><a class="pstr-next" href="view_aystopper.php?go=' . $go . '&page=' . ($page + 1) . '">&gt</a></li>';
            }

            if ($page - 5 > 0) {
                $page5left = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page - 5) . '">' . ($page - 5) . '</a></li>';
            }
            if ($page - 4 > 0) {
                $page4left = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page - 4) . '">' . ($page - 4) . '</a></li>';
            }
            if ($page - 3 > 0) {
                $page3left = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page - 3) . '">' . ($page - 3) . '</a></li>';
            }
            if ($page - 2 > 0) {
                $page2left = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page - 2) . '">' . ($page - 2) . '</a></li>';
            }
            if ($page - 1 > 0) {
                $page1left = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page - 1) . '">' . ($page - 1) . '</a></li>';
            }

            output("total = " . $total);

            if ($page + 5 <= $total) {
                $page5right = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page + 5) . '">' . ($page + 5) . '</a></li>';
            }
            if ($page + 4 <= $total) {
                $page4right = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page + 4) . '">' . ($page + 4) . '</a></li>';
            }
            if ($page + 3 <= $total) {
                $page3right = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page + 3) . '">' . ($page + 3) . '</a></li>';
            }
            if ($page + 2 <= $total) {
                $page2right = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page + 2) . '">' . ($page + 2) . '</a></li>';
            }
            if ($page + 1 <= $total) {
                $page1right = '<li><a href="view_aystopper.php?go=' . $go . '&page=' . ($page + 1) . '">' . ($page + 1) . '</a></li>';
            }

            if ($page + 5 < $total) {
                $strtotal = '<li><p class="nav-point">...</p></li><li><a href="view_aystopper.php?go=' . $go . '&page=' . $total . '">' . $total . '</a></li>';
            } else {
                $strtotal = "";
            }

            if ($total > 1) {
                echo '
                        <div class="pstrnav">
                        <ul>
                        ';
                //echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='view_aystopper.php?go='.$go.'&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
                echo $pstr_prev . $page5left . $page4left . $page3left . $page2left . $page1left . "<li><a class='pstr-active' href='view_aystopper.php?go=" . $go . "&page=" . $page . "'>" . $page . "</a></li>" . $page1right . $page2right . $page3right . $page4right . $page5right . $strtotal . $pstr_next;
                echo '</ul>
                        </div>
                        ';
            }
            }
            else
            {
                echo '<p>������ �� �������!</p>';
            }
            //���� � ����������
            }
            else
            {
                echo '<p>������ ��������� �� �������!</p>';
            }
            ?>

            <!--  -->
    </div>
    <?php
    include('/include/block-footer.php');
    ?>
</div>




</body>
</html>