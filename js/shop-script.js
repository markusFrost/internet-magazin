$(document).ready( function()
{
	$( "#newsticker" ).jCarouselLite({
		vertical:true,
		hoverPause:true,
		btnPrev:"#news-prev",
		btnNext:"#news-next",
		visible:3,
		auto:3000,
		speed:500
	});

$( "#style-grid" ).click(function()
	{
		$( "#block-tovar-list" ).hide();
		$( "#block-tovar-grid" ).show();
		$( "#style-grid" ).attr( "src","/images/icon-grid-active.png" );
		$( "#style-list" ).attr( "src","/images/icon-list.png" );
		$.cookie( 'select_style','grid' )
	});

$( "#style-list" ).click(function()
	{
		$( "#block-tovar-grid" ).hide();
		$( "#block-tovar-list" ).show();
		$( "#style-grid" ).attr( "src","/images/icon-grid.png" );
		$( "#style-list" ).attr( "src","/images/icon-list-active.png" );
		$.cookie( 'select_style','list' );
	});

if ( $.cookie( 'select_style' ) == 'grid' )
	{
		$( "#block-tovar-list" ).hide();
		$( "#block-tovar-grid" ).show();
		$( "#style-grid" ).attr( "src","/images/icon-grid-active.png" );
		$( "#style-list" ).attr( "src","/images/icon-list.png" );
	}
	else
	{
		$( "#block-tovar-grid" ).hide();
		$( "#block-tovar-list" ).show();
		$( "#style-grid" ).attr( "src","/images/icon-grid.png" );
		$( "#style-list" ).attr( "src","/images/icon-list-active.png" );
	}

	$( "#select-sort" ).click( function ()
	{
		$( "#sorting-list" ).slideToggle( 200 );
	});

	$("#block-category > ul > li > a").click( function()
	{
		if ( $(this).attr( 'class' ) != 'active' )// если свёрнута
		{
			$("#block-category > ul > li > ul").slideUp( 400 );
			$( this ).next().slideToggle( 400 );

			$( "#block-category > ul > li > a" ).removeClass( 'active' );
			$(this).addClass('active');
			$.cookie('select_cat', $( this ).attr( 'id' ) );

			console.log ( $( this ).attr( 'id' ) );
		}
		else
		{
			$( "#block-category > ul > li > a" ).removeClass( 'active' );
			$( "#block-category > ul > li > ul" ).slideUp( 400 );
			$.cookie('select_cat','');
			console.log ( $( this ).attr( 'id' ) );
		}
	});

	if ( $.cookie( 'select_cat' ) != '' )
	{
		console.log ( $.cookie( 'select_cat' ) );
		$( "#block-category > ul > li > #" + $.cookie( 'select_cat' ) ).addClass( 'active' ).next().show();
	}

	$( "#genpass" ).click( function()
	{
		$.ajax(
		{
			type : "POST",
			url : "/functions/genpass.php",
			dataType : "html",
			cashe : false,
			success : function( data )
			{
				$( "#reg_pass" ).val( data );
			}
		});
	});

	$( "#reload_captcha" ).click( function()
		{
			$( '#block-captcha>img' ).attr( "src" , "/reg/reg_captcha.php?r=" + Math.random() );
		});

	$(".top-auth").toggle(
		function()
		{
			$(".top-auth").attr( "id" , "active-button" );
			$("#block-top-auth").fadeIn( 200 );
		},
		function()
		{
			$(".top-auth").attr( "id" , "" );
			$("#block-top-auth").fadeOut( 200 );
		}
	);

	$("#button-pass-show-hide").click(function()
	{
		var statuspass = $("#button-pass-show-hide").attr("class");

		if ( statuspass == "pass-show" )
		{
			$( "#button-pass-show-hide").attr( "class", "pass-hide" );

			var $input = $("#auth_pass");
			var change = "text";
			var rep = $("<input placeholder='Пароль' type='" + change + "' />" )
				.attr( "id",$input.attr("id" ))
				.attr( "name",$input.attr("name") )
				.attr( "class",$input.attr("class") )
				.val( $input.val() )
				.insertBefore( $input );
			$input.remove();
			$input = rep;
		}
		else
		{
			$( "#button-pass-show-hide").attr( "class", "pass-show" );

			var $input = $("#auth_pass");
			var change = "password";
			var rep = $("<input placeholder='Пароль' type='" + change + "' />" )
				.attr( "id",$input.attr("id" ))
				.attr( "name",$input.attr("name") )
				.attr( "class",$input.attr("class") )
				.val( $input.val() )
				.insertBefore( $input );
			$input.remove();
			$input = rep;
		}
	});

});