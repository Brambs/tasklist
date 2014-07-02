<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <title>Sonatask</title>
	    <meta name="robots" content="index, follow">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="css/styles.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700italic,700,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	    <script type="text/javascript" src="javascript/jquery-2.1.1.js"></script>
	    <script type="text/javascript" src="javascript/index.js"></script>
	</head>
	<body class="light">
		
		<div class="main">
			<div class="notification"></div>
			<header class="header">
				<a href="index.html" class="logo"></a>
			</header>
			<section class="active">
			<div class="add-container">
				<input type="text" placeholder="¿Qu&eacute; tienes que hacer?" class="add-item">
				<a href="#" class="add-btn"></a>
			</div>

				<div class="clearfix"></div>
				<ul  id="active-list">
					<li><input type="checkbox" class="checkbox"> Item 1</li>
					<li><input type="checkbox" class="edit checkbox"> Item 2 <a href="#" class="submit"></a></li>
					<li><input type="checkbox" class="checkbox"> Item 3</li>
				</ul>
			</section>
			<section class="inactive">
				<h3>Completed tasks</h3>
				<ul id="inactive-list">
					<li><input type="checkbox"> Item 1</li>
					<li><input type="checkbox"> Item 2</li>
					<li><input type="checkbox"> Item 3</li>
				</ul>
				<a href="#" class="clear"><img src="images/clear.png"><br>Clear all</a>
			</section>
		</div>
	</body>
</html>