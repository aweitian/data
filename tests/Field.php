<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 10:37
 */

class Field extends \Aw\Data\Component
{

    /**
     *
     * @param string $value
     * @return bool
     */
    public function domainChk($value)
    {
        return $value == "age";
    }
}