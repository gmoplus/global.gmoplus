<?php
// BLOG BLOCK AKTİF ET - SON ÇÖZÜM
echo "<h1 style='color: red;'>BLOG BLOCK AKTİF ET</h1>";

include_once(__DIR__ . '/includes/config.inc.php');
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

// Blog block'u aktif et
$activate = "UPDATE " . RL_DBPREFIX . "blocks SET `Status` = 'active', `Side` = 'middle' WHERE `Key` = 'wpbridge_last_post'";
$result = $connection->query($activate);

if ($result) {
    echo "<p style='color: green;'>✓ Blog block aktif edildi!</p>";
} else {
    echo "<p style='color: red;'>❌ Hata: " . $connection->error . "</p>";
}

// Durumu kontrol et
$check = "SELECT `Key`, `Status`, `Side` FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'wpbridge_last_post'";
$result = $connection->query($check);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<p><strong>Block Status:</strong> " . $row['Status'] . "</p>";
    echo "<p><strong>Block Side:</strong> " . $row['Side'] . "</p>";
    echo "<p style='color: green;'><strong>ANA SAYFAYI YENİLEYİN - ÇALIŞACAK!</strong></p>";
} else {
    echo "<p style='color: red;'>Block bulunamadı!</p>";
}

$connection->close();
?> 