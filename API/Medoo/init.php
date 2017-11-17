<?php
	require  'Medoo.php';
	
	// Using Medoo namespace
	use Medoo\Medoo;

	$database = new Medoo([
		// required
		'database_type' => 'mysql',
		'database_name' => 'NoWaitAppointments',
		'server' => 'localhost',
		'username' => 'root',
		'password' => '',

		// [optional]
		'charset' => 'utf8',
		'port' => 3306,
	]);
?>