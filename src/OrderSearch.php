<?php
namespace Tdk\Openapi;
/**
 * Class OrderSearch 抖客订单,查询某个应⽤下通过商品转链和直播间转链产⽣的订单
 * 查询方式1：分批次滚动拉取。需要填写size, cursor, start_time, end_time, order_type, time_type(选填)
 * 查询方式2：按照订单id查询。需要填写order_ids, order_type
 * Integer size 此次请求拉取数量
 * Integer cursor 上⼀次相同app_id订单查询返回的游标
 * Integer start_time   ⽀付的开始时间
 * Integer end_time ⽀付的结束时间
 * Integer order_ids 订单号
 * String  order_type required 1-商品分销订单，2-直播间分销订单，3-活动类型订单
 * String  time_type pay-按照⽀付时间查询特定时间范围内的订单，update-按照订单更新时间查询特定时间范围内的订单
 * String  access_type access_type int 1-API接⼊⽅式，⽤于查询接⼊乘⻛计划cps api的订单。2-SDK接⼊⽅式，⽤于查询接⼊闭环电商或内容直播中直播内流出cps直播间的订单
 */
class OrderSearch extends TdkClient
{
    protected $size;
    protected $cursor;
    protected $start_time;
    protected $end_time;
    protected $order_ids;
    protected $order_type;
    protected $time_type;
    protected $access_type;

    protected $methodType = 'POST';
    protected $requestParams = [];

    const METHOD = "/order/search";

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
        return ['size','cursor','start_time','end_time','order_ids','order_type','time_type','access_type'];
    }

    /**
     * @return array
     */
    public function check()
    {
        return ['', true];
    }
}
