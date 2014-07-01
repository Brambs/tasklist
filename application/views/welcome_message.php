<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <title>Sonatask</title>
	    <meta name="robots" content="index, follow">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="css/styles.css" rel="stylesheet">
	    <script type="text/javascript" src="javascript/jquery-2.1.1.js"></script>
	    <script type="text/javascript" src="javascript/index.js"></script>
	</head>
	<body class="light">
		<div class="main">
			<header class="header">
				<a href="index.html" class="logo"></a>
			</header>
			<section class="active">
				<input type="text" placeholder="¿Qu&eacute; tienes que hacer?" class="add-item">
				<a href="#" class="add-btn">+</a>

				<ul>
					<li><input type="checkbox"> Item 1</li>
					<li><input type="checkbox" class="edit"> Item 2 <a href="#" class="submit"></a></li>
					<li><input type="checkbox"> Item 3</li>
				</ul>
			</section>
			<section class="inactive">
				<h2>Actividades completadas</h2>
				<ul>
					<li><input type="checkbox"> Item 1</li>
					<li><input type="checkbox"> Item 2</li>
					<li><input type="checkbox"> Item 3</li>
				</ul>
				<a href="#" class="clear">Borrar actividades completadas</a>
			</section>
		</div>
	</body>
</html>