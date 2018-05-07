<?php

require 'Functions.php';

use function Functions\Functions\logException;

function checkNum($number) {
    if ($number > 1) {
        throw new Exception("Value must be 1 or below");
    } else {
        return true;
    }
}

try {
    checkNum(4);
} catch (Exception $e) {
    echo "exception logged!";
    logException($e);
}
