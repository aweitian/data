<?php
require_once "Field.php";


class TupleTest extends PHPUnit_Framework_TestCase
{

    public function testBase()
    {
        $t = new \Aw\Data\Tuple();

        $name = new Field();
        $name->setName('name');

        $age = new Field();
        $age->setName('age');

        $t->append($age);
        $t->prepend($name);

        $keys = $t->getKeys();
        $this->assertEquals('name', $keys[0]);
        $this->assertEquals('age', $keys[1]);
        $this->assertEquals('age', $t->getKeys(1));
        $this->assertEquals(2, $t->getCount());

        $loc = new Field();
        $loc->setName('location');
        $t->insert(1, $loc);
        $this->assertEquals('location', $t->getKeys(1));
        $this->assertEquals('age', $t->getKeys(2));


        $new_t = new \Aw\Data\Tuple();
        $xx = new Field();
        $xx->setName("ff");
        $new_t->append($xx);

        $new_t->prependTuple($t, false);
//        var_dump($new_t->getKeys());
        $this->assertEquals('age', $new_t->getKeys(0));
        $this->assertEquals('ff', $new_t->getKeys(3));
        $this->assertEquals('name', $t->getKeys(0));


        $new_t->clear();
        $new_t->append($xx);
        $new_t->prependTuple($t);
        $this->assertEquals('name', $new_t->getKeys(0));
        $this->assertEquals('ff', $new_t->getKeys(3));
        $this->assertEquals('name', $t->getKeys(0));
    }

    public function testDump()
    {
        $t = new \Aw\Data\Tuple();
        $name = new Field();
        $name->setName('name');

        $age = new Field();
        $age->setName('age');

        $t->append($age);
        $t->prepend($name);


        $tt = new \Aw\Data\Tuple();
        $tt->load($t->dump(), "\\Field");
        $this->assertTrue($tt->get("age") instanceof Field);
        $this->assertEquals($tt->get("age")->getName(), "age");
    }
}


