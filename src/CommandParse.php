<?php
namespace TaoDouKe\OpenApi;
/**
 * Class CommandParse 抖口令解析
 * String command required 直播间/直播间商品/商品的抖⼝令
 */
class CommandParse extends TdkClient
{
    protected $command;

    protected $methodType = 'POST';
    protected $requestParams = [];

    const METHOD = "/command_parse";

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
        return ['command'];
    }

    /**
     * @return array
     */
    public function check()
    {
        if (!$this->command) {
            return ['直播间/直播间商品/商品的抖⼝令不能为空', false];
        }
        return ['', true];
    }
}
