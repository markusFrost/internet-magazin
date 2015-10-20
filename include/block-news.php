<div id="block-news">
<center><img id="news-prev" src="/images/img-prev.png" alt=""></center>
	<div id="newsticker">
		<ul>
		<?php 
			$query = "select * from news order by id desc";
			$result = mysql_query( $query, $link );

			if ( mysql_num_rows( $result ) > 0 )
			{
				$row = mysql_fetch_array( $result );
				do 
				{
					echo '
						<li>
							<span>'. $row["date"].'</span>
							<a href="">'.trim( $row["title"] ).'</a>
							<p>'.trim( $row["text"] ).'</p>
						</li>
					';
				} while ( $row = mysql_fetch_array( $result ) );
			}
		 ?>
		</ul>
	</div>
	<center><img id="news-next" src="/images/img-next.png" alt=""></center>
</div>