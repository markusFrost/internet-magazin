<?php
    if ( $_SESSION["auth"] != 'yes_auth' && $_COOKIE["rememberme"] )
    {
        $str = $_COOKIE["rememberme"];

        //Вся длина строки
        $all_len = strlen( $str );
        //Длина логина
        $login_len = strpos( $str, '+' );
        //Обрезаме строку до Плюса и получаем Логин
        $login = clear_string( substr( $str, 0 , $login_len ) );

        $pass = clear_string( substr( $str , $login_len + 1, $all_len ) );

        $query = "select * from reg_user WHERE ( login = '$login' OR email = '$login' ) and ( pass = '$pass' )";

        $result = mysql_query( $query, $link );

        if ( mysql_num_rows( $result ) > 0 ) // если такой пользователь существует
        {
            $row = mysql_fetch_array( $result );
            session_start();

            $_SESSION['auth'] = 'yes_auth';
            $_SESSION['auth_pass'] = $row["pass"];
            $_SESSION['auth_login'] = $row["login"];
            $_SESSION['auth_surname'] = $row["surname"];
            $_SESSION['auth_name'] = $row["name"];
            $_SESSION['auth_patronymic'] = $row["patronymic"];
            $_SESSION['auth_address'] = $row["address"];
            $_SESSION['auth_phone'] = $row["phone"];
            $_SESSION['auth_email'] = $row["email"];
        }
    }
?>