<?php
$sql = sprintf(
	'UPDATE users SET password = "%s" WHERE id = %s',
	$_POST['password'],
	$_GET['id']
);
// password=abc";--
echo $sql;
