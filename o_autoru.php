<!DOCTYPE html>
<html>

<head>
	<title>O autoru</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:500&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css?v5">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Montserrat Alternates', sans-serif;
		}
	</style>
</head>

<body class="autor_body">
	<section>
		<div class="light"></div>
		<h2>Биографија</h2><br>
		<p>Зовем се Никола Марковић. Рођен сам у Крушевцу 24.5.1993. године. 
			Живим у Лазаревцу где сам завршио основну и средњу школу. У Београду сам 2012. године уписао Православни Богословски факултет
			и дипломирао 2017. године. Након тога, уписао сам и успешно завршио мастер студије 2019. године.
			Од 2017. године радим у Основној школи као наставник верске наставе. 
			Web development сам самостално кренуо да учим почетком 2019. године и похађао неколико онлајн курсева.
			Тако сам завршио онлајн курс за PHP Web Developera, у IT школи која се налази у Београду и зове се IT OIP.
			Хоби ми је музика, бавим се свирањем клавијатуре дужи низ година. 
		</p>
		<img src="slike/pic1.jpg">
	</section>
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
	</script>
	<script>
		$(function() {
			$(document).mousemove(function(e) {
				var X = e.pageX;
				var Y = e.pageY;
				$('.light').css('background', 'radial-gradient(circle at ' + X + 'px ' + Y + 'px, transparent, #000 25%)');
			});
		});
	</script>
	<a href="korisnik.php" class="nazad">врати се назад</a>


</body>

</html>