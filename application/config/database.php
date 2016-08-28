<?php
/* Ansible managed: /home/netcop/ansible/templates/database.php.j2 modified on 2016-08-13 00:28:48 by netcop on netcop */
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => '',
	'username' => 'netcop',
	'password' => 'netcop',
	'database' => 'netcop',
	'dbdriver' => 'postgre',
	'dbprefix' => '',
	'pconnect' => FALSE,
  	'db_debug' => TRUE,
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
