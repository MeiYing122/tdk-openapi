<?php
include("../vendor/autoload.php");

$client = new TaoDouKe\OpenApi\ProductCategory();
$client->setAppKey('5515796');
$client->setAppSecret('xxxxxxx');
$res = $client->setParams([
    'parent_id' => 0,
])->request();
var_dump($res);