<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2018 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Base64Url\Test;


use Base64Url\Base64Url;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class Base64UrlTest extends TestCase
{
    /**
     * @dataProvider getTestVectors
     *
     * @test
     */
    public function encodeAndDecode(string $message, string $expectedResult, bool $usePadding = false): void
    {
        $encoded = Base64Url::encode($message, $usePadding);
        $decoded = Base64Url::decode($expectedResult);

        static::assertEquals($expectedResult, $encoded);
        static::assertEquals($message, $decoded);
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
     *
     * @test
     */
    public function badInput(string $input): void
    {
        $decoded = Base64Url::decode($input);
        static::assertEquals("\00", $decoded);
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

    /**
     * @dataProvider getTestNonsenseVectors
     *
     * @test
     */
    public function nonsenseInput(string $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        Base64Url::decode($input);
    }

    public function getTestNonsenseVectors(): array
    {
        return [
            [
                'cxr0fdsezrewklerewxoz423ocfsa3bw432yjydsa9lhdsalw',
            ],
        ];
    }
}
