<?php



require "vendor/autoload.php";

$access_token = '/wY5HSrpnmDx7LIWM7AUTEWD1GIxquEPOeyZP+5qmR4HxF2SNpR68NbtCuNR4gQm4Nmy7GtKojgCFm8LYSXi1JRu9DZdd79DvPD149iCQ8TA8jIiKDEvjFAvN1uJMHsN7X3WmqSQ1EiSipWZ6TN0SQdB04t89/1O/w1cDnyilFU=';

$channelSecret = '32514d1eecec8b16061bc1e19c1eedaf';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







