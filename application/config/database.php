<?php
/* Ansible managed: /home/netcop/ansible/roles/web/templates/database.php.j2 modified on 2016-09-11 00:38:42 by netcop on netcop */
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
  	'db_debug' => FALSE,
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
