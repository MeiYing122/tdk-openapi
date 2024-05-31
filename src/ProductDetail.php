<?php
namespace Tdk\Openapi;
/**
 * class ProductDetail 获取商品详情接⼝
 * Int[] product_ids required 商品id列表
 */
class ProductDetail extends TdkClient
{
    protected $methodType = 'POST';
    protected $requestParams = [];

    protected $product_ids;




    const METHOD = '/product/detail';

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
        return ['product_ids'];
    }

    /**
     * @return array
     */
    public function check()
    {
        if(!$this->product_ids)
        {
            return ['商品ID列表不能为空',false];
        }
        return ['', true];
    }
}