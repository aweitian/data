<?php

/**
 * @Author: awei.tian
 * @Date: 2016年8月3日
 * @Desc: 关系数据库中的分量
 * 依赖:
 */
namespace Aw\Data;

abstract class Component {
    /**
     * 字段名
     *
     * @var string
     */
    public $name;
    /**
     * 别名
     *
     * @var string
     */
    public $alias;

    /**
     *
     * @var string 例如:tinyint,smallint,int,bigint
     */
    public $dataType;
    /**
     *
     * @var $domain array 一般在数据类型为集合时使用
     */
    public $domain;
    public $domainDescription;
    public $default;
    public $comment;

    // 根据实际情况添加的字段
    public $isUnsigned = false;
    public $allowNull = false;
    public $isPk = false;
    public $isAutoIncrement = false;
    /**
     * 可用的KEY name,alias,dataType,domain,default,comment,isUnsiged,allowNull,isPk,isAutoIncrement
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ( $data as $key => $val ) {
            if (property_exists ( $this, $key )) {
                $this->{$key} = $val;
            }
        }
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param string $dataType
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
    }

    /**
     * @return array
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param array $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getDomainDescription()
    {
        return $this->domainDescription;
    }

    /**
     * @param mixed $domainDescription
     */
    public function setDomainDescription($domainDescription)
    {
        $this->domainDescription = $domainDescription;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return bool
     */
    public function isUnsigned()
    {
        return $this->isUnsigned;
    }

    /**
     * @param bool $isUnsigned
     */
    public function setIsUnsiged($isUnsigned)
    {
        $this->isUnsigned = $isUnsigned;
    }

    /**
     * @return bool
     */
    public function isAllowNull()
    {
        return $this->allowNull;
    }

    /**
     * @param bool $allowNull
     */
    public function setAllowNull($allowNull)
    {
        $this->allowNull = $allowNull;
    }

    /**
     * @return bool
     */
    public function isPk()
    {
        return $this->isPk;
    }

    /**
     * @param bool $isPk
     */
    public function setIsPk($isPk)
    {
        $this->isPk = $isPk;
    }

    /**
     * @return bool
     */
    public function isAutoIncrement()
    {
        return $this->isAutoIncrement;
    }

    /**
     * @param bool $isAutoIncrement
     */
    public function setIsAutoIncrement($isAutoIncrement)
    {
        $this->isAutoIncrement = $isAutoIncrement;
    }

	
	/**
	 *
	 * @param string $value        	
	 * @return bool
	 */
	abstract public function domainChk($value);
	public static function intDomainChk($value) {
		return is_int ( $value );
	}
}