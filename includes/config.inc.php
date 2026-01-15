<?php

/******************************************************************************
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL63573ZF30R
 *  DOMAIN: global.gmoplus.com
 ******************************************************************************/

define('RL_DS', DIRECTORY_SEPARATOR);

define('RL_DEBUG', false);
define('RL_DB_DEBUG', false);
define('RL_MEMORY_DEBUG', false);
define('RL_AJAX_DEBUG', false);

// MySQL credentials from environment variables
define('RL_DBPORT', getenv('DB_PORT') ?: '3306');
define('RL_DBHOST', getenv('DB_HOST') ?: 'localhost');
define('RL_DBUSER', getenv('DB_USER') ?: 'root');
define('RL_DBPASS', getenv('DB_PASSWORD') ?: '');
define('RL_DBNAME', getenv('DB_NAME') ?: 'global_gmoplus');
define('RL_DBPREFIX', getenv('DB_PREFIX') ?: 'fl_');

// System paths
define('RL_DIR', '');
define('RL_ROOT', '/app/' . RL_DIR);
define('RL_INC', RL_ROOT . 'includes' . RL_DS);
define('RL_CLASSES', RL_INC . 'classes' . RL_DS);
define('RL_CONTROL', RL_INC . 'controllers' . RL_DS);
define('RL_LIBS', RL_ROOT . 'libs' . RL_DS);
define('RL_TMP', RL_ROOT . 'tmp' . RL_DS);
define('RL_UPLOAD', RL_TMP . 'upload' . RL_DS);
define('RL_FILES', RL_ROOT . 'files' . RL_DS);
define('RL_PLUGINS', RL_ROOT . 'plugins' . RL_DS);
define('RL_CACHE', RL_TMP . 'cache_1626966733' . RL_DS);

// System URLs
define('RL_URL_HOME', getenv('APP_URL') ? getenv('APP_URL') . '/' : 'https://global.gmoplus.com/');
define('RL_FILES_URL', RL_URL_HOME . 'files/');
define('RL_LIBS_URL', RL_URL_HOME . 'libs/');
define('RL_PLUGINS_URL', RL_URL_HOME . 'plugins/');

// Admin paths
define('ADMIN', 'admin');
define('ADMIN_DIR', ADMIN . RL_DS);
define('RL_ADMIN', RL_ROOT . ADMIN . RL_DS);
define('RL_ADMIN_CONTROL', RL_ADMIN . 'controllers' . RL_DS);

// Memcache
define('RL_MEMCACHE_HOST', '127.0.0.1');
define('RL_MEMCACHE_PORT', 11211);

// Redis
define('RL_REDIS_USER', '');
define('RL_REDIS_PASS', '');
define('RL_REDIS_HOST', getenv('REDIS_HOST') ?: '127.0.0.1');
define('RL_REDIS_PORT', getenv('REDIS_PORT') ?: 6379);

/* LICENSE */
define('RL_SETUP', 'JGxpY2Vuc2VfZG9tYWluID0gImdsb2JhbC5nbW9wbHVzLmNvbSI7JGxpY2Vuc2VfbnVtYmVyID0gIkZMNjM1NzNaRjMwUiI7');
