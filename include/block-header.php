<!-- ��������� ������� ���� -->
<div id="block-header">
	<!-- ������� ���� � ���������� -->
	<div id="header-top-block">
		<!-- ������ � ���������� -->
		<ul id="header-top-menu">
			<li>
				��� ����� -
				<span>������</span>
			</li>
			<li>
				<a href="o-nas.php">� ���</a>
			</li>
			<li>
				<a href="magaziny.php">��������</a>
			</li>
			<li>
				<a href="contacts.php">��������</a>
			</li>
		</ul>

		<!-- ���� � ����������� -->

		<?php
		if ( $_SESSION['auth'] == 'yes_auth' )
		{
			echo '<p id="auth-user-info" align="right"><img src="/images/user.png" alt="">������������, '.$_SESSION['auth_name'].'! </p>';
		}
		else
		{
			echo '<p id="reg-auth-title" align="right"> <a class="top-auth btn-grad">����</a> <a href="registration.php">�����������</a> </p>';
		}
		?>



<!--		<p id="reg-auth-title" align="right">-->
<!--			<a class="top-auth btn-grad">����</a>-->
<!--			<a href="registration.php">�����������</a>-->
<!--		</p>-->

		<div id="block-top-auth">
			<div class="corner"></div>
			<form method="post" action="">
				<ul id="input-email-pass">
					<h3>����</h3>
					<p id="message-auth">�������� ����� ��� ������</p>
					<li><center><input type="text" id="auth_login" placeholder="���� ��� E-mail"></center>	</li>
					<li><center><input type="password" id="auth_pass" placeholder="������"><span class="pass-show" id="button-pass-show-hide"></span></center> </li>
<!--				</ul>-->
				<ul id="list-auth">
					<li><input type="checkbox" name="rememberme" id="rememberme"/><label for="rememberme">��������� ����</label></li>
					<li><a href="#" id="remindpass">������ ������?</a></li>
				</ul>
				<p align="right" id="button-auth"><a>����</a></p>
				<p class="auth-loading" align="right"><img src="/images/loading.gif" alt=""></p>
                </ul>
			</form>

            <div id="block-remind">
                <h3>������������� <br> ������</h3>
                <p id="message-remind" class="message-remind-success"></p>
                <center><input type="text" id="remind-email" placeholder="��� E-mail"></center>
                <p id="button-remind"><a>������</a></p>
                <p align="right" class="auth-loading"><img src="/images/loading.gif" alt=""></p>
                <p id="prev-auth">�����</p>
            </div>

		</div>


	</div>
	<!-- ����� -->
	<hr>
	<!-- ������� -->
	<img id="img-logo" src="/images/logo.png" alt="">

	<!-- �������������� ���� -->
	<div id="personal-info">
		<p align="right">������ ����������.</p>
		<h3 align="right">8 (800) 100-12-34</h3>

		<img src="images/phone-icon.png" alt="">
		<p align="right">����� ������:</p>
		<p align="right">������ ���: � 9:00 �� 18:00</p>
		<p align="right">�������, ����������� - ��������</p>

		<img src="/images/time-icon.png" alt="">
		</div>
		
		<div id="block-search">
			<form method="GET" action="search.php?q=">
			<span></span>
				<input type="text" id="input-search" name="q" placeholder="����� ����� ����� 100 000 �������" />
				<input type="submit" id="button-search" value="�����">
			</form>
		</div>

</div>

<div id="top-menu">
	<ul>
		<li> <img src="/images/shop.png"> <a href="index.php">�������</a> </li>
		<li><img src="/images/new-32.png" alt=""> <a href="">�������</a></li>
		<li><img src="/images/bestprice-32.png" alt=""><a href="">������ ������</a></li>
		<li><img src="/images/sale-32.png" alt=""><a href="">����������</a></li>
	</ul>

<p align="right" id="block-basket">
<img src="/images/cart-icon.png" alt="">
<a href="">������� �����</a>
</p>

<div id="nav-line"></div>

</div>