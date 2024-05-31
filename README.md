# tdk-openapi
tdk openapi for php

```php
include("vendor/autoload.php");

  $client = new LiveLink();
  $client->setAppKey('5515796');
  $client->setAppSecret('xxxxx');
  $res = $client->setParams([
      'author_buyin_id' => '6961635340667240734',
      'share_type'=>[1,2,3,4]
  ])->request();
  var_dump($res);
```
