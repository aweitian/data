<?php

/**
 * @Author: awei.tian
 * @Date: 2016年8月3日
 * @Desc: Tuple 元组 关系表中的一行称为一个元组
 * 依赖:
 */

namespace Aw\Data;

use Exception;

class Tuple implements \IteratorAggregate
{
    private $children = array();

    public function __construct(array $data = array())
    {
        foreach ($data as $t) {
            if ($t instanceof Component) {
                $this->append($t);
            }
        }
    }

    /**
     * @return array
     */
    public function dump()
    {
        /**
         * @var Component $component
         */
        $ret = array();
        foreach ($this->children as $key => $component) {
            $ret[$key] = $component->dump();
        }
        return $ret;
    }

    public function load($data, $component_cls = "\\Aw\\Data\\Component")
    {
        foreach ($data as $t) {
            if (class_exists($component_cls)) {
                $this->append(new $component_cls($t));
            } else {
                throw new Exception($component_cls . " not found");
            }
        }
    }

    /**
     * @param $name
     * @return Component
     */
    public function get($name)
    {
        return isset($this->children[$name]) ? $this->children[$name] : null;
    }

    /**
     * alias append
     * @param Component $component
     * @return $this
     */
    public function set(Component $component)
    {
        return $this->append($component);
    }

    /**
     * @param int $index
     * @return array
     */
    public function getKeys($index = -1)
    {
        $keys = array_keys($this->children);
        return $index == -1 ? $keys : (isset($keys[$index]) ? $keys[$index] : null);
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($this->children);
    }

    /**
     * @return $this
     */
    public function reverse()
    {
        $this->children = array_reverse($this->children);
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see IteratorAggregate::getIterator()
     */
    public function getIterator()
    {
        return new \ArrayIterator ($this->children);
    }

    /**
     *
     * @param Tuple $tuple
     * @return $this
     */
    public function appendTuple(Tuple $tuple)
    {
        foreach ($tuple as $t) {
            $this->append($t);
        }
        return $this;
    }

    /**
     *
     * @param Tuple $tuple
     * @param bool $reverse
     * @return $this
     */
    public function prependTuple(Tuple $tuple, $reverse = true)
    {
        if ($reverse) {
            $tuple->reverse();
        }
        foreach ($tuple as $t) {
            $this->prepend($t);
        }
        if ($reverse) {
            $tuple->reverse();
        }
        return $this;
    }

    /**
     *
     * @param int $pos
     * @param Tuple $tuple
     * @return $this
     */
    public function insertTuple($pos, Tuple $tuple)
    {
        $i = $pos;
        foreach ($tuple as $t) {
            $this->insert($i++, $t);
        }
        return $this;
    }

    /**
     *
     * @param int $pos
     *            可正可负
     * @param Component $component
     * @return $this
     */
    public function insert($pos, Component $component)
    {
        if ($pos === 0) {
            return $this->prepend($component);
        } else if ($pos === count($this->children)) {
            return $this->append($component);
        } else {
            $arr = array_splice($this->children, 0, $pos);
            $arr [$component->name] = $component;
            $this->children = array_merge($arr, $this->children);
        }
        return $this;
    }

    /**
     *
     * @param Component $component
     * @return $this
     */
    public function append(Component $component)
    {
        $this->children [$component->name] = $component;
        return $this;
    }

    /**
     *
     * @param Component $component
     * @return $this
     */
    public function prepend(Component $component)
    {
        $this->children = array_merge(array($component->name => $component), $this->children);
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function remove($name)
    {
        if (isset ($this->children [$name])) {
            unset ($this->children [$name]);
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function clear()
    {
        $this->children = array();
        return $this;
    }
}