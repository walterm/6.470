<!DOCTYPE html>
<?php 
function isBitten() {
	return rand(0,1) == 1;
}
?>

<html>
	<head>

	</head>
	<body>
		<p> 
			<?php
				$str = isBitten() ? "Charlie bit your finger!" : "Charlie did not bite your finger!";
				echo $str;
			?>
		</p>

	</body>
</html>