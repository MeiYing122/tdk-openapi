<?php
namespace TaoDouKe\OpenApi;
/**
 * class ProductLink 抖音商品转链
 * 获取某个商品的跳转抖⾳渠道(抖⾳⼆维码，抖⾳⼝令，抖⾳deeplink)
 * product_url required 商品url。与商品接⼝detail_url⼀致
 * product_ext 商品搜索接⼝返回的product.ext 字段, 尽量填写
 * external_info 媒体传递扩展参数的字段， 字符只允许字⺟⼤⼩写、数字、下划线，⻓度不超过40
 * share_type 转链类型：1、抖⾳ deeplink；2、抖⾳⼆维码；3、抖⾳⼝令；4、抖⾳zlink。不填默认只有1
 * platform 0：抖⾳，1：抖极，不传默认为0
 * 【注：不需要⼆维码请不要填，⼆维码⽣成耗时较⾼】
 */
class ProductLink extends TdkClient
{
    protected $methodType = 'POST';
    protected $requestParams = [];



    protected $product_url;
    protected $product_ext;
    protected $external_info;
    protected $share_type;
    protected $platform;


    const METHOD = '/product/link';

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
        return ['product_url','product_ext','external_info','share_type','platform'];
    }

    /**
     * @return array
     */
    public function check()
    {
        if(!$this->product_url) {
            return ['product_url不能为空', false];
        }
        return ['', true];
    }
}