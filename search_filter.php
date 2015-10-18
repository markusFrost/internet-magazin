<?php
include( '/include/include_php.php');
/*include( '/include/db_connect.php' );
include( '/functions/functions.php' );

session_start();
unset( $_SESSION['auth'] );*/

$cat = clear_string( $_GET['cat'] );
$type = clear_string( $_GET['type'] );

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
	<link rel="stylesheet" type="text/css" href="trackbar/trackbar.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<title>Поиск по параметрам</title>
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
	 		if ( $_GET["brand"] )
	 		{
	 			$check_brand = implode( ',' , $_GET["brand"] );
	 		}

	 		$start_price = ( int ) $_GET["start_price"]; // допускать можно только цифры	
	 		$end_price = ( int ) $_GET["end_price"];	

	 		if ( !empty( $check_brand ) or !empty( $end_price )  )
	 		{
	 			if ( !empty( $check_brand ) )
	 			{
	 				$query_brand = " and brand_id in ( ".$check_brand." )";
	 			}
	 			if ( !empty( $end_price ) )
	 			{
	 				$query_price = "and price between ".$start_price." and ".$end_price;
	 			}
	 		}



	 				$result = mysql_query( "select * from table_products where visible=1 ".$query_brand."  ".$query_price." order by products_id desc", $link );
	 				if ( mysql_num_rows( $result ) > 0 )
	 				{
	 					$row = mysql_fetch_array( $result );
	 					// display sort panel
	 					displaySortPanel( $sort_name, $cat_link, $type );
	 					echo '<ul id="block-tovar-grid">';
	 					// display sort panel

	 					do
	 					{
	 						if  ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
								{
									$img_path = './uploads_images/'.$row["image"];
									$max_width = 200; 
									$max_height = 200; 
 									list($width, $height) = getimagesize($img_path); 
									$ratioh = $max_height/$height; 
									$ratiow = $max_width/$width; 
									$ratio = min($ratioh, $ratiow); 
									$width = intval($ratio*$width); 
									$height = intval($ratio*$height);    
								}
								else
								{
									$img_path = "/images/no-image.png";
									$width = 110;
									$height = 200;
								}
	 						echo '
	 						<li>
	 							<div class="block-images-grid">
									<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" alt="">
	 							</div>
	 							<p class="style-title-grid"><a href="" >'.$row["title"].'</a></p>
	 							<ul class="reviews-and-counts-grid">
	 							<li><img src="/images/eye-icon.png" alt=""><p>0</p></li>
	 								<li><img src="/images/comment-icon.png" alt=""><p>0</p></li>
	 							</ul>
	 							<a class="add-cart-style-grid" href="" ></a>
	 							<p class="style-price-grid"><strong>'.$row["price"].'</strong> руб </p>
	 							<div class="mini-features">
									'.$row["mini_features"].'
	 							</div>
	 						</li>
	 						';
	 					} while ( $row = mysql_fetch_array( $result ) ) ;
	 					echo '</ul>';
	 				}
	 				else
	 				{
	 					echo '
	 					<h3>Категория недоступна или не создана!</h3>
	 					';
	 				}
	 		 ?>
	 		 <!-- </ul> -->
	 		 <!--  -->
	 		 <ul id="block-tovar-list">
	 		<?php 
	 				$result = mysql_query( "select * from table_products where visible=1 ".$query_brand."  ".$query_price." order by products_id desc", $link );
	 				if ( mysql_num_rows( $result ) > 0 )
	 				{
	 					$row = mysql_fetch_array( $result );

	 					do
	 					{
	 						if  ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
								{
									$img_path = './uploads_images/'.$row["image"];
									$max_width = 150; 
									$max_height = 150; 
 									list($width, $height) = getimagesize($img_path); 
									$ratioh = $max_height/$height; 
									$ratiow = $max_width/$width; 
									$ratio = min($ratioh, $ratiow); 
									$width = intval($ratio*$width); 
									$height = intval($ratio*$height);    
								}
								else
								{
									$img_path = "/images/noimages80x70.png";
									$width = 80;
									$height = 70;
								}
	 						echo '
	 						<li>
	 							<div class="block-images-list">
									<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" alt="">
	 							</div>
	 							
	 							<ul class="reviews-and-counts-list">
	 							<li><img src="/images/eye-icon.png" alt=""><p>0</p></li>
	 								<li><img src="/images/comment-icon.png" alt=""><p>0</p></li>
	 							</ul>
	 							<p class="style-title-list"><a href="" >'.$row["title"].'</a></p>
	 							<a class="add-cart-style-list" href="" ></a>
	 							<p class="style-price-list"><strong>'.$row["price"].'</strong> руб </p>
	 							<div class="style-text-list">
									'.$row["mini_description"].'
	 							</div>
	 						</li>
	 						';
	 					} while ( $row = mysql_fetch_array( $result ) ) ;
	 				}
	 		 ?>
	 		 </ul>
	 		 <!--  -->
	 	</div>
	 	<?php 
			include('/include/block-footer.php');
	 	 ?>
	</div>

	
	

</body>
</html>