<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Product Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="gh-buttons.css">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script defer src="js/main.js"></script>
</head>
<body>

<section class="wrapper">
	<?php include 'header.php'; ?>
	<?php include 'navAdmin.php'; ?>
	<article class="main-content">
		<table class="table">
			<thead>
				<tr class="rowBold">
					<td class="col">Personal Number</td>
					<td class="col">Full Name</td>
					<td class="col"></td>
				</tr>
				</thead>
				<tbody>
				<tr class="row">
					<td class="col">A</td>
					<td class="col">5</td>
					<td class="col">
			            <button class="button icon edit">edit</button>
			        </td>
				</tr>
				<tr class="row">
					<td class="col">B</td>
					<td class="col">1</td>
					<td class="col">
			            <button class="button icon edit">edit</button>
			        </td>
				</tr>
				<tr class="row">
					<td class="col">C</td>
					<td class="col">3</td>
					<td class="col">
			            <button class="button icon edit">edit</button>
			        </td>
				</tr>
				<tr class="row">
					<td class="col">D</td>
					<td class="col">4</td>
					<td class="col">
			            <button class="button icon edit">edit</button>
			        </td>
				</tr>
				</tbody>
			</table>        
	    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	    <script src="reg.js"></script>
	</article>
	<?php include 'footer.php'; ?>
</section>
</body>
</html>

