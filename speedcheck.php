<?php
header('Content-Type: application/json');

$start = microtime(true);

$randomMs = random_int(1000, 5000);
usleep($randomMs * 1000);

echo json_encode([
    'transactionDuration' => $randomMs,
]);
