<?php

require __DIR__.'/../vendor/autoload.php';

//CONFIGURACIÓN PROVENIENTE DEL CONFIGURACIÓN
if(file_exists(__DIR__.'/../app/config/db.php')){
	$configDB = require __DIR__.'/../app/config/db.php';
}else{
	$configDB = array(
		"driver"=>"mysql",
		"user"=>"",
		"password"=>"",
		"dbname"=>"",
		"host"=>"localhost",
		"port"=>"3306"
	);
};

putenv("db_driver=".$configDB["driver"]);
putenv("db_user=".$configDB["user"]);
putenv("db_password=".$configDB["password"]);
putenv("db_dbname=".$configDB["dbname"]);
putenv("db_host=".$configDB["host"]);
putenv("db_port=".$configDB["port"]);
//CONFIGURACIÓN PROVENIENTE DEL CONFIGURACIÓN

$f3 = \Base::instance();
if(!file_exists(__DIR__.'/../config.ini')){
	die("Error ....");
}
if(!file_exists(__DIR__.'/../routes.ini')){
	die("Error ....");
}
$f3->config(__DIR__.'/../routes.ini');
$f3->config(__DIR__.'/../config.ini',true);


putenv("db_driver");
putenv("db_user");
putenv("db_password");
putenv("db_dbname");
putenv("db_host");
putenv("db_port");
$f3->run();

?>