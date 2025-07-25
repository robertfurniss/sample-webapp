<?php
// Get request headers (Apache/Nginx compatible)
$headers = getallheaders();

// Get request method and URI
$method = $_SERVER['REQUEST_METHOD'] ?? 'N/A';
$uri = $_SERVER['REQUEST_URI'] ?? 'N/A';
$protocol = $_SERVER['SERVER_PROTOCOL'] ?? 'N/A';
$clientIP = $_SERVER['REMOTE_ADDR'] ?? 'N/A';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'N/A';
$host = $_SERVER['HTTP_HOST'] ?? 'N/A';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Inspector</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        h1 { color: #0078D4; }
        table { border-collapse: collapse; width: 100%; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        pre { background: #f4f4f4; padding: 1rem; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Azure PHP Request Inspector</h1>

    <h2>Request Info</h2>
    <table>
        <tr><th>Attribute</th><th>Value</th></tr>
        <tr><td>Method</td><td><?= htmlspecialchars($method) ?></td></tr>
        <tr><td>URI</td><td><?= htmlspecialchars($uri) ?></td></tr>
        <tr><td>Protocol</td><td><?= htmlspecialchars($protocol) ?></td></tr>
        <tr><td>Host</td><td><?= htmlspecialchars($host) ?></td></tr>
        <tr><td>Client IP</td><td><?= htmlspecialchars($clientIP) ?></td></tr>
        <tr><td>User Agent</td><td><?= htmlspecialchars($userAgent) ?></td></tr>
    </table>

    <h2>Request Headers</h2>
    <table>
        <tr><th>Header</th><th>Value</th></tr>
        <?php foreach ($headers as $key => $value): ?>
            <tr>
                <td><?= htmlspecialchars($key) ?></td>
                <td><?= htmlspecialchars($value) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Raw $_SERVER Dump</h2>
    <pre><?php print_r($_SERVER); ?></pre>
</body>
</html>
