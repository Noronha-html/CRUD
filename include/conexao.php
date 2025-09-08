<?php
define('DBSERVER', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBBASE', 'empresa');

$conn = mysqli_connect(DBSERVER, DBUSER, DBPASS, DBBASE);
?>