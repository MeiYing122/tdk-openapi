<?php
namespace TaoDouKe\OpenApi;
class TdkClient
{
    protected $appKey = '';
    protected $appSecret = '';
    protected $methodType = 'POST';
    
    protected $requestParams = [];

    const HOST = 'https://ecom.pangolin-sdk-toutiao.com';

    /**
     * 设置appKey
     * @param $appKey
     * @return $this
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
        return $this;
    }

    /**
     * 获取appKey
     * @return string
     */
    protected function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * 设置appSecret
     * @param $appSecret
     * @return $this
     */
    public function setAppSecret($appSecret)
    {
        $this->appSecret = $appSecret;
        return $this;
    }

    /**
     * 获取appSecret
     * @return string
     */
    protected function getAppSecret()
    {
        return $this->appSecret;
    }

     /**
     * 获取签名
     * @param $data
     * @param $secure_key
     * @return string
     */
    public  function makeSign($data, $secure_key): string
    {
        $str ="app_id=".strval($data["app_id"])."&data=".strval($data["data"])."&req_id=".strval($data["req_id"])."&timestamp=".strval($data["timestamp"]).$secure_key;
        return md5(($str));
    }


    public function getMethod()
    {
        return $this->methodType;   
    }
    public function getParamsField()
    {
        return [];
    }
    public function check()
    {
        return ['', true];
    }
    /**
     * 设置请求参数
     * @param $params
     * @return $this
     */
    public function setParams($params)
    {
        $data = [];
        foreach ($this->getParamsField() as $field) {
            if (isset($params[$field])) {
                $this->$field = $params[$field];
                $this->requestParams[$field] = $params[$field];
            }
        }

        return $this;
    }


    /**
     * 接口调用
     * @return bool|string
     */
    public function request()
    {
        //参数校验
        list($msg, $status) = $this->check();
        if (!$status) {
            return json_encode(array('code'=>10001,'msg'=>$msg));
        }

        $host = self::HOST . $this->getMethod();

        if ($host == '' || $this->appKey == '' || $this->appSecret == '' ) {
            return json_encode(array('code'=>10001,'msg'=>"请完善参数"));
        }

        $type = strtoupper($this->methodType);
        if(!in_array($type, array("GET", "POST"))) {
            return json_encode(array('code'=>10001,'msg'=>"只支持GET/POST请求"));
        }

        //默认必传参数

        $data = [
            'app_id'=>$this->appKey,
            'timestamp'=>time(),
            'req_id'=>uniqid(md5(microtime())),
        ];

        //加密的参数
        if ($this->requestParams) {
            $data['data'] = json_encode($this->requestParams);
        }
        // 获取签名
        $data['sign'] = self::makeSign($data,$this->appSecret);
 
        try {
            if($type == 'POST') {
                // 将数组转换为JSON格式字符串
                $postData = json_encode($data);
                $curl = curl_init(); // 启动一个CURL会话
                curl_setopt($curl, CURLOPT_URL, $host); 
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
                curl_setopt($curl, CURLOPT_POST, true); // 发送一个常规的POST请求
                curl_setopt($curl, CURLOPT_POSTFIELDS, $postData); // Post提交的数据包，现在是JSON格式
                curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
                curl_setopt($curl, CURLOPT_HEADER, false); 
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
                // 添加HTTP头信息，表明发送的是JSON格式的数据
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($postData))
                );
                $result = curl_exec($curl); 
                $a = curl_error($curl);
                if(!empty($a)){
                    return json_encode(array('code'=>10003, 'msg'=>$a));
                }
                curl_close($curl); 
                return $result; 
            }else{
                //拼接请求地址
                $url = $host . '?' . http_build_query($data);
                //执行请求获取数据
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $output = curl_exec($ch);
                $a = curl_error($ch);
                if(!empty($a)){
                    return json_encode(array('code'=>10003, 'msg'=>$a));
                }
                curl_close($ch);
                return $output;
            }
        }catch (Exception $e){
            return json_encode(array('code'=>10002,'msg'=>"请求超时或异常，请重试"));
        }
    }
}
