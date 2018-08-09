# 关系数据库的抽象

使用 composer 命令进行安装或下载源代码使用。
>composer require aweitian/data
>

## 分量 Component
- name 字段名
- alias 别名
- dataType 字段类型,可用类型见下表
- domain 字段的数据范围(一般在数据类型为集合时使用)
- domainDescription
- default 默认值
- comment 备注
- isUnsigned 是否是无负号数
- allowNull 是否允许为空
- isPk 是否是主键
- isAutoIncrement 是否是递增字段

## 可用MYSQL字段类型
<table border=1>
<tr><td>tinyint</td><td>smallint</td><td>int</td><td>bigint</td></tr>
<tr><td>float</td><td>double</td><td>decimal</td><td>mediumint</td></tr>
<tr><td>text</td><td>tinyblob</td><td>tinytext</td><td>blob</td></tr>
<tr><td>mediumblob</td><td>mediumtext</td><td>longblob</td><td>longtext</td></tr>
<tr><td>datetime</td><td>timestamp</td><td>date</td><td>time</td></tr>
<tr><td>year</td><td>enum</td><td>set</td><td>varchar</td></tr>
<tr><td>char</td><td>binary</td><td>varbinary</td><td></td></tr>
</table>


## Tuple 元组 关系表中的一行称为一个元组
- append(Component)
- insert(pos,Component)
 
