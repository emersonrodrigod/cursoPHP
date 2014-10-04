<?php

for ($n = 1; $n <= 100; $n++) {
    $primo = true;
    for ($x = 2; $x < $n; $x++) {
        if ($n % $x == 0) {
            $primo = false;
        }
    }
    if ($primo) {
        echo ' ' . $n;
    }
} 