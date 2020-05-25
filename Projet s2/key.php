<?php
$file = fopen("./keyOf.txt", "r");
	$key = fread($file, filesize('keyOf.txt'));
	fclose($file);
	echo $key;