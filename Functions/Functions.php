<?php

namespace Functions\Functions;

use Exception;

function logException(Exception $e) {
    $errorlog = fopen("../exceptionLog.txt", "a");
    fwrite($errorlog, "EXCEPTION CAUGHT: " . date('Y-m-d H:i:s') . " " . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n");
    fclose($errorlog);
}
