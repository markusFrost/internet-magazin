<?php
if ( $_SERVER["REQUEST_METHOD"] == "POST" )
{
    include("db_connect.php");
    include("../functions/functions.php");

    $email = clear_string( $_POST["email"] );

    if ( $email != "" )
    {
        $query = "select email from reg_user WHERE email='$email'";

        $result = mysql_query( $query, $link );

        if ( mysql_num_rows( $result ) > 0 )
        {
            $newpass = fungenpass();

            $pass = md5( $newpass );
            $pass = strrev( $pass );
            $pass = strtolower( "9nm2rv8q".$pass."2yo6z" );

            $query = "update reg_user set pass='$pass' WHERE email='$email'";

            $update = mysql_query( $query, $link );

            send_mail(
                "noreplay@shop.com",
                $email,
                "Новый пароль для сайта MyShop.ru",
                "Ваш пароль: ".$newpass
            );
            echo 'yes';
        }
        else
        {
            echo 'Данный e-mail не найден!';
        }
    }
    else
    {
        echo 'Укажите свой e-mail!';
    }
}
?>