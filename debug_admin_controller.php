<?php
// DEBUG SCRIPT - Admin Controller Issues
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'debug_errors.log');

echo "<h2>🔍 DEBUG: Admin Controller Issues</h2>\n";
echo "<style>body{font-family:Arial;} .success{color:green;} .error{color:red;} .warning{color:orange;} .info{color:blue;}</style>\n";

try {
    require_once 'includes/config.inc.php';
    require_once RL_CLASSES . 'rlDb.class.php';
    echo "<div class='success'>✓ Config files loaded successfully</div>\n";

    $rlDb = new rlDb();
    $rlDb->connect(RL_DBHOST, RL_DBPORT, RL_DBUSER, RL_DBPASS, RL_DBNAME);
    echo "<div class='success'>✓ Database connected successfully</div>\n";

    // Test 1: Check admin_controllers table
    echo "<h3>📋 Test 1: Admin Controllers Table</h3>\n";
    $controller_check = $rlDb->getRow("SELECT * FROM `{db_prefix}admin_controllers` WHERE `Key` = 'quote_requests'");
    if ($controller_check) {
        echo "<div class='success'>✓ Controller record exists:</div>\n";
        foreach ($controller_check as $key => $value) {
            echo "- {$key}: {$value}<br>\n";
        }
    } else {
        echo "<div class='error'>✗ Controller record NOT found</div>\n";
    }

    // Test 2: Check lang_keys table
    echo "<h3>🌍 Test 2: Language Keys</h3>\n";
    $lang_check = $rlDb->getAll("SELECT * FROM `{db_prefix}lang_keys` WHERE `Key` LIKE '%quote_requests%'");
    if ($lang_check) {
        echo "<div class='success'>✓ Language keys found (" . count($lang_check) . "):</div>\n";
        foreach ($lang_check as $lang) {
            echo "- {$lang['Code']}: {$lang['Key']} = {$lang['Value']}<br>\n";
        }
    } else {
        echo "<div class='error'>✗ No language keys found</div>\n";
    }

    // Test 3: Check file permissions
    echo "<h3>📁 Test 3: File Permissions</h3>\n";
    $files_to_check = [
        'admin/controllers/quote_requests.inc.php',
        'admin/tpl/controllers/quote_requests.tpl',
        'admin/quote_requests_ajax.php'
    ];
    
    foreach ($files_to_check as $file) {
        if (file_exists($file)) {
            $perms = substr(sprintf('%o', fileperms($file)), -4);
            echo "<div class='success'>✓ {$file} exists (perms: {$perms})</div>\n";
            
            // Check file size
            $size = filesize($file);
            echo "  File size: {$size} bytes<br>\n";
            
            // Check if readable
            if (is_readable($file)) {
                echo "  <span class='success'>Readable: YES</span><br>\n";
            } else {
                echo "  <span class='error'>Readable: NO</span><br>\n";
            }
        } else {
            echo "<div class='error'>✗ {$file} does NOT exist</div>\n";
        }
    }

    // Test 4: PHP Syntax Check
    echo "<h3>🔧 Test 4: PHP Syntax Check</h3>\n";
    $controller_file = 'admin/controllers/quote_requests.inc.php';
    
    // Check for PHP syntax errors
    $output = shell_exec("php -l {$controller_file} 2>&1");
    if (strpos($output, 'No syntax errors') !== false) {
        echo "<div class='success'>✓ Controller PHP syntax is valid</div>\n";
    } else {
        echo "<div class='error'>✗ Controller PHP syntax error:</div>\n";
        echo "<pre>{$output}</pre>\n";
    }

    // Test 5: Test URL components
    echo "<h3>🌐 Test 5: URL Component Test</h3>\n";
    
    // Simulate the controller detection
    $controller = 'quote_requests';
    echo "<div class='info'>Controller parameter: {$controller}</div>\n";
    
    // Check if this matches our database record
    if ($controller_check && $controller_check['Controller'] === $controller) {
        echo "<div class='success'>✓ Controller parameter matches database record</div>\n";
    } else {
        echo "<div class='error'>✗ Controller parameter mismatch</div>\n";
    }

    // Test 6: Admin Rights Check
    echo "<h3>👤 Test 6: Admin Session Simulation</h3>\n";
    
    // Check if session can be started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        echo "<div class='success'>✓ Session started</div>\n";
    } else {
        echo "<div class='info'>Session already active</div>\n";
    }

    // Test 7: Include Test
    echo "<h3>📥 Test 7: File Include Test</h3>\n";
    
    try {
        // Test if we can include the controller file
        ob_start();
        $included = include_once $controller_file;
        $output = ob_get_clean();
        
        if ($included) {
            echo "<div class='success'>✓ Controller file included successfully</div>\n";
            if ($output) {
                echo "<div class='warning'>Output generated: " . strlen($output) . " characters</div>\n";
                echo "<details><summary>Show output</summary><pre>" . htmlspecialchars($output) . "</pre></details>\n";
            }
        } else {
            echo "<div class='error'>✗ Controller file could not be included</div>\n";
        }
    } catch (Exception $e) {
        echo "<div class='error'>✗ Include error: " . $e->getMessage() . "</div>\n";
    }

    // Test 8: Template Check
    echo "<h3>🎨 Test 8: Template Check</h3>\n";
    $template_file = 'admin/tpl/controllers/quote_requests.tpl';
    
    if (file_exists($template_file)) {
        $template_content = file_get_contents($template_file);
        $template_size = strlen($template_content);
        echo "<div class='success'>✓ Template file exists ({$template_size} characters)</div>\n";
        
        // Check for common Smarty syntax
        if (strpos($template_content, '{include') !== false) {
            echo "<div class='success'>✓ Template contains Smarty include syntax</div>\n";
        }
        
        if (strpos($template_content, '{$') !== false) {
            echo "<div class='success'>✓ Template contains Smarty variables</div>\n";
        }
    } else {
        echo "<div class='error'>✗ Template file does not exist</div>\n";
    }

    // Test 9: Direct Access Test
    echo "<h3>🔗 Test 9: Direct Access Test</h3>\n";
    
    $test_url = "admin/index.php?controller=quote_requests";
    echo "<div class='info'>Test URL: <a href='{$test_url}' target='_blank'>{$test_url}</a></div>\n";
    
    // Test 10: Error Log Check
    echo "<h3>📝 Test 10: Recent Error Logs</h3>\n";
    
    $error_files = ['admin/error_log', 'error_log', 'debug_errors.log'];
    foreach ($error_files as $error_file) {
        if (file_exists($error_file)) {
            $log_content = file_get_contents($error_file);
            $recent_lines = array_slice(explode("\n", $log_content), -10);
            echo "<div class='warning'>Recent errors in {$error_file}:</div>\n";
            echo "<pre>" . implode("\n", $recent_lines) . "</pre>\n";
        }
    }

    echo "<hr>\n";
    echo "<h3>🎯 SUMMARY & NEXT STEPS</h3>\n";
    echo "<p>If all tests above show ✓ but the page still doesn't work, try:</p>\n";
    echo "<ol>\n";
    echo "<li>Clear browser cache and cookies</li>\n";
    echo "<li>Try different browser or incognito mode</li>\n";
    echo "<li>Check Apache/Nginx error logs</li>\n";
    echo "<li>Restart web server</li>\n";
    echo "</ol>\n";

} catch (Exception $e) {
    echo "<div class='error'><strong>CRITICAL ERROR:</strong> " . $e->getMessage() . "</div>\n";
    echo "<pre>" . $e->getTraceAsString() . "</pre>\n";
}
?> 