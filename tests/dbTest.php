<?php


class Test extends PHPUnit_Framework_TestCase {
    /**
     * @var MysqlPdoConn
     */
    private $con;
    public function setUp()
    {


    }

    public function tearDown()
    {

    }

	public function test()
    {
        new \Tian\Data\Tuple([1,2,4]);
    }
}


