<!-- Основоной верхний блок -->
<div id="block-header">
	<!-- Верхний блок с навигацией -->
	<div id="header-top-block">
		<!-- Список с навигацией -->
		<ul id="header-top-menu">
			<li>
				Ваш город -
				<span>Тамбов</span>
			</li>
			<li>
				<a href="o-nas.php">О нас</a>
			</li>
			<li>
				<a href="magaziny.php">Магазины</a>
			</li>
			<li>
				<a href="contacts.php">Контакты</a>
			</li>
		</ul>

		<!-- Вход и регистрация -->

		<?php
		if ( $_SESSION['auth'] == 'yes_auth' )
		{
			echo '<p id="auth-user-info" align="right"><img src="/images/user.png" alt="">Здравствуйте, '.$_SESSION['auth_name'].'! </p>';
		}
		else
		{
			echo '<p id="reg-auth-title" align="right"> <a class="top-auth btn-grad">Вход</a> <a href="registration.php">Регистрация</a> </p>';
		}
		?>



<!--		<p id="reg-auth-title" align="right">-->
<!--			<a class="top-auth btn-grad">Вход</a>-->
<!--			<a href="registration.php">Регистрация</a>-->
<!--		</p>-->

		<div id="block-top-auth">
			<div class="corner"></div>
			<form method="post" action="">
				<ul id="input-email-pass">
					<h3>Вход</h3>
					<p id="message-auth">Неверный логин или пароль</p>
					<li><center><input type="text" id="auth_login" placeholder="Логи или E-mail"></center>	</li>
					<li><center><input type="password" id="auth_pass" placeholder="Пароль"><span class="pass-show" id="button-pass-show-hide"></span></center> </li>
<!--				</ul>-->
				<ul id="list-auth">
					<li><input type="checkbox" name="rememberme" id="rememberme"/><label for="rememberme">Запомнить меня</label></li>
					<li><a href="#" id="remindpass">Забыли пароль?</a></li>
				</ul>
				<p align="right" id="button-auth"><a>Вход</a></p>
				<p class="auth-loading" align="right"><img src="/images/loading.gif" alt=""></p>
                </ul>
			</form>

            <div id="block-remind">
                <h3>Востановление <br> пароля</h3>
                <p id="message-remind" class="message-remind-success"></p>
                <center><input type="text" id="remind-email" placeholder="Ваш E-mail"></center>
                <p id="button-remind"><a>Готово</a></p>
                <p align="right" class="auth-loading"><img src="/images/loading.gif" alt=""></p>
                <p id="prev-auth">Назад</p>
            </div>

		</div>


	</div>
	<!-- Линия -->
	<hr>


	<div id="block-user">
		<div class="corner2"></div>
		<ul>
			<li><img src="/images/user_info.png" alt=""><a href="../profile.php">Профиль</a></li>
			<li><img src="/images/logout.png" alt=""><a id="logout">Выход</a></li>
		</ul>

	</div>


	<!-- Логотип -->
	<img id="img-logo" src="/images/logo.png" alt="">

	<!-- Информационный блок -->
	<div id="personal-info">
		<p align="right">Звонок бесплатный.</p>
		<h3 align="right">8 (800) 100-12-34</h3>

		<img src="images/phone-icon.png" alt="">
		<p align="right">Режим работы:</p>
		<p align="right">Будние дни: с 9:00 до 18:00</p>
		<p align="right">Суббота, воскресенье - выходные</p>

		<img src="/images/time-icon.png" alt="">
		</div>
		
		<div id="block-search">
			<form method="GET" action="search.php?q=">
			<span></span>
				<input type="text" id="input-search" name="q" placeholder="Поиск среди более 100 000 товаров" />
				<input type="submit" id="button-search" value="Поиск">
			</form>
		</div>

</div>

<div id="top-menu">
	<ul>
		<li> <img src="/images/shop.png"> <a href="index.php">Главная</a> </li>
		<li><img src="/images/new-32.png" alt=""> <a href="">Новинки</a></li>
		<li><img src="/images/bestprice-32.png" alt=""><a href="">Лидеры продаж</a></li>
		<li><img src="/images/sale-32.png" alt=""><a href="">Распродажа</a></li>
	</ul>

<p align="right" id="block-basket">
<img src="/images/cart-icon.png" alt="">
<a href="">Корзина пуста</a>
</p>

<div id="nav-line"></div>

</div>