<?php

if(!defined('DS'))
{
    define('DS', DIRECTORY_SEPARATOR);
}
define('APP_PATH', realpath(dirname(__FILE__)));
define('VIEWS_PATH', APP_PATH . DS . 'views');
//define('PS', PATH_SEPARATOR);
//define('CONTROLLER_PATH', APP_PATH . DS . 'controllers');
//define('MODEL_PATH', APP_PATH . DS . 'models');

//database config
defined('DATABASE_HOST_NAME') ? null :define('DATABASE_HOST_NAME','localhost');
defined('DATABASE_USER_NAME') ? null :define('DATABASE_USER_NAME','root');
defined('DATABASE_PASSWORD') ? null :define('DATABASE_PASSWORD','root');
defined('DATABASE_DB_NAME') ? null :define('DATABASE_DB_NAME','php_pdo');
defined('DATABASE_PORT_NUMBER') ? null :define('DATABASE_PORT_NUMBER',3306);
defined('DATABASE_CONN_DRIVER') ? null :define('DATABASE_CONN_DRIVER',1);

