<?php
namespace TaoDouKe\OpenApi;
/**
 * Class LiveLink 抖音直播间转链
 * Integer author_openid required 直播间主播open_id， 从直播间列表接⼝返回的author_openid可获得
 * Integer author_buyin_id 直播间主播buyin_id，从直播间列表接⼝返回的author_buyin_id可获得
 * Integer external_info ⾃定义字段，只允许 数字、字⺟和_，限制⻓度为40
 * Integer live_ext 直播间列表接⼝下发的live_info.ext，尽量填写
 * Integer[] share_type 转链类型：1、抖⾳ deep link；2、抖⾳⼆维码；3、抖⾳⼝令 4、抖⾳zlink默认返回抖⾳deeplink
 * Integer product_id 直播间内的某个商品id， 必须来⾃直播间列表接⼝内的商品id，且必须和直播间对应
 * Integer platform 0：抖⾳，1：抖极，不传默认为0
 */
class LiveLink extends TdkClient
{
    protected $author_openid;
    protected $author_buyin_id;
    protected $external_info;
    protected $live_ext;
    protected $share_type;
    protected $product_id;
    protected $platform;

    protected $methodType = 'POST';
    protected $requestParams = [];

    const METHOD = "/live/link";

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
        return ['author_openid','author_buyin_id','external_info','live_ext','share_type','product_id','platform'];
    }

    /**
     * @return array
     */
    public function check()
    {

        // author_openid和 author_buyin_id 必须有一个
        if(empty($this->author_openid) && empty($this->author_buyin_id)) {
            return ['author_openid和author_buyin_id必填其⼀',false];
        }
        return ['', true];
    }
}
