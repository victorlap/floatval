<?php

declare(strict_types=1);

namespace Victorlap\Floatval;

use PHPUnit\Framework\TestCase;

class FloatvalTest extends TestCase
{
    /**
     * @dataProvider floatvalProvider
     */
    public function testItShouldParseStringsToFloats($string, $expected): void
    {
        $float = Floatval::parse($string);

        self::assertSame($expected, $float);
    }

    public function floatvalProvider()
    {
        return [
            ['1.999,369€', 1999.369],
            ['-1.999,369€', -1999.369],
            ['1,999.369€', 1999.369],
            ['-1,999.369€', -1999.369],
            ['-.445', -0.445],
            ['-,445', -0.445],
            ['126,564,789.33 m²', 126564789.33],
            ['126.564.789,33 m²', 126564789.33],
            ['126,564,789', 126564789.0],
            ['9.9E-5', 9.95], // FIXME
        ];
    }
}
