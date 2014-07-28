@extends('layout')
@section('title') @stop

@section('content')

<html>
<head>
	<style>
		.welcome {

			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;		
			position: absolute;
			left: 45%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}
		 	.contacto {

			margin:3;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;	
			background-color: #E6E6FA;
			position: fixed;
			bottom: 0;
			right: 0;
	
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;

		}
		h2 {
			font-size: 20px;

		}
		h3{
			font-size: 15px;
		}

	</style>
</head>
<body>
		<div class="welcome">
			<a ><img src="assets/images/logo.png" alt="Contacto Aduana San Antonio"></a>
			<h1>Bienvenido al Sistema de Cabotaje</h1>
			<h2>Aduana Puerto San Antonio</h2>
		</div>
		
        <div class="contacto">
			<h3>Dirección: Angamos N° 1194, San Antonio. Teléfonos: (56 35) 2200011 - 2200025 / Fax: 2200019. Atención OIRS: lunes a viernes, de 8:30 a 14:00 horas</h3>
		</div>
</body>
@stop