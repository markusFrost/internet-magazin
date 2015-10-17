<?php 
function clear_string( $cl_str )
{
  	$cl_str = strip_tags( $cl_str ); // удаление html и php тэгов
	$cl_str = mysql_real_escape_string( $cl_str ); // экранирует спецсимволы - работает только при подключении к бд
	$cl_str = trim( $cl_str ); // удаление проблеов в начале и в конце

	return $cl_str;
}

function output($data)
{
	echo '<!-'.$data.'-->'.PHP_EOL;
}

function displaySortPanel( $sort_name, $cat_link, $type )
{
	echo '
<div id="block-sorting">
	 			<p id="nav-breadcrumbs">
	 				<a href="index.php">Главная страница</a> \ <span>Все товары</span>
	 			</p>
	 			<ul id="option-list">
	 				<li>Вид</li>
	 				<li><img id="style-grid" src="/images/icon-grid.png" alt=""></li>
	 				<li><img id="style-list" src="/images/icon-list.png" alt=""></li>
	 				<li>Сортировать:</li>
	 				<li><a id="select-sort">'.$sort_name.'</a>
						<ul id="sorting-list">
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=price-asc">От дешёвых к дорогим</a></li>
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=price-desc">От дорогих к дешёвым</a></li>
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=popular">Популярное</a></li>
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=news">Новинки</a></li>
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=brand">От А до Я</a></li>
						</ul>
	 				</li>
	 			</ul>
	 		</div>
	';
}



 ?>
