<?php
require_once("comp/fst.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>EMG</title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/keyboardCss.css">



	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&family=Prata&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montaga&family=Prata&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Caudex&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>



	<a href=" " id="upButton" class="upButton" onclick="goUp()" style="height:100px; width:120px;display:block; position: fixed;z-index:50;"> </a>
	<a href=" ">
		<div id="downButton" class="downButton" onclick="goDown(0)" style="z-index:50;"> </div>
	</a>
	<a href=" ">
		<div id="topPageButton" class="homeButton" onclick="goTop(0)" style="z-index:50;">Top of page</div>
	</a>
	<a href=" ">
		<div id="endButton" class="endButton" onclick="goEnd()" style="z-index:50;">End of page</div>
	</a>

</head>

<script>
	function goUp(getir) {    // We used the jQuery library
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $(window).scrollTop() - 250  // 250px up.
		}, 'fast');
			if(getir==0)
		{
			setTimeout(function() {

			var ust = kutu.offsetTop;
			if (ust > 250)		//If it's larger than 250, don't move the box.

			{
				var sol = kutu.offsetLeft;
				kutu.style.top = (ust - 250) + "px";
			}
		}, 300)   // Scrolling the screen takes 300 milliseconds to scroll. This is the animation time.

		}
		

	}

	function goDown(getir) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $(window).scrollTop() + 250
		}, 'fast');
		if(getir==0)
		{
			setTimeout(function() {

			var ust = kutu.offsetTop;
			var sol = kutu.offsetLeft;
			kutu.style.top = (ust + 250) + "px";


		}, 500)
		}
		

	}

	function goTop() {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 'slow');

		setTimeout(function() {

			var sol = kutu.offsetLeft;
			kutu.style.top = (topPageButton.offsetTop) + "px";


		}, 500)
	}

	function goEnd() {
		event.preventDefault();
		var windowHeight = window.innerHeight;
		var body = document.body,
			html = document.documentElement;

		var height = Math.max(body.scrollHeight, body.offsetHeight,
			html.clientHeight, html.scrollHeight, html.offsetHeight);


		$('html, body').animate({
			scrollTop: height
		}, 1000);

		setTimeout(function() {

			var sol = kutu.offsetLeft;
			kutu.style.top = ($('#endButton').offset().top + 30) + "px";


		}, 500)


	}
</script>



