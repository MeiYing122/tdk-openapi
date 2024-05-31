<?php
namespace TaoDouKe\OpenApi;
/**
 * class ProductSearch 抖音搜索（商品列表）
 * page    required 商品第⼏⻚，从1开始
 * page_size required 商品每⻚数量，最⼤20，最⼩1
 * title  商品关键词
 * first_cids 筛选商品⼀级类⽬，从商品类⽬接⼝可获得⼀级类⽬
 * second_cids 筛选商品⼆级类⽬， 从商品类⽬接⼝可获得⼆级类⽬
 * third_cids 筛选商品三级类⽬，从商品类⽬接⼝可获得三级类⽬
 * price_min 最低价格，包含，单位分。
 * price_max 最⾼价格，不包含，单位分。应保证price_max>=price_min
 * sell_num_min 历史销量最⼩值
 * sell_num_max 历史销量最⼤值。应保证sell_num_max>sell_num_min
 * search_type 排序类型：0 默认排序；1历史销量排序；2价格排序；3佣⾦排序；4佣⾦⽐例排序。不填默认为0。
 * order_type 0 升序，1 降序。不填默认为0。若search_type为0，则此值⽆意义
 * cos_fee_min 最低分佣，单位分
 * cos_fee_max 最⾼分佣，单位分。应保证
 * cos_ratio_min 分佣⽐例百分⽐乘以100：1.1%，传1.1*100 = 110
 * cos_ratio_max 分佣⽐例百分⽐乘以100:1.1%，传1.1*100 = 110
 * activity_id 获取活动商品。1返回超值购，0返回全量
 */
class ProductSearch extends TdkClient
{
    protected $methodType = 'POST';
    protected $requestParams = [];

    protected $page;
    protected $page_size;
    protected $title;
    protected $first_cids;
    protected $second_cids;
    protected $third_cids;
    protected $price_min;
    protected $price_max;
    protected $sell_num_min;
    protected $sell_num_max;
    protected $search_type;
    protected $order_type;
    protected $cos_fee_min;
    protected $cos_fee_max;
    protected $cos_ratio_min;
    protected $cos_ratio_max;
    protected $activity_id;

    


    const METHOD = '/product/search';

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
        return ['page','page_size','title','first_cids','second_cids','third_cids','price_min','price_max','sell_num_min','sell_num_max','search_type','order_type','cos_fee_min','cos_fee_max','cos_ratio_min','cos_ratio_max','activity_id'];
    }

    /**
     * @return array
     */
    public function check()
    {
        if(!$this->page){
            return ['商品分页不能为空',false];
        }
        if(!$this->page_size){
            return ['商品每页数量不能为空',false];
        }
        return ['', true];
    }
}