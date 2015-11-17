<?php
define('DB_HOST','localhost'); //getenv('OPENSHIFT_MYSQL_DB_HOST'));
//define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER','root');//getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS','');//getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME','test');//getenv('OPENSHIFT_GEAR_NAME'));

try {
	$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;//.';port='.DB_PORT;
	$dbh = new PDO($dsn, DB_USER, DB_PASS);
}
catch (PDOException $e){
	echo $e->getMessage();
}

?>