<script type="text/javascript">
	var a;
	var inputYazilcak;

	function findCollapsion() {  //when the box hovers over any element, it finds it.
		var elems = document.body.getElementsByTagName("*");  // elems holds all the elements. [like div, href, button,...]
		for (var i = 0; i < elems.length; i++) {   //it loops all the elements.

			if (elems[i].id.length > 0) {
				if (isCollide('kutu', elems[i].id)) {    // kutunun bulunduğu posizyonda herhangi bir element varsa buluyor.

					a = elems[i];

					//$('#' + elems[i].id).trigger('click')

					if (a.id == 'nav-links') {
						//sadece span için yap
					}
					document.getElementById(elems[i].id).click();

					if (a.type == "text") {
						inputYazilcak = a;
						hedefInput = a.id;
					}
				}

			}

			if (elems[i].id == 'kutu') a = false;
			continue;
		}

	}

	function isCollide(a, b) { // The a value is all the elements it finds in the for loop in findCollapsion. (in HTML), The value b takes the positions of our box.

		var aX = document.getElementById(a).getBoundingClientRect().x
		var bX = document.getElementById(b).getBoundingClientRect().x
		var aY = document.getElementById(a).getBoundingClientRect().y
		var bY = document.getElementById(b).getBoundingClientRect().y
		var aHeight = $('#' + a).height() != 0 ? $('#' + a).height() : $('#' + a).outerHeight();
		var bHeight = $('#' + b).height() != 0 ? $('#' + b).height() : $('#' + b).outerHeight();
		var aWidth = $('#' + a).width() != 0 ? $('#' + a).width() : $('#' + a).outerWidth();
		var bWidth = $('#' + b).width() != 0 ? $('#' + b).width() : $('#' + b).outerWidth();
		console.log(aHeight)
		return !(						// The purpose, the box and the element, overlapped or intersected?  [kesişme - üst üste gelme]
			((aY + aHeight) < (bY)) ||
			(aY > (bY + bHeight)) ||
			((aX + aWidth) < bX) ||
			(aX > (bX + bWidth))
		);
	}
	window.addEventListener("keydown", function(e) {
		// space and arrow keys
		if ([37, 38, 39, 40].indexOf(e.keyCode) > -1) {
			e.preventDefault();
		}
	}, false);

	$('#kutu')
	window.onkeydown = function(olay) {
		var ust = kutu.offsetTop
		var sol = kutu.offsetLeft;
		var mesaj = "";

		if (olay.keyCode == 13) {	// Every time, we rotate the circle, its new location is registered with localstorage. LThe location is kept in a variable in "Local Storage", that is, browser (google). The location pulls from "Local Storage" every time the page is refreshed.


			findCollapsion()	
		}

		if (olay.keyCode == 1) {
			document.getElementById('kutu').innerHTML = "<p style='margin-top:50px;'>" + "Left:" + sol + "px" + "<br>" + "TOP:" + ust + "px" + "<br>" + "CLİCK" + "</p>";
		}

		if (olay.keyCode == 37) {

			document.getElementById('kutu').innerHTML = "<p style='margin-top:50px;'>" + "Left:" + sol + "px" + "<br>" + "TOP:" + ust + "px" + "<br>" + "LEFT" + "</p>";
			kutu.style.left = (sol - 30) + "px";
			localStorage.setItem("kutuLeft", sol - 60);

		}
		if (olay.keyCode == 38) {
			document.getElementById('kutu').innerHTML = "<p style='margin-top:50px;'>" + "Left:" + sol + "px" + "<br>" + "TOP:" + ust + "px" + "<br>" + "UP" + "</p>";
			kutu.style.top = (ust - 30) + "px";
			localStorage.setItem("kutuTop", ust - 30);


		}
		if (olay.keyCode == 39) {
			document.getElementById('kutu').innerHTML = "<p style='margin-top:50px;'>" + "Left:" + sol + "px" + "<br>" + "TOP:" + ust + "px" + "<br>" + "RIGHT" + "</p>";
			kutu.style.left = (sol + 30) + "px";
			localStorage.setItem("kutuRight", sol + 30);
									if(ust+60 < 60)
									{
										goDown(1)
									}

		}
		if (olay.keyCode == 40) {
			document.getElementById('kutu').innerHTML = "<p style='margin-top:50px;'>" + "Left:" + sol + "px" + "<br>" + "TOP:" + ust + "px" + "<br>" + "DOWN" + "</p>";
			kutu.style.top = (ust + 30) + "px";
			localStorage.setItem("kutuBottom", ust + 60);
				var innerHeight = window.innerHeight;		
									console.log(ust+60)
									if(ust+60 > innerHeight)
									{
										goDown(1)
									}
		}
	}
</script>

</head>

<body>
	<script>
		$(document).ready(function() {

			var windowHeight = window.innerHeight;
			var body = document.body,
				html = document.documentElement;

			var heightXD = Math.max(body.scrollHeight, body.offsetHeight,
				html.clientHeight, html.scrollHeight, html.offsetHeight);


			var kutuTop;

			if (localStorage.getItem("kutuTop") > 0 && localStorage.getItem("kutuTop") < window.window.innerHeight) {
				kutuTop = localStorage.getItem("kutuTop");
			} else {
				kutuTop = 300;
			}
			var kutuLeft = localStorage.getItem("kutuLeft") != null ? localStorage.getItem("kutuLeft") : '50%';

			$("#kutu").css("left", kutuLeft + "px");
			$("#kutu").css("top", kutuTop + "px");
		});
	</script>
	<div id="kutu" style="left: 80%; top: 35%;">
		<p style="margin-top:50px;"></p>
	</div>

	<style type="text/css">
		#kutu {
			width: 30px;
			height: 30px;
			border: 1px solid black;
			border-radius: 100px;
			position: absolute;
			text-align: center;
			opacity: 1;
			color: black;
			font-size: 12px;
			font-weight: bold;
			box-shadow: 1px 1px 50px black;
			transition: 0.5s ease-in-out 0.1s;
			z-Index: 99999;
		}

		#kutu:hover {
			background-color: #212529;
		}
	</style>