<?php
 include("func.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>simple stat page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="w3_mod.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
	<div class="w3-container w3-center"><h2>simple status page</h2></div>
	<div class="w3-container w3-responsive w3-center w3-text-black">
			<table class="w3-table-all">
				<tr>
					<th class="w3-center">SITE</th>
					<th class="w3-center">STATUS</th>
					<th clasS="w3-center">HTTP-CODE </th>
				</tr>
					<?php getData();?>
			</table>
	</div>
	<br />
	<div  class="w3-container w3-center"><a href="index.php"><i class="refresh material-icons w3-xxxlarge">refresh</i></a></div>
</body>
</html>
