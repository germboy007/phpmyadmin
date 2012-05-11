<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Test for PMA_containsNonprintableAscii from common.lib
 *
 * @package PhpMyAdmin-test
 * @group common.lib-tests
 */

/*
 * Include to test.
 */
require_once 'libraries/common.lib.php';

class PMA_containsNonprintableAscii extends PHPUnit_Framework_TestCase
{

    function dataProvider()
    {
        return array(
            array("normal string", 0),
            array("new\nline", 1),
            array("tab\tspace", 1),
            array("escape" . chr(27) . "char", 1),
            array("chars%$\r\n", 1),
        );
    }

    /**
     * @dataProvider dataProvider
     */
    function testContainsNonPrintableAscii($str, $res)
    {
        $this->assertEquals($res, PMA_containsNonprintableAscii($str));
    }

}

// PMA_containsNonprintableAscii
