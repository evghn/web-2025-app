<?php


function calc(int|float $x): int|float|null
{
    try {
        if (empty($x)) {
            throw new Exception("\$x не может быть равным - 0!");
        }

        return 1 / $x;
    } catch (Exception $e) {
        echo $e->getFile() . "<br>";
        echo $e->getMessage() . "<br>";;
        // throw $e;
    }
    return null;
}
