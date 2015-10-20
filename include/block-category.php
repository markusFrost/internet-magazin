<div id="block-category">
	<p class="header-title">Категории товаров</p>
	<ul>
		<li> <a id="index1"> <img id="mobile-images" src="/images/mobile-icon.gif" alt="">Мобильные телефоны </a>  
			
			<ul class="category-section">
				<li>
					<a href="view_cat.php?type=mobile" style="font-weight:bold!important;">Все модели</a>
				</li>
				<!-- <li><a href="">Подраздел 1</a></li>
				<li><a href="">Подраздел 2</a></li> -->
				<?php 
					$query = "select *  from category where type = 'mobile'";
					$result = mysql_query ( $query, $link );
					if ( mysql_num_rows( $result ) > 0 )
					{
						$row = mysql_fetch_array( $result );
						do
						{
							echo '
								<li>
									<a href="view_cat.php?cat='.strtolower( $row["brand"] ) .'&type='.$row["type"]
									.'">'.$row["brand"].'</a>
								</li>
							';
						}while( $row = mysql_fetch_array( $result ) );
					}
				 ?>
			</ul>
        </li>
        <!--  -->
        <li> <a id="index2"> <img id="book-images" src="/images/book-icon.gif" alt="">Ноутбуки </a>  
			
			<ul class="category-section">
				<li>
					<a href="view_cat.php?type=notebook" style="font-weight:bold!important;">Все модели</a>
				</li>
				<!-- <li><a href="">Подраздел 1</a></li>
				<li><a href="">Подраздел 2</a></li> -->
				<?php 
					$query = "select *  from category where type = 'notebook'";
					$result = mysql_query ( $query, $link );
					if ( mysql_num_rows( $result ) > 0 )
					{
						$row = mysql_fetch_array( $result );
						do
						{
							echo '
								<li>
									<a href="view_cat.php?cat='.strtolower( $row["brand"] ) .'&type='.$row["type"]
									.'">'.$row["brand"].'</a>
								</li>
							';
						}while( $row = mysql_fetch_array( $result ) );
					}
				 ?>
			</ul>
        </li>
        <!--  -->
        <li> <a id="index3"> <img id="table-images" src="/images/table-icon.gif" alt="">Планшеты</a>  
			
			<ul class="category-section">
				<li>
					<a href="view_cat.php?type=notepad" style="font-weight:bold!important;">Все модели</a>
				</li>
				<!-- <li><a href="">Подраздел 1</a></li>
				<li><a href="">Подраздел 2</a></li> -->
				<?php 
					$query = "select *  from category where type = 'notepad'";
					$result = mysql_query ( $query, $link );
					if ( mysql_num_rows( $result ) > 0 )
					{
						$row = mysql_fetch_array( $result );
						do
						{
							echo '
								<li>
									<a href="view_cat.php?cat='.strtolower( $row["brand"] ) .'&type='.$row["type"]
									.'">'.$row["brand"].'</a>
								</li>
							';
						}while( $row = mysql_fetch_array( $result ) );
					}
				 ?>
			</ul>
        </li>
	</ul>
</div>