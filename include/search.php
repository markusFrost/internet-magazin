<?php

    if ( $_SERVER["REQUEST_METHOD"] == "POST" )
    {
        //$_POST["text"] = "sams";
        include("db_connect.php");
        include ("../functions/functions.php");

        $search = iconv( "UTF-8", "cp1251", strtolower( clear_string( $_POST["text"] ) ) );

        $query = "select * from table_products WHERE title LIKE '%$search%' AND visible='1'";

        $result = mysql_query( $query, $link );

        if ( mysql_num_rows( $result ) > 0 )
        {
            $result = mysql_query( $query." limit 10", $link );
            $row = mysql_fetch_array( $result );

            do
            {
                echo'
                <li><a href="search.php?q='.$row["title"].'">'.$row["title"].'</a></li>
                ';
            }while( $row = mysql_fetch_array( $result ) );
        }
    }

?>