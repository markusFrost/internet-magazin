<?php 
function clear_string( $cl_str )
{
  	$cl_str = strip_tags( $cl_str ); // удаление html и php тэгов
	$cl_str = mysql_real_escape_string( $cl_str ); // экранирует спецсимволы - работает только при подключении к бд
	$cl_str = trim( $cl_str ); // удаление проблеов в начале и в конце

	return $cl_str;
}

function fungenpass()
{
	$number = 7;

	$arr = array('a','b','c','d','e','f',

		'g','h','i','j','k','l',

		'm','n','o','p','r','s',

		't','u','v','x','y','z',

		'1','2','3','4','5','6',

		'7','8','9','0');

	// Генерируем пароль

	$pass = "";

	for($i = 0; $i < $number; $i++)

	{

		// Вычисляем случайный индекс массива

		$index = rand(0, count($arr) - 1);

		$pass .= $arr[$index];

	}


	return $pass;
}

function send_mail($from,$to,$subject,$body)
{
	$charset = 'utf-8';
	mb_language("ru");
	$headers  = "MIME-Version: 1.0 \n" ;
	$headers .= "From: <".$from."> \n";
	$headers .= "Reply-To: <".$from."> \n";
	$headers .= "Content-Type: text/html; charset=$charset \n";

	$subject = '=?'.$charset.'?B?'.base64_encode($subject).'?=';

	mail($to,$subject,$body,$headers);
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
