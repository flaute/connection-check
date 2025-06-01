<?php
header('Content-Type: application/json');

$randomMs = random_int(1000, 5000);
usleep($randomMs * 1000);

echo json_encode([
    'transactionDuration' => $randomMs,
]);
