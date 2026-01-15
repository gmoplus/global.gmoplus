<?php

/******************************************************************************
 *  DEBUG PAGE CHECKER
 ******************************************************************************/

use Flynax\Utils\Valid;

require_once 'includes' . DIRECTORY_SEPARATOR . 'config.inc.php';

/* system controller */
require_once RL_INC . 'control.inc.php';

// select all languages
$languages = $rlLang->getLanguagesList();

/* rewrite GET method variables */
$reefless->loadClass('Navigator');

echo "<h2>URL Debug</h2>";
echo "<p>REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "</p>";
echo "<p>GET Parameters:</p>";
echo "<pre>";
print_r($_GET);
echo "</pre>";

// Simulate the URL parsing
$_GET['page'] = 'my-quotes';
$_GET['id'] = '10765';

$rlNavigator->transformLinks();
$rlNavigator->rewriteGet($_GET['rlVareables'], $_GET['page'], $_GET['language']);

echo "<h2>After Navigation Parsing</h2>";
echo "<p>cPage: " . $rlNavigator->cPage . "</p>";
echo "<p>GET Parameters after parsing:</p>";
echo "<pre>";
print_r($_GET);
echo "</pre>";

/* define site languages */
$rlLang->defineLanguage($rlNavigator->cLang);

// Load main types classes
$reefless->loadClass('ListingTypes', null, false, true);
$reefless->loadClass('AccountTypes', null, false, true);

// Define system page
$page_info = $rlNavigator->definePage();

echo "<h2>Page Info</h2>";
echo "<pre>";
print_r($page_info);
echo "</pre>";

// Check if page exists in database
$page_sql = "SELECT * FROM `{db_prefix}pages` WHERE `Key` = 'my_quotes'";
$page_result = $rlDb->getRow($page_sql);

echo "<h2>Pages Table Check</h2>";
echo "<pre>";
print_r($page_result);
echo "</pre>";

// Check controller file
$controller_file = RL_CONTROL . 'my_quotes.inc.php';
echo "<h2>Controller File Check</h2>";
echo "<p>Controller file path: " . $controller_file . "</p>";
echo "<p>File exists: " . (file_exists($controller_file) ? 'YES' : 'NO') . "</p>";
echo "<p>File readable: " . (is_readable($controller_file) ? 'YES' : 'NO') . "</p>";

if (file_exists($controller_file)) {
    echo "<p>File size: " . filesize($controller_file) . " bytes</p>";
}

// Test direct path lookup
$path_sql = "SELECT * FROM `{db_prefix}pages` WHERE `Path` = 'my-quotes' AND `Status` = 'active'";
$path_result = $rlDb->getRow($path_sql);

echo "<h2>Direct Path Lookup</h2>";
echo "<pre>";
print_r($path_result);
echo "</pre>"; 