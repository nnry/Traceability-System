<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'port' => '1433',
	'hostname' => 'Driver={SQL Server};Server=192.168.161.101\PCSDBSV;Database=traceability_db_dev;AutoTranslate=yes;',
	'username' => 'pcs_admin',
	'password' => 'P@ss!fa',
	'database' => 'traceability_db_dev',
	'dbdriver' => 'odbc',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
$db['qgate'] = array(
	'dsn'	=> '',
	'port' => '1433',
	'hostname' => 'Driver={SQL Server};Server=192.168.161.101\PCSDBSV;Database=qgate_db_dev;AutoTranslate=yes;',
	'username' => 'pcs_admin',
	'password' => 'P@ss!fa',
	'database' => 'qgate_db_dev',
	'dbdriver' => 'odbc',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


$name = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.17.131.18)(PORT = 1524)) (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = EXPK)))';

$db['exp_db'] = array(
	'dsn' => '',
	'hostname' => $name,
	'username' => 'EXPK',
	'password' => 'EXPK',
	'database' => 'EXPK',
	'dbdriver' => 'oci8',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
