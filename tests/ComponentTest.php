<?php
require_once "Field.php";

class ComponentTest extends PHPUnit_Framework_TestCase
{

    public function testBase()
    {
        //name,alias,dataType,domain,default,comment,isUnsiged,allowNull,isPk,isAutoIncrement
        $c = new Field(array(
            'name' => 'age',
            'alias' => "nian ling"
        ));
        $this->assertTrue($c->domainChk("age"));
    }

    public function testDump()
    {
        $d = array(
            'name' => 'age',
            'alias' => "nian ling"
        );
        $c = new Field($d);
        $e = $c->dump();
        $this->assertEquals($e['name'], $d['name']);
        $this->assertEquals($e['alias'], $d['alias']);
    }
}


