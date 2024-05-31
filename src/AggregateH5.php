<?php
namespace TaoDouKe\OpenApi;
/**
 * Class AggregateH5 抖客精选专题
 * String external_info ⾃定义字段，只允许 数字、字⺟和_，限制⻓度为40
 * String material_id required   聚合⻚类型枚举值
 * String product_url 历史逻辑，待下线。
 * Integer platform 回流端标识，0表⽰抖⾳，1表⽰抖⾳极速版，不填默认为0
 * String extra_params 活动⻚转链⾃定义参数,json格式,键值都是字符串，product_id⽤作将指定商品置顶于活动⻚⾯。（仅⽀持超值购、秒杀频道）
 * String cf_task_id 乘⻛任务id,若有必填
 */
class AggregateH5 extends TdkClient
{
    protected $material_id;
    protected $external_info;
    protected $product_url;
    protected $platform;
    protected $extra_params;
    protected $cf_task_id;

    protected $methodType = 'POST';
    protected $requestParams = [];

    const METHOD = "/aggregate/h5";

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
        return ['external_info','material_id','product_url','platform','extra_params','cf_task_id'];
    }

    /**
     * @return array
     */
    public function check()
    {
        if (!$this->material_id) {
            return ['聚合⻚类型枚举值不能为空', false];
        }
        return ['', true];
    }
}
