<?php 
function clear_string( $cl_str )
{
  	$cl_str = strip_tags( $cl_str ); // �������� html � php �����
	$cl_str = mysql_real_escape_string( $cl_str ); // ���������� ����������� - �������� ������ ��� ����������� � ��
	$cl_str = trim( $cl_str ); // �������� �������� � ������ � � �����

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

	// ���������� ������

	$pass = "";

	for($i = 0; $i < $number; $i++)

	{

		// ��������� ��������� ������ �������

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
	 				<a href="index.php">������� ��������</a> \ <span>��� ������</span>
	 			</p>
	 			<ul id="option-list">
	 				<li>���</li>
	 				<li><img id="style-grid" src="/images/icon-grid.png" alt=""></li>
	 				<li><img id="style-list" src="/images/icon-list.png" alt=""></li>
	 				<li>�����������:</li>
	 				<li><a id="select-sort">'.$sort_name.'</a>
						<ul id="sorting-list">
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=price-asc">�� ������� � �������</a></li>
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=price-desc">�� ������� � �������</a></li>
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=popular">����������</a></li>
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=news">�������</a></li>
							<li><a href="view_cat.php?'.$cat_link.'type='.$type.'&sort=brand">�� � �� �</a></li>
						</ul>
	 				</li>
	 			</ul>
	 		</div>
	';
}



 ?>
