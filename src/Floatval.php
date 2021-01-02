<?php

declare(strict_types=1);

namespace Victorlap\Floatval;

class Floatval
{
    public static function parse(string $string): float
    {
        if (preg_match('/[\d+][eE][+-]?[\d+]/', $string)) {
            return self::parseExponential($string);
        }

        if (!$separatorPosition = self::getSeparatorPosition($string)) {
            return (float)preg_replace("/[^\-\d]/", "", $string);
        }

        $dots = substr_count($string, '.');
        $commas = substr_count($string, ',');

        if (($dots > 1 && !$commas) || ($commas > 1 && !$dots)) {
            return (float)preg_replace("/[^\-\d]/", '', $string);
        }

        return (float)(preg_replace("/[^\-\d]/", '', substr($string, 0, $separatorPosition)) . '.' .
            preg_replace("/[\D]/", '', substr($string, $separatorPosition + 1, strlen($string))));
    }

    private static function getSeparatorPosition(string $string): ?int
    {
        $dotPos = strrpos($string, '.');
        $commaPos = strrpos($string, ',');

        if (($dotPos > $commaPos) && $dotPos) {
            return $dotPos;
        }

        if (($commaPos > $dotPos) && $commaPos) {
            return $commaPos;
        }

        return null;
    }

    private static function parseExponential(string $string): ?float
    {
        $parts = preg_split('/[e|E]/', $string, 2);

        return self::parse($parts[0]) * (10 ** self::parse($parts[1]));
    }
}
