<?php

declare(strict_types=1);

namespace Victorlap\Floatval;

class Floatval
{
    public static function parse(string $string): float
    {
        $dotPos = strrpos($string, '.');
        $commaPos = strrpos($string, ',');

        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
            ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

        if (!$sep) {
            return (float)preg_replace("/[^\-\d]/", "", $string);
        }

        $dots = substr_count($string, '.');
        $commas = substr_count($string, ',');

        if (($dots > 1 && !$commas) || ($commas > 1 && !$dots)) {
            return (float)preg_replace("/[^\-\d]/", '', $string);
        }

        return (float)(preg_replace("/[^\-\d]/", '', substr($string, 0, $sep)) . '.' .
            preg_replace("/[^\d]/", '', substr($string, $sep + 1, strlen($string))));
    }
}
