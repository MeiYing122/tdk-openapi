<?php
namespace TaoDouKe\OpenApi;
/**
 * Class LiveSearch 直播列表接口
 * Integer page required 分⻚index，从1开始
 * Integer page_size required 分⻚size，范围(0,100]
 * Integer sort_by   排序字段: 1-综合；2-销量；3-佣⾦率；4-粉丝数。不填默认为1
 * Integer sort_type 排序⽅式：0-降序；1-升序。不填默认为0。若sort_by为1， 则此字段⽆意义
 * Integer status 直播间状态筛选：0-在播和不在播，1-在播，2-不在播。默认为1，代表只出在播直播间
 * String  author_info 达⼈昵称/账号
 */
class LiveSearch extends TdkClient
{
    protected $page;
    protected $page_size;
    protected $sort_by;
    protected $sort_type;
    protected $status;
    protected $author_info;

    protected $methodType = 'POST';
    protected $requestParams = [];

    const METHOD = "/live/search";

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
        return ['page','page_size','sort_by','sort_type','status','author_info'];
    }

    /**
     * @return array
     */
    public function check()
    {
        if (!$this->page) {
            return ['分⻚index不能为空！', false];
        }
        if (!$this->page_size) {
            return ['分⻚size不能为空！', false];
        }
        return ['', true];
    }
}
