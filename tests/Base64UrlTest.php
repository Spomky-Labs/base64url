<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2018 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

use Base64Url\Base64Url;
use PHPUnit\Framework\TestCase;

class Base64UrlTest extends TestCase
{
    /**
     * @dataProvider getTestVectors
     */
    public function testEncodeAndDecode(string $message, string $expectedResult, bool $usePadding = false): void
    {
        $encoded = Base64Url::encode($message, $usePadding);
        $decoded = Base64Url::decode($expectedResult);

        $this->assertEquals($expectedResult, $encoded);
        $this->assertEquals($message, $decoded);
    }

    /**
     * @see https://tools.ietf.org/html/rfc4648#section-10
     */
    public function getTestVectors(): array
    {
        return [
            [
                '000000', 'MDAwMDAw',
            ],
            [
                "\0\0\0\0", 'AAAAAA',
            ],
            [
                "\xff", '_w',
            ],
            [
                "\xff\xff", '__8',
            ],
            [
                "\xff\xff\xff", '____',
            ],
            [
                "\xff\xff\xff\xff", '_____w',
            ],
            [
                "\xfb", '-w',
            ],
            [
                '', '',
            ],
            [
                'f', 'Zg==', true,
            ],
            [
                'fo', 'Zm8=', true,
            ],
            [
                'foo', 'Zm9v', true,
            ],
            [
                'foob', 'Zm9vYg==', true,
            ],
            [
                'fooba', 'Zm9vYmE=', true,
            ],
            [
                'foobar', 'Zm9vYmFy', true,
            ],
        ];
    }

    /**
     * @dataProvider getTestBadVectors
     */
    public function testBadInput(string $input): void
    {
        $decoded = Base64Url::decode($input);
        $this->assertEquals("\00", $decoded);
    }

    public function getTestBadVectors(): array
    {
        return [
            [
                ' AA',
            ],
            [
                "\tAA",
            ],
            [
                "\rAA",
            ],
            [
                "\nAA",
            ],
        ];
    }
}
