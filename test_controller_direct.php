<?php
// DIRECT CONTROLLER TEST - Test the controller without admin framework
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>🧪 DIRECT CONTROLLER TEST</h2>\n";

try {
    // Load basic requirements
    require_once 'includes/config.inc.php';
    require_once RL_CLASSES . 'rlDb.class.php';
    require_once RL_CLASSES . 'reefless.class.php';
    
    echo "<div style='color: green;'>✓ Basic classes loaded</div>\n";
    
    // Create database connection
    $rlDb = new rlDb();
    $rlDb->connect(RL_DBHOST, RL_DBPORT, RL_DBUSER, RL_DBPASS, RL_DBNAME);
    
    echo "<div style='color: green;'>✓ Database connected</div>\n";
    
    // Create basic reefless instance
    $reefless = new reefless();
    
    echo "<div style='color: green;'>✓ Reefless created</div>\n";
    
    // Load other required classes
    $reefless->loadClass('Valid');
    $reefless->loadClass('Config');
    $reefless->loadClass('Lang');
    
    echo "<div style='color: green;'>✓ Additional classes loaded</div>\n";
    
    // Get configuration
    $config = $rlConfig->allConfig();
    
    echo "<div style='color: green;'>✓ Config loaded</div>\n";
    
    // Get language phrases (simplified)
    $lang = array(
        'quote_requests' => 'Teklif Talepleri',
        'quote_requests_management' => 'Teklif Talepleri Yönetimi',
        'all' => 'Tümü',
        'home' => 'Ana Sayfa'
    );
    
    echo "<div style='color: green;'>✓ Language array created</div>\n";
    
    // Create a simple Smarty-like object for testing
    $rlSmarty = new stdClass();
    $rlSmarty->assigned_vars = array();
    
    $rlSmarty->assign_by_ref = function($var, &$value) {
        $this->assigned_vars[$var] = &$value;
        echo "<div style='color: blue;'>Assigned reference: {$var}</div>\n";
    };
    
    $rlSmarty->assign = function($var, $value) {
        $this->assigned_vars[$var] = $value;
        echo "<div style='color: blue;'>Assigned: {$var}</div>\n";
    };
    
    echo "<div style='color: green;'>✓ Mock Smarty created</div>\n";
    
    // Define REALM constant for controller
    if (!defined('REALM')) {
        define('REALM', 'admin');
    }
    
    echo "<div style='color: green;'>✓ REALM defined</div>\n";
    
    // Set some GET parameters for testing
    $_GET['status'] = 'all';
    $_GET['pg'] = 1;
    
    echo "<div style='color: green;'>✓ Test parameters set</div>\n";
    
    echo "<h3>🚀 Loading Controller...</h3>\n";
    
    // Include the controller
    ob_start();
    include 'admin/controllers/quote_requests.inc.php';
    $controller_output = ob_get_clean();
    
    echo "<div style='color: green;'>✓ Controller loaded successfully!</div>\n";
    
    if ($controller_output) {
        echo "<h3>Controller Output:</h3>\n";
        echo "<pre>" . htmlspecialchars($controller_output) . "</pre>\n";
    } else {
        echo "<div style='color: green;'>✓ No output from controller (expected)</div>\n";
    }
    
    echo "<h3>📊 Template Variables Assigned:</h3>\n";
    foreach ($rlSmarty->assigned_vars as $var => $value) {
        if (is_array($value)) {
            echo "<div><strong>{$var}:</strong> Array (" . count($value) . " items)</div>\n";
        } elseif (is_object($value)) {
            echo "<div><strong>{$var}:</strong> Object (" . get_class($value) . ")</div>\n";
        } else {
            echo "<div><strong>{$var}:</strong> " . htmlspecialchars($value) . "</div>\n";
        }
    }
    
    echo "<hr>\n";
    echo "<div style='background: green; color: white; padding: 10px;'>";
    echo "<strong>✅ SUCCESS!</strong> Controller loaded without errors.";
    echo "</div>\n";
    
} catch (Exception $e) {
    echo "<div style='background: red; color: white; padding: 10px;'>";
    echo "<strong>❌ ERROR:</strong> " . $e->getMessage();
    echo "<br>File: " . $e->getFile();
    echo "<br>Line: " . $e->getLine();
    echo "</div>\n";
    echo "<pre>" . $e->getTraceAsString() . "</pre>\n";
}

echo "<h3>📋 Check Error Logs:</h3>\n";
$error_log_file = 'quote_controller_errors.log';
if (file_exists($error_log_file)) {
    echo "<div style='background: #f0f0f0; padding: 10px; max-height: 300px; overflow-y: scroll;'>";
    echo "<strong>Error Log Contents:</strong><br>\n";
    echo "<pre>" . file_get_contents($error_log_file) . "</pre>";
    echo "</div>\n";
} else {
    echo "<div style='color: orange;'>No error log file found yet.</div>\n";
}
?> 