<?php

use Base64Url\Base64Url;

class Base64UrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestVectors
     */
    public function testEncodeAndDecode($message, $expected_result)
    {
        $encoded = Base64Url::encode($message);
        $decoded = Base64Url::decode($expected_result);

        $this->assertEquals($expected_result, $encoded);
        $this->assertEquals($message, $decoded);
    }

    public function getTestVectors()
    {
        return array(
            array(
                "000000", "MDAwMDAw",
            ),
            array(
                "\0\0\0\0", "AAAAAA",
            ),
            array(
                "\xff", "_w",
            ),
            array(
                "\xff\xff", "__8",
            ),
            array(
                "\xff\xff\xff", "____",
            ),
            array(
                "\xff\xff\xff\xff", "_____w",
            ),
            array(
                "\xfb", "-w",
            ),
        );
    }
    /**
     * @dataProvider getTestBadVectors
     */
    public function testBadInput($input)
    {
        $decoded = Base64Url::decode($input);
        $this->assertEquals("\00", $decoded);
    }

    public function getTestBadVectors()
    {
        return array(
            array(
                " AA",
            ),
            array(
                "\tAA",
            ),
            array(
                "\rAA",
            ),
            array(
                "\nAA",
            ),
        );
    }
}
