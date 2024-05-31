<?php
namespace TaoDouKe\OpenApi;
/**
 * class ProductCategory 抖音商品类目接口
 * 本接⼝是通过上级类⽬，查询下级类⽬。如果要查询⼀级类⽬，则该字段填写 0 即可。查询⼆级类⽬，输⼊相应的⼀级类⽬即可。若未传，则默认为0
 * 获取抖音商品分类
 */
class ProductCategory extends TdkClient
{
    protected $methodType = 'POST';
    protected $requestParams = [];

    /**
     * @var int 值=0时为顶点parent_id,通过树顶级节点获取分类树
     */
    protected $parent_id = 0;


    const METHOD = '/product/category';

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::METHOD;
    }

    /**
     * 可用参数
     * @return string[]
     */
    public function getParamsField()
    {
        return ['parent_id'];
    }

    /**
     * @return array
     */
    public function check()
    {

        return ['', true];
    }
